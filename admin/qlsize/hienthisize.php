<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<div class="ql">
		<p align="right"  class="them"><a href="qlsize/themsize.php">Thêm loại size mới</a></p>
		<table class="htql" border="1">
			<tr>
				<th>Mã size</th>
				<th>Loại size</th>
				<th>Quản lý</th>
			</tr>
		<?php
		$sql = "SELECT * FROM size ORDER BY id DESC";
		$query = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($query)){
		?>
			<tr>
				<td><?php echo $row["id"]?></td>
				<td><?php echo $row["loai_size"]?></td>
				<td><a href="qlsize/suasize.php?id=<?php echo $row["id"]; ?>">Sửa</a><br><a onclick="return confirm('Bạn có chắc muốn xóa?')" href="qlsize/xoasize.php?id=<?php echo $row["id"]; ?>">Xóa</a></td>
			</tr>
		<?php
		}
		?>
		</table>
	</div>
	
</body>
