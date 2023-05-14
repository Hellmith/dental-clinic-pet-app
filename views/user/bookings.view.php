<?php session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/renderTemplate.php';

($conn = mysqli_connect('127.0.0.1', 'root', '', 'dentistry')) or die('Error: ' . mysqli_error($conn));

$filter = "WHERE 1=1 and b.phone = '" . $_SESSION['USER']['phone'] . "'";

$default_limit = 10;
$limit_num = !empty($_GET['limit']) && $_GET['limit'] >= 1 ? $_GET['limit'] : $default_limit;
$total = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM `bookings` AS b $filter"))[0];
$pages = ceil($total / $limit_num);
$page = !empty($_GET['page']) ? $_GET['page'] : 1;
$page = is_numeric($page) && $page >= 1 ? min([$page, $pages]) : 1;
$_GET['page'] = $page;
$kolvo = $limit_num * ($total == 0 ? 1 : $page - 1);
$limit = "LIMIT $kolvo, $limit_num";

$query = "SELECT b.*, st.staff_name, st.staff_surname, st.staff_patronymic, se.service_title, f.filial_title, f.street_name
FROM `bookings` AS b
LEFT JOIN `staffs` AS st ON b.staff_id = st.id
LEFT JOIN `services` AS se ON b.services_id = se.id
LEFT JOIN `filials` AS f ON b.filial_id = f.id
$filter
ORDER BY `date` ASC, `time` ASC $limit";
$bookings_result = mysqli_query($conn, $query);
$bookings = mysqli_num_rows($bookings_result);

$thisPage = renderTemplate('../../templates/site/user/bookings.template.php', ['bookings_result' => $bookings_result, 'bookings' => $bookings]);
$thisLayout = renderTemplate('../../templates/layouts/app.template.php', ['brand' => $brand, 'email' => $email, 'tel' => $tel, 'content' => $thisPage]);

print $thisLayout;
