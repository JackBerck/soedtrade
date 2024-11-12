<?php
$product = $model['product'] ?? [];
?>

<section
        id="add-product"
        class="section-padding-x pt-24 pb-8 small-font-size"
>
    <div class="max-w-screen-xl container">
        <h1 class="font-bold subheader-font-size mb-4">Ubah Produk</h1>
        <form action="/users/manage-products/update-product/<?= $product->product_id ?>" method="post"
              enctype="multipart/form-data">
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="name" class="block mb-2 font-medium text-dark-base"
                    >Nama</label
                    >
                    <input
                            type="text"
                            name="name"
                            id="name"
                            class="bg-gray-50 border border-gray-300 text-dark-base rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Masukkan nama produk..."
                            required=""
                            value="<?= $product->name ?>"
                    />
                </div>
                <div>
                    <label for="price" class="block mb-2 font-medium text-dark-base"
                    >Harga</label
                    >
                    <input
                            type="text"
                            name="price"
                            id="price"
                            class="bg-gray-50 border border-gray-300 text-dark-base rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Masukkan harga produk..."
                            inputmode="numeric"
                            required=""
                            value="<?= $product->price ?>"
                    />
                </div>
                <div>
                    <label for="condition" class="block mb-2 font-medium text-dark-base"
                    >Kondisi</label
                    >
                    <select
                            id="condition"
                            name="condition"
                            class="bg-gray-50 border border-gray-300 text-dark-base rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                    >
                        <option value="Baru" <?= $product->condition == 'Baru' ? 'selected' : '' ?>>Baru</option>
                        <option value="Bekas" <?= $product->condition == 'Bekas' ? 'selected' : '' ?>>Bekas</option>
                    </select>
                </div>
                <div>
                    <label for="category" class="block mb-2 font-medium text-dark-base"
                    >Kategori</label
                    >
                    <select
                            id="category"
                            name="category"
                            class="bg-gray-50 border border-gray-300 text-dark-base rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                    >
                        <option value="Elektronik" <?= $product->category == 'Elektronik' ? 'selected' : '' ?>>
                            Elektronik
                        </option>
                        <option value="Kendaraan" <?= $product->category == 'Kendaraan' ? 'selected' : '' ?>>Kendaraan
                        </option>
                        <option value="Alat Musik" <?= $product->category == 'Alat Musik' ? 'selected' : '' ?>>Alat
                            Musik
                        </option>
                        <option value="Pakaian" <?= $product->category == 'Pakaian' ? 'selected' : '' ?>>Pakaian
                        </option>
                        <option value="Hobi & Hiburan" <?= $product->category == 'Hobi & Hiburan' ? 'selected' : '' ?>>
                            Hobi & Hiburan
                        </option>
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label
                            for="description"
                            class="block mb-2 font-medium text-dark-base">Deskripsi</label
                    >
                    <textarea
                            id="description"
                            name="description"
                            rows="4"
                            class="block p-2.5 w-full text-dark-base bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500"
                            placeholder="Tuliskan deskripsi produk..."><?= $product->description ?></textarea>
                </div>
                <div id="file-preview-container" class="grid grid-cols-4 gap-4 mt-4"></div>
            </div>
            <button
                    type="submit"
                    class="text-light-base bg-blue-base inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg px-5 py-2.5 text-center"
            >
                <svg
                        class="mr-1 -ml-1 w-6 h-6"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                            fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                </svg
                >
                Ubah Produk
            </button>
        </form>
    </div>
</section>

<script>
    // Aside menu toggle for mobile
    const asideMenu = document.getElementById("asideMenu");
    const asideToggle = document.getElementById("asideToggle");

    asideToggle.addEventListener("click", () => {
        asideMenu.classList.toggle("-translate-x-full");
        asideToggle.classList.toggle("left-0");
        asideToggle.classList.toggle("left-64");
    });
</script>