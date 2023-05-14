<?php

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/global.inc.php';

$dataTools->setCity($POST['city_id']);
