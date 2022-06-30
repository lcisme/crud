<?php
$severName = "localhost";
$userName = "root";
$password = "";
$dbName = "t2108m";
// connect db
$conn = new mysqli($severName, $userName, $password, $dbName);
if ($conn->connect_error) {
    die($conn->connect_error);
}
$sql_txt = "delete from students where id=".$_GET["id"];
$stt = $conn->prepare($sql_txt);
$stt->execute();

header("Location: databaseDemo.php");
