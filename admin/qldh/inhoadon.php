<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
	.hoadon{
		border: solid 1px;
		width: 500px;
	}	
	.duyet{
		width: 500px;
		margin: 10px;
	}
	.duyet>a{
		list-style-type: none;
		font-size: 20px;
		border: solid 1px;
		margin: 5px;
		padding: 5px;
		text-decoration: none;
	}
</style>
</head>

<body>
	<div class = "hoadon">
		<?php
		require("../../connect.php");
		if(isset($_GET['id'])){
			$id = $_GET['id'];
		}
		?>
		<h1 align="center">Hóa đơn</h1>
		<p>Tên cửa hàng</p>
		<p>Địa chỉ</p>
		<p>Thông tin liên hệ</p>
		<?php
			$sql = "SELECT hoadon.id, ngay_tao, hinh_thuc_thanh_toan, hinh_thuc_van_chuyen, dia_chi_nhan, tinh_trang, hoadon.idKH, ho_ten FROM hoadon INNER JOIN khachhang ON hoadon.idKH = khachhang.id WHERE hoadon.id = $id";
			$query = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($query);
			$vc = 20000;					
				if (isset($row['hinh_thuc_van_chuyen']) && $row['hinh_thuc_van_chuyen'] != 'Tiết kiệm - 20.000đ') {
					$vc = 60000;
				}	
		?>
		 <p>Hình thức vận chuyển: <?php echo $row['hinh_thuc_van_chuyen']?> </p>
		<p>Người mua hàng:<?php echo $row["ho_ten"]; ?></p>
		<p>Địa chỉ nhận:<?php echo $row["dia_chi_nhan"]; ?></p>
		<table border="1" align="center">
			<tr>
				<th>STT</th>
				<th>Tên sản phẩm</th>
				<th>Size</th>
				<th>Số lượng</th>
				<th>Đơn giá</th>
				<th>Giảm giá</th>
				<th>Thành tiền</th>
			</tr>
			<?php
			$sql = "SELECT ten_san_pham, loai_size, so_luong_mua, gia, phan_tram FROM chitiethoadon INNER JOIN hoadon ON chitiethoadon.idHD = hoadon.id INNER JOIN sanpham ON chitiethoadon.idSP = sanpham.id INNER JOIN size ON chitiethoadon.idSize = size.id INNER JOIN sale ON sanpham.idSale = sale.id WHERE chitiethoadon.idHD = $id";
			$query = mysqli_query($conn, $sql);
			$t;
			$i=1; 
			while($row = mysqli_fetch_array($query)){
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $row["ten_san_pham"]?></td>
				<td><?php echo $row["loai_size"]?></td>
				<td><?php echo $row["so_luong_mua"]?></td>
				<td><?php echo $row["gia"]?></td>
				<td><?php echo $row["phan_tram"]?></td>
				<td><?php $t[$i-1] = $row["gia"]*$row["so_luong_mua"]*(100 - $row["phan_tram"])/100;  echo $row["gia"]*$row["so_luong_mua"]*(100 - $row["phan_tram"])/100 ; ?></td>
			</tr>
			<?php
			 $i++;
			}
			$tien = 0;
			?>
			<tr>
				<td colspan="5" align="center">Tổng tiền:</td>
				<td colspan="2"><?php foreach($t as $a){ $tien += $a;} echo $tien +$vc; ?></td>
			</tr>
		</table>
		
		<button onClick="xoa(<?=$id?>)" id="inhd">IN</button>
		<script>
			let x = document.getElementById('inhd');
			function xoa(id){
				x.style.display = "none";
				window.print();
				window.location = "chitiethoadon.php?id=" + id;
				x.style.display = "block";
			}
		</script>
	</div>
	</body>
</html>