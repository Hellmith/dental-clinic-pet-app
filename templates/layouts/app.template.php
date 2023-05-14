<!DOCTYPE html>
<html lang='ru'>

<head>
    <!-- Мета -->
    <meta charset='utf-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' />

    <title><?= $brand ?></title>

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
    <link rel='stylesheet' href='/resources/styles/styles.min.css' />
</head>

<body class='animation-fade-in duration-300 bg-gray-50 dark:bg-slate-900'>
    <header class="flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full bg-white border-b text-sm py-2.5 sm:py-4 dark:bg-slate-900 dark:border-gray-700">
        <nav class="container flex basis-full justify-between items-center w-full mx-auto px-4 sm:px-6 lg:px-8" aria-label="Global">
            <div class="mr-5 md:mr-8">
                <a class="flex-none text-xl font-semibold dark:text-white" href="#" aria-label="<?= $brand ?>">
                    <i class='fa-solid fa-tooth fa-xl text-primary-600 dark:text-primary-500'></i>
                    <?= $brand ?>
                    <span class="inline bg-gray-100 text-xs text-gray-500 font-semibold rounded-full py-1 px-2 dark:bg-gray-700 dark:text-gray-400">
                        Личный кабинет
                    </span>
                </a>
            </div>
            <div class="hs-dropdown relative inline-flex [--placement:bottom-right]" data-hs-dropdown-placement="bottom-left">
                <button id="hs-dropdown" type="button" class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center gap-2 h-[2.375rem] w-[2.375rem] rounded-full font-medium bg-white text-gray-700 align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-xs dark:bg-gray-800 dark:hover:bg-slate-800 dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800">
                    <i class='fa-solid fa-user fa-xl'></i>
                </button>
                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-[15rem] z-10 bg-white shadow-md rounded-lg p-2 dark:bg-gray-800 dark:border dark:border-gray-700" aria-labelledby="hs-dropdown">
                    <div class="py-3 px-5 -m-2 bg-gray-100 rounded-t-lg dark:bg-gray-700">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Авторизован как</p>
                        <p class="text-sm font-medium text-gray-800 dark:text-gray-300">
                            <?= $email ?>
                        </p>
                    </div>
                    <div class="mt-2 py-2 first:pt-0 last:pb-0">
                        <button class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-primary-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" id='logout-button' type='button'>
                            <i class='flex-none fa-solid fa-sign-out'></i>
                            Выход
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main id="content" role="main">
        <nav class="sticky -top-px bg-white text-sm font-medium text-black ring-1 ring-gray-900 ring-opacity-5 border-t shadow-sm shadow-gray-100 pt-6 md:pb-6 -mt-px dark:bg-slate-900 dark:border-gray-800 dark:shadow-slate-700/[.7]" aria-label="Jump links">
            <div class="container snap-x w-full flex items-center overflow-x-auto scrollbar-x px-4 sm:px-6 lg:px-8 pb-4 md:pb-0 mx-auto dark:scrollbar-x">
                <div class="snap-center shrink-0 pr-5 sm:pr-8 sm:last-pr-0">
                    <a class="inline-flex items-center gap-x-2 hover:text-gray-500 dark:text-gray-400 dark:hover:text-gray-500" href="/dashboard">
                        Профиль
                    </a>
                </div>
                <?php if ($_SESSION['USER']) { ?>
                    <div class="snap-center shrink-0 pr-5 sm:pr-8 sm:last:pr-0">
                        <a class="inline-flex items-center gap-x-2 hover:text-gray-500 dark:text-gray-400 dark:hover:text-gray-500" href="/dashboard/bookings">
                            Записи
                        </a>
                    </div>
                <?php } elseif ($_SESSION['STAFF']['job_id'] !== 7 || 8) { ?>
                    <div class="snap-center shrink-0 pr-5 sm:pr-8 sm:last:pr-0">
                        <a class="inline-flex items-center gap-x-2 hover:text-gray-500 dark:text-gray-400 dark:hover:text-gray-500" href="/dashboard/shedules">
                            Расписание
                        </a>
                    </div>
                    <div class="snap-center shrink-0 pr-5 sm:pr-8 sm:last:pr-0">
                        <a class="inline-flex items-center gap-x-2 hover:text-gray-500 dark:text-gray-400 dark:hover:text-gray-500" href="/dashboard/patients">
                            Пациенты
                        </a>
                    </div>
                <?php } ?>
            </div>
        </nav>
        <div class="container mx-auto py-10 px-4 sm:px-6 lg:px-8 ">
            <?= $content ?>
        </div>
    </main>
