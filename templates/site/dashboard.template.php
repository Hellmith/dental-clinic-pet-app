<header class="container flex items-center justify-between">
    <div>
        <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">Профиль</h1>
        <p class="mt-2 text-lg text-gray-800 dark:text-gray-400">Добро пожаловать, <?= $fullname ?></p>
    </div>
    <div class="flex flex-col items-center gap-2 sm:flex-row sm:gap-3">
        <button class="w-full sm:w-auto inline-flex justify-center items-center gap-x-3 text-center bg-primary-600 hover:bg-primary-700 border border-transparent text-white text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4 dark:focus:ring-offset-gray-800" type="button" data-hs-overlay="#profile-edit-canvas">
            <i class='fa-solid fa-edit'></i>
            Редактировать
        </button>
    </div>
</header>