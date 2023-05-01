<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/db.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/userTools.class.php';

$db = new Database('dentistry', 'root', '', '127.0.0.1');
$db->connect();

$authTools = new UserTools($db);

session_start();

// if (isset($_SESSION['USER'], $_SESSION['STAFF'])) {
//     session_regenerate_id();
//     if (isset($_SESSION['USER'])) {
//         $_SESSION['USER']['LAST_ACTIVITY'] = time();
//     }
//     if (isset($_SESSION['STAFF'])) {
//         $_SESSION['STAFF']['LAST_ACTIVITY'] = time();
//     }
// }
