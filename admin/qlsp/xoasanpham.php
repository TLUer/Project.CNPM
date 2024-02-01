<?php
require("../../connect.php");
if(isset($_GET['id']))
{
	$id = $_GET['id'];
}
$que = mysqli_query($conn, "DELETE FROM size_sp WHERE idSP = '$id'");
$sql = "DELETE FROM sanpham WHERE id = '$id'";
$query = mysqli_query($conn, $sql);
header("location: ../trangchuad.php?cn=qlsp");
?>