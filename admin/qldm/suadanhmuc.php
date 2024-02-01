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
	$sql = "SELECT * FROM danhmuc WHERE id = $id";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query);
	if(isset($_POST['submit']))
	{
		$tdm = $_POST['tdm'];
		if($tdm == "")
			echo "Vui lòng nhập tên danh mục";
		if($tdm != "")
		{
			$sql = "UPDATE danhmuc SET ten_danh_muc = '$tdm' WHERE id = '$id'";
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
			<tr><th colspan="2" align="center"><h1>Sửa danh mục</h1></th></tr>
			<tr>
				<td>Tên danh mục: </td>
				<td><input name="tdm" type="text" value="<?php echo $row["ten_danh_muc"]; ?>"></td>
			</tr>
			<tr><td colspan="2" align="center"><input type="submit" name="return" value="Trở lại"> <input type="submit" name="submit" value="Sửa"></td></tr>
			
		</table>
	</form>
</body>
</html>