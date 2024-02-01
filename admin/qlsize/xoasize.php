<?php
require("../../connect.php");
if(isset($_GET['id']))
{
	$id = $_GET['id'];
}
$query = mysqli_query($conn, "DELETE FROM size_sp WHERE idSize = '$id'");
$sql = "DELETE FROM size WHERE id = '$id'";
$query = mysqli_query($conn, $sql);
header("location: ../trangchuad.php?cn=qlsize")
?>