<?php if (isset($model['error'])): ?>
    <div class="fixed z-10 inset-0 overflow-y-auto" id="my-modal">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                 role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div>
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-5">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                            Error
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                <?= $model['error'] ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-6">
                    <button
                            class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:text-sm"
                            onclick="closeModal()">
                        OK
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="/utils/closeModal.js"></script>
<?php endif; ?>

<section
        id="login"
        class="section-padding-x pt-24 pb-2 lg:pt-28 lg:pb-16 normal-font-size text-dark-base"
>
    <div class="container max-w-screen-xl">
        <div
                class="flex overflow-hidden flex-row-reverse bg-white rounded-lg shadow-lg mx-auto max-w-screen-sm lg:max-w-screen-lg"
        >
            <div
                    class="hidden lg:block lg:w-1/2 bg-cover bg-center bg-[url('/images/backgrounds/patung-kuda-halaman-rektor.webp')]"
            >
            </div>
            <div class="w-full p-8 lg:w-1/2">
                <h2 class="title-font-size font-bold mb-2 md:text-center">
                    SoedTrade
                </h2>
                <p class="normal-font-size mb-4 md:text-center">Daftar akun baru</p>
                <form action="/users/register" method="post" class="small-font-size flex flex-col gap-4 mb-4"
                      enctype="multipart/form-data">
                    <div class="">
                        <label for="username" class="block font-semibold mb-2"
                        >Nama lengkap <span class="text-red-600">*</span></label
                        >
                        <input
                                class="bg-gray-200 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                                type="text"
                                name="username"
                                id="username"
                                placeholder="Masukkan nama lengkap..."
                                required
                        />
                    </div>
                    <div class="">
                        <label for="email" class="block font-semibold mb-2"
                        >Alamat Email <span class="text-red-600">*</span></label
                        >
                        <input
                                class="bg-gray-200 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                                type="email"
                                name="email"
                                id="email"
                                placeholder="Masukkan alamat email..."
                                required
                        />
                    </div>
                    <div class="">
                        <label for="phone_number" class="block font-semibold mb-2">
                            Nomor Handphone <span class="text-red-600">*</span>
                        </label>
                        <div class="flex items-center">
                            <span class="bg-gray-200 border border-gray-300 rounded-l py-2 px-4 text-gray-700">+62</span>
                            <input
                                    class="bg-gray-200 focus:outline-none focus:shadow-outline border border-gray-300 rounded-r py-2 px-4 block w-full appearance-none"
                                    type="text"
                                    id="phone_number"
                                    name="phone_number"
                                    placeholder="Masukkan nomor handphone..."
                                    inputmode="numeric"
                                    pattern="[0-9]*"
                                    required
                                    maxlength="13"
                            />
                        </div>
                    </div>
                    <div class="">
                        <div class="flex justify-between">
                            <label for="password" class="block font-semibold mb-2"
                            >Password <span class="text-red-600">*</span></label
                            >
                        </div>
                        <input
                                class="bg-gray-200 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                                type="password"
                                name="password"
                                id="password"
                                placeholder="Masukkan password..."
                                required
                        />
                    </div>
                    <div class="">
                        <div class="flex justify-between">
                            <label for="verify_password" class="block font-semibold mb-2"
                            >Verifikasi Password <span class="text-red-600">*</span></label
                            >
                        </div>
                        <input
                                class="bg-gray-200 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                                type="password"
                                name="verify_password"
                                id="verify_password"
                                placeholder="Verifikasi password..."
                                required
                        />
                    </div>
                    <div class="">
                        <label for="address" class="block font-semibold mb-2"
                        >Alamat <span class="text-red-600">*</span></label
                        >
                        <input
                                class="bg-gray-200 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                                type="text"
                                name="address"
                                id="address"
                                placeholder="Masukkan alamat..."
                                required
                        />
                    </div>
                    <div class="">
                        <label
                                class="block mb-2 font-semibold text-dark-base"
                                for="profile_image">Upload Foto Profil</label
                        >
                        <input
                                class="block w-full text-sm text-dark-base border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                id="profile_image"
                                name="profile_image"
                                type="file"
                        />
                        <p class="mt-1 text-sm text-gray-500" id="file_input_help">
                            SVG, PNG, JPG or GIF.
                        </p>
                    </div>
                    <div class="">
                        <button
                                type="submit"
                                class="bg-gray-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-gray-600"
                        >Daftar
                        </button
                        >
                    </div>
                </form>
                <p class="small-font-size text-center">
                    Sudah punya akun?
                    <a
                            href="/users/login"
                            class="inline-block py-1 px-2 bg-blue-base text-light-base rounded-md"
                    >Masuk sekarang</a
                    >
                </p>
            </div>
        </div>
    </div>
</section>