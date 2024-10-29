<?php
$achievements = [
  [
    "total" => "500++",
    "description" => "Total produk yang terjual",
  ],
  [
    "total" => "1000++",
    "description" => "Pengguna yang terdaftar",
  ],
  [
    "total" => "17",
    "description" => "Bisnis yang bermitra",
  ],
];

$benefits = [
  [
    "title" => "Insyaallah Aman",
    "description" => "Dengan lingkup jual beli yang hanya dapat dijangkau oleh Gensoed, maka Insyaallah aman dari penipuan.",
    "icon" => "/images/icons/trusted.png",
  ],
  [
    "title" => "Bebas, Aman, dan Nyaman",
    "description" => "SoedTrade memberikan kebebasan, keamanan, dan kenyamanan dalam bertransaksi.",
    "icon" => "/images/icons/marketing.png",
  ],
  [
    "title" => "Banyaknya Kemitraan",
    "description" => "SoedTrade memiliki banyak kemitraan yang dapat membantu dalam bertransaksi.",
    "icon" => "/images/icons/affiliate.png",
  ],
];

$comments = [
  [
    "name" => "Anton Purwaji",
    "comment" => "Belanja di Berkah Mitra Amanah dengan layanan cepat dan produk yang terbaik. Barang juga sampai dengan aman dan selalu sesuai dengan deskripsi. Terima kasih.",
    "stars" => 5,
    "image" => "/images/reviews/anton-purwaji.webp",
  ],
  [
    "name" => "Budi Santoso",
    "comment" => "Saya sangat puas dengan produk di Berkah Mitra Amanah. Kualitasnya sangat baik dan harganya juga terjangkau. Pelayanan yang diberikan juga sangat ramah dan responsif. Sangat direkomendasikan!",
    "stars" => 5,
    "image" => "/images/reviews/budi-santoso.webp",
  ],
  [
    "name" => "Rina Wijaya",
    "comment" => "Pengalaman berbelanja di Berkah Mitra Amanah sungguh menyenangkan. Produknya berkualitas tinggi dan pengirimannya cepat. Saya sangat puas dengan layanan yang diberikan. Terima kasih!",
    "stars" => 5,
    "image" => "/images/reviews/rina-wijaya.webp",
  ],
  [
    "name" => "Ahmad Abdullah",
    "comment" => "Saya sudah menjadi pelanggan setia Berkah Mitra Amanah selama bertahun-tahun. Produknya selalu berkualitas dan harganya tidak terkalahkan. Saya sangat merekomendasikan kepada semua orang!",
    "stars" => 5,
    "image" => "/images/reviews/ahmad-abdullah.webp",
  ],
];
?>

<!--Hero Section Start-->
<section id="hero" class="pt-20 md:pt-24 pb-8 section-padding-x">
    <div class="container max-w-screen-xl">
        <div class="relative flex flex-col-reverse lg:flex-col">
            <div
                class="inset-y-0 top-0 right-0 z-0 w-full max-w-xl mx-auto lg:mb-0 lg:mx-0 lg:w-7/12 lg:max-w-full lg:absolute xl:px-0"
            >
                <svg
                    class="absolute left-0 hidden h-full text-white transform -translate-x-1/2 lg:block"
                    viewBox="0 0 100 100"
                    fill="currentColor"
                    preserveAspectRatio="none slice"
                >
                    <path d="M50 0H100L50 100H0L50 0Z"></path>
                </svg>
                <img
                    class="object-cover w-full h-56 rounded shadow-lg lg:rounded-none lg:shadow-none md:h-96 lg:h-full"
                    src="/images/backgrounds/fakultas-teknik-unsoed.jpeg"
                    alt="Fakultas Teknik Unsoed"
                />
            </div>
            <div
                class="relative flex flex-col items-start w-full max-w-xl mx-auto lg:max-w-screen-xl"
            >
                <div class="lg:my-40 lg:max-w-lg">
                    <h1
                        class="inline-block px-3 py-px mb-2 lg:mb-4 small-font-size font-semibold tracking-wider text-light-base uppercase rounded-full bg-blue-base"
                    >
                        SoedTrade
                    </h1>
                    <h2
                        class="mb-2 md:mb-3 lg:mb-5 font-sans font-bold tracking-tight text-gray-900 title-font-size sm:leading-none"
                    >
                        Semua yang Gensoed butuhkan <span
                            class="inline-block text-blue-base">ada disini</span
                        >
                    </h2>
                    <p class="mb-5 text-gray-700 normal-font-size">
                        SoedTrade adalah platform yang menyediakan berbagai macam kebutuhan
                        Gensoed. Mulai dari makanan, minuman, hingga kebutuhan sehari-hari
                        lainnya.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Hero Section Start-->

