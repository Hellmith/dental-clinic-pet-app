<?php session_start(); 

$conn = mysqli_connect("127.0.0.1", "root", "", "dentistry") or die("Error: " . mysqli_error($conn));

$query =
"SELECT * FROM staffs AS st
LEFT JOIN jobs AS j ON st.job_id = j.id
WHERE j.job_name != 'Администратор' && j.job_name != 'Директор' && st.filial_id =".$_POST['filial_id'];

$res = mysqli_query($conn, $query);
$doctors = mysqli_fetch_all($res, MYSQLI_ASSOC);

echo json_encode($doctors, JSON_UNESCAPED_UNICODE);