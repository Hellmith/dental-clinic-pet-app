<?php require_once $root . '/utils/renderTemplate.php';

$thisPage = renderTemplate('templates/site/index.template.php', ['brand' => $brand]);
$thisLayout = renderTemplate('templates/layouts/landing.template.php', ['brand' => $brand, 'content' => $thisPage]);

print $thisLayout;
