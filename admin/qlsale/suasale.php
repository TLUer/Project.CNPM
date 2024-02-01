<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SỬA DANH MỤC</title>
</head>

<body>
	<?php
	require("../../connect.php");
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}
	$sql = "SELECT * FROM sale WHERE id = $id";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query);
	if(isset($_POST['submit']))
	{
		$nbd = $_POST['nbd'];
		$nkt = $_POST['nkt'];
		$pt = $_POST['pt'];
		if($nbd == "")
			echo "Vui lòng nhập ngày bắt đầu";
		if($nkt == "")
			echo "Vui lòng nhập ngày kết thúc";
		if($pt == "")
			echo "Vui lòng nhập phần trăm";
		if($nbd != "" && $nkt != "" && $pt != "")
		{
			$sql = "UPDATE sale SET ngay_bat_dau = '$nbd', ngay_ket_thuc = '$nkt', phan_tram = $pt WHERE id = $id";
			$query = mysqli_query($conn,$sql);
			header("location: ../trangchuad.php?cn=qlsale");
		}
	}
	if(isset($_POST['return'])){
		header("location: ../trangchuad.php?cn=qlsale");
	}
	?>
	<form method="post" action="">
		<table border="1">
			<tr><th colspan="2" align="center"><h1>Sửa khuyễn mãi</h1></th></tr>
			<tr>
				<td>Ngày bắt đầu: </td>
				<td><input name="nbd" type="date" value="<?php echo $row["ngay_bat_dau"]?>"></td>
			</tr>
			<tr>
				<td>Ngày kết thúc: </td>
				<td><input name="nkt" type="date" value="<?php echo $row["ngay_ket_thuc"]?>">></td>
			</tr>
			<tr>
				<td>Phần trăm</td>
				<td><input name="pt" type="text" value="<?php echo $row["phan_tram"]?>">></td>
			</tr>
			<tr><td colspan="2" align="center"><input type="submit" name="return" value="Trở lại"> <input type="submit" name="submit" value="Sửa"></td></tr>
		</table>
	</form>
</body>
</html>