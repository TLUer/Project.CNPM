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
		$s = $_POST['size'];
		if($s == "")
			echo "Vui lòng nhập loại size";
		if($s != "")
		{
			$sql = "INSERT INTO size(loai_size) VALUES('$s')";
			$query = mysqli_query($conn,$sql);
			header("location: ../trangchuad.php?cn=qlsize");
		}
	}
	if(isset($_POST['return'])){
		header("location: ../trangchuad.php?cn=qlsize");
	}
	?>
	<form method="post" action="">
		<table border="1">
			<tr><th colspan="2" align="center"><h1>Thêm loại size mới</h1></th></tr>
			<tr>
				<td>Loại size: </td>
				<td><input name="size" type="text"></td>
			</tr>
			<tr><td colspan="2" align="center"><input type="submit" name="return" value="Trở lại"> <input type="submit" name="submit" value="Thêm"></td></tr>
		</table>
	</form>
</body>
</html>