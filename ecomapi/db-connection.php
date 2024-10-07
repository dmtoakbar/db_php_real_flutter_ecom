<?php
header("Access-Control-Allow-Origin: *");
error_reporting(0);
$sname = "localhost";

$uname = "root";
$password = "";
$db_name = "real_ecom_app";
$port = 3306;

$conn = mysqli_connect($sname, $uname, $password, $db_name,$port);



if (!$conn) {
	echo "Connection failed!".$conn;
	echo  mysqli_connect_error();
	exit();
}
?>