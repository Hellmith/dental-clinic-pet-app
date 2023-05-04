<?php session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/global.inc.php';

if (isset($_GET['action']) && $_GET['action'] == "logout") {
    $result = $userTools->logout();
}
