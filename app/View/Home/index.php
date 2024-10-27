<?php
$slides = [
    [
        "image" => "./public/images/banners/warung-makan.webp",
        "title" => "Slide 1",
    ],
    [
        "image" => "./public/images/banners/laundry.jpg",
        "title" => "Slide 2",
    ],
    [
        "image" => "./public/images/banners/bengkel-motor.jpg",
        "title" => "Slide 3",
    ],
];

$products = [
    [
        "image" => "./public/images/products/grand-astrea-96.jpg",
        "title" => "Honda Grand Astrea 96",
        "price" => 5000000,
        "description" =>
        "Motor Honda Grand Astrea 96 dengan kondisi bagus, mesin halus, dan siap pakai.",
        "condition" => "Bekas",
        "category" => "Motor",
    ],
    [
        "image" => "./public/images/products/honda-goldwing.jpg",
        "title" => "Honda Goldwing",
        "price" => 100000000,
        "description" =>
        "Motor Honda Goldwing dengan kondisi bagus layak pakai dan siap touring.",
        "condition" => "Bekas",
        "category" => "Motor",
    ],
    [
        "image" => "./public/images/products/lenovo-yoga-pro-9.jpg",
        "title" => "Lenovo Yoga Pro 9",
        "price" => 15000000,
        "description" =>
        "Laptop Lenovo Yoga Pro 9 dengan spesifikasi tinggi, layar touchscreen, dan ringan.",
        "condition" => "Bekas",
        "category" => "Laptop",
    ],
    [
        "image" => "./public/images/products/rog-phone-2.jpg",
        "title" => "Asus ROG Phone 2",
        "price" => 8000000,
        "description" =>
        "Handphone Asus ROG Phone 2 dengan spesifikasi gaming, layar 120Hz, dan performa tinggi.",
        "condition" => "Bekas",
        "category" => "Handphone",
    ],
    [
        "image" => "./public/images/products/sony-a7-mark-2.jpg",
        "title" => "Sony A7 Mark 2",
        "price" => 12000000,
        "description" =>
        "Kamera Sony A7 Mark 2 dengan kualitas gambar tinggi, full frame, dan performa tinggi.",
        "condition" => "Bekas",
        "category" => "Kamera",
    ],
    [
        "image" => "./public/images/products/tuf-gaming.jpg",
        "title" => "TUF Gaming",
        "price" => 20000000,
        "description" =>
        "Laptop TUF Gaming dengan spesifikasi tinggi, performa tinggi, dan tahan lama.",
        "condition" => "Bekas",
        "category" => "Laptop",
    ],
];
?>

<!-- Swiper Slider Start -->
<div class="pt-20 md:pt-24 max-w-screen-lg aspect-video md:aspect-[21/9] container section-padding-x">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php foreach ($slides as $slide): ?>
                <div class="swiper-slide">
                    <img
                        src="<?= $slide['image']; ?>"
                        alt="<?= $slide['title']; ?>"
                        class="w-full object-cover rounded-lg" />
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
<!-- Swiper Slider End -->

<!-- Product List Start -->
<div class="pt-8 pb-8 section-padding-x">
    <div class="container max-w-screen-xl">
        <form class="max-w-2xl mb-4">
            <div class="flex relative">
                <button
                    id="dropdown-button"
                    data-dropdown-toggle="dropdown"
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-dark-base bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:outline-none"
                    type="button">Semua kategori <svg
                        class="w-2.5 h-2.5 ms-2.5"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 10 6">
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m1 1 4 4 4-4"></path>
                    </svg></button>
                <div
                    id="dropdown"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 absolute top-12">
                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdown-button">
                        <li>
                            <button
                                type="button"
                                class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Elektronik</button>
                        </li>
                        <li>
                            <button
                                type="button"
                                class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Kendaraan</button>
                        </li>
                        <li>
                            <button
                                type="button"
                                class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Alat musik</button>
                        </li>
                        <li>
                            <button
                                type="button"
                                class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Pakaian</button>
                        </li>
                        <li>
                            <button
                                type="button"
                                class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Hobi & hiburan</button>
                        </li>
                    </ul>
                </div>
                <div class="relative w-full">
                    <input
                        type="search"
                        id="search-dropdown"
                        class="block p-2.5 w-full z-20 text-sm focus:outline-none text-dark-base bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300"
                        placeholder="Cari barang elektronik, kendaraan, dan lainnya"
                        required />
                    <button
                        type="submit"
                        class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800">
                        <svg
                            class="w-4 h-4"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 20 20">
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"></path>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>
        <div
            class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 justify-between">
            <?php foreach ($products as $index => $product): ?>
                <div class="max-w-[300px] aspect-square bg-white border border-gray-200 rounded-lg shadow">
                    <a href="product?id=<?= $index; ?>">
                        <img
                            class="rounded-t-lg object-cover w-full"
                            src="<?= $product['image']; ?>"
                            alt="<?= $product['title']; ?> foto" />
                    </a>
                    <div class="p-3">
                        <a href="product?id=<?= $index; ?>">
                            <p class="price-title-font-size text-gray-700 price">
                                <?= $product['price'] ?>
                            </p>
                            <h5 class="mb-2 card-title-font-size font-bold tracking-tight text-dark-base">
                                <?= $product['title']; ?>
                            </h5>
                        </a>
                        <p class="description-font-size font-normal text-gray-700 description">
                            <?= $product['description'] ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <AddProduct />
</div>
<!-- Product List End -->