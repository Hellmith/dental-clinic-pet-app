<?php session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/renderTemplate.php';

if ($_SESSION['USER']) {
    $email = $_SESSION['USER']['email'];
} elseif ($_SESSION['STAFF']) {
    $email = $_SESSION['STAFF']['email'];
}

$thisPage = renderTemplate('../templates/site/dashboard.template.php', []);
$thisLayout = renderTemplate('../templates/layouts/app.template.php', ['brand' => $brand, 'email' => $email, 'content' => $thisPage]);

print $thisLayout;
