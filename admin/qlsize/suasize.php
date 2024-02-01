<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SỬA SIZE</title>
</head>

<body>
	<?php
	require("../../connect.php");
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}
	$sql = "SELECT * FROM size WHERE id = $id";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query);
	if(isset($_POST['submit']))
	{
		$s = $_POST['size'];
		if($s == "")
			echo "Vui lòng nhập loại size";
		if($s != "")
		{
			$sql = "UPDATE size SET loai_size = '$s' WHERE id = '$id'";
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
			<tr><th colspan="2" align="center"><h1>Sửa loại size</h1></th></tr>
			<tr>
				<td>Tên loại size: </td>
				<td><input name="size" type="text" value="<?php echo $row["loai_size"]; ?>"></td>
			</tr>
			<tr><td colspan="2" align="center"><input type="submit" name="return" value="Trở lại"> <input type="submit" name="submit" value="Sửa"></td></tr>
			
		</table>
	</form>
</body>
</html>