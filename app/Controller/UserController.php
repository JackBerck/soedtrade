<?php

namespace JackBerck\SoedTrade\Controller;

use JackBerck\SoedTrade\App\View;
use JackBerck\SoedTrade\Config\Database;
use JackBerck\SoedTrade\Exception\ValidationException;
use JackBerck\SoedTrade\Model\UserLoginRequest;
use JackBerck\SoedTrade\Model\UserProfileUpdateRequest;
use JackBerck\SoedTrade\Model\UserRegisterRequest;
use JackBerck\SoedTrade\Repository\SessionRepository;
use JackBerck\SoedTrade\Repository\UserRepository;
use JackBerck\SoedTrade\Service\SessionService;
use JackBerck\SoedTrade\Service\UserService;
use JackBerck\SoedTrade\Model\ProductAddRequest;

class UserController
{
    private UserService $userService;
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $userRepository = new UserRepository($connection);
        $this->userService = new UserService($userRepository);

        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $userRepository);
    }

    function index(): void
    {
        $user = $this->sessionService->current();

        $model = ["title" => "Profil"];
        if ($user != null) {
            $model["user"] = [
                "username" => $user->username,
                "email" => $user->email,
                "phone_number" => $user->phone_number,
                "address" => $user->address,
                "profile_image" => $user->profile_image,
            ];
        }

        View::render('User/index', model: $model);
    }

    public function register()
    {
        View::render('User/register', [
            'title' => 'Daftar Akun Baru'
        ]);
    }

    public function postRegister()
    {
        $request = new UserRegisterRequest();
        $request->username = $_POST['username'];
        $request->email = $_POST['email'];
        $request->password = $_POST['password'];
        $request->profile_image = $_POST['profile_image'];
        $request->phone_number = $_POST['phone_number'];
        $request->address = $_POST['address'];

        try {
            $this->userService->register($request);
            View::redirect('/users/login');
        } catch (ValidationException $exception) {
            View::render('User/register', [
                'title' => 'Daftar Akun Baru',
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function login()
    {
        View::render('User/login', [
            "title" => "Masuk ke Akun"
        ]);
    }

    public function postLogin()
    {
        $request = new UserLoginRequest();
        $request->email = $_POST['email'];
        $request->password = $_POST['password'];

        try {
            $response = $this->userService->login($request);
            $this->sessionService->create($response->user->user_id);
            View::redirect('/');
        } catch (ValidationException $exception) {
            View::render('User/login', [
                'title' => 'Masuk ke Akun',
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function logout()
    {
        $this->sessionService->destroy();
        View::redirect("/");
    }

    public function postUpdateProfile(): void
    {
        $user = $this->sessionService->current();

        $request = new UserProfileUpdateRequest();
        $request->user_id = $user->user_id;
        $request->username = $_POST['username'];
        $request->address = $_POST['address'];

        try {
            $this->userService->updateProfile($request);
            View::redirect('/users');
        } catch (ValidationException $exception) {
            View::render('User/index', [
                "title" => "Profil",
                "user" => [
                    "username" => $user->username,
                    "email" => $user->email,
                    "phone_number" => $user->phone_number,
                    "address" => $user->address,
                    "profile_image" => $user->profile_image
                ]
            ]);
        }
    }

    public function addProduct()
    {
        $user = $this->sessionService->current();

        $model = ["title" => "Tambah Barang"];
        if ($user != null) {
            $model["user"] = [
                "username" => $user->username,
                "email" => $user->email,
                "phone_number" => $user->phone_number,
                "address" => $user->address,
                "profile_image" => $user->profile_image,
            ];
        }

        View::render('User/tambah-barang', model: $model);
    }

    public function postAddProduct(): void
    {
        $user = $this->sessionService->current();

        $request = new ProductAddRequest();
        $request->seller_id = $user->user_id;
        $request->name = $_POST['name'];
        $request->price = $_POST['price'];
        $request->condition = $_POST['condition'];
        $request->category = $_POST['category'];
        $request->description = $_POST['description'];

        try {
            $this->userService->addProduct($request);
            View::redirect('/');
        } catch (ValidationException $exception) {
            View::render('User/tambah-barang', [
                "title" => "Tambah Barang",
                "user" => [
                    "username" => $user->username,
                    "email" => $user->email,
                    "phone_number" => $user->phone_number,
                    "address" => $user->address,
                    "profile_image" => $user->profile_image,
                ],
                "error" => $exception->getMessage()
            ]);
        }
    }
}
