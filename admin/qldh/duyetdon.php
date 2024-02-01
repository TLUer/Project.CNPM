<?php
require("../../connect.php");
if(isset($_GET['id']))
{
	$id = $_GET['id'];
}
$sql = "UPDATE hoadon SET tinh_trang = 'Đã duyệt' WHERE id = $id";
$query = mysqli_query($conn, $sql);
header("location: ../trangchuad.php?cn=qldh")
?>