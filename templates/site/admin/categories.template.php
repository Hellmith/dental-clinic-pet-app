<header class="container">
    <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">Категории</h1>
</header>
<section class="container py-10 lg:py-14 mx-auto">
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-slate-900 dark:border-gray-700">
                    <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                                Список категорий
                            </h2>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Какой-то текст
                            </p>
                        </div>
                        <div>
                            <div class="inline-flex gap-x-2">
                                <Button class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-primary-500 text-white hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" href type="button" data-hs-overlay="#new-category-canvas">
                                    Новая категория
                                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.63452 7.50001L13.6345 7.5M8.13452 13V2" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                </Button>
                            </div>
                        </div>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left border-l border-gray-200 dark:border-gray-700">
                                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                        Категория
                                    </span>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left">
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <? while ($cat = mysqli_fetch_assoc($result)) : ?>
                                <tr>
                                    <td class="h-px w-full whitespace-nowrap">
                                        <div class="px-6 py-2 flex items-center gap-x-3">
                                            <span class="text-sm w-4 text-gray-600 dark:text-gray-400"><?= $cat['id'] ?></span>
                                            <span class="font-semibold text-sm text-gray-800 dark:text-gray-200"> <?= $cat['category_title'] ?></span>
                                        </div>
                                    </td>
                                    <td class="h-px w-auto whitespace-nowrap">
                                        <div class="px-6 py-2 space-x-2">
                                            <a class="font-semibold text-emerald-500 hover:text-emerald-600 transition-all text-sm cursor-pointer">
                                                Сохранить
                                            </a>
                                            <a class="font-semibold text-red-500 hover:text-red-600 transition-all text-sm cursor-pointer">
                                                Удалить
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <? endwhile; ?>
                        </tbody>
                    </table>
                    <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-gray-700">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <span class="font-semibold text-gray-800 dark:text-gray-200"><?= $total ?></span> представлено
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>