</body>

<!-- 
    КАНВАСЫ
 -->
<div id="doctors-appointment-canvas" class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full fixed top-0 left-0 transition-all duration-300 transform h-full max-w-xs w-full z-[60] bg-white border-r dark:bg-gray-800 dark:border-gray-700 hidden" tabindex="-1">
    <div class="flex justify-between items-center h-[71px] py-3 px-4 border-b dark:border-gray-700">
        <h3 class="font-bold text-gray-800 dark:text-white">
            Запись к врачу
        </h3>
        <button type="button" class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white text-sm dark:text-gray-500 dark:hover:text-gray-400 dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800" data-hs-overlay="#doctors-appointment-canvas">
            <span class="sr-only">Close modal</span>
            <i class='fa-solid fa-xmark'></i>
        </button>
    </div>
    <div class="p-4 h-full">
        <form class='flex flex-col h-[calc(100vh_-_100px)] justify-between' id='new-booking-form'>
            <div class="flex flex-col">
                <div class="mb-2">
                    <label for="filial" class="block text-sm font-medium dark:text-white">Филиал</label>
                    <select id="filial" name="filial" class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                        <option selected>Выберите из списка</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="service" class="block text-sm font-medium dark:text-white">Услуга</label>
                    <select id="service" name="service" class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" disabled>
                        <option selected>Выберите филиал</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="doctor" class="block text-sm font-medium dark:text-white">Врач</label>
                    <select id="doctor" name="doctor" class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" disabled>
                        <option selected>Выберите услугу</option>
                    </select>
                </div>
                <div class="mb-2 grid grid-cols-2 gap-2">
                    <div>
                        <label for="date" class="block text-sm font-medium dark:text-white">Дата</label>
                        <input type="date" id="date" name="date" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" disabled placeholder="Выберите доктора">
                    </div>
                    <div>
                        <label for="time" class="block text-sm font-medium dark:text-white">Время</label>
                        <input type="time" id="time" name="time" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" disabled placeholder="Выберите время">
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="button" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold text-primary-500 hover:text-primary-700 focus:outline-none focus:ring-2 ring-offset-white focus:ring-primary-500 focus:ring-offset-2 transition-all text-sm" data-hs-overlay="#modal-set-city">
                        Изменить город
                    </button>
                </div>
            </div>
            <button type="submit" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-primary-500 text-white hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                Записаться
            </button>
        </form>
    </div>
</div>

<!-- 
        МОДАЛЬНЫЕ ОКНА
     -->
<div id="modal-set-city" class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 sm:p-7">
                <div class="text-center">
                    <h2 class="block text-2xl font-bold text-gray-800 dark:text-gray-200">Выбор города</h2>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        Уже выбрали?
                        <button class="text-primary-600 decoration-2 hover:underline font-medium" type='button' data-hs-overlay="#doctors-appointment-canvas">
                            Запишитесь на прием
                        </button>
                    </p>
                </div>
                <div class="mt-5">
                    <form class="grid gap-y-4" id='city-set-form'>
                        <div>
                            <label for="region" class="block text-sm font-medium mb-2 dark:text-white">Регион</label>
                            <div class="relative">
                                <select id="region" name="region" class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                    <option selected>Выберите из списка</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="city" class="block text-sm font-medium mb-2 dark:text-white">Город</label>
                            <div class="relative">
                                <select id="city" name="city" class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-primary-500 focus:ring-primary-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" disabled>
                                    <option selected>Выберите регион</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-primary-500 text-white hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Выбрать</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 
        СКРИПТЫ
    -->
<script src=' /resources/libs/jquery/jquery.min.js'></script>
<script src='/resources/libs/jquery/mask/mask.min.js'></script>
<script src='/resources/libs/preline/preline.js'></script>
<script src='/resources/js/app.js'></script>
</body>

</html>