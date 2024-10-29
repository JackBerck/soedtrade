<section
        id="login"
        class="section-padding-x pt-24 pb-2 lg:pt-36 lg:pb-16 normal-font-size text-dark-base"
>
    <div class="container max-w-screen-xl">
        <div
                class="flex bg-white overflow-hidden rounded-lg shadow-lg mx-auto max-w-screen-sm lg:max-w-screen-lg"
        >
            <div
                    class="hidden lg:block lg:w-1/2 bg-cover bg-center bg-[url('/images/backgrounds/patung-kuda-halaman-rektor.webp')]"
            >
            </div>
            <div class="w-full p-8 lg:w-1/2">
                <h2 class="title-font-size font-bold mb-2 md:text-center">
                    SoedTrade
                </h2>
                <p class="normal-font-size mb-4 md:text-center">
                    Selamat datang kembali!
                </p>
                <button
                        class="flex items-center gap-4 md:gap-2 text-left bg-white border border-gray-300 rounded-lg shadow-md px-4 py-1 md:px-6 md:py-2 text-sm font-medium text-gray-800 hover:bg-gray-200 focus:outline-none mx-auto small-font-size"
                >
                    <svg
                            class="h-6 w-6"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="800px"
                            height="800px"
                            viewBox="-0.5 0 48 48"
                            version="1.1"
                    >
                        <title>Google-color</title>
                        <desc>Created with Sketch.</desc>
                        <defs> </defs>
                        <g
                                id="Icons"
                                stroke="none"
                                stroke-width="1"
                                fill="none"
                                fill-rule="evenodd"
                        >
                            <g id="Color-" transform="translate(-401.000000, -860.000000)">
                                <g id="Google" transform="translate(401.000000, 860.000000)">
                                    <path
                                            d="M9.82727273,24 C9.82727273,22.4757333 10.0804318,21.0144 10.5322727,19.6437333 L2.62345455,13.6042667 C1.08206818,16.7338667 0.213636364,20.2602667 0.213636364,24 C0.213636364,27.7365333 1.081,31.2608 2.62025,34.3882667 L10.5247955,28.3370667 C10.0772273,26.9728 9.82727273,25.5168 9.82727273,24"
                                            id="Fill-1"
                                            fill="#FBBC05"
                                    >
                                    </path>
                                    <path
                                            d="M23.7136364,10.1333333 C27.025,10.1333333 30.0159091,11.3066667 32.3659091,13.2266667 L39.2022727,6.4 C35.0363636,2.77333333 29.6954545,0.533333333 23.7136364,0.533333333 C14.4268636,0.533333333 6.44540909,5.84426667 2.62345455,13.6042667 L10.5322727,19.6437333 C12.3545909,14.112 17.5491591,10.1333333 23.7136364,10.1333333"
                                            id="Fill-2"
                                            fill="#EB4335"
                                    >
                                    </path>
                                    <path
                                            d="M23.7136364,37.8666667 C17.5491591,37.8666667 12.3545909,33.888 10.5322727,28.3562667 L2.62345455,34.3946667 C6.44540909,42.1557333 14.4268636,47.4666667 23.7136364,47.4666667 C29.4455,47.4666667 34.9177955,45.4314667 39.0249545,41.6181333 L31.5177727,35.8144 C29.3995682,37.1488 26.7323182,37.8666667 23.7136364,37.8666667"
                                            id="Fill-3"
                                            fill="#34A853"
                                    >
                                    </path>
                                    <path
                                            d="M46.1454545,24 C46.1454545,22.6133333 45.9318182,21.12 45.6113636,19.7333333 L23.7136364,19.7333333 L23.7136364,28.8 L36.3181818,28.8 C35.6879545,31.8912 33.9724545,34.2677333 31.5177727,35.8144 L39.0249545,41.6181333 C43.3393409,37.6138667 46.1454545,31.6490667 46.1454545,24"
                                            id="Fill-4"
                                            fill="#4285F4"
                                    >
                                    </path>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <span>Lanjutkan dengan akun @mhs.unsoed.ac.id</span>
                </button>
                <div class="mt-4 flex items-center justify-between">
                    <span class="border-b w-1/5 lg:w-1/4"></span>
                    <span class="text-xs text-center">atau login dengan email</span>
                    <span class="border-b w-1/5 lg:w-1/4"></span>
                </div>
                <form action="/users/login" method="post" class="small-font-size flex flex-col gap-4 mb-4">
                    <div class="">
                        <label class="block font-semibold mb-2">Alamat email</label>
                        <input
                                class="bg-gray-200 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                                type="email"
                                name="email"
                                placeholder="Masukkan alamat email..."
                                required
                        />
                    </div>
                    <div class="">
                        <div class="flex justify-between">
                            <label class="block font-semibold mb-2">Password</label>
                            <a href="#" class="text-xs">Lupa Password?</a>
                        </div>
                        <input
                                class="bg-gray-200 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                                type="password"
                                name="password"
                                placeholder="Masukkan password..."
                                required
                        />
                    </div>
                    <div class="">
                        <button
                                type="submit"
                                class="bg-gray-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-gray-600"
                        >Masuk</button
                        >
                    </div>
                </form>
                <p class="small-font-size text-center">
                    Atau belum punya akun?
                    <a
                            href="/users/register"
                            class="inline-block py-1 px-2 bg-blue-base text-light-base rounded-md"
                    >Daftar sekarang</a
                    >
                </p>
            </div>
        </div>
    </div>
</section>