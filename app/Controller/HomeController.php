<?php

namespace JackBerck\SoedTrade\Controller;

use JackBerck\SoedTrade\App\View;
use JackBerck\SoedTrade\Config\Database;
use JackBerck\SoedTrade\Repository\SessionRepository;
use JackBerck\SoedTrade\Repository\UserRepository;
use JackBerck\SoedTrade\Repository\ProductRepository;
use JackBerck\SoedTrade\Repository\ProductImagesRepository;
use JackBerck\SoedTrade\Service\SessionService;
use JackBerck\SoedTrade\Service\ProductService;

class HomeController
{

    private SessionService $sessionService;
    private ProductService $productService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $sessionRepository = new SessionRepository($connection);
        $userRepository = new UserRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $userRepository);

        $productRepository = new ProductRepository($connection);
        $productImagesRepository = new ProductImagesRepository($connection);
        $this->productService = new ProductService($productRepository, $productImagesRepository);
    }


    function index(): void
    {
        $user = $this->sessionService->current();

        $model = ["title" => "Beranda"];
        if ($user != null) {
            $model["user"] = [
                "username" => $user->username,
                "profile_image" => $user->profile_image,
            ];
        }

        $products = $this->productService->findAll();
        $model["products"] = $products;

        View::render('Home/index', model: $model);
    }

    function product($id): void
    {
        $user = $this->sessionService->current();

        $model = ["title" => "Detail Produk"];
        if ($user != null) {
            $model["user"] = [
                "username" => $user->username,
                "profile_image" => $user->profile_image,
            ];
        }

        $product = $this->productService->findById($id);
        $model["product"] = $product;

        $userWhoPosted = $this->productService->findUserWhoPosted($id);
        $model["userWhoPosted"] = $userWhoPosted;

        View::render('Product/index', model: $model);
    }
}
