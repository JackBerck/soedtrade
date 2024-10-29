<?php

require_once __DIR__ . '/../vendor/autoload.php';

use JackBerck\SoedTrade\App\Router;
use JackBerck\SoedTrade\Config\Database;
use JackBerck\SoedTrade\Controller\HomeController;
use JackBerck\SoedTrade\Controller\UserController;
use JackBerck\SoedTrade\Middleware\MustNotLoginMiddleware;
use JackBerck\SoedTrade\Middleware\MustLoginMiddleware;

Database::getConnection('prod');

// Home Controller
Router::add('GET', '/', HomeController::class, 'index', []);

// User Controller
Router::add('GET', '/users/register', UserController::class, 'register', [MustNotLoginMiddleware::class]);
Router::add('POST', '/users/register', UserController::class, 'postRegister', [MustNotLoginMiddleware::class]);
Router::add('GET', '/users/login', UserController::class, 'login', [MustNotLoginMiddleware::class]);
Router::add('POST', '/users/login', UserController::class, 'postLogin', [MustNotLoginMiddleware::class]);
Router::add('GET', '/users/logout', UserController::class, 'logout', [MustLoginMiddleware::class]);
Router::add('GET', '/users/profile', UserController::class, 'updateProfile', [MustLoginMiddleware::class]);
Router::add('POST', '/users/profile', UserController::class, 'postUpdateProfile', [MustLoginMiddleware::class]);
Router::add('GET', '/users/password', UserController::class, 'updatePassword', [MustLoginMiddleware::class]);
Router::add('POST', '/users/password', UserController::class, 'postUpdatePassword', [MustLoginMiddleware::class]);
Router::add('GET', '/about-us', \JackBerck\SoedTrade\Controller\AboutUsController::class, 'index', []);
Router::add('GET', '/contact-us', \JackBerck\SoedTrade\Controller\ContactUsController::class, 'index', []);

Router::run();
