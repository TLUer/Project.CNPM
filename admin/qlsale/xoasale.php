<?php
require("../../connect.php");
if(isset($_GET['id']))
{
	$id = $_GET['id'];
}
$sql = "DELETE FROM sale WHERE id = '$id'";
$query = mysqli_query($conn, $sql);
header("location: ../trangchuad.php?cn=qlsale")
?>