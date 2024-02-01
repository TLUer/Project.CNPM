<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SỬA DANH MỤC</title>
</head>

<body>
	<?php
	require("../../connect.php");
	if(isset($_GET['idsp']) && isset($_GET['idsize'])){
		$idsp = $_GET['idsp'];
		$idsize = $_GET['idsize'];
	}
	$sql = "SELECT * FROM size_sp INNER JOIN sanpham ON size_sp.idSP = sanpham.id INNER JOIN size ON size_sp.idSize = size.id WHERE size_sp.idSP = $idsp AND size_sp.idSize = $idsize";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query);
	if(isset($_POST['submit']))
	{
		$sl = $_POST['sl'];
		if($sl == "")
			echo "Vui lòng nhập số lượng còn";
		if($sl != "")
		{
			$sql = "UPDATE size_sp SET so_luong_con = $sl WHERE idSP = $idsp AND idSize = $idsize";
			$query = mysqli_query($conn,$sql);
			header("location: ../trangchuad.php?cn=qlsize_sp");
		}	
	}
	if(isset($_POST['return'])){
		header("location: ../trangchuad.php?cn=qlsize_sp");
	}
	?>
	<form method="post" action="">
		<table border="1">
			<tr><th colspan="2" align="center"><h1>Sửa size sản phẩm mới</h1></th></tr>
			<tr>
				<td>Tên sản phẩm: </td>
				<td>
					<?php echo $row["ten_san_pham"]; ?>
				</td>
			</tr>
			<tr>
				<td>Loại size: </td>
				<td>
					<?php echo $row["loai_size"]; ?>
				</td>
			</tr>
			<tr>
				<td>Số lượng còn</td>
				<td><input type="number" name="sl" value="<?php echo $row["so_luong_con"];?>"></td>
			</tr>
			
			<tr><td colspan="2" align="center"><input type="submit" name="return" value="Trở lại"> <input type="submit" name="submit" value="Sửa"></td></tr>
		</table>
	</form>
</body>
</html>