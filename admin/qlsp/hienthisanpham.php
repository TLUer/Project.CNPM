<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<div class="ql">
		<p align="right"  class="them"><a href="qlsp/themsanpham.php">Thêm sản phẩm mới</a></p>
		<table border="1" class="htql">
			<tr>
				<th>Mã sản phẩm</th>
				<th>Tên sản phẩm</th>
				<th>Giá</th>
				<th>Hình ảnh</th>
				<th>Mô tả</th>
				<th>Tên danh muc</th>
				<th>Sale</th>
				<th>Quản lý</th>
			</tr>
		<?php
		$sql = "SELECT sanpham.id, ten_san_pham, gia, hinh_anh,mo_ta, ten_danh_muc, phan_tram  FROM sanpham INNER JOIN danhmuc ON sanpham.idDM = danhmuc.id INNER JOIN sale ON sanpham.idSale = sale.id ORDER BY sanpham.id DESC";
		$query = mysqli_query($conn, $sql);
		$rows = mysqli_num_rows($query);
		$page = 1;
		if(isset($_GET['page'])){
			$page=$_GET['page'];
		}
		$items = 6;
		$pages = (int)($rows/$items);
		if($pages<($rows/$items))
		   $pages = $pages + 1;
		if($page<1)
			$page = 1;
		if($page>=$pages)
			$page=$pages;
		$t = $page;
		$vitri = ($page*$items)-$items;
		$sql2 = "SELECT sanpham.id, ten_san_pham, gia, hinh_anh,mo_ta, ten_danh_muc, phan_tram  FROM sanpham INNER JOIN danhmuc ON sanpham.idDM = danhmuc.id INNER JOIN sale ON sanpham.idSale = sale.id ORDER BY sanpham.id DESC LIMIT $vitri,$items";
		$query2 = mysqli_query($conn, $sql2);
		while($row = mysqli_fetch_array($query2)){
		?>
			<tr>
				<td><?php echo $row["id"]?></td>
				<td><?php echo $row["ten_san_pham"]?></td>
				<td><?php echo $row["gia"]?></td>
				<td align="center"><img src="qlsp/anh/<?php echo $row["hinh_anh"]?>" width="100px"></td>
				<td><?php echo $row["mo_ta"]?></td>
				<td><?php echo $row["ten_danh_muc"]?></td>
				<td><?php echo $row["phan_tram"]?></td>
				<td><a href="qlsp/suasanpham.php?id=<?php echo $row["id"]; ?>">Sửa</a><br><a onclick="return confirm('Bạn có chắc muốn xóa?')" href="qlsp/xoasanpham.php?id=<?php echo $row["id"]; ?>">Xóa</a></td>
			</tr>
		<?php
		}
		?>
		</table>
		<div class="pt">
			<div class="pagination" align="center">
				<a href="trangchuad.php?cn=qlsp&&page=1">&lsaquo;&lsaquo;</a>
				<a href="trangchuad.php?cn=qlsp&&page=<?php echo ($t-1); ?>">&lsaquo;</a>
				<?php
					for($i=1;$i<=$pages;$i++){
				?>
				<a href="trangchuad.php?cn=qlsp&&page=<?php echo $i; ?>"><?php echo $i; ?></a>	
				<?php
					}
				?>
				<a href="trangchuad.php?cn=qlsp&&page=<?php echo ($t+1); ?>">&rsaquo;</a>
				<a href="trangchuad.php?cn=qlsp&&page=<?php echo $pages; ?>">&rsaquo;&rsaquo;</a>
			</div>
		</div>
	</div>
	
</body>
