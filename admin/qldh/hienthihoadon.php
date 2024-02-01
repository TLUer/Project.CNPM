<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<div class="ql">
		<table class="htql" border="1">
			<tr>
				<th>Mã hóa đơn</th>
				<th>Ngày tạo</th>
				<th>Hình thức thanh toán</th>
				<th>Hình thức vận chuyển</th>
				<th>Địa chỉ nhận</th>
				<th>Tình trạng</th>
				<th>Tên khách hàng</th>
				<th>Quản lý</th>
			</tr>
		<?php
		$sql = "SELECT hoadon.id, ngay_tao, hinh_thuc_thanh_toan, hinh_thuc_van_chuyen, dia_chi_nhan, tinh_trang, hoadon.idKH, ho_ten FROM hoadon INNER JOIN khachhang ON hoadon.idKH = khachhang.id";
		$query = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($query)){
		?>
			<tr>
				<td><?php echo $row["id"]?></td>
				<td><?php echo $row["ngay_tao"]?></td>
				<td><?php echo $row["hinh_thuc_thanh_toan"]?></td>
				<td><?php echo $row["hinh_thuc_van_chuyen"]?></td>
				<td><?php echo $row["dia_chi_nhan"]?></td>
				<td><?php echo $row["tinh_trang"]?></td>
				<td><?php echo $row["ho_ten"]?></td>
				<td><a href="qldh/chitiethoadon.php?id=<?php echo $row["id"]; ?>">Chi tiết hóa đơn</a></td>
			</tr>
		<?php
		}
		?>
		</table>
	</div>
</body>
