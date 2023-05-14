<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/global.inc.php';

$result = $dataTools->setBooking(
	$_SESSION['USER']['patient_surname'],
	$_SESSION['USER']['patient_name'],
	$_SESSION['USER']['patient_patronymic'],
	$_SESSION['USER']['phone'],
	$_POST['filial_id'],
	$_POST['service_id'],
	$_POST['doctor_id'],
	$_POST['date'],
	$_POST['time']
);

echo $result;
