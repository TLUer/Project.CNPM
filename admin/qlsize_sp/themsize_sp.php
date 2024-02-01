<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>THÊM SẢN PHẨM</title>
</head>

<body>
	<?php
	require("../../connect.php");
	if(isset($_POST['submit']))
	{
		$idsp = $_POST['idsp'];
		$idsize = $_POST['idsize'];
		$sl = $_POST['sl'];
		if($sl == "")
			echo "Vui lòng nhập số lượng còn";
		if($sl != "")
		{
			$sql = "INSERT INTO size_sp VALUES($idsp,$idsize,$sl)";
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
			<tr><th colspan="2" align="center"><h1>Thêm size sản phẩm mới</h1></th></tr>
			<tr>
				<td>Tên sản phẩm: </td>
				<td><select name="idsp">
					<?php
					$sql = "SELECT * FROM sanpham";
					$query = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_array($query)){
					?>
					<option value="<?php echo $row['id']?>"><?php echo $row["ten_san_pham"]; ?></option>
					<?php
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Loại size: </td>
				<td><select name="idsize">
					<?php
					$sql = "SELECT * FROM size";
					$query = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_array($query)){
					?>
					<option value="<?php echo $row['id']?>"><?php echo $row["loai_size"]; ?></option>
					<?php
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Số lượng còn</td>
				<td><input type="number" name="sl"></td>
			</tr>
			
			<tr><td colspan="2" align="center"><input type="submit" name="return" value="Trở lại"> <input type="submit" name="submit" value="Thêm"></td></tr>
		</table>
	</form>
</body>
</html>