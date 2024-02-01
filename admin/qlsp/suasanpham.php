<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SỬA SẢN PHẨM</title>
</head>

<body>
	<?php
	require("../../connect.php");
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}
	if(isset($_POST['submit']))
	{
		$tsp = $_POST['tsp'];
		$g = $_POST['g'];
    	$hinhanh = $_FILES['ha']['name'];
    	$hinhanh_tmp = $_FILES['ha']['tmp_name'];
		$target = "anh/".basename($hinhanh);
		$mt = $_POST['mt'];
		$iddm = $_POST['iddm'];
		$idsale = $_POST['idsale'];
		if($tsp == "")
			echo "Vui lòng nhập tên sản phẩm";
		if($g == "")
			echo "Vui lòng nhập giá";
		if($hinhanh == "")
		{
			$sql = "UPDATE sanpham SET ten_san_pham = '$tsp',gia = $g,mo_ta='$mt', idDM = '$iddm', idSale = '$idsale' WHERE id = $id";
			$query = mysqli_query($conn,$sql);
			header("location: ../trangchuad.php?cn=qlsp");
		}
		else
		{
			if($_FILES['ha']['type']== 'image/jpeg'||$_FILES['ha']['type']== 'imgae/jpg'||$_FILES['ha']['type']== 'image/png')
				echo "Chỉ hỗ trợ file ảnh jpeg/jpg/png";
			else
			{
				move_uploaded_file($hinhanh_tmp,$target);
				if($tsp != "" && $g != "" && $hinhanh != "" && $iddm != "" && $idsale !="")
				{
					$sql = "UPDATE sanpham SET ten_san_pham = '$tsp',gia = $g,hinh_anh = '$hinhanh',mo_ta='$mt', idDM = '$iddm', idSale = '$idsale' WHERE id = $id";
					$query = mysqli_query($conn,$sql);
					header("location: ../trangchuad.php?cn=qlsp");
				}
			}
			
		}
		
	}
	if(isset($_POST['return'])){
		header("location: ../trangchuad.php?cn=qlsp");
	}
	?>
	<form method="post" action="" enctype="multipart/form-data">
		<table border="1">
			<tr><th colspan="2" align="center"><h1>Thêm sản phẩm mới</h1></th></tr>
			<?php
				$sql = "SELECT * FROM sanpham WHERE id = $id";
				$query = mysqli_query($conn, $sql);
				$row = mysqli_fetch_array($query);
			?>
			<tr>
				<td>Tên sản phẩm: </td>
				<td><input name="tsp" type="text" value="<?php echo $row["ten_san_pham"]; ?>"></td>
			</tr>
			<tr>
				<td>Giá: </td>
				<td><input name="g" type="text" value="<?php echo $row["gia"]; ?>"></td>
			</tr>
			<tr>
				<td>Hình ảnh: </td>
				<td><input name="ha" type="file"><br><img src="../qlsp/anh/<?php echo $row["hinh_anh"]; ?>" width="100px"></td>
			</tr>
			<tr>
				<td>Mô tả: </td>
				<td><textarea name="mt" rows="10" cols="30"><?php echo $row["mo_ta"]; ?></textarea></td>
			</tr>
			<tr>
				<td>Tên danh mục: </td>
				<td><select name="iddm">
					<?php
					$iddm = $row["idDM"];
					$sql = "SELECT * FROM danhmuc WHERE id = $iddm";
					$query = mysqli_query($conn, $sql);
					$row1 = mysqli_fetch_array($query)
					?>
					<option value="<?php echo $row1['id']?>"><?php echo $row1["ten_danh_muc"]; ?></option>
					<?php
					$sql = "SELECT * FROM danhmuc WHERE id <> $iddm";
					$query = mysqli_query($conn, $sql);
					while($row2 = mysqli_fetch_array($query)){
					?>
					<option value="<?php echo $row2['id']?>"><?php echo $row2["ten_danh_muc"]; ?></option>
					<?php
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Sale: </td>
				<td><select name="idsale">
					<?php
					$idsale = $row["idSale"];
					$sql = "SELECT * FROM sale WHERE id = $idsale";
					$query = mysqli_query($conn, $sql);
					$row1 = mysqli_fetch_array($query)
					?>
					<option value="<?php echo $row1['id']?>"><?php echo $row1["phan_tram"]; ?></option>
					<?php
					$sql = "SELECT * FROM sale WHERE id <> $idsale";
					$query = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_array($query)){
					?>
					<option value="<?php echo $row['id']?>"><?php echo $row["phan_tram"]; ?></option>
					<?php
					}
					?>
					</select>
				</td>
			</tr>			
			<tr><td colspan="2" align="center"><input type="submit" name="return" value="Trở lại"> <input type="submit" name="submit" value="Sửa"></td></tr>
		</table>
	</form>
</body>
</html>