<?php session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/renderTemplate.php';

($conn = mysqli_connect('127.0.0.1', 'root', '', 'dentistry')) or die('Error: ' . mysqli_error($conn));

$query =
    "SELECT * FROM filials AS f
WHERE f.id = " . $_SESSION['STAFF']['filial_id'];
$filial_data = mysqli_fetch_assoc(mysqli_query($conn, $query));

$filter = 'WHERE 1=1 and b.staff_id = ' . $_SESSION['STAFF']['id'];

$default_limit = 10;
$limit_num = !empty($_GET['limit']) && $_GET['limit'] >= 1 ? $_GET['limit'] : $default_limit;
$total = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM `bookings` AS b $filter"))[0];
$pages = ceil($total / $limit_num);
$page = !empty($_GET['page']) ? $_GET['page'] : 1;
$page = is_numeric($page) && $page >= 1 ? min([$page, $pages]) : 1;
$_GET['page'] = $page;
$kolvo = $limit_num * ($total == 0 ? 1 : $page - 1);
$limit = "LIMIT $kolvo, $limit_num";

$query =
    "SELECT res.phone as phone2, p.*  FROM
	(
		SELECT DISTINCT b.phone FROM `bookings` AS b
		$filter
	) AS res
LEFT JOIN patients AS p ON p.phone = res.phone
ORDER BY `patient_surname` ASC $limit";

$patients = mysqli_query($conn, $query);

$thisPage = renderTemplate('../../templates/site/doctor/patients.template.php', ['total' => $total, 'patients' => $patients]);
$thisLayout = renderTemplate('../../templates/layouts/app.template.php', ['brand' => $brand, 'email' => $email, 'content' => $thisPage]);

print $thisLayout;
