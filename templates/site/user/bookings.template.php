<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "dentistry") or die("Error: " . mysqli_error($conn));

$filter = "WHERE 1=1 and b.phone = '" . $_SESSION['USER']['phone'] . "'";

$query =
    "SELECT b.*, st.staff_name, st.staff_surname, st.staff_patronymic, se.service_title, f.filial_title, f.street_name
FROM `bookings` AS b
LEFT JOIN `staffs` AS st ON b.staff_id = st.id
LEFT JOIN `services` AS se ON b.services_id = se.id
LEFT JOIN `filials` AS f ON b.filial_id = f.id
$filter
ORDER BY `date` ASC, `time` ASC $limit";
$bookings_result = mysqli_query($conn, $query);
$bookings = mysqli_num_rows($bookings_result);
?>

<header class="container">
    <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">Записи</h1>
</header>
<section class="container py-10 lg:py-14 mx-auto">
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-slate-900 dark:border-gray-700">
                    <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                                Список записей
                            </h2>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Какой-то текст
                            </p>
                        </div>
                        <div>
                            <div class="inline-flex gap-x-2">
                                <a class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-primary-500 text-white hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" href="#">
                                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.63452 7.50001L13.6345 7.5M8.13452 13V2" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                    Добавить
                                </a>
                            </div>
                        </div>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left border-l border-gray-200 dark:border-gray-700">
                                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                        Филиал
                                    </span>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left">
                                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                        Услуга
                                    </span>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left">
                                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                        Врач
                                    </span>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left">
                                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                        Дата
                                    </span>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left">
                                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                        Время
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <? while ($booking = mysqli_fetch_assoc($bookings_result)) : ?>
                                <tr>
                                    <td class="h-px w-auto whitespace-nowrap">
                                        <div class="px-6 py-2 flex items-center gap-x-3">
                                            <span class="text-sm text-gray-600 dark:text-gray-400"><?= $booking['id'] ?></span>
                                            <span class="text-sm text-gray-600 decoration-2"><?= $booking['filial_title'] . ', улица ' . $booking['street_name'] ?></span>
                                        </div>
                                    </td>
                                    <td class="h-px w-auto whitespace-nowrap">
                                        <div class="px-6 py-2">
                                            <span class="font-semibold text-sm text-gray-800 dark:text-gray-200"><?= $booking['service_title'] ?></span>
                                        </div>
                                    </td>
                                    <td class="h-px w-auto whitespace-nowrap">
                                        <div class="px-6 py-2">
                                            <span class="text-sm text-gray-800 dark:text-gray-200"><?= $booking['staff_surname'] . ' ' . mb_substr($booking['staff_name'], 0, 1) . '.' . mb_substr($booking['staff_patronymic'], 0, 1) . '.' ?></span>
                                        </div>
                                    </td>
                                    <td class="h-px w-auto whitespace-nowrap">
                                        <div class="px-6 py-2">
                                            <span class="text-sm text-gray-800 dark:text-gray-200"><?= $booking['date'] ?></span>
                                        </div>
                                    </td>
                                    <td class="h-px w-auto whitespace-nowrap">
                                        <div class="px-6 py-2">
                                            <span class="text-sm text-gray-800 dark:text-gray-200"><?= $booking['time'] ?></span>
                                        </div>
                                    </td>
                                </tr>
                            <? endwhile; ?>
                        </tbody>
                    </table>
                    <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-gray-700">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <span class="font-semibold text-gray-800 dark:text-gray-200"><?= $bookings ?></span> представлено
                            </p>
                        </div>
                        <!-- <div>
                            <div class="inline-flex gap-x-2">
                                <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-primary-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                                    </svg>
                                    Предыдущая
                                </button>
                                <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-primary-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                    Следующая
                                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </button>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>