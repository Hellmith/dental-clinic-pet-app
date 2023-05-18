<?php session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/renderTemplate.php';

($conn = mysqli_connect('127.0.0.1', 'root', '', 'dentistry')) or die('Error: ' . mysqli_error($conn));

// $query =
//     "SELECT * FROM filials AS f
// WHERE f.id = " . $_SESSION['staff_data']['filial_id'];
// $filial_data = mysqli_fetch_assoc(mysqli_query($conn, $query));

// // Обработка сохранения категории
// if (isset($_POST['save_category'])) {
//     $name = 'category_title' . $_POST['save_category'];
//     $query = "UPDATE services_categories SET category_title = '$_POST[$name]' WHERE id = $_POST[save_category]";
//     $update_res = mysqli_query($conn, $query);
//     $category_message = "Успех. Категория № $_POST[save_category] обновлена на $_POST[$name]";
// }

// // Обработка удаления категории
// if (isset($_POST['delete_category'])) {
//     $query = "SELECT id FROM services WHERE category_id = $_POST[delete_category]";
//     $service_res = mysqli_query($conn, $query);
//     if (empty(mysqli_fetch_assoc($service_res))) {
//         $query = "DELETE FROM `services_categories` AS se WHERE se.id =" . $_POST['delete_category'];
//         $update_res = mysqli_query($conn, $query);
//         $category_message = "Успех. Категория № $_POST[delete_category] удалена";
//     } else {
//         $category_message = "Ошибка. Нельзя удалить категорию № $_POST[delete_category]. Она уже указана в Услуге";
//     }
// }

// // Обработка добавления категории
// if (isset($_POST['add_category']) && (empty($_SESSION['msg']['button_value']) || (int)$_POST['add_category'] != (int)$_SESSION['msg']['button_value'])) {
//     $query = "SELECT id FROM `services_categories` WHERE `category_title` = '$_POST[category_title]'";
//     $category = mysqli_fetch_assoc(mysqli_query($conn, $query));
//     if (empty($category)) {
//         $query = "INSERT INTO `services_categories` (`category_title`) VALUES ('$_POST[category_title]')";
//         $res = mysqli_query($conn, $query);
//         if ($res) {
//             // Если успешно, сборка сообщения для вывода
//             $category_message = "Успех. Категория $_POST[category_title] добавлена";
//             $_SESSION['msg']['value'] = $category_message;
//             $_SESSION['msg']['shown'] = false;
//             $_SESSION['msg']['button_value'] = $_POST['add_category'];
//         }
//     } else {
//         $category_message = "Ошибка. Категория $_POST[category_title] уже создана";
//     }
// }

// // Подготовка строки фильтра для запроса
$filter = 'WHERE 1=1';

// // Пагинатор (разбиение данных на страницы)
// $default_limit = 10; // Какой лимит если не указан в полях на странице
// $limit_num = !empty($_GET['limit']) && $_GET['limit'] >= 1 ? $_GET['limit'] : $default_limit; // Проверка указан-ли лимит на странице
$total = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM `services_categories` AS b $filter"))[0]; // Всего записей
// $pages = ceil($total / $limit_num); // Всего страниц
// $page = !empty($_GET['page']) ? $_GET['page'] : 1; // Указана-ли страница в параметрах
// $page = is_numeric($page) && $page >= 1 ? min([$page, $pages]) : 1;  // Проверка на верность страницы и выхода за границы
// $_GET['page'] = $page; // Перезапись параметра
// $kolvo = $limit_num * ($total == 0 ? 1 : $page - 1); // Запись с которой взять из базы данных (начало таблицы)
// $limit = "LIMIT $kolvo, $limit_num"; // Подготовка строки лимита для запроса

$query = "SELECT * FROM `services_categories` $filter ORDER BY `id` ASC $limit";
$categories_res = mysqli_query($conn, $query);

$thisPage = renderTemplate('../../templates/site/admin/categories.template.php', ['total' => $total, 'result' => $categories_res]);
$thisLayout = renderTemplate('../../templates/layouts/app.template.php', ['brand' => $brand, 'email' => $email, 'content' => $thisPage]);

print $thisLayout;
