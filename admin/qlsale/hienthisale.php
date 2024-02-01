<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<div class="ql">
		<p align="right"  class="them"><a href="qlsale/themsale.php">Thêm khuyến mãi mới</a></p>
			<table class="htql" border="1">
			<tr>
				<th>Mã sale</th>
				<th>Ngày bắt đầu</th>
				<th>Ngày kết thúc</th>
				<th>Phần trăm</th>
				<th>Quản lí</th>
			</tr>
		<?php
		$sql = "SELECT * FROM sale ORDER BY id DESC";
		$query = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($query)){
		?>
			<tr>
				<td><?php echo $row["id"]?></td>
				<td><?php echo $row["ngay_bat_dau"]?></td>
				<td><?php echo $row["ngay_ket_thuc"]?></td>
				<td><?php echo $row["phan_tram"]?></td>
				<td><a href="qlsale/suasale.php?id=<?php echo $row["id"]; ?>">Sửa</a><br><a onclick="return confirm('Bạn có chắc muốn xóa?')" href="qlsale/xoasale.php?id=<?php echo $row["id"]; ?>">Xóa</a></td>
			</tr>
		<?php
		}
		?>
		</table>
	</div>
</body>
