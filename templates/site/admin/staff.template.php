<header class="container">
    <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">Пользователи</h1>
</header>
<section class="container py-10 lg:py-14 mx-auto">
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-slate-900 dark:border-gray-700">
                    <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                                Список персонала
                            </h2>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Какой-то текст
                            </p>
                        </div>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left">
                                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                        ФИО
                                    </span>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left ">
                                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                        Должность
                                    </span>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left ">
                                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                        Телефон
                                    </span>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left ">
                                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                        Почта
                                    </span>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left ">
                                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                        Адрес проживания
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <? while ($staff = mysqli_fetch_assoc($result)) : ?>
                                <tr>
                                    <td class="h-px w-auto whitespace-nowrap">
                                        <div class="px-6 py-2 flex items-center gap-x-3">
                                            <span class="text-sm w-4 text-gray-600 dark:text-gray-400"><?= $staff['id'] ?></span>
                                            <span class="font-semibold text-sm text-gray-800 dark:text-gray-200"> <?= $staff['staff_surname'] . ' ' . mb_substr($staff['staff_name'], 0, 1) . '. ' . mb_substr($staff['staff_patronymic'], 0, 1) . '.' ?></span>
                                        </div>
                                    </td>
                                    <td class="h-px w-auto whitespace-nowrap">
                                        <div class="px-6 py-2 flex items-center gap-x-3">
                                            <span class="text-sm w-4 text-gray-600 dark:text-gray-400"><?= $staff['job_name'] ?></span>
                                        </div>
                                    </td>
                                    <td class="h-px w-auto whitespace-nowrap">
                                        <div class="px-6 py-2 flex items-center gap-x-3">
                                            <span class="text-sm w-4 text-gray-600 dark:text-gray-400">
                                                <?= $staff['phone'] ?>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="h-px w-auto whitespace-nowrap">
                                        <div class="px-6 py-2 flex items-center gap-x-3">
                                            <span class="text-sm w-4 text-gray-600 dark:text-gray-400">
                                                <?= $staff['email'] ?>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="h-px w-auto whitespace-nowrap">
                                        <div class="px-6 py-2 flex items-center gap-x-3">
                                            <span class="text-sm w-4 text-gray-600 dark:text-gray-400">
                                                <?= 'ул. ' . $staff['street_name'] . ', д.' . $staff['house_number'] ?>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            <? endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>