<?php
$user = $model['user'] ?? null;
$username = $user['username'] ?? null;
$profile_image = $user['profile_image'] ?? 'default.webp';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?= $model['title'] ?? 'Selamat Datang' ?> | SoedTrade</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link
        href="https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/keen-slider.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="/css/output.css">
</head>

<body class="font-poppins">
    <nav class="border-light-base bg-dark-base fixed top-0 w-full z-[999]">
        <div
            class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a
                href="about-us"
                class="flex items-center space-x-3 rtl:space-x-reverse">
                <img
                    src="/images/logos/unsoed-logo.png"
                    class="h-8"
                    alt="Flowbite Logo" />
                <span
                    class="self-center text-2xl font-semibold whitespace-nowrap text-light-base">SoedTrade</span>
            </a>
            <button
                data-collapse-toggle="navbar-default"
                id="navbar-toggle"
                type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg md:hidden focus:outline-none focus:ring-2 text-gray-400 hover:bg-gray-700"
                aria-controls="navbar-default"
                aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 17 14">
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border rounded-lg md:flex-row md:space-x-2 rtl:space-x-reverse md:mt-0 md:border-0 bg-gray-800 md:bg-dark-base border-gray-700 gap-2 lg:gap-0">
                    <li>
                        <a
                            href="/"
                            class="block py-1 px-2 rounded text-light-base"
                            aria-current="page">Beranda</a>
                    </li>
                    <li>
                        <a
                            href="/about-us"
                            class="block py-1 px-2 rounded text-light-base">Tentang Kami</a>
                    </li>
                    <li>
                        <a
                            href="/contact-us"
                            class="block py-1 px-2 rounded text-light-base">Hubungi Kami</a>
                    </li>
                    <?php if (isset($user)) : ?>
                        <li class="py-1 px-2 md:p-0 md:justify-center items-center gap-2">
                            <a href="/users" class="flex items-center gap-2 text-light-base">
                                <img src="/images/profiles/<?= $profile_image ?>" alt="Photo Profile <?= $username ?>"
                                    class="w-8 rounded-full object-cover aspect-square">
                                <span class="text-light-base md:hidden"><?= $username ?></span>
                            </a>
                        </li>
                    <?php else : ?>
                        <li>
                            <a href="/users/login"
                                class="block py-1 px-2 rounded text-light-base bg-blue-base">
                                Masuk
                            </a>
                        </li>
                        <li>
                            <a href="/users/register"
                                class="block py-1 px-2 rounded text-light-base ring-2 ring-blue-base">
                                Daftar
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>