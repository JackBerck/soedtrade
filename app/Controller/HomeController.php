<?php

namespace JackBerck\SoedTrade\Controller;

use JackBerck\SoedTrade\App\View;
use JackBerck\SoedTrade\Config\Database;
use JackBerck\SoedTrade\Repository\SessionRepository;
use JackBerck\SoedTrade\Repository\UserRepository;
use JackBerck\SoedTrade\Service\SessionService;

class HomeController
{

    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $sessionRepository = new SessionRepository($connection);
        $userRepository = new UserRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $userRepository);
    }


    function index() :void
    {
        $user = $this->sessionService->current();

        $model = ["title" => "Beranda"];
        if ($user != null) {
            $model["user"] = [
                "username" => $user->username,
                "profile_image" => $user->profile_image,
            ];
        }

        View::render('Home/index', model: $model);
    }
}
