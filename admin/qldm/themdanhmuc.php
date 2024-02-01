<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>THÊM DANH MỤC</title>
</head>

<body>
	<?php
	require("../../connect.php");
	if(isset($_POST['submit']))
	{
		$tdm = $_POST['tdm'];
		if($tdm == "")
			echo "Vui lòng nhập tên danh mục";
		if($tdm != "")
		{
			$sql = "INSERT INTO danhmuc(ten_danh_muc) VALUES('$tdm')";
			$query = mysqli_query($conn,$sql);
			header("location: ../trangchuad.php?cn=qldm");
		}
	}
	if(isset($_POST['return'])){
		header("location: ../trangchuad.php?cn=qldm");
	}
	?>
	<form method="post" action="">
		<table border="1">
			<tr><th colspan="2" align="center"><h1>Thêm danh mục mới</h1></th></tr>
			<tr>
				<td>Tên danh mục: </td>
				<td><input name="tdm" type="text"></td>
			</tr>
			<tr><td colspan="2" align="center"><input type="submit" name="return" value="Trở lại"> <input type="submit" name="submit" value="Thêm"></td></tr>
		</table>
	</form>
</body>
</html>