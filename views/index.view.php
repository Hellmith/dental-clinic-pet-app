<?php session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/renderTemplate.php';

if (!empty($_SESSION['USER']) || !empty($_SESSION['STAFF'])) {
    if (session_status() == PHP_SESSION_ACTIVE && empty($_SESSION['USER']) && empty($_SESSION['STAFF'])) {
        header("Location: /dashboard");
        exit(0);
    }
}

$thisPage = renderTemplate('templates/site/index.template.php', ['brand' => $brand]);
$thisLayout = renderTemplate('templates/layouts/landing.template.php', ['brand' => $brand, 'content' => $thisPage]);

print $thisLayout;
