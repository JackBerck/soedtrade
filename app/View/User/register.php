<section
        id="login"
        class="section-padding-x pt-24 pb-2 lg:pt-36 lg:pb-16 normal-font-size text-dark-base"
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
                <form action="" class="small-font-size flex flex-col gap-4 mb-4">
                    <div class="">
                        <label for="username" class="block font-semibold mb-2"
                        >Nama lengkap</label
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
                        >Alamat Email</label
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
                        <label for="phoneNumber" class="block font-semibold mb-2"
                        >Nomor Handphone</label
                        >
                        <input
                                class="bg-gray-200 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                                type="text"
                                id="phoneNumber"
                                name="phoneNumber"
                                placeholder="Masukkan nomor handphone..."
                                inputmode="numeric"
                                pattern="[0-9]*"
                                required
                        />
                    </div>
                    <div class="">
                        <div class="flex justify-between">
                            <label for="password" class="block font-semibold mb-2"
                            >Password</label
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
                            <label for="verifyPassword" class="block font-semibold mb-2"
                            >Verifikasi Password</label
                            >
                        </div>
                        <input
                                class="bg-gray-200 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                                type="password"
                                name="verifyPassword"
                                id="verifyPassword"
                                placeholder="Verifikasi password..."
                                required
                        />
                    </div>
                    <div class="">
                        <label for="location" class="block font-semibold mb-2"
                        >Alamat</label
                        >
                        <input
                                class="bg-gray-200 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                                type="text"
                                name="location"
                                id="location"
                                placeholder="Masukkan alamat..."
                                required
                        />
                    </div>
                    <div class="">
                        <label
                                class="block mb-2 font-semibold text-dark-base"
                                for="file_input">Upload Foto Profil</label
                        >
                        <input
                                class="block w-full text-sm text-dark-base border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                aria-describedby="file_input_help"
                                id="file_input"
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
                        >Daftar</button
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