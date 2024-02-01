<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tài Khoản</title>
</head>

<body>
<div class="ql">
		<table class="htql" border="1">
			<tr>
				<th>Mã khách hàng</th>
				<th>Họ tên</th>
				<th>Email</th>
				<th>Số điện thoại</th>
				<th>Địa chỉ</th>
				<th>Ngày sinh</th>
				<th>Trạng thái</th>
				<th>Tên đăng nhập</th>
				<th>Quản lí</th>
			</tr>
		<?php
		$sql = "SELECT * FROM khachhang ORDER BY id DESC";
		$query = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($query)){
		?>
			<tr>
				<td><?php echo $row["id"]?></td>
				<td><?php echo $row["ho_ten"]?></td>
				<td><?php echo $row["email"]?></td>
				<td><?php echo $row["so_dien_thoai"]?></td>
				<td><?php echo $row["dia_chi"]?></td>
				<td><?php echo $row["ngay_sinh"]?></td>
				<td><?php echo $row["status"]?></td>
				<td><?php echo $row["ten_dang_nhap"]?></td>
				<?php if($row["status"] == 1){?>
				<td><a href="qlkh/vohieutaikhoan.php?ten_dang_nhap=<?php echo $row["ten_dang_nhap"]; ?>">Vô hiệu hóa</a></td>
				<?php } ?>
				<?php if($row["status"] == 0){?>
				<td><a href="qlkh/tatvohieuhoa.php?ten_dang_nhap=<?php echo $row["ten_dang_nhap"]; ?>">Tắt vô hiệu hóa</a></td>
				<?php } ?>
			</tr>
		<?php
		}
		?>
		</table>
	</div>
	
</body>
