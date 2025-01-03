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
use JackBerck\SoedTrade\Repository\ProductRepository;
use JackBerck\SoedTrade\Repository\ProductImagesRepository;
use JackBerck\SoedTrade\Service\SessionService;
use JackBerck\SoedTrade\Service\UserService;
use JackBerck\SoedTrade\Service\ProductService;
use JackBerck\SoedTrade\Model\ProductAddRequest;

class UserController
{
    private UserService $userService;
    private SessionService $sessionService;
    private ProductService $productService;


    public function __construct()
    {
        $connection = Database::getConnection();
        $userRepository = new UserRepository($connection);
        $this->userService = new UserService($userRepository);

        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $userRepository);

        $productRepository = new ProductRepository($connection);
        $productImageRepository = new ProductImagesRepository($connection);
        $this->productService = new ProductService($productRepository, $productImageRepository);
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
        $request->phone_number = $_POST['phone_number'];
        $request->address = $_POST['address'];
        if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
            $request->profile_image = $_FILES['profile_image'];
        } else {
            $request->profile_image = null;
        }

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

    public function updateProfile(): void
    {
        $user = $this->sessionService->current();

        $request = new UserProfileUpdateRequest();
        $request->user_id = $user->user_id;
        $request->username = $_POST['username'];
        $request->address = $_POST['address'];
        if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
            $request->profile_image = $_FILES['profile_image'];
        } else {
            $request->profile_image = null;
        }

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

        View::render('User/add-product', model: $model);
    }

    public function postAddProduct(): void
    {
        $user = $this->sessionService->current();

        $request = new ProductAddRequest();
        $request->seller_id = $user->user_id;
        $request->name = $_POST['name'];
        $request->price = $_POST['price'];
        $request->description = $_POST['description'];
        $request->condition = $_POST['condition'];
        $request->category = $_POST['category'];

        if (isset($_FILES['images'])) {
            $request->images = $_FILES['images'];
        } else {
            $request->images = [];
        }

        try {
            $this->productService->addProduct($request);
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
            echo $exception->getMessage();
        }
    }

    public function manageProducts(): void
    {
        $user = $this->sessionService->current();
        $products = $this->productService->getProductsBySellerId($user->user_id);

        $model = ["title" => "Kelola Barang"];
        if ($user != null) {
            $model["user"] = [
                "username" => $user->username,
                "profile_image" => $user->profile_image,
            ];
        }


        if ($products != null) {
            $model["products"] = $products;
        }

        View::render('User/manage-products', model: $model);
    }

    public function deleteProduct(): void
    {
        $product_id = $_POST['product_id'];

        $this->productService->deleteProduct($product_id);
        View::redirect('/users/manage-products');
    }

    public function updateProduct($product_id): void
    {
        $user = $this->sessionService->current();
        $product = $this->productService->findById($product_id);

        $model = ["title" => "Ubah Barang"];
        if ($user != null) {
            $model["user"] = [
                "username" => $user->username,
                "profile_image" => $user->profile_image,
            ];
        }

        if ($product != null) {
            $model["product"] = $product;
        }

        View::render('User/update-product', model: $model);
    }

    public function postUpdateProduct($product_id): void
    {
        $user = $this->sessionService->current();

        $request = new ProductAddRequest();
        $request->product_id = $product_id;
        $request->seller_id = $user->user_id;
        $request->name = $_POST['name'];
        $request->price = $_POST['price'];
        $request->description = $_POST['description'];
        $request->condition = $_POST['condition'];
        $request->category = $_POST['category'];

        try {
            $this->productService->updateProduct($request);
            View::redirect('/users/manage-products');
        } catch (ValidationException $exception) {
            View::render('User/update-product', [
                "title" => "Ubah Barang",
                "user" => [
                    "username" => $user->username,
                    "profile_image" => $user->profile_image,
                ],
                "error" => $exception->getMessage()
            ]);
        }
    }

    public function savedProducts(): void
    {
        $user = $this->sessionService->current();
        $products = $this->productService->getSavedProducts($user->user_id);

        $model = ["title" => "Barang Tersimpan"];
        if ($user != null) {
            $model["user"] = [
                "username" => $user->username,
                "profile_image" => $user->profile_image,
            ];
        }

        if ($products != null) {
            $model["products"] = $products;
        }

        View::render('User/saved-products', model: $model);
    }

    public function postSavedProducts(): void
    {
        $user = $this->sessionService->current();
        $product_id = $_POST['product_id'];

        if ($this->productService->isProductSaved($user->user_id, $product_id)) {
            echo "<script>
                alert('Produk ini sudah disimpan sebelumnya');
                window.location.href = '/product/' + $product_id;
              </script>";
        } else {
            $this->productService->saveProduct($user->user_id, $product_id);
            echo "<script>
                alert('Produk disimpan!');
                window.location.href = '/product/' + $product_id;
              </script>";
        }
    }

    public function deleteSavedProduct(): void
    {
        $user = $this->sessionService->current();
        $product_id = $_POST['product_id'];
        $this->productService->deleteSavedProduct($user->user_id, $product_id);
        echo "<script>
                alert('Produk dihapus dari daftar simpanan!');
                window.location.href = '/users/saved-products';
              </script>";
    }

    public function searchProducts(): void
    {
        $user = $this->sessionService->current();
        $keyword = $_GET['query'];

        $model = ["title" => "Hasil Pencarian"];
        if ($user != null) {
            $model["user"] = [
                "username" => $user->username,
                "profile_image" => $user->profile_image,
            ];
        }

        $products = $this->productService->searchProducts($keyword);
        if ($products != null) {
            $model["products"] = $products;
        }

        View::render('search', model: $model);
    }
}
