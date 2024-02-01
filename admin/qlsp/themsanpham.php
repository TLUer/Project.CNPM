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
			echo "Vui lòng chọn hình ảnh";
		if($mt == "")
			echo "Vui lòng nhập mô tả";
		if($tsp != "" && $g != "" && $hinhanh != "" && $mt !="" && $iddm != "")
		{
			if($_FILES['ha']['type'] != 'image/jpeg' && $_FILES['ha']['type'] != 'imgae/jpg' && $_FILES['ha']['type']!= 'image/png')
				echo "Chỉ hỗ trợ file ảnh jpeg/jpg/png";
			else
			{
				move_uploaded_file($hinhanh_tmp,$target);
				$sql = "INSERT INTO sanpham(ten_san_pham, gia, hinh_anh, mo_ta, idDM, idSale) VALUES('$tsp',$g,'$hinhanh','$mt',$iddm,$idsale)";
				$query = mysqli_query($conn,$sql);
				header("location: ../trangchuad.php?cn=qlsp");
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
			<tr>
				<td>Tên sản phẩm: </td>
				<td><input name="tsp" type="text"></td>
			</tr>
			<tr>
				<td>Giá: </td>
				<td><input name="g" type="text"></td>
			</tr>
			<tr>
				<td>Hình ảnh: </td>
				<td><input name="ha" type="file"></td>
			</tr>
			<tr>
				<td>Mô tả: </td>
				<td><textarea name="mt" rows="10" cols="30"></textarea></td>
			</tr>
			<tr>
				<td>Tên danh mục: </td>
				<td><select name="iddm">
					<?php
					$sql = "SELECT * FROM danhmuc";
					$query = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_array($query)){
					?>
					<option value="<?php echo $row['id']?>"><?php echo $row["ten_danh_muc"]; ?></option>
					<?php
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Sale: </td>
				<td><select name="idsale">
					<option value=""></option>
					<?php
					$sql = "SELECT * FROM sale";
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
			
			<tr><td colspan="2" align="center"><input type="submit" name="return" value="Trở lại"> <input type="submit" name="submit" value="Thêm"></td></tr>
		</table>
	</form>
</body>
</html>