<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "shopbangiay";

$conn = mysqli_connect($host, $username, $password, $dbname);
if(!$conn)
	echo "Thất bại".mysqli_connect_error();
?>