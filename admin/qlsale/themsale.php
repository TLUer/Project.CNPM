<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thêm khuyễn mãi</title>
</head>

<body>
	<?php
	require("../../connect.php");
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
			$sql = "INSERT INTO sale(ngay_bat_dau, ngay_ket_thuc, phan_tram) VALUES('$nbd','$nkt',$pt)";
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
			<tr><th colspan="2" align="center"><h1>Thêm khuyễn mãi mới</h1></th></tr>
			<tr>
				<td>Ngày bắt đầu: </td>
				<td><input name="nbd" type="date"></td>
			</tr>
			<tr>
				<td>Ngày kết thúc: </td>
				<td><input name="nkt" type="date"></td>
			</tr>
			<tr>
				<td>Phần trăm</td>
				<td><input name="pt" type="text"></td>
			</tr>
			<tr><td colspan="2" align="center"><input type="submit" name="return" value="Trở lại"> <input type="submit" name="submit" value="Thêm"></td></tr>
		</table>
	</form>
</body>
</html>