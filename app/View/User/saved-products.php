<?php
$products = $model['products'] ?? [];
?>

<!-- Pop Up Modal Start -->
<div id="popup-modal" tabindex="-1"
     class="hidden fixed inset-0 z-[999] flex justify-center items-center bg-black bg-opacity-50 normal-font-size">
    <div class="relative bg-white rounded-lg shadow p-4 md:p-6">
        <button type="button" id="close-modal" class="absolute top-4 right-4 text-gray-400 hover:text-gray-900">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
            </svg>
            <span class="sr-only">Close modal</span>
        </button>
        <div class="text-center max-w-md">
            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12"
                 aria-hidden="true"
                 xmlns="http://www.w3.org/2000/svg"
                 fill="none"
                 viewBox="0 0 20 20">

                <path stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
            </svg>
            <h3 class="mb-5 font-normal text-gray-500">
                Apakah Anda yakin ingin menghapus postingan ini?
            </h3>
            <button id="confirm-delete"
                    class="text-white bg-red-600 hover:bg-red-800 px-5 py-2.5 rounded-lg">
                Ya
            </button>
            <button id="cancel-delete"
                    class="py-2.5 px-5 ml-3 text-sm font-medium text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100">
                Tidak
            </button>
        </div>
    </div>
</div>
<!-- Pop Up Modal End -->
<div class="pt-24 pb-8 section-padding-x min-h-[480px] md:min-h-[640px]">
    <div class="container max-w-screen-xl">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Aside Start -->
            <button
                    id="asideToggle"
                    class="block md:hidden p-3 bg-blue-base text-white font-semibold top-20 left-0 rounded-r-lg transform transition-transform fixed z-[800]"
            >
                <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"
                        class="w-5 h-5"
                        fill="currentColor"
                >
                    <path
                            d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z"
                    ></path>
                </svg
                >
            </button>
            <aside
                    id="asideMenu"
                    class="fixed top-16 pt-4 md:pt-0 left-0 h-full w-64 bg-white transform -translate-x-full transition-transform md:w-1/3 lg:w-1/4 md:translate-x-0 md:static md:block pr-8 border-r border-indigo-100 z-50"
            >
                <div class="sticky flex flex-col gap-2 text-sm">
                    <h2 class="pl-3 mb-4 text-2xl font-semibold">Settings</h2>
                    <a
                            href="/users"
                            class="flex items-center px-3 py-2.5 font-semibold"
                    >Pengaturan Akun</a>
                    <a
                            href="/users/saved-products"
                            class="flex items-center px-3 py-2.5 font-semibold"
                    >Barang Tersimpan</a>
                    <a
                            href="/users/manage-products"
                            class="flex items-center px-3 py-2.5 font-semibold"
                    >Kelola Produk</a>
                    <a
                            href="/users/logout"
                            class="flex items-center px-3 py-2.5 font-semibold bg-red-600 text-light-base rounded-lg"
                    >Keluar</a>
                </div>
            </aside>
            <!-- Aside End -->
            <!-- Manage Products Start -->
            <div class="md:w-2/3 lg:w-3/4">
                <h1 class="subheader-font-size font-semibold text-dark-base mb-4">
                    Kelola Produk
                </h1>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 justify-between">
                    <?php if (empty($products)): ?>
                        <div class="text-center w-full col-span-2 md:col-span-3 lg:col-span-4">
                            <h2 class="normal-font-size font-semibold text-gray-500">Tidak ada produk</h2>
                        </div>
                    <?php else: ?>
                        <?php foreach ($products as $product) : ?>
                            <div class="max-w-[300px] aspect-square bg-white border border-gray-200 rounded-lg shadow relative">
                                <div class="absolute top-1 right-1 md:top-2 md:right-2 flex gap-2 items-center z-10">
                                    <form action="/users/saved-products/delete" method="post" onsubmit="savedProduct()"
                                          class="w-9 h-9">
                                        <input type="hidden" name="product_id" value="<?= $product->product_id ?>">
                                        <button type="submit" class="w-9 h-9 aspect-square rounded-lg bg-gray-300 px-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                <path d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                <a href="/product/<?= $product->product_id ?>">
                                    <img class="rounded-t-lg object-cover w-full max-h-[200px] aspect-square"
                                         src="/images/products/<?= $product->images[0] ?>"
                                         alt="image <?= $product->name ?>"/>
                                </a>
                                <div class="p-3">
                                    <p class="price-title-font-size text-gray-700 price">
                                        <?= $product->price; ?>
                                    </p>
                                    <a href="/product/<?= $product->product_id; ?>">
                                        <h5 class="mb-2 card-title-font-size font-bold tracking-tight text-dark-base product-title">
                                            <?= $product->name; ?>
                                        </h5>
                                    </a>
                                    <p class="description-font-size font-normal text-gray-700 product-description">
                                        <?= $product->description; ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <!-- Manage Products Start -->
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const deleteButtons = document.querySelectorAll(".delete-product");
        const modal = document.getElementById("popup-modal");
        const closeModal = document.getElementById("close-modal");
        const cancelButton = document.getElementById("cancel-delete");
        const confirmDelete = document.getElementById("confirm-delete");

        let productIdToDelete = null;

        // Show modal on delete button click
        deleteButtons.forEach((button) => {
            button.addEventListener("click", (event) => {
                event.preventDefault();
                productIdToDelete = button.getAttribute("data-product-id");
                modal.classList.remove("hidden");
            });
        });

        // Close modal on cancel or close button
        const closeModalFunction = () => {
            modal.classList.add("hidden");
            productIdToDelete = null;
        };

        closeModal.addEventListener("click", closeModalFunction);
        cancelButton.addEventListener("click", closeModalFunction);

        // Handle confirm delete action
        confirmDelete.addEventListener("click", () => {
            if (productIdToDelete !== null) {
                const form = document.createElement("form");
                form.action = "/users/manage-products/delete-product";
                form.method = "POST";

                const input = document.createElement("input");
                input.type = "hidden";
                input.name = "product_id";
                input.value = productIdToDelete;

                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            }
            closeModalFunction();
        });
    });

    // Aside Toggle
    const asideMenu = document.getElementById("asideMenu");
    const asideToggle = document.getElementById("asideToggle");

    asideToggle.addEventListener("click", () => {
        asideMenu.classList.toggle("-translate-x-full");
        asideToggle.classList.toggle("translate-x-64");
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

    // Text Truncate Function Title and Description
    // Format truncate the description
    const getTitleProduct = document.querySelectorAll(".product-title");
    const truncateTitleProduct = (title) => {
        if (title.length <= 20) return title;
        return title.substring(0, 20) + "...";
    };
    getTitleProduct.forEach((title) => {
        title.innerText = truncateTitleProduct(title.innerText);
    });

    const getDescription = document.querySelectorAll(".product-description");
    const truncateDescription = (description) => {
        return description.substring(0, 50) + "...";
    };
    getDescription.forEach((description) => {
        description.innerText = truncateDescription(description.innerText);
    });
</script>