<!--Achievement Section Start-->
<section
    id="achievements"
    class="section-padding-x pt-4 pb-4 md:pt-8 md:pb-8 bg-blue-base"
>
    <div class="container max-w-screen-lg">
        <div class="flex flex-wrap gap-4 md:gap-8 justify-between items-center">
            <?php foreach ($achievements as $achievement): ?>
            <div class="text-light-base">
                <p class="font-bold subheader-font-size"><?= $achievement["total"] ?></p>
                <p class="normal-font-size"><?= $achievement["description"] ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!--Achievement Section End-->

<!--Benefits Section Start-->
<section id="benefits" class="pt-8 pb-8 section-padding-x text-dark-base">
    <div class="container max-w-screen-xl">
        <div class="max-w-md mx-auto mb-4">
            <h2 class="md:text-center subheader-font-size font-bold">
                Keuntungan yang didapat menggunakan layanan SoedTrade
            </h2>
        </div>
        <div class="flex flex-col md:flex-row gap-4">
            <?php foreach ($benefits as $benefit): ?>
            <div class="group relative overflow-hidden bg-white px-2 py-4 md:px-6 md:py-6 shadow-md ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10">
                <div class="relative z-10 mx-auto max-w-md">
                    <img
                            src="<?= $benefit['icon'] ?>"
                            alt="<?= $benefit['title'] ?> icon"
                            class="h-20 w-20"
                    />
                    <div class="pt-2 md:pt-4">
                        <h4 class="subtitle-font-size font-bold"><?= $benefit['title'] ?></h4>
                        <p class="small-font-size"><?= $benefit['description'] ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!--Benefits Section End-->

<!--Prolog Section Start-->
<section class="pt-8 pb-8 section-padding-x" id="prolog">
    <div class="container max-w-screen-xl">
        <div class="grid mx-auto lg:gap-8 xl:gap-0 lg:grid-cols-12">
            <div class="lg:mt-0 lg:col-span-5 flex">
                <img
                        src="/images/icons/trader.png"
                        alt="mockup"
                        class="w-3/4 mx-auto transform -scale-x-100"
                />
            </div>
            <div class="place-self-center lg:col-span-7">
                <h1
                        class="max-w-2xl mb-2 md:mb-4 font-extrabold tracking-tight leading-none title-font-size"
                >
                    Payments tool for software companies
                </h1>
                <p class="max-w-2xl mb-2 lg:mb-4 normal-font-size">
                    From checkout to global sales tax compliance, companies around the
                    world use Flowbite to simplify their payment stack.
                </p>
                <a
                        href="#"
                        class="normal-font-size inline-flex items-center justify-center px-3 py-2 md:px-5 md:py-3 font-medium text-center border border-gray-300 rounded-lg"
                >
                    Coba sekarang
                </a>
            </div>
        </div>
    </div>
</section>
<!--Prolog Section End-->

<!--Comments Section Start-->
<section id="comments"
        class="pt-4 pb-4 px-4 text-dark-base section-padding-x overflow-x-hidden"
