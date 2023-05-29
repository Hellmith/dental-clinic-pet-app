<?php session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/renderTemplate.php';

($conn = mysqli_connect('127.0.0.1', 'root', '', 'dentistry')) or die('Error: ' . mysqli_error($conn));

$query = "SELECT * FROM filials AS f WHERE f.id = " . $_SESSION['STAFF']['filial_id'];
$filial_data = mysqli_fetch_assoc(mysqli_query($conn, $query));

$thisPage = renderTemplate('../../templates/site/admin/statistics.template.php', [
    'total' => $total, 'result' => $services_result
]);
$thisLayout = renderTemplate('../../templates/layouts/app.template.php', [
    'brand' => $brand, 'email' => $email, 'content' => $thisPage
]);

print $thisLayout;
