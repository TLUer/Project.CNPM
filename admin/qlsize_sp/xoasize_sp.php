<?php
require("../../connect.php");
if(isset($_GET['idsp']) && isset($_GET['idsize'])){
		$idsp = $_GET['idsp'];
		$idsize = $_GET['idsize'];
}
$sql = "DELETE FROM size_sp WHERE idSP = $idsp AND idSize = $idsize";
$query = mysqli_query($conn, $sql);
header("location: ../trangchuad.php?cn=qlsize_sp")
?>