>
    <div class="container max-w-screen-xl">
        <div class="mx-auto max-w-[1340px]">
            <div
                    class="grid grid-cols-1 gap-8 lg:grid-cols-3 lg:items-center lg:gap-16"
            >
                <div class="max-w-2xl ltr:sm:text-left rtl:sm:text-right">
                    <h2
                            class="tracking-tight font-bold text-blue-base subheader-font-size mb-2"
                    >
                        Apa Kata Mereka Tentang Kami?
                    </h2>
                    <p
                            class="text-gray-500 font-medium text-xs sm:text-sm md:text-md lg:text-base"
                    >
                        Baca ulasan langsung dari Gensoed yang puas. Temukan mengapa mereka
                        memberikan komentar dan merekomendasikan kami kepada teman dan
                        keluarga mereka.
                    </p>
                    <div class="hidden lg:mt-8 lg:flex lg:gap-4">
                        <button
                                aria-label="Previous slide"
                                id="keen-slider-previous-desktop"
                                class="rounded-full border border-blue-base p-3 text-blue-base transition hover:bg-blue-base hover:text-white"
                        >
                            <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="size-5 rtl:rotate-180"
                            >
                                <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15.75 19.5L8.25 12l7.5-7.5"></path>
                            </svg>
                        </button>
                        <button
                                aria-label="Next slide"
                                id="keen-slider-next-desktop"
                                class="rounded-full border border-blue-base p-3 text-blue-base transition hover:bg-blue-base hover:text-white"
                        >
                            <svg
                                    class="size-5 rtl:rotate-180"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                        d="M9 5l7 7-7 7"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="-mx-6 lg:col-span-2 lg:mx-0">
                    <div id="keen-slider" class="keen-slider">
                        <?php foreach ($comments as $comment): ?>
                        <div class="keen-slider__slide">
                            <blockquote class="flex h-full flex-col justify-between bg-white p-6 shadow-sm sm:p-8 lg:p-12">
                                <div>
                                    <img
                                            src="<?= $comment['image'] ?>"
                                            alt="Foto <?= $comment['name'] ?>"
                                            class="w-24"
                                    />
                                    <div class="flex gap-0.5 mt-4 text-green-500">
                                        <?php for ($i = 0; $i < $comment['stars']; $i++): ?>
                                        <svg
                                                class="h-5 w-5"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <?php endfor; ?>
                                    </div>
                                    <div class="mt-2">
                                        <p class="font-bold text-blue-base subtitle-font-size">
                                            <?= $comment['name'] ?>
                                        </p>
                                        <p class="leading-relaxed text-gray-700 small-font-size">
                                            <?= $comment['comment'] ?>
                                        </p>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="mt-8 flex justify-center gap-4 lg:hidden">
                <button
                        aria-label="Previous slide"
                        id="keen-slider-previous"
                        class="rounded-full border border-blue-base p-4 text-blue-base transition hover:bg-blue-base hover:text-white"
                >
                    <svg
                            class="size-5 -rotate-180 transform"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                                d="M9 5l7 7-7 7"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"></path>
                    </svg>
                </button>
                <button
                        aria-label="Next slide"
                        id="keen-slider-next"
                        class="rounded-full border border-blue-base p-4 text-blue-base transition hover:bg-blue-base hover:text-white"
                >
                    <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                                d="M9 5l7 7-7 7"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>
<!--Comments Section End-->

