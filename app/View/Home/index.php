<?php
$slides = [
    [
        "image" => "/images/banners/warung-makan.webp",
        "title" => "Slide 1",
    ],
    [
        "image" => "/images/banners/laundry.jpg",
        "title" => "Slide 2",
    ],
    [
        "image" => "/images/banners/bengkel-motor.jpg",
        "title" => "Slide 3",
    ],
];

$products = $model["products"] ?? [];
$productsImage = $model["productsImage"] ?? [];
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
                            class="w-full object-cover rounded-lg"/>
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
        <form class="max-w-2xl mb-4 small-font-size">
            <div class="flex relative">
                <button
                        id="dropdown-button"
                        data-dropdown-toggle="dropdown"
                        class="flex-shrink-0 z-10 inline-flex items-center px-2 md:py-2.5 md:px-4 font-medium text-center text-dark-base bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:outline-none"
                        type="button">Semua kategori
                    <svg
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
                    </svg>
                </button>
                <div
                        id="dropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 absolute top-12">
                    <ul class="py-2 text-gray-700" aria-labelledby="dropdown-button">
                        <li>
                            <button
                                    type="button"
                                    class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Elektronik
                            </button>
                        </li>
                        <li>
                            <button
                                    type="button"
                                    class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Kendaraan
                            </button>
                        </li>
                        <li>
                            <button
                                    type="button"
                                    class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Alat musik
                            </button>
                        </li>
                        <li>
                            <button
                                    type="button"
                                    class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Pakaian
                            </button>
                        </li>
                        <li>
                            <button
                                    type="button"
                                    class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Hobi & hiburan
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="relative w-full">
                    <input
                            type="search"
                            id="search-dropdown"
                            class="block p-2.5 w-full z-20 focus:outline-none text-dark-base bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300"
                            placeholder="Cari barang elektronik, kendaraan, dan lainnya"
                            required/>
                    <button
                            type="submit"
                            class="absolute top-0 end-0 p-2.5 font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800">
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
            <?php if (empty($products)): ?>
                <div class="col-span-full text-center">
                    <p class="text-gray-700">Tidak ada barang yang ditemukan</p>
                </div>
            <?php else: ?>
                <?php foreach ($products as $index => $product): ?>
                    <div class="max-w-[300px] aspect-square bg-white border border-gray-200 rounded-lg shadow">
                        <a href="product/<?= $product->product_id; ?>">
                            <img
                                    class="rounded-t-lg object-cover w-full h-24 md:h-48"
                                    src="/images/products/<?= !empty($product->images) ? $product->images[0] : 'default-image.jpg'; ?>"
                                    alt="<?= $product->name; ?> foto"/>
                        </a>
                        <div class="p-3">
                            <p class="price-title-font-size text-gray-700 price">
                                <?= $product->price; ?>
                            </p>
                            <a href="product/<?= $product->product_id; ?>">
                                <h5 class="mb-2 card-title-font-size font-bold tracking-tight text-dark-base title-product">
                                    <?= $product->name; ?>
                                </h5>
                            </a>
                            <p class="description-font-size font-normal text-gray-700 description">
                                <?= $product->description; ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Product List End -->

<!-- Add Product Button Start -->
<a
        href="/users/add-product"
        class="fixed bottom-8 right-8 p-3 md:p-4 rounded-full ring-4 ring-blue-base bg-light-base"
>
    <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 448 512"
            class="w-5 h-5 md:w-8 md:h-8"
            fill="currentColor"
    >
        <path
                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"
        ></path>
    </svg
    >
</a>
<!-- Add Product Button End -->

<script>
    // Swiper slider for the homepage
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

    // Dropdown menu for the category page
    const dropdownButton = document.getElementById("dropdown-button");
    const dropdown = document.getElementById("dropdown");

    dropdownButton.addEventListener("click", () => {
        dropdown.classList.toggle("hidden");
        dropdown.classList.toggle("block");
    });

    // Format the price to currency
    const getPrice = document.querySelectorAll(".price");
    const formatPrice = (price) => {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        }).format(price);
    };
    getPrice.forEach((price) => {
        price.innerText = formatPrice(price.innerText);
    });

    // Format truncate the description
    const getTitleProduct = document.querySelectorAll(".title-product");
    const truncateTitleProduct = (title) => {
        if (title.length <= 20) return title;
        return title.substring(0, 20) + "...";
    };
    getTitleProduct.forEach((title) => {
        title.innerText = truncateTitleProduct(title.innerText);
    });

    const getDescription = document.querySelectorAll(".description");
    const truncateDescription = (description) => {
        return description.substring(0, 50) + "...";
    };
    getDescription.forEach((description) => {
        description.innerText = truncateDescription(description.innerText);
    });
</script>