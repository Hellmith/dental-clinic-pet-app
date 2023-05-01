<!DOCTYPE html>
<html lang='ru'>

<head>
    <!-- Мета -->
    <meta charset='utf-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' />

    <!-- SEO -->
    <title><?= $brand ?> bla-bla</title>
    <meta name='description' content='' />

    <!-- 
        ИКОНКИ
     -->
    <link rel='icon' type='image/png' href='' />

    <!-- 
        ШРИФТЫ
     -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- 
        СТИЛИ
     -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css' />
    <link rel='stylesheet' href='/resources/libs/jquery/fancybox/fancybox.min.css' />
    <link rel='stylesheet' href='/resources/styles/styles.min.css' />
</head>

<body class='animation-fade-in duration-300'>
    <header class="flex flex-wrap sm:justify-start fixed top-0 sm:flex-nowrap z-50 w-full bg-white/50 backdrop-blur-md border-b border-gray-200 text-sm py-3 sm:py-0 dark:bg-gray-800 dark:border-gray-700">
        <nav class="relative max-w-7xl w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8" aria-label="Global">
            <div class="flex items-center justify-between">
                <a class="flex-none text-xl font-semibold dark:text-white" href="/" aria-label="<?= $brand ?>">
                    <i class='fa-solid fa-tooth fa-xl fa-flip text-primary-600 dark:text-primary-500'></i>
                    <?= $brand ?>
                </a>
                <div class="sm:hidden">
                    <button type="button" class="hs-collapse-toggle p-2 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-primary-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800" data-hs-collapse="#navbar-collapse" aria-controls="navbar-collapse" aria-label="Toggle navigation">
                        <i class='fa-solid fa-bars hs-collapse-open:hidden block w-3.5 h-3.5'></i>
                        <i class='fa-solid fa-xmark hs-collapse-open:block hidden w-3.5 h-3.5'></i>
                    </button>
                </div>
            </div>
            <div id="navbar-collapse" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
                <div data-hs-scrollspy="#scrollspy" class="flex flex-col gap-y-4 gap-x-0 mt-5 sm:flex-row sm:items-center sm:justify-end sm:gap-y-0 sm:gap-x-7 sm:mt-0 sm:pl-7 font-medium text-sm">
                    <a class=" text-gray-700 leading-6 hover:text-gray-500 sm:py-6 dark:text-gray-400 dark:hover:text-gray-500 hs-scrollspy-active:text-primary-600 dark:hs-scrollspy-active:text-primary-400" href="#about">О нас</a>
                    <a class=" text-gray-700 leading-6 hover:text-gray-500 sm:py-6 dark:text-gray-400 dark:hover:text-gray-500 hs-scrollspy-active:text-primary-600 dark:hs-scrollspy-active:text-primary-400" href="#advantages">Преимущества</a>
                    <a class=" text-gray-700 leading-6 hover:text-gray-500 sm:py-6 dark:text-gray-400 dark:hover:text-gray-500 hs-scrollspy-active:text-primary-600 dark:hs-scrollspy-active:text-primary-400" href="#services">Услуги</a>
                    <a class=" text-gray-700 leading-6 hover:text-gray-500 sm:py-6 dark:text-gray-400 dark:hover:text-gray-500 hs-scrollspy-active:text-primary-600 dark:hs-scrollspy-active:text-primary-400" href="#certificates">Сертификаты</a>
                    <a class=" text-gray-700 leading-6 hover:text-gray-500 sm:py-6 dark:text-gray-400 dark:hover:text-gray-500 hs-scrollspy-active:text-primary-600 dark:hs-scrollspy-active:text-primary-400" href="#placement">Где нас найти?</a>

                    <div class="inline-flex sm:border-l sm:border-gray-300 sm:pl-7 dark:border-gray-700">
                        <button type="button" class="w-full shadow-sm sm:w-max py-2 px-3 inline-flex justify-center items-center gap-2 -ml-px first:rounded-l-lg first:ml-0 last:rounded-r-lg border font-medium focus:z-10 bg-white text-gray-700 align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-white focus:ring-primary-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white" data-hs-overlay="#modal-login">
                            <i class='fa-solid fa-sign-in'></i>
                            Вход
                        </button>
                        <button type="button" class="w-full shadow-sm sm:w-max py-2 px-3 inline-flex justify-center items-center gap-2 -ml-px first:rounded-l-lg first:ml-0 last:rounded-r-lg font-medium align-middle focus:z-10 focus:outline-none focus:ring-2 focus:ring-primary-700 transition-all text-sm border border-transparent bg-primary-600 text-white hover:bg-primary-700" data-hs-overlay="#modal-register">
                            Регистрация
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main id='scrollspy' role='main'>
        <?= $content ?>
    </main>
    <footer class='bg-gray-900'>
        <div class="max-w-7xl py-10 px-4 sm:px-6 lg:px-8 mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-5 text-center">
                <div class='text-left'>
                    <a class="flex-none text-xl font-semibold text-white" href="#" aria-label="<?= $brand ?>">
                        <i class='fa-solid fa-tooth fa-xl fa-flip text-primary-600 dark:text-primary-500'></i>
                        <?= $brand ?>
                    </a>
                </div>
                <ul class="text-center">
                    <li class="inline-block relative pr-8 last:pr-0 last-of-type:before:hidden before:absolute before:top-1/2 before:right-3 before:-translate-y-1/2 before:content-['/'] before:text-gray-300 dark:before:text-gray-600">
                        <button class="inline-flex gap-x-2 text-gray-400 hover:text-gray-200" type="button" data-hs-overlay="#modal-offer">
                            Оферта
                        </button>
                    </li>
                    <li class="inline-block relative pr-8 last:pr-0 last-of-type:before:hidden before:absolute before:top-1/2 before:right-3 before:-translate-y-1/2 before:content-['/'] before:text-gray-300 dark:before:text-gray-600">
                        <button class="inline-flex gap-x-2 text-gray-400 hover:text-gray-200" type="button" data-hs-overlay="#modal-policy">
                            Конфиденциальность
                        </button>
                    </li>
                    <li class="inline-block relative pr-8 last:pr-0 last-of-type:before:hidden before:absolute before:top-1/2 before:right-3 before:-translate-y-1/2 before:content-['/'] before:text-gray-300 dark:before:text-gray-600">
                        <button class="inline-flex gap-x-2 text-gray-400 hover:text-gray-200" type="button" data-hs-overlay="#modal-cookie">
                            Cookie
                        </button>
                    </li>
                </ul>
                <div class="md:text-right space-x-2">
                    <a class="inline-flex justify-center items-center gap-x-3.5 w-10 h-10 text-center text-gray-200 hover:bg-white/[.1] rounded-md focus:outline-none focus:ring-2 focus:ring-primary-600 transition" href="https://vk.com/">
                        <i class='fa-brands fa-vk'></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- 
        ОКНО КУКИ
     -->
    <div id="cookie" class="fixed bottom-0 right-0 z-[50] sm:max-w-md w-full mx-auto p-6">
        <div class="p-4 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <div class="flex gap-x-4">
                <svg class="flex-shrink-0 w-8 h-auto" width="72" height="63" viewBox="0 0 72 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.5174 56.1528C16.2903 57.6825 16.929 61.4559 14.8118 60.9459C13.5013 60.5381 11.4445 57.6213 12.493 56.1528C12.661 55.8468 13.2189 55.2757 14.106 55.4389" stroke="currentColor" class="dark:stroke-gray-200" stroke-width="2" stroke-linecap="round" />
                    <path d="M15.5173 49.6263L14.0262 48.5579C13.5346 48.2056 12.8477 48.3707 12.658 48.945C12.3456 49.8907 12.1258 51.1463 12.462 52.2324C12.5336 52.4636 12.7127 52.6466 12.9449 52.7146C13.8342 52.9751 15.2568 52.9048 15.8197 51.054" stroke="currentColor" class="dark:stroke-gray-200" stroke-width="2" stroke-linecap="round" />
                    <mask id="path-3-inside-1_4542_101166" fill="currentColor" class="text-gray-800 dark:fill-gray-200">
                        <ellipse rx="1.09811" ry="0.738034" transform="matrix(0.921654 0.388014 -0.38048 0.924789 14.2069 43.4055)" />
                    </mask>
                    <path d="M13.3756 43.0555C13.6288 42.4402 14.1378 42.259 14.3273 42.2214C14.5316 42.1809 14.6503 42.223 14.687 42.2384L13.1651 45.9376C13.7607 46.1884 14.4484 46.2907 15.1206 46.1574C15.7781 46.0269 16.654 45.5999 17.0622 44.6076L13.3756 43.0555ZM14.687 42.2384C14.7237 42.2539 14.8369 42.3094 14.9524 42.4846C15.0596 42.6471 15.2913 43.1401 15.0381 43.7554L11.3515 42.2034C10.9432 43.1957 11.261 44.1253 11.6329 44.689C12.0131 45.2654 12.5694 45.6868 13.1651 45.9376L14.687 42.2384ZM15.0381 43.7554C14.7849 44.3708 14.2759 44.552 14.0864 44.5895C13.8821 44.6301 13.7634 44.588 13.7267 44.5725L15.2486 40.8734C14.653 40.6226 13.9653 40.5203 13.2931 40.6536C12.6357 40.784 11.7597 41.2111 11.3515 42.2034L15.0381 43.7554ZM13.7267 44.5725C13.69 44.5571 13.5768 44.5015 13.4613 44.3264C13.3541 44.1638 13.1225 43.6709 13.3756 43.0555L17.0622 44.6076C17.4705 43.6153 17.1527 42.6857 16.7809 42.1219C16.4007 41.5455 15.8443 41.1241 15.2486 40.8734L13.7267 44.5725Z" fill="black" mask="url(#path-3-inside-1_4542_101166)" />
                    <mask id="path-5-inside-2_4542_101166" fill="currentColor" class="text-gray-800 dark:fill-gray-200">
                        <ellipse rx="1.00988" ry="1.0181" transform="matrix(0.921654 0.388014 -0.38048 0.924789 21.3702 57.2201)" />
                    </mask>
                    <path d="M20.4576 56.8359C20.6581 56.3486 21.2257 56.094 21.7438 56.312L20.2219 60.0112C21.768 60.6621 23.5159 59.9153 24.1442 58.388L20.4576 56.8359ZM21.7438 56.312C22.2618 56.5301 22.4832 57.1169 22.2827 57.6043L18.5961 56.0522C17.9677 57.5795 18.6757 59.3603 20.2219 60.0112L21.7438 56.312ZM22.2827 57.6043C22.0822 58.0916 21.5146 58.3462 20.9966 58.1281L22.5185 54.429C20.9724 53.7781 19.2245 54.5249 18.5961 56.0522L22.2827 57.6043ZM20.9966 58.1281C20.4785 57.9101 20.2571 57.3233 20.4576 56.8359L24.1442 58.388C24.7726 56.8607 24.0646 55.0799 22.5185 54.429L20.9966 58.1281Z" fill="black" mask="url(#path-5-inside-2_4542_101166)" />
                    <mask id="path-7-inside-3_4542_101166" fill="currentColor" class="text-gray-800 dark:fill-gray-200">
                        <ellipse rx="1.00988" ry="1.0181" transform="matrix(0.921654 0.388014 -0.38048 0.924789 6.75397 38.8236)" />
                    </mask>
                    <path d="M5.84142 38.4394C6.04192 37.9521 6.60952 37.6975 7.12756 37.9156L5.60564 41.6147C7.15177 42.2656 8.89966 41.5188 9.52804 39.9915L5.84142 38.4394ZM7.12756 37.9156C7.6456 38.1337 7.86701 38.7205 7.66651 39.2078L3.9799 37.6557C3.35152 39.1831 4.05951 40.9638 5.60564 41.6147L7.12756 37.9156ZM7.66651 39.2078C7.46601 39.6951 6.89842 39.9498 6.38037 39.7317L7.90229 36.0325C6.35616 35.3816 4.60827 36.1284 3.9799 37.6557L7.66651 39.2078ZM6.38037 39.7317C5.86233 39.5136 5.64092 38.9268 5.84142 38.4394L9.52804 39.9915C10.1564 38.4642 9.44843 36.6834 7.90229 36.0325L6.38037 39.7317Z" fill="black" mask="url(#path-7-inside-3_4542_101166)" />
                    <path d="M31.6479 50.2383C31.5807 51.2241 32.1721 53.053 35.0756 52.4819" stroke="currentColor" class="dark:stroke-gray-200" stroke-width="2" stroke-linecap="round" />
                    <path d="M50.9903 34.6769C50.1699 34.1428 48.3973 33.5907 47.8709 35.6552" stroke="currentColor" class="dark:stroke-gray-200" stroke-width="2" stroke-linecap="round" />
                    <path d="M40.9087 17.4562C40.0882 16.9221 38.3156 16.37 37.7892 18.4345" stroke="currentColor" class="dark:stroke-gray-200" stroke-width="2" stroke-linecap="round" />
                    <path d="M27.8502 29.3345C27.1279 29.998 26.1419 31.587 27.977 32.6357" stroke="currentColor" class="dark:stroke-gray-200" stroke-width="2" stroke-linecap="round" />
                    <path d="M62.1917 19.585C62.4894 18.6451 62.5577 16.7703 60.4502 16.7902" stroke="currentColor" class="dark:stroke-gray-200" stroke-width="2" stroke-linecap="round" />
                    <ellipse cx="51.2061" cy="22.3973" rx="3.02446" ry="3.05945" fill="currentColor" class="text-gray-800 dark:fill-gray-200" />
                    <path d="M67.7398 29.6361C68.8249 31.2826 67.6381 32.6215 66.8281 33.1457C66.7645 33.1869 66.695 33.2184 66.6214 33.2363C65.0504 33.618 63.6063 31.5388 63.6063 30.0441C63.6064 28.8034 66.3283 27.4945 67.7398 29.6361Z" fill="currentColor" class="text-gray-800 dark:fill-gray-200" />
                    <path d="M58.868 38.6126C57.9809 36.4914 54.6002 37.7288 53.0207 38.6126C51.7101 39.2284 52.0126 41.4681 53.6256 43.3038C54.9161 44.7723 56.5157 44.1196 57.1542 43.6097C58.0951 42.8279 59.7552 40.7339 58.868 38.6126Z" fill="currentColor" class="text-gray-800 dark:fill-gray-200" />
                    <path d="M5.85665 41.8048C5.21042 40.2694 2.74791 41.1651 1.59743 41.8048C0.642774 42.2505 0.863078 43.8717 2.03804 45.2004C2.978 46.2634 4.14317 45.7909 4.60826 45.4219C5.29365 44.8559 6.50288 43.3402 5.85665 41.8048Z" stroke="currentColor" class="dark:stroke-gray-200" stroke-width="2" stroke-linecap="round" />
                    <path d="M45.4596 49.2172C40.9431 47.667 40.2844 51.6987 40.5196 53.9083C40.8221 55.3361 42.4351 55.54 43.4433 55.2341C45.5677 54.5894 51.1052 51.1548 45.4596 49.2172Z" fill="currentColor" class="text-gray-800 dark:fill-gray-200" />
                    <ellipse rx="2.96295" ry="3.45694" transform="matrix(0.855131 0.518411 -0.509711 0.860345 30.4996 41.3871)" fill="currentColor" class="text-gray-800 dark:fill-gray-200" />
                    <path d="M38.5032 29.1282C39.471 27.8228 37.8983 26.0687 36.991 25.3549C36.0836 24.6411 34.8335 24.8654 33.8657 26.1707C32.7567 27.6664 37.2934 30.7599 38.5032 29.1282Z" fill="currentColor" class="text-gray-800 dark:fill-gray-200" />
                    <path d="M19.2476 18.9295C16.4247 18.2768 15.7862 19.8813 15.8198 20.7652C16.0215 23.8246 20.5582 24.4365 21.6672 23.6207C22.4364 23.0548 22.7761 19.7453 19.2476 18.9295Z" fill="currentColor" class="text-gray-800 dark:fill-gray-200" />
                    <path d="M36.6888 6.79381C35.6403 4.67259 33.2947 5.02613 32.2529 5.46805C28.7042 6.61025 29.3292 8.52749 30.1358 9.13938C31.3456 10.1252 34.2289 12.0153 36.0839 11.6889C38.4027 11.281 37.9994 9.44533 36.6888 6.79381Z" fill="currentColor" class="text-gray-800 dark:fill-gray-200" />
                    <path d="M56.9526 54.9284C57.7592 53.5006 60.2795 51.0735 65.1187 49.9313C66.0596 49.7953 67.9818 48.5647 68.1431 44.7302C68.3448 39.9371 73.5872 32.9003 69.3529 28.1072C67.5382 26.053 68.4456 23.2121 67.5382 17.7051" stroke="currentColor" class="dark:stroke-gray-200" stroke-width="2" stroke-linecap="round" />
                    <path d="M66.7316 16.176C65.1521 14.2383 60.6625 9.8939 55.3394 8.01743C48.703 5.67797 55.8063 4.55591 44.1399 4.75246C44.0816 4.75344 44.0194 4.76029 43.9617 4.76836C43.019 4.90008 40.5102 4.51266 37.2614 1.95295C37.2161 1.91728 37.1681 1.88406 37.1153 1.86091C36.6 1.63502 35.1744 1.43154 32.9584 2.2045C30.6195 3.02036 24.0531 5.46791 21.0622 6.58971C20.4237 6.92965 19.0056 8.05825 18.441 9.85312C17.7353 12.0967 5.93991 23.5187 9.56927 28.9237" stroke="currentColor" class="dark:stroke-gray-200" stroke-width="2" stroke-linecap="round" />
                    <path d="M10.4768 30.1484C11.9084 30.3333 14.621 31.3895 15.0562 34.1372C15.1369 34.6464 15.5068 35.0847 16.0079 35.2063C18.8253 35.8904 22.6446 38.4014 20.8122 44.4603C20.7218 44.7592 20.7652 45.0847 20.9158 45.3583C21.7327 46.8422 22.367 49.4462 20.6725 51.7386C20.1262 52.4776 20.4167 53.842 21.2912 54.1243C23.3727 54.7962 25.8398 55.985 27.2662 57.833C27.5533 58.2049 28.0338 58.3932 28.4956 58.3062C30.4142 57.9446 33.9492 57.9776 37.2937 60.233C42.1328 63.4964 42.3345 60.0291 48.6858 60.7429C53.7669 61.314 55.7765 58.3294 56.1462 56.7656" stroke="currentColor" class="dark:stroke-gray-200" stroke-width="2" stroke-linecap="round" />
                </svg>
                <p class="text-sm text-gray-800 dark:text-gray-200">
                    Пользуясь сайтом вы соглашаетесь с <button class="inline-flex items-center gap-x-1.5 text-primary-600 decoration-2 hover:underline font-medium" type='button' data-hs-overlay="#modal-cookie">политикой Cookie</button>
                </p>
                <div>
                    <button type="button" class="inline-flex text-gray-500 focus:outline-none dark:hover:bg-gray-600 dark:text-gray-400" data-hs-remove-element="#cookie">
                        <span class="sr-only">Dismiss</span>
                        <i class='fa-solid fa-xmark w-4'></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- 
        МОДАЛЬНЫЕ ОКНА
     -->
    <div id="modal-login" class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="p-4 sm:p-7">
                    <div class="text-center">
                        <h2 class="block text-2xl font-bold text-gray-800 dark:text-gray-200">Авторизация</h2>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            Еще не зарегистрированы?
                            <button class="text-primary-600 decoration-2 hover:underline font-medium" type='button' data-hs-overlay="#modal-register">
                                Регистрация
                            </button>
                        </p>
                    </div>
                    <div class="mt-5">
                        <form class="grid gap-y-4" id='login-form'>
                            <div>
                                <label for="email" class="block text-sm font-medium mb-2 dark:text-white">Почта</label>
                                <div class="relative">
                                    <input type="email" id="email" name="email" class="py-3 px-4 pl-11 block w-full border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-primary-500 focus:ring-primary-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" placeholder="user11@mail.ru" maxlength="32" autofocus required>
                                    <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none z-20 pl-4">
                                        <i class='fa-solid fa-envelope h-3.5 w-3.5 text-gray-400'></i>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="password" class="block text-sm font-medium mb-2 dark:text-white">Пароль</label>
                                <div class="relative">
                                    <input type="password" id="password" name="password" class="py-3 px-4 pl-11 block w-full border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-primary-500 focus:ring-primary-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" placeholder="••••••••••••" maxlength="32" required>
                                    <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none z-20 pl-4">
                                        <i class='fa-solid fa-envelope h-3.5 w-3.5 text-gray-400'></i>
                                    </div>
                                </div>
                            </div>
                            <p class='hidden text-sm text-red-600' id='error-message'></p>
                            <p class='hidden text-sm text-green-600' id='success-message'></p>
                            <button type="submit" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-primary-500 text-white hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Войти</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-register" class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="p-4 sm:p-7">
                    <div class="text-center">
                        <h2 class="block text-2xl font-bold text-gray-800 dark:text-gray-200">Регистрация</h2>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            Уже зарегистрированы?
                            <button class="text-primary-600 decoration-2 hover:underline font-medium" type='button' data-hs-overlay="#modal-login">
                                Авторизация
                            </button>
                        </p>
                    </div>
                    <div class="mt-5">
                        <form class="grid grid-cols-2 gap-4">
                            <div class='col-span-2'>
                                <label for="surname" class="block text-sm mb-2 dark:text-white">Фамилия</label>
                                <div class="relative">
                                    <input type="text" id="surname" name="surname" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" placeholder="Введите фамилию" autofocus required>
                                </div>
                            </div>
                            <div class='col-span-2'>
                                <label for="name" class="block text-sm mb-2 dark:text-white">Имя</label>
                                <div class="relative">
                                    <input type="text" id="name" name="name" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" placeholder="Введите имя" required>
                                </div>
                            </div>
                            <div class='col-span-2'>
                                <label for="patronymic" class="block text-sm mb-2 dark:text-white">Отчество</label>
                                <div class="relative">
                                    <input type="text" id="patronymic" name="patronymic" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" placeholder="Введите отчество" required>
                                </div>
                            </div>
                            <div>
                                <label for="email" class="block text-sm mb-2 dark:text-white">Почта</label>
                                <div class="relative">
                                    <input type="email" id="email" name="email" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" placeholder="Введите почту" maxlength="32" required>
                                </div>
                            </div>
                            <div>
                                <label for="phone" class="block text-sm mb-2 dark:text-white">Телефон</label>
                                <div class="relative">
                                    <input type="tel" id="phone" name="phone" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" placeholder="+7 (XXX) XXX-XX-XX" data-mask='+7 (000) 000-00-00' required>
                                </div>
                            </div>
                            <div>
                                <label for="password" class="block text-sm mb-2 dark:text-white">Пароль</label>
                                <div class="relative">
                                    <input type="password" id="password" name="password" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" placeholder="Введите пароль" minlength="8" maxlength="32" required>
                                </div>
                            </div>
                            <div>
                                <label for="passwordRepeat" class="block text-sm mb-2 dark:text-white">Подтверждение пароля</label>
                                <div class="relative">
                                    <input type="password" id="passwordRepeat" name="passwordRepeat" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" minlength="8" maxlength="32" placeholder="Повторите пароль" required>
                                </div>
                            </div>
                            <button type="submit" class="py-3 col-span-2 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-primary-500 text-white hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                Зарегистрироваться
                            </button>
                            <div class='col-span-2 text-sm text-gray-600 dark:text-gray-400'>
                                Нажимая на кнопку вы подтверждаете, что ознакомлены с <button class="text-primary-600 decoration-2 hover:underline font-medium" type='button' data-hs-overlay="#modal-offer">публичной офертой</button>, и <button class="text-primary-600 decoration-2 hover:underline font-medium" type='button' data-hs-overlay="#modal-policy">политикой конфиденциальности</button>.
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-offer" class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto h-[calc(100%-3.5rem)]">
            <div class="max-h-full overflow-hidden flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                <div class="py-3 px-4 border-b dark:border-gray-700">
                    <h3 class="font-bold text-gray-800 dark:text-white">
                        Публичная оферта
                    </h3>
                </div>
                <div class="p-4 overflow-y-auto">
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Be bold</h3>
                            <p class="mt-1 text-gray-800 dark:text-gray-400">
                                Motivate teams to do their best work. Offer best practices to get users going in the right direction. Be bold and offer just enough help to get the work started, and then get out of the way. Give accurate information so users can make educated decisions. Know your user's struggles and desired outcomes and give just enough information to let them get where they need to go.
                            </p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Be optimistic</h3>
                            <p class="mt-1 text-gray-800 dark:text-gray-400">
                                Focusing on the details gives people confidence in our products. Weave a consistent story across our fabric and be diligent about vocabulary across all messaging by being brand conscious across products to create a seamless flow across all the things. Let people know that they can jump in and start working expecting to find a dependable experience across all the things. Keep teams in the loop about what is happening by informing them of relevant features, products and opportunities for success. Be on the journey with them and highlight the key points that will help them the most - right now. Be in the moment by focusing attention on the important bits first.
                            </p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Be practical, with a wink</h3>
                            <p class="mt-1 text-gray-800 dark:text-gray-400">
                                Keep our own story short and give teams just enough to get moving. Get to the point and be direct. Be concise - we tell the story of how we can help, but we do it directly and with purpose. Be on the lookout for opportunities and be quick to offer a helping hand. At the same time realize that nobody likes a nosy neighbor. Give the user just enough to know that something awesome is around the corner and then get out of the way. Write clear, accurate, and concise text that makes interfaces more usable and consistent - and builds trust. We strive to write text that is understandable by anyone, anywhere, regardless of their culture or language so that everyone feels they are part of the team.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-policy" class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto h-[calc(100%-3.5rem)]">
            <div class="max-h-full overflow-hidden flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                <div class="py-3 px-4 border-b dark:border-gray-700">
                    <h3 class="font-bold text-gray-800 dark:text-white">
                        Политика конфиденциальности
                    </h3>
                </div>
                <div class="p-4 overflow-y-auto">
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Be bold</h3>
                            <p class="mt-1 text-gray-800 dark:text-gray-400">
                                Motivate teams to do their best work. Offer best practices to get users going in the right direction. Be bold and offer just enough help to get the work started, and then get out of the way. Give accurate information so users can make educated decisions. Know your user's struggles and desired outcomes and give just enough information to let them get where they need to go.
                            </p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Be optimistic</h3>
                            <p class="mt-1 text-gray-800 dark:text-gray-400">
                                Focusing on the details gives people confidence in our products. Weave a consistent story across our fabric and be diligent about vocabulary across all messaging by being brand conscious across products to create a seamless flow across all the things. Let people know that they can jump in and start working expecting to find a dependable experience across all the things. Keep teams in the loop about what is happening by informing them of relevant features, products and opportunities for success. Be on the journey with them and highlight the key points that will help them the most - right now. Be in the moment by focusing attention on the important bits first.
                            </p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Be practical, with a wink</h3>
                            <p class="mt-1 text-gray-800 dark:text-gray-400">
                                Keep our own story short and give teams just enough to get moving. Get to the point and be direct. Be concise - we tell the story of how we can help, but we do it directly and with purpose. Be on the lookout for opportunities and be quick to offer a helping hand. At the same time realize that nobody likes a nosy neighbor. Give the user just enough to know that something awesome is around the corner and then get out of the way. Write clear, accurate, and concise text that makes interfaces more usable and consistent - and builds trust. We strive to write text that is understandable by anyone, anywhere, regardless of their culture or language so that everyone feels they are part of the team.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-cookie" class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto h-[calc(100%-3.5rem)]">
            <div class="max-h-full overflow-hidden flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                <div class="py-3 px-4 border-b dark:border-gray-700">
                    <h3 class="font-bold text-gray-800 dark:text-white">
                        Политика Cookie
                    </h3>
                </div>
                <div class="p-4 overflow-y-auto">
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Be bold</h3>
                            <p class="mt-1 text-gray-800 dark:text-gray-400">
                                Motivate teams to do their best work. Offer best practices to get users going in the right direction. Be bold and offer just enough help to get the work started, and then get out of the way. Give accurate information so users can make educated decisions. Know your user's struggles and desired outcomes and give just enough information to let them get where they need to go.
                            </p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Be optimistic</h3>
                            <p class="mt-1 text-gray-800 dark:text-gray-400">
                                Focusing on the details gives people confidence in our products. Weave a consistent story across our fabric and be diligent about vocabulary across all messaging by being brand conscious across products to create a seamless flow across all the things. Let people know that they can jump in and start working expecting to find a dependable experience across all the things. Keep teams in the loop about what is happening by informing them of relevant features, products and opportunities for success. Be on the journey with them and highlight the key points that will help them the most - right now. Be in the moment by focusing attention on the important bits first.
                            </p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Be practical, with a wink</h3>
                            <p class="mt-1 text-gray-800 dark:text-gray-400">
                                Keep our own story short and give teams just enough to get moving. Get to the point and be direct. Be concise - we tell the story of how we can help, but we do it directly and with purpose. Be on the lookout for opportunities and be quick to offer a helping hand. At the same time realize that nobody likes a nosy neighbor. Give the user just enough to know that something awesome is around the corner and then get out of the way. Write clear, accurate, and concise text that makes interfaces more usable and consistent - and builds trust. We strive to write text that is understandable by anyone, anywhere, regardless of their culture or language so that everyone feels they are part of the team.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 
        СКРИПТЫ
    -->
    <script src='https://api-maps.yandex.ru/2.1/?apikey=5f9a5460-e6e3-4078-b87f-ed438bc9c4cf&lang=ru_RU'></script>
    <script src='/resources/libs/jquery/jquery.min.js'></script>
    <script src='/resources/libs/jquery/mask/mask.min.js'></script>
    <script src='/resources/libs/jquery/fancybox/fancybox.min.js'></script>
    <script src='/resources/libs/preline/preline.js'></script>
    <script src='/resources/js/common.js'></script>
</body>

</html>