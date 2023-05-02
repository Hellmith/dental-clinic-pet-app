<?php session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/global.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $patronymic = $_POST['patronymic'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $userTools->register($name, $surname, $patronymic, $phone, $email, $password);

    if ($result === 'Успешная регистрация!') {
        echo 'success';
    } else {
        echo $result;
    }
}
