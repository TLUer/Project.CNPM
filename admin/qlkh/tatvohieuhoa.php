<?php
require("../../connect.php");
if(isset($_GET['ten_dang_nhap']))
{
	$tdn = $_GET['ten_dang_nhap'];
}
$sql = "UPDATE khachhang SET status = 1 WHERE ten_dang_nhap = '$tdn'";
$query = mysqli_query($conn, $sql);
header("location: ../trangchuad.php?cn=qlkh")
?>