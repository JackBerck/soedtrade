<?php

namespace JackBerck\SoedTrade\Service;

use JackBerck\SoedTrade\Config\Database;
use JackBerck\SoedTrade\Domain\User;
use JackBerck\SoedTrade\Exception\ValidationException;
use JackBerck\SoedTrade\Model\UserLoginRequest;
use JackBerck\SoedTrade\Model\UserLoginResponse;
use JackBerck\SoedTrade\Model\UserProfileUpdateRequest;
use JackBerck\SoedTrade\Model\UserProfileUpdateResponse;
use JackBerck\SoedTrade\Model\UserRegisterRequest;
use JackBerck\SoedTrade\Model\UserRegisterResponse;
use JackBerck\SoedTrade\Repository\UserRepository;
use JackBerck\SoedTrade\Repository\ProductRepository;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->productRepository = new ProductRepository(Database::getConnection());
    }

    public function register(UserRegisterRequest $request): UserRegisterResponse
    {
        $this->validateUserRegistrationRequest($request);

        try {
            Database::beginTransaction();
            if ($this->userRepository->findByEmail($request->email) != null) {
                throw new ValidationException("Akun sudah terdaftar dengan email ini");
            }

            $user = new User();
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = password_hash($request->password, PASSWORD_BCRYPT);
            if ($request->profile_image == NULL) {
                $user->profile_image = "default.webp";
            } else {
                $user->profile_image = $request->profile_image;
            }
            $user->phone_number = $request->phone_number;
            $user->address = $request->address;

            $this->userRepository->save($user);

            $response = new UserRegisterResponse();
            $response->user = $user;

            Database::commitTransaction();
            return $response;
        } catch (\Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    private function validateUserRegistrationRequest(UserRegisterRequest $request)
    {
        if (
            $request->username == null || $request->password == null || $request->email == null || $request->phone_number == null || $request->address == null || trim($request->username) == "" || trim($request->password) == "" || trim($request->email) == "" || trim($request->phone_number) == "" || trim($request->address) == ""
        ) {
            throw new ValidationException("Nama, email, password, nomor handphone, dan alamat tidak boleh kosong");
        }
    }

    public function login(UserLoginRequest $request): UserLoginResponse
    {
        $this->validateUserLoginRequest($request);

        $user = $this->userRepository->findByEmail($request->email);
        if ($user == null) {
            throw new ValidationException("Email atau password salah");
        }

        if (password_verify($request->password, $user->password)) {
            $response = new UserLoginResponse();
            $response->user = $user;
            return $response;
        } else {
            throw new ValidationException("Email atau password salah");
        }
    }

    private function validateUserLoginRequest(UserLoginRequest $request)
    {
        if (
            $request->email == null || $request->password == null || trim($request->email) == "" || trim($request->password) == ""
        ) {
            throw new ValidationException("Email dan password tidak boleh kosong");
        }
    }

    public function updateProfile(UserProfileUpdateRequest $request): UserProfileUpdateResponse
    {
        $this->validateUserProfileUpdateRequest($request);
        $pathImage = __DIR__ . "/../../public/images/profiles/";

        try {
            Database::beginTransaction();

            $user = $this->userRepository->findById($request->user_id);
            if ($user == null) {
                throw new ValidationException("Pengguna tidak ditemukan");
            }

            $user->username = $request->username;
            $user->address = $request->address;
            if ($user->profile_image != null && $request->profile_image != null) {
                unlink($pathImage . $user->profile_image);
            }

            if ($request->profile_image && isset($request->profile_image['tmp_name'])) {
                $extension = pathinfo($request->profile_image['name'], PATHINFO_EXTENSION);
                $namePhoto = uniqid() . '.' . $extension;

                move_uploaded_file($request->profile_image['tmp_name'], $pathImage . $namePhoto);

                $user->profile_image = $namePhoto;
            }
            $this->userRepository->update($user);

            Database::commitTransaction();

            $response = new UserProfileUpdateResponse();
            $response->user = $user;
            return $response;
        } catch (\Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    private function validateUserProfileUpdateRequest(UserProfileUpdateRequest $request)
    {
        if (
            $request->username == null || $request->address == null || trim($request->username) == "" || trim($request->address) == ""
        ) {
            throw new ValidationException("Nama dan alamat tidak boleh kosong");
        }

        if ($request->profile_image != null && $request->profile_image['error'] != UPLOAD_ERR_OK) {
            throw new ValidationException("Gagal mengupload gambar");
        }
    }
}
