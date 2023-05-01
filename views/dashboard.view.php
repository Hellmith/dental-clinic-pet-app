<?php session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/renderTemplate.php';

$thisPage = renderTemplate('../templates/site/dashboard.template.php', []);
$thisLayout = renderTemplate('../templates/layouts/app.template.php', ['content' => $thisPage]);

print $thisLayout;
