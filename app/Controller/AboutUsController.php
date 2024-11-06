<?php

namespace JackBerck\SoedTrade\Controller;

use JackBerck\SoedTrade\App\View;
use JackBerck\SoedTrade\Config\Database;
use JackBerck\SoedTrade\Repository\SessionRepository;
use JackBerck\SoedTrade\Repository\UserRepository;
use JackBerck\SoedTrade\Service\SessionService;

class AboutUsController
{
    public function __construct()
    {
        $connection = Database::getConnection();
        $sessionRepository = new SessionRepository($connection);
        $userRepository = new UserRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $userRepository);
    }

    function index(): void
    {
        $user = $this->sessionService->current();

        $model = ["title" => "Tentang Kami"];
        if ($user != null) {
            $model["user"] = [
                "username" => $user->username,
                "email" => $user->email,
                "phone_number" => $user->phone_number,
                "address" => $user->address,
                "profile_image" => $user->profile_image,
            ];
        }

        View::render('AboutUs/index', model: $model);
    }
}