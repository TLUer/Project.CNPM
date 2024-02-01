<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Trang chủ</title>
<link rel="icon" type="image/x-icon" href="../img/icon.PNG">
<style>
	* {
		margin: 0;
		padding: 0;
	}

	table{
		border-collapse: collapse;
	}
	table th, td{
		padding-left: 8px;
	}
	.header{
		background-color: #0A437F;
		color: white;
		margin: 0px;
		padding-top: 40px;
		height: 80px;
		position: relative;
		text-align: center;
	}
	.header>img{
		position: absolute;
		left: 15px;
		top: 20px;
	}
	.menu{
		width: 15%;
		float: left;
		text-align: center;
	}
	.menu .active{
		background-color: white;
		color: black;
	}
	ul{
		width: 100%;
		height: 600px;
		margin: 0px;
		padding: 0px;
		list-style-type: none;
	}
	li{
		background-color: #0A437F;
		height: 14.8%;
		border: solid 1px;
		margin: 0px;
		display: inline-block;
		width: 100%;
	}
	li>a{
		font-size: 20px;
		color: white;
		display:block;
		width: 100%;
		height: 100%;
		line-height: 89px;
	}
	.ql{
		width: 85%;
		margin: 0px;
		padding: 0px;
		overflow: auto;
	}
	.htql{
		width: 99%;
		margin: 5px;
		font-size: 16px;
	}
	a{
		text-decoration: none;
	}
	.them{
		height: 51px;
		width: 180px;
		margin: 0px;
		float: right;
		margin-top: 20px;
		margin-right: 12px;
		margin-bottom: 20px;
		border-radius: 7px;
		overflow: hidden;
	}
	.them>a{
		width: 100%;
		background-color: rgb(10,67,127);
		height: 100%;
		display: block;
		text-align: center;
		line-height: 51px;
		color: white;
	}
	.pt {
	  width: 800px;
	  margin: auto;
	  text-align: center;
	}
	.pagination {
	  width: 800px;
	  margin-left: 50px;
	}
	.pagination a {
	  display: block;
	  color: black;
	  float: left;
	  padding: 8px 16px;
	  text-decoration: none;
	  transition: background-color .3s;
	}

	.pagination a.active {
		background-color: #4CAF50;
		color: white;
	}

	.pagination a:hover:not(.active) {
	  background-color: #ddd;
	}
	h1.img{
		float: left;
	}
</style>
</head>

<body>
	<div class="tc">
		<div class="header">
			<img src="anh/lg.jpg" alt="" width="400" style="margin-left : 10px">
			<h1>
			Trang chủ quản trị</h1>
		</div>
		<?php
		include("../connect.php");
		include("menu.php");
		if(isset($_GET['cn']))
		{
			if($_GET['cn'] == "qldm")
				include("qldm/hienthidanhmuc.php");
			if($_GET['cn'] == "qlsp")
				include("qlsp/hienthisanpham.php");
			if($_GET['cn'] == "qlsize")
				include("qlsize/hienthisize.php");
			if($_GET['cn'] == "qlsize_sp")
				include("qlsize_sp/hienthisize_sp.php");
			if($_GET['cn'] == "qlsale")
				include("qlsale/hienthisale.php");
			if($_GET['cn'] == "qldh")
				include("qldh/hienthihoadon.php");
			if($_GET['cn'] == "qlkh")
				include("qlkh/hienthikhachhang.php");
			if($_GET['cn'] == "qltk")
				include("qltk/hienthitaikhoan.php");
		}
		else{
			include("qlsp/hienthisanpham.php");
		}
		?>
	</div>
</body>
</html>