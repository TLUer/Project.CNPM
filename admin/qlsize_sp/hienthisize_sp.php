<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<div class="ql">
		<p align="right"  class="them"><a href="qlsize_sp/themsize_sp.php">Thêm loại size mới cho sản phẩm</a></p>
		<table class="htql" border="1">
			<tr>
				<th>Tên sản phẩm</th>
				<th>Loại size</th>
				<th>Số lượng còn</th>
				<th>Quản lý</th>
			</tr>
		<?php
		$sql = "SELECT * FROM size_sp INNER JOIN sanpham ON size_sp.idSP = sanpham.id INNER JOIN size ON size_sp.idSize = size.id";
		$query = mysqli_query($conn, $sql);
		$rows = mysqli_num_rows($query);
		$page = 1;
		if(isset($_GET['page'])){
			$page=$_GET['page'];
		}
		$items = 18;
		$pages = (int)($rows/$items);
		if($pages<($rows/$items))
		   $pages = $pages + 1;
		if($page<1)
			$page = 1;
		if($page>=$pages)
			$page=$pages;
		$t = $page;
		$vitri = ($page*$items)-$items;
		$sql2 = "SELECT * FROM size_sp INNER JOIN sanpham ON size_sp.idSP = sanpham.id INNER JOIN size ON size_sp.idSize = size.id LIMIT $vitri,$items";
		$query2 = mysqli_query($conn, $sql2);
		while($row = mysqli_fetch_array($query2)){
		?>
			<tr>
				<td><?php echo $row["ten_san_pham"]?></td>
				<td><?php echo $row["loai_size"]?></td>
				<td><?php echo $row["so_luong_con"]?></td>
				<td><a href="qlsize_sp/suasize_sp.php?idsp=<?php echo $row["idSP"]; ?> && idsize=<?php echo $row["idSize"]; ?> ">Sửa</a><br><a onclick="return confirm('Bạn có chắc muốn xóa?')" href="qlsize_sp/xoasize_sp.php?idsp=<?php echo $row["idSP"]; ?> && idsize=<?php echo $row["idSize"]; ?> ">Xóa</a></td>
			</tr>
		<?php
		}
		?>
		</table>
		<div class="pt">
			<div class="pagination" align="center">
				<a href="trangchuad.php?cn=qlsize_sp&&page=1">&lsaquo;&lsaquo;</a>
				<a href="trangchuad.php?cn=qlsize_sp&&page=<?php echo ($t-1); ?>">&lsaquo;</a>
				<?php
					for($i=1;$i<=$pages;$i++){
				?>
				<a href="trangchuad.php?cn=qlsize_sp&&page=<?php echo $i; ?>"><?php echo $i; ?></a>	
				<?php
					}
				?>
				<a href="trangchuad.php?cn=qlsize_sp&&page=<?php echo ($t+1); ?>">&rsaquo;</a>
				<a href="trangchuad.php?cn=qlsize_sp&&page=<?php echo $pages; ?>">&rsaquo;&rsaquo;</a>
			</div>
		</div>
	</div>
	
</body>
