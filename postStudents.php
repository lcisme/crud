<?php
if (!$_POST["email1"]){
    header("Location: addstudents.php");
}

$severName = "localhost";
$userName = "root";
$password = "";
$dbName = "t2108m";
// connect db
$conn = new mysqli($severName, $userName, $password, $dbName);
if ($conn->connect_error) {
    die($conn->connect_error);
}
$sql_txt = "insert into students(studentName,dateOfBirth,address,email,phoneNumber) values (?,?,?,?,?)";
$stt = $conn->prepare($sql_txt);
$stt ->bind_param("sssss",$name1,$date1,$address1,$email1,$phone1);

// set param and execute
$name1 = $_POST["name1"];
$date1 = $_POST["date1"];
$address1 = $_POST["address1"];
$email1 = $_POST["email1"];
$phone1 = $_POST["phone1"];
$stt->execute();

header("Location: databaseDemo.php");