<!--Social Media Section Start-->
<section id="social-media" class="section-padding-x pb-16">
    <div class="max-w-screen-xl container">
        <h2 class="font-bold text-center subheader-font-size mb-4">
            Ikuti kami di sosial media berikut
        </h2>
        <div class="flex gap-4 justify-center items-center">
            <a
                    href="#"
                    class="p-2 rounded-lg flex items-center border border-gray-300 justify-center transition-all duration-500 hover:border-gray-100 hover:bg-gray-100"
            >
                <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="28"
                        height="28"
                        viewBox="0 0 71 72"
                        fill="none"
                >
                    <path
                            d="M46.4233 38.6403L47.7279 30.3588H39.6917V24.9759C39.6917 22.7114 40.8137 20.4987 44.4013 20.4987H48.1063V13.4465C45.9486 13.1028 43.7685 12.9168 41.5834 12.8901C34.9692 12.8901 30.651 16.8626 30.651 24.0442V30.3588H23.3193V38.6403H30.651V58.671H39.6917V38.6403H46.4233Z"
                            fill="#111827"></path>
                </svg>
            </a>
            <a
                    href="#"
                    class="p-2 rounded-lg flex items-center border border-gray-300 justify-center transition-all duration-500 hover:border-gray-100 hover:bg-gray-100"
            >
                <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="28"
                        height="28"
                        viewBox="0 0 71 72"
                        fill="none"
                >
                    <path
                            d="M27.3762 35.7808C27.3762 31.1786 31.1083 27.4468 35.7132 27.4468C40.3182 27.4468 44.0522 31.1786 44.0522 35.7808C44.0522 40.383 40.3182 44.1148 35.7132 44.1148C31.1083 44.1148 27.3762 40.383 27.3762 35.7808ZM22.8683 35.7808C22.8683 42.8708 28.619 48.618 35.7132 48.618C42.8075 48.618 48.5581 42.8708 48.5581 35.7808C48.5581 28.6908 42.8075 22.9436 35.7132 22.9436C28.619 22.9436 22.8683 28.6908 22.8683 35.7808ZM46.0648 22.4346C46.0646 23.0279 46.2404 23.608 46.5701 24.1015C46.8997 24.595 47.3684 24.9797 47.9168 25.2069C48.4652 25.4342 49.0688 25.4939 49.6511 25.3784C50.2334 25.2628 50.7684 24.9773 51.1884 24.5579C51.6084 24.1385 51.8945 23.6041 52.0105 23.0222C52.1266 22.4403 52.0674 21.8371 51.8404 21.2888C51.6134 20.7406 51.2289 20.2719 50.7354 19.942C50.2418 19.6122 49.6615 19.436 49.0679 19.4358H49.0667C48.2708 19.4361 47.5077 19.7522 46.9449 20.3144C46.3821 20.8767 46.0655 21.6392 46.0648 22.4346ZM25.6072 56.1302C23.1683 56.0192 21.8427 55.6132 20.9618 55.2702C19.7939 54.8158 18.9606 54.2746 18.0845 53.4002C17.2083 52.5258 16.666 51.6938 16.2133 50.5266C15.8699 49.6466 15.4637 48.3214 15.3528 45.884C15.2316 43.2488 15.2073 42.4572 15.2073 35.781C15.2073 29.1048 15.2336 28.3154 15.3528 25.678C15.4639 23.2406 15.8731 21.918 16.2133 21.0354C16.668 19.8682 17.2095 19.0354 18.0845 18.1598C18.9594 17.2842 19.7919 16.7422 20.9618 16.2898C21.8423 15.9466 23.1683 15.5406 25.6072 15.4298C28.244 15.3086 29.036 15.2844 35.7132 15.2844C42.3904 15.2844 43.1833 15.3106 45.8223 15.4298C48.2612 15.5408 49.5846 15.9498 50.4677 16.2898C51.6356 16.7422 52.4689 17.2854 53.345 18.1598C54.2211 19.0342 54.7615 19.8682 55.2161 21.0354C55.5595 21.9154 55.9658 23.2406 56.0767 25.678C56.1979 28.3154 56.2221 29.1048 56.2221 35.781C56.2221 42.4572 56.1979 43.2466 56.0767 45.884C55.9656 48.3214 55.5573 49.6462 55.2161 50.5266C54.7615 51.6938 54.2199 52.5266 53.345 53.4002C52.4701 54.2738 51.6356 54.8158 50.4677 55.2702C49.5872 55.6134 48.2612 56.0194 45.8223 56.1302C43.1855 56.2514 42.3934 56.2756 35.7132 56.2756C29.033 56.2756 28.2432 56.2514 25.6072 56.1302ZM25.4001 10.9322C22.7371 11.0534 20.9174 11.4754 19.3282 12.0934C17.6824 12.7316 16.2892 13.5878 14.897 14.977C13.5047 16.3662 12.6502 17.7608 12.0116 19.4056C11.3933 20.9948 10.971 22.8124 10.8497 25.4738C10.7265 28.1394 10.6982 28.9916 10.6982 35.7808C10.6982 42.57 10.7265 43.4222 10.8497 46.0878C10.971 48.7494 11.3933 50.5668 12.0116 52.156C12.6502 53.7998 13.5049 55.196 14.897 56.5846C16.289 57.9732 17.6824 58.8282 19.3282 59.4682C20.9204 60.0862 22.7371 60.5082 25.4001 60.6294C28.0687 60.7506 28.92 60.7808 35.7132 60.7808C42.5065 60.7808 43.3592 60.7526 46.0264 60.6294C48.6896 60.5082 50.5081 60.0862 52.0983 59.4682C53.7431 58.8282 55.1373 57.9738 56.5295 56.5846C57.9218 55.1954 58.7745 53.7998 59.4149 52.156C60.0332 50.5668 60.4575 48.7492 60.5768 46.0878C60.698 43.4202 60.7262 42.57 60.7262 35.7808C60.7262 28.9916 60.698 28.1394 60.5768 25.4738C60.4555 22.8122 60.0332 20.9938 59.4149 19.4056C58.7745 17.7618 57.9196 16.3684 56.5295 14.977C55.1395 13.5856 53.7431 12.7316 52.1003 12.0934C50.5081 11.4754 48.6894 11.0514 46.0284 10.9322C43.3612 10.811 42.5085 10.7808 35.7152 10.7808C28.922 10.7808 28.0687 10.809 25.4001 10.9322Z"
                            fill="#111827"></path>
                </svg></a
            >
            <a
                    href="#"
                    class="p-2 rounded-lg flex items-center border border-gray-300 justify-center transition-all duration-500 hover:border-gray-100 hover:bg-gray-100"
            >
                <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="28"
                        height="28"
                        viewBox="0 0 72 72"
                        fill="none"
                >
                    <path
                            d="M40.7568 32.1716L59.3704 11H54.9596L38.7974 29.383L25.8887 11H11L30.5205 38.7983L11 61H15.4111L32.4788 41.5869L46.1113 61H61L40.7557 32.1716H40.7568ZM34.7152 39.0433L32.7374 36.2752L17.0005 14.2492H23.7756L36.4755 32.0249L38.4533 34.7929L54.9617 57.8986H48.1865L34.7152 39.0443V39.0433Z"
                            fill="#111827"></path>
                </svg></a
            >
            <a
                    href="#"
                    class="p-2 rounded-lg flex items-center border border-gray-300 justify-center transition-all duration-500 hover:border-gray-100 hover:bg-gray-100"
            >
                <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="28"
                        height="28"
                        viewBox="0 0 72 72"
                        fill="none"
                >
                    <path
                            d="M50.0783 22.6244C49.7746 22.4674 49.4789 22.2953 49.1924 22.1088C48.3592 21.5579 47.5952 20.9089 46.9171 20.1756C45.2202 18.2341 44.5864 16.2644 44.353 14.8853H44.3624C44.1674 13.7406 44.248 13 44.2602 13H36.5314V42.8856C36.5314 43.2869 36.5314 43.6834 36.5146 44.0753C36.5146 44.1241 36.5099 44.1691 36.5071 44.2216C36.5071 44.2431 36.5071 44.2656 36.5024 44.2881C36.5024 44.2938 36.5024 44.2994 36.5024 44.305C36.4209 45.3773 36.0772 46.4131 35.5014 47.3214C34.9257 48.2297 34.1355 48.9825 33.2005 49.5138C32.226 50.0681 31.1238 50.359 30.0027 50.3575C26.4017 50.3575 23.4833 47.4213 23.4833 43.795C23.4833 40.1688 26.4017 37.2325 30.0027 37.2325C30.6843 37.2319 31.3618 37.3391 32.0099 37.5503L32.0192 29.6809C30.0518 29.4268 28.053 29.5832 26.149 30.1402C24.245 30.6972 22.477 31.6427 20.9567 32.9172C19.6246 34.0746 18.5047 35.4557 17.6474 36.9981C17.3211 37.5606 16.0902 39.8209 15.9411 43.4894C15.8474 45.5716 16.4727 47.7288 16.7708 48.6203V48.6391C16.9583 49.1641 17.6849 50.9556 18.8689 52.4659C19.8237 53.6774 20.9518 54.7417 22.2167 55.6244V55.6056L22.2355 55.6244C25.9771 58.1669 30.1255 58 30.1255 58C30.8436 57.9709 33.2492 58 35.9811 56.7053C39.0111 55.27 40.7361 53.1316 40.7361 53.1316C41.8381 51.8538 42.7144 50.3977 43.3274 48.8256C44.0267 46.9872 44.2602 44.7822 44.2602 43.9009V28.0459C44.3539 28.1022 45.6027 28.9281 45.6027 28.9281C45.6027 28.9281 47.4017 30.0813 50.2086 30.8322C52.2224 31.3666 54.9355 31.4791 54.9355 31.4791V23.8066C53.9849 23.9097 52.0546 23.6097 50.0783 22.6244Z"
                            fill="#111827"></path>
                </svg></a
            >
            <a
                    href="#"
                    class="p-2 rounded-lg flex items-center border border-gray-300 justify-center transition-all duration-500 hover:border-gray-100 hover:bg-gray-100"
            >
                <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="28"
                        height="28"
                        viewBox="0 0 71 72"
                        fill="none"
                >
                    <path
                            d="M12.5068 56.8405L15.7915 44.6381C13.1425 39.8847 12.3009 34.3378 13.4211 29.0154C14.5413 23.693 17.5482 18.952 21.89 15.6624C26.2319 12.3729 31.6173 10.7554 37.0583 11.1068C42.4992 11.4582 47.6306 13.755 51.5108 17.5756C55.3911 21.3962 57.7599 26.4844 58.1826 31.9065C58.6053 37.3286 57.0535 42.7208 53.812 47.0938C50.5705 51.4668 45.8568 54.5271 40.5357 55.7133C35.2146 56.8994 29.6432 56.1318 24.8438 53.5513L12.5068 56.8405ZM25.4386 48.985L26.2016 49.4365C29.6779 51.4918 33.7382 52.3423 37.7498 51.8555C41.7613 51.3687 45.4987 49.5719 48.3796 46.7452C51.2605 43.9185 53.123 40.2206 53.6769 36.2279C54.2308 32.2351 53.445 28.1717 51.4419 24.6709C49.4388 21.1701 46.331 18.4285 42.6027 16.8734C38.8745 15.3184 34.7352 15.0372 30.8299 16.0736C26.9247 17.11 23.4729 19.4059 21.0124 22.6035C18.5519 25.801 17.2209 29.7206 17.2269 33.7514C17.2237 37.0937 18.1503 40.3712 19.9038 43.2192L20.3823 44.0061L18.546 50.8167L25.4386 48.985Z"
                            fill="#111827"></path>
                    <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M43.9566 36.8847C43.5093 36.5249 42.9856 36.2716 42.4254 36.1442C41.8651 36.0168 41.2831 36.0186 40.7236 36.1495C39.8831 36.4977 39.3399 37.8134 38.7968 38.4713C38.6823 38.629 38.514 38.7396 38.3235 38.7823C38.133 38.8251 37.9335 38.797 37.7623 38.7034C34.6849 37.5012 32.1055 35.2965 30.4429 32.4475C30.3011 32.2697 30.2339 32.044 30.2557 31.8178C30.2774 31.5916 30.3862 31.3827 30.5593 31.235C31.165 30.6368 31.6098 29.8959 31.8524 29.0809C31.9063 28.1818 31.6998 27.2863 31.2576 26.5011C30.9157 25.4002 30.265 24.42 29.3825 23.6762C28.9273 23.472 28.4225 23.4036 27.9292 23.4791C27.4359 23.5546 26.975 23.7709 26.6021 24.1019C25.9548 24.6589 25.4411 25.3537 25.0987 26.135C24.7562 26.9163 24.5939 27.7643 24.6236 28.6165C24.6256 29.0951 24.6864 29.5716 24.8046 30.0354C25.1049 31.1497 25.5667 32.2144 26.1754 33.1956C26.6145 33.9473 27.0937 34.6749 27.6108 35.3755C29.2914 37.6767 31.4038 39.6305 33.831 41.1284C35.049 41.8897 36.3507 42.5086 37.7105 42.973C39.1231 43.6117 40.6827 43.8568 42.2237 43.6824C43.1018 43.5499 43.9337 43.2041 44.6462 42.6755C45.3588 42.1469 45.9302 41.4518 46.3102 40.6512C46.5334 40.1675 46.6012 39.6269 46.5042 39.1033C46.2714 38.0327 44.836 37.4007 43.9566 36.8847Z"
                            fill="#111827"></path>
                </svg></a
            >
            <a
                    href="#"
                    class="p-2 rounded-lg flex items-center border border-gray-300 justify-center transition-all duration-500 hover:border-gray-100 hover:bg-gray-100"
            >
                <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="28"
                        height="28"
                        viewBox="0 0 72 72"
                        fill="none"
                >
                    <path
                            d="M24.7612 55.999V28.3354H15.5433V55.999H24.7621H24.7612ZM20.1542 24.5591C23.3679 24.5591 25.3687 22.4348 25.3687 19.7801C25.3086 17.065 23.3679 15 20.2153 15C17.0605 15 15 17.065 15 19.7799C15 22.4346 17.0001 24.5588 20.0938 24.5588H20.1534L20.1542 24.5591ZM29.8633 55.999H39.0805V40.5521C39.0805 39.7264 39.1406 38.8985 39.3841 38.3088C40.0502 36.6562 41.5668 34.9455 44.1138 34.9455C47.4484 34.9455 48.7831 37.4821 48.7831 41.2014V55.999H58V40.1376C58 31.6408 53.4532 27.6869 47.3887 27.6869C42.4167 27.6869 40.233 30.4589 39.0198 32.347H39.0812V28.3364H29.8638C29.9841 30.9316 29.8631 56 29.8631 56L29.8633 55.999Z"
                            fill="#111827"></path>
                </svg></a
            >
        </div>
    </div>
</section>
<!--Social Media Section End-->


<script type="module" src="utils/comments.js"></script>
