<?php

namespace JackBerck\SoedTrade\Controller;

use PHPUnit\Framework\TestCase;
use JackBerck\SoedTrade\Config\Database;
use JackBerck\SoedTrade\Domain\Session;
use JackBerck\SoedTrade\Domain\User;
use JackBerck\SoedTrade\Repository\SessionRepository;
use JackBerck\SoedTrade\Repository\UserRepository;
use JackBerck\SoedTrade\Service\SessionService;

class HomeControllerTest extends TestCase
{
    private HomeController $homeController;
    private UserRepository $userRepository;
    private SessionRepository $sessionRepository;

    protected function setUp(): void
    {
        $this->homeController = new HomeController();
        $this->sessionRepository = new SessionRepository(Database::getConnection());
        $this->userRepository = new UserRepository(Database::getConnection());

        $this->sessionRepository->deleteAll();
        $this->userRepository->deleteAll();
    }

    public function testGuest()
    {
        $this->homeController->index();

        $this->expectOutputRegex("[Login Management]");
    }

    public function testUserLogin()
    {
        $user = new User();
        $user->id = "eko";
        $user->name = "Eko";
        $user->password = "rahasia";
        $this->userRepository->save($user);

        $session = new Session();
        $session->id = uniqid();
        $session->userId = $user->id;
        $this->sessionRepository->save($session);

        $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

        $this->homeController->index();

        $this->expectOutputRegex("[Hello Eko]");
    }
}
