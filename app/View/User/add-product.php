<section
        id="add-product"
        class="section-padding-x pt-24 pb-8 small-font-size"
>
    <div class="max-w-screen-xl container">
        <h1 class="font-bold subheader-font-size mb-4">Tambahkan Barang</h1>
        <form action="/users/tambah-barang" method="post" enctype="multipart/form-data">
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
                        <option selected="">Pilih Kondisi</option>
                        <option value="Baru">Baru</option>
                        <option value="Bekas">Bekas</option>
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
                        <option selected="">Pilih kategori</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Kendaraan">Kendaraan</option>
                        <option value="Alat Musik">Alat Musik</option>
                        <option value="Pakaian">Pakaian</option>
                        <option value="Hobi & Hiburan">Hobi & Hiburan</option>
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
                            placeholder="Tuliskan deskripsi produk..."></textarea>
                </div>
                <div class="flex items-center justify-center w-full sm:col-span-2">
                    <label
                            for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50"
                    >
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg
                                    class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 20 16"
                            >
                                <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"
                                ></path>
                            </svg>
                            <p class="mb-2 text-gray-500 dark:text-gray-400">
                                <span class="font-semibold">Click to upload</span> or drag and
                                drop
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                SVG, PNG, JPG or GIF (MAX. 800x400px)
                            </p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" name="images[]" multiple/>
                    </label>
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
                Tambahkan Produk
            </button>
        </form>
    </div>
</section>

<script>
    const selectedFiles = []; // Array to store selected files

    document.getElementById("dropzone-file").addEventListener("change", function (event) {
        const previewContainer = document.getElementById("file-preview-container");

        // Get newly selected files
        const files = Array.from(event.target.files);

        files.forEach((file) => {
            // Add file to selectedFiles array
            selectedFiles.push(file);

            const fileReader = new FileReader();

            fileReader.onload = function (e) {
                // Create preview element
                const previewElement = document.createElement("div");
                previewElement.classList.add("file-preview", "relative", "inline-block");

                // Add remove button for each image
                const removeButton = document.createElement("span");
                removeButton.classList.add("remove-button", "absolute", "-top-2", "-right-2", "bg-red-500", "text-white", "cursor-pointer", "p-1", "rounded-full");
                removeButton.innerHTML = `<svg class="w-4 h-4 aspect-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>`;
                removeButton.onclick = function () {
                    // Remove this preview element
                    previewElement.remove();

                    // Remove file from selectedFiles array
                    const indexToRemove = selectedFiles.indexOf(file);
                    if (indexToRemove > -1) {
                        selectedFiles.splice(indexToRemove, 1);
                    }

                    // Recreate DataTransfer and update file input
                    const dataTransfer = new DataTransfer();
                    selectedFiles.forEach((f) => dataTransfer.items.add(f));
                    document.getElementById("dropzone-file").files = dataTransfer.files;
                };

                previewElement.appendChild(removeButton);

                // If file is an image, show image preview
                if (file.type.startsWith("image/")) {
                    const img = document.createElement("img");
                    img.src = e.target.result;
                    img.classList.add("preview-image", "w-full", "h-32", "object-cover", "rounded-lg");
                    previewElement.appendChild(img);
                } else {
                    // If not an image, show file name
                    const fileName = document.createElement("p");
                    fileName.textContent = file.name;
                    previewElement.appendChild(fileName);
                }

                previewContainer.appendChild(previewElement);
            };

            fileReader.readAsDataURL(file);
        });

        // Update file input with selected files
        const dataTransfer = new DataTransfer();
        selectedFiles.forEach((f) => dataTransfer.items.add(f));
        document.getElementById("dropzone-file").files = dataTransfer.files;
    });

    // Aside menu toggle for mobile
    const asideMenu = document.getElementById("asideMenu");
    const asideToggle = document.getElementById("asideToggle");

    asideToggle.addEventListener("click", () => {
        asideMenu.classList.toggle("-translate-x-full");
        asideToggle.classList.toggle("left-0");
        asideToggle.classList.toggle("left-64");
    });
</script>