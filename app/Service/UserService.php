<?php

namespace JackBerck\SoedTrade\Service;

use JackBerck\SoedTrade\Config\Database;
use JackBerck\SoedTrade\Domain\User;
use JackBerck\SoedTrade\Exception\ValidationException;
use JackBerck\SoedTrade\Model\UserLoginRequest;
use JackBerck\SoedTrade\Model\UserLoginResponse;
use JackBerck\SoedTrade\Model\UserPasswordUpdateRequest;
use JackBerck\SoedTrade\Model\UserPasswordUpdateResponse;
use JackBerck\SoedTrade\Model\UserProfileUpdateRequest;
use JackBerck\SoedTrade\Model\UserProfileUpdateResponse;
use JackBerck\SoedTrade\Model\UserRegisterRequest;
use JackBerck\SoedTrade\Model\UserRegisterResponse;
use JackBerck\SoedTrade\Repository\UserRepository;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
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
            $user->profile_image = $request->profile_image;
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

        try {
            Database::beginTransaction();

            $user = $this->userRepository->findById($request->user_id);
            if ($user == null) {
                throw new ValidationException("User is not found");
            }

            $user->username = $request->username;
            $user->email = $request->email;
            $user->profile_image = $request->profile_image;
            $user->phone_number = $request->phone_number;
            $user->address = $request->address;
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
            $request->user_id == null || $request->username == null || $request->email == null || $request->profile_image == null || $request->phone_number == null || $request->address == null || trim($request->user_id) == "" || trim($request->username) == "" || trim($request->email) == "" || trim($request->profile_image) == "" || trim($request->phone_number) == "" || trim($request->address) == ""
        ) {
            throw new ValidationException("Id, Name can not blank");
        }
    }

    public function updatePassword(UserPasswordUpdateRequest $request): UserPasswordUpdateResponse
    {
        $this->validateUserPasswordUpdateRequest($request);

        try {
            Database::beginTransaction();

            $user = $this->userRepository->findById($request->user_id);
            if ($user == null) {
                throw new ValidationException("User is not found");
            }

            if (!password_verify($request->oldPassword, $user->password)) {
                throw new ValidationException("Old password is wrong");
            }

            $user->password = password_hash($request->newPassword, PASSWORD_BCRYPT);
            $this->userRepository->update($user);

            Database::commitTransaction();

            $response = new UserPasswordUpdateResponse();
            $response->user = $user;
            return $response;
        } catch (\Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    private function validateUserPasswordUpdateRequest(UserPasswordUpdateRequest $request)
    {
        if (
            $request->user_id == null || $request->oldPassword == null || $request->newPassword == null ||
            trim($request->user_id) == "" || trim($request->oldPassword) == "" || trim($request->newPassword) == ""
        ) {
            throw new ValidationException("Old Password, New Password can not blank");
        }
    }
}
