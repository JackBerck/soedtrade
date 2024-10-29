<?php

namespace JackBerck\SoedTrade\Controller;

use JackBerck\SoedTrade\App\View;
use JackBerck\SoedTrade\Config\Database;
use JackBerck\SoedTrade\Repository\SessionRepository;
use JackBerck\SoedTrade\Repository\UserRepository;
use JackBerck\SoedTrade\Service\SessionService;

class ContactUsController {
    function index()
    {
        View::render('ContactUs/index', [
            "title" => "Hubungi Kami"
        ]);
    }
}