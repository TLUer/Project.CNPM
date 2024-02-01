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
				<th>Tên đăng nhập</th>
				<th>Mật khẩu</th>
				<th>Vai trò</th>
				<th>Quản lí</th>
			</tr>
			<?php
			$sql = "SELECT * FROM taikhoan WHERE vai_tro = 1";
			$query = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_array($query)) {
				?>
				<tr>
					<td>
						<?php echo $row["ten_dang_nhap"] ?>
					</td>
					<td>
						<?php echo $row["mat_khau"] ?>
					</td>
					<td>
						<?php echo $row["vai_tro"] ?>
					</td>
					<td><a onclick="return confirm('Bạn có chắc muốn xóa?')"
							href="qltk/xoataikhoan.php?ten_dang_nhap=<?php echo $row["ten_dang_nhap"]; ?>">Xóa</a></td>
				</tr>
				<?php
			}
			?>
		</table>

</body>