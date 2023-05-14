<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/global.inc.php';

$result = $dataTools->setCity($POST['city_id']);

echo $result;