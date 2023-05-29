<?php session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/renderTemplate.php';

($conn = mysqli_connect('127.0.0.1', 'root', '', 'dentistry')) or die('Error: ' . mysqli_error($conn));

// Обработка сохранения услуги
if (isset($_POST['save_service'])) {
    $title = 'service_title' . $_POST['save_service'];
    $category = 'service_category' . $_POST['save_service'];
    $price = 'service_price' . $_POST['save_service'];

    $query = "UPDATE services
	SET service_title = '$_POST[$title]', category_id = '$_POST[$category]'
	WHERE id = $_POST[save_service]";
    $update_res1 = mysqli_query($conn, $query);

    $query = "INSERT INTO `prices` (service_id, price) VALUES ('$_POST[save_service]','$_POST[$price]')";
    $update_res2 = mysqli_query($conn, $query);

    $message_box = "Улсуга № $_POST[save_service] обновлена";
}

// Обработка удаления услуги
if (isset($_POST['delete_service'])) {
    $query = "SELECT b.id FROM `bookings` AS b WHERE b.services_id = $_POST[delete_service]";
    $service_res = mysqli_query($conn, $query);
    if (empty(mysqli_fetch_assoc($service_res))) {
        $query = "DELETE FROM `prices` AS p WHERE p.service_id = $_POST[delete_service]";
        $delete_res = mysqli_query($conn, $query);
        $query = "DELETE FROM `services` AS se WHERE se.id = $_POST[delete_service]";
        $delete_res = mysqli_query($conn, $query);
        $message_box = "Улсуга № $_POST[delete_service] удалена";
    } else {
        $message_box = "Нельзя удалить услугу № $_POST[delete_service]. На неё уже записаны";
    }
}

?>

<header class="container">
    <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">Услуги и цены</h1>
</header>
<section class="container py-10 lg:py-14 mx-auto">
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-slate-900 dark:border-gray-700">
                    <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                                Список услуг
                            </h2>
                        </div>
                        <div>
                            <div class="inline-flex gap-x-2">
                                <Button class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-primary-500 text-white hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" href type="button" data-hs-overlay="#new-service-canvas">
                                    Новая услуга
                                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.63452 7.50001L13.6345 7.5M8.13452 13V2" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                </Button>
                            </div>
                        </div>
                    </div>
                    <form action='' method='POST'>
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left border-l border-gray-200 dark:border-gray-700">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                            Название услуги
                                        </span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left border-l border-gray-200 dark:border-gray-700">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                            Категория
                                        </span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left border-l border-gray-200 dark:border-gray-700">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                            Цена
                                        </span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left border-l border-gray-200 dark:border-gray-700">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                            Дата цены
                                        </span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left">
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <? while ($ser = mysqli_fetch_assoc($result)) : ?>
                                    <tr>
                                        <td class="h-px w-auto whitespace-nowrap">
                                            <div class="px-6 py-2 flex items-center gap-x-3">
                                                <span class="text-sm w-4 text-gray-600"><?= $ser['id'] ?></span>
                                                <span>
                                                    <input class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500" type="text" name="service_title<?= $ser['id'] ?>" value="<?= $ser['service_title'] ?>" placeholder="<?= $ser['service_title'] ?>" />
                                                </span>
                                            </div>
                                        </td>
                                        <td class="h-px w-auto whitespace-nowrap">
                                            <div class="px-6 py-2 flex items-center gap-x-3">
                                                <span>
                                                    <select class="py-2 px-3 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" name="service_category<?= $ser['id'] ?>" id="service_category">
                                                        <? foreach ($services_categories as $cat) : ?>
                                                            <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $ser['category_id'] ? 'selected' : '' ?>>
                                                                <?= $cat['category_title'] ?>
                                                            </option>
                                                        <? endforeach; ?>
                                                    </select>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="h-px w-auto whitespace-nowrap">
                                            <div class="px-6 py-2 flex items-center gap-x-3">
                                                <span>
                                                    <input class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500" type="text" name="service_price<?= $ser['id'] ?>" value="<?= $ser['current_price'] ?>" placeholder="<?= $ser['current_price'] ?>" />
                                                </span>
                                            </div>
                                        </td>
                                        <td class="h-px w-auto whitespace-nowrap">
                                            <div class="px-6 py-2 flex items-center gap-x-3">
                                                <span class="text-sm w-4 text-gray-600">
                                                    <?= $ser['current_price_date'] ?>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="h-px w-auto whitespace-nowrap">
                                            <div class="px-6 py-2 space-x-2">
                                                <button type='submit' value="<?= $ser['id'] ?>" name="save_service" class="font-semibold text-emerald-500 hover:text-emerald-600 transition-all text-sm cursor-pointer">
                                                    Сохранить
                                                </button>
                                                <button type='submit' value="<?= $ser['id'] ?>" name="delete_service" class="font-semibold text-red-500 hover:text-red-600 transition-all text-sm cursor-pointer">
                                                    Удалить
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <? endwhile; ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>