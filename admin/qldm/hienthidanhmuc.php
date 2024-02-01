<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>quản lí danh mục</title>
</head>

<body>
	<div class="ql">
		<p align="right" class="them"><a href="qldm/themdanhmuc.php">Thêm danh mục mới</a></p>
		<table class="htql" border="1">
			<tr>
				<th>Mã danh mục</th>
				<th>Tên danh mục</th>
				<th>Quản lý</th>
			</tr>
		<?php
		
		$sql = "SELECT * FROM danhmuc ORDER BY id DESC";
		$query = mysqli_query($conn, $sql);
		$rows = mysqli_num_rows($query);
		while($row = mysqli_fetch_array($query)){
		?>
			<tr>
				<td><?php echo $row["id"]?></td>
				<td><?php echo $row["ten_danh_muc"]?></td>
				<td align="center"><a href="qldm/suadanhmuc.php?id=<?php echo $row["id"]; ?>">Sửa</a><br><a onclick="return confirm('Bạn có chắc muốn xóa?')" href="qldm/xoadanhmuc.php?id=<?php echo $row["id"]; ?>">Xóa</a></td>
			</tr>
		<?php
		}
		?>
		</table>
		
	</div>
</body>
