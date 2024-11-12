<?php
$product = $model["product"] ?? [];
$user = $model["user"] ?? [];
$userWhoPosted = $model["userWhoPosted"] ?? [];

// Get URL
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443 ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
$requestUri = $_SERVER['REQUEST_URI'];
$url = $protocol . $host . $requestUri;
?>

<style>
    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .swiper-slide {
        position: relative;
    }

    <?php foreach ($product->images as $image) : ?>
    @media screen and (min-width: 768px) {
        .swiper-slide::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.4;
            background: url("/images/products/<?= $image ?>") no-repeat center center;
            background-size: cover;
            z-index: -1;
        }
    }

    <?php endforeach; ?>
</style>

<main id="detail-product" class="pt-16 w-full flex justify-between flex-col md:flex-row ">
    <div class="w-full md:w-3/5 h-[216px] md:h-auto">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php foreach ($product->images as $image) : ?>
                    <div class="swiper-slide">
                        <img src="/images/products/<?= $image ?>" alt="Foto <?= $product->name ?>"
                             class="max-w-md object-cover rounded-lg max-h-[720px]"/>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

    <section id="product-detail-header" class="section-padding-x pt-4 pb-4 md:w-2/5">
        <div class="container max-w-screen-sm">
            <div class="flex items-center gap-2 border-b-2 border-b-gray-400 pb-2">
                <img src="/images/profiles/<?= $userWhoPosted->profile_image ?? "default.webp" ?>"
                     alt="Foto profil <?= $userWhoPosted->username ?? "" ?>"
                     class="rounded-full w-10 aspect-square object-cover"/>
                <p class="small-font-size font-semibold"><?= $userWhoPosted->username ?? "User" ?></p>
            </div>
            <div class="mb-2 mt-2">
                <h1 class="product-title-font-size font-bold">
                    <?= $product->name ?>
                </h1>
                <p class="small-font-size text-gray-600 font-light">
                    Ditawarkan <span id="createdAt"
                                     data-date="<?= str_replace(' ', 'T', $product->created_at) ?>"><?= $product->created_at ?></span>
                </p>
            </div>
            <div class="flex gap-2 items-center mb-4">
                <a target="_blank"
                   href="https://wa.me/<?= $userWhoPosted->phone_number ?? "" ?>?text=Apakah postingan ini masih berlaku?%0A<?= $url ?>"
                   class="rounded-lg bg-green-base text-light-base h-9 px-2 items-center flex gap-2">
                    <svg class="w-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
                    </svg>
                    <span class="small-font-size">Kirim pesan</span>
                </a>
                <button type="button" class="w-9 h-9 aspect-square rounded-lg bg-gray-300 px-2" onclick="copyLink()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M208 0H332.1c12.7 0 24.9 5.1 33.9 14.1l67.9 67.9c9 9 14.1 21.2 14.1 33.9V336c0 26.5-21.5 48-48 48H208c-26.5 0-48-21.5-48-48V48c0-26.5 21.5-48 48-48zM48 128h80v64H64V448H256V416h64v48c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V176c0-26.5 21.5-48 48-48z"/>
                    </svg>
                </button>
                <form action="/users/saved-products/save" method="post" onsubmit="savedProduct()" class="w-9 h-9">
                    <input type="hidden" name="product_id" value="<?= $product->product_id ?>">
                    <button type="submit" class="w-9 h-9 aspect-square rounded-lg bg-gray-300 px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"/>
                        </svg>
                    </button>
                </form>
            </div>
            <div class="">
                <h2 class="subtitle-font-size font-bold mb-2">Detail</h2>
                <div class="flex flex-col gap-2">
                    <div class="flex justify-between">
                        <h3 class="normal-font-size font-medium">Kategori</h3>
                        <p class="normal-font-size"><?= $product->category ?></p>
                    </div>
                    <div class="flex justify-between">
                        <h3 class="normal-font-size font-medium">Kondisi</h3>
                        <p class="normal-font-size"><?= $product->condition ?></p>
                    </div>
                    <p class="normal-font-size">
                        <?= $product->description ?>
                    </p>
                    <div class="relative text-right w-full h-52 rounded-lg">
                        <div class="overflow-hidden bg-none w-full h-full">
                            <iframe
                                    class="w-full h-full"
                                    frameborder="0"
                                    scrolling="no"
                                    marginheight="0"
                                    marginwidth="0"
                                    src="https://maps.google.com/maps?width=600&height=200&hl=en&q=universitas jenderal soedirman&t=&z=14&ie=UTF8&iwloc=B&output=embed"
                            ></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    // Swiper for product images slider
    let swiper = new Swiper(".mySwiper", {
        pagination: {
            clickable: true,
            el: ".swiper-pagination",
        },
        loop: true,
        autoplay: {
            delay: 2500,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    // Format time ago
    function timeAgo(dateString) {
        const now = new Date();
        const date = new Date(dateString);
        const seconds = Math.floor((now - date) / 1000);

        let interval = Math.floor(seconds / 31536000);
        if (interval > 1) return `${interval} tahun yang lalu`;
        interval = Math.floor(seconds / 2592000);
        if (interval > 1) return `${interval} bulan yang lalu`;
        interval = Math.floor(seconds / 86400);
        if (interval > 1) return `${interval} hari yang lalu`;
        interval = Math.floor(seconds / 3600);
        if (interval > 1) return `${interval} jam yang lalu`;
        interval = Math.floor(seconds / 60);
        if (interval > 1) return `${interval} menit yang lalu`;
        return `${seconds} detik yang lalu`;
    }

    const createdAt = document.getElementById("createdAt");
    let timeNow = timeAgo(createdAt.innerText);
    createdAt.innerText = timeNow;

    // Link copy
    function copyLink() {
        const currentUrl = window.location.href;

        navigator.clipboard.writeText(currentUrl)
            .then(() => {
                alert('URL berhasil disalin: ' + currentUrl);
            })
            .catch(err => {
                console.error('Gagal menyalin URL: ', err);
            });
    }
</script>