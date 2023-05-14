<?php session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/renderTemplate.php';

$conn = mysqli_connect("127.0.0.1", "root", "", "dentistry") or die("Error: " . mysqli_error($conn));

if (isset($_SESSION['CITY'])) {
    echo 'Город есть';
} else {
    echo 'Города нет';
}


$filter = "WHERE 1=1 and b.phone = '" . $_SESSION['USER']['phone'] . "'";

$default_limit = 10;
$limit_num = !empty($_GET['limit']) && $_GET['limit'] >= 1 ? $_GET['limit'] : $default_limit;
$total = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM `bookings` AS b $filter"))[0];
$pages = ceil($total / $limit_num);
$page = !empty($_GET['page']) ? $_GET['page'] : 1;
$page = is_numeric($page) && $page >= 1 ? min([$page, $pages]) : 1;
$_GET['page'] = $page;
$kolvo = $limit_num * ($total == 0 ? 1 : $page - 1);
$limit = "LIMIT $kolvo, $limit_num";

$query =
    "SELECT b.*, st.staff_name, st.staff_surname, st.staff_patronymic, se.service_title, f.filial_title, f.street_name
FROM `bookings` AS b
LEFT JOIN `staffs` AS st ON b.staff_id = st.id
LEFT JOIN `services` AS se ON b.services_id = se.id
LEFT JOIN `filials` AS f ON b.filial_id = f.id
$filter
ORDER BY `date` ASC, `time` ASC $limit";
$bookings_result = mysqli_query($conn, $query);
$bookings = mysqli_num_rows($bookings_result);

if (isset($_POST['booking_form'])) {
    $query = "INSERT INTO
		`bookings` (`patient_surname`, `patient_name`, `patient_patronymic`, `phone`, `filial_id`, `services_id`, `staff_id`, `date`, `time`)
		VALUES ('$surname', '$name', '$patronymic', '$tel', '$_POST[filial]', '$_POST[service]', '$_POST[doctor]', '$_POST[date]', '$_POST[time]')";
    $res = mysqli_query($conn, $query);
}

if ($_SESSION['USER']) {
    $surname = $_SESSION['USER']['patient_surname'];
    $name = $_SESSION['USER']['patient_name'];
    $patronymic = $_SESSION['USER']['patient_patronymic'];
    $fullname = $surname . ' ' . $name . ' ' . $patronymic;

    $birthday = $_SESSION['USER']['birthday'];

    $serial = $_SESSION['USER']['passport_serial'];
    $number = $_SESSION['USER']['passport_number'];
    $issueDate = $_SESSION['USER']['passport_issue_date'];
    $issueOrg = $_SESSION['USER']['passport_issue_org'];
    $passportSerial = 'Серия/Номер: ' . $serial . ' ' . $number;

    $city = $_SESSION['USER']['city_id'];
    $street = $_SESSION['USER']['street_name'];
    $house = $_SESSION['USER']['house_number'];
    $flat = $_SESSION['USER']['flat_number'];

    $tel = $_SESSION['USER']['phone'];
    $email = $_SESSION['USER']['email'];

    $verified = $_SESSION['USER']['verified'];
} elseif ($_SESSION['STAFF']) {
    $surname = $_SESSION['STAFF']['staff_surname'];
    $name = $_SESSION['STAFF']['staff_name'];
    $patronymic = $_SESSION['STAFF']['staff_patronymic'];
    $fullname = $surname . ' ' . $name . ' ' . $patronymic;

    $birthday = $_SESSION['STAFF']['birthday'];

    $serial = $_SESSION['STAFF']['passport_serial'];
    $number = $_SESSION['STAFF']['passport_number'];
    $issueDate = $_SESSION['STAFF']['passport_issue_date'];
    $issueOrg = $_SESSION['STAFF']['passport_issue_org'];
    $passportSerial = 'Серия/Номер: ' . $serial . ' ' . $number;

    $city = $_SESSION['STAFF']['city_id'];
    $street = $_SESSION['STAFF']['street_name'];
    $house = $_SESSION['STAFF']['house_number'];
    $flat = $_SESSION['STAFF']['flat_number'];

    $tel = $_SESSION['STAFF']['phone'];
    $email = $_SESSION['STAFF']['email'];

    $verified = $_SESSION['STAFF']['verified'];
}

$thisPage = renderTemplate('../../templates/site/user/bookings.template.php', ['bookings_result' => $bookings_result, 'bookings' => $bookings]);
$thisLayout = renderTemplate('../../templates/layouts/app.template.php', ['brand' => $brand, 'email' => $email, 'tel' => $tel, 'content' => $thisPage]);

print $thisLayout;
