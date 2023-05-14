<?php session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/renderTemplate.php';

($conn = mysqli_connect('127.0.0.1', 'root', '', 'dentistry')) or die('Error: ' . mysqli_error($conn));

$query =
    "SELECT * FROM filials AS f
    WHERE f.id = " . $_SESSION['STAFF']['filial_id'];
$filial_data = mysqli_fetch_assoc(mysqli_query($conn, $query));

$filter = 'WHERE 1=1 and b.staff_id = ' . $_SESSION['STAFF']['id'];
if (!isset($_GET['date_filter'])) {
    $date = date('Y-m-d');
    $_GET['date_filter'] = $date;
    $filter .= " and b.date = '$date'";
} elseif (isset($_GET['date_filter']) && $_GET['date_filter'] != '') {
    $filter .= " and b.date = '$_GET[date_filter]'";
}

$default_limit = 10;
$limit_num = !empty($_GET['limit']) && $_GET['limit'] >= 1 ? $_GET['limit'] : $default_limit;
$total = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM `bookings` AS b $filter"))[0];
$pages = ceil($total / $limit_num);
$page = !empty($_GET['page']) ? $_GET['page'] : 1;
$page = is_numeric($page) && $page >= 1 ? min([$page, $pages]) : 1;
$_GET['page'] = $page;
$kolvo = $limit_num * ($total == 0 ? 1 : $page - 1);
$limit = "LIMIT $kolvo, $limit_num";

$query = "SELECT b.*, se.service_title  FROM `bookings` AS b
LEFT JOIN `staffs` AS st ON b.staff_id = st.id
LEFT JOIN `services` AS se ON b.services_id = se.id
$filter
ORDER BY `time` ASC, `time` ASC $limit";
$result = mysqli_query($conn, $query);

$thisPage = renderTemplate('../../templates/site/doctor/shedules.template.php', ['total' => $total, 'result' => $result]);
$thisLayout = renderTemplate('../../templates/layouts/app.template.php', ['brand' => $brand, 'email' => $email, 'content' => $thisPage]);

print $thisLayout;
