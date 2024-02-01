<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="dangnhap.css">
</head>

<body> 	
	<?php
	require("../../connect.php");
	if(isset($_POST['submit']))
	{
		$u=$_POST['txtUsername'];
		$p=$_POST['txtPassword'];
		$vai_tro=1;
		// Create connection
		$conn = mysqli_connect("localhost", "root","", "shopbangiay");
		// Check connection
		$sql="select * from taikhoan where ten_dang_nhap='$u' && mat_khau='$p'";
		$r=mysqli_query($conn,$sql);
		if(mysqli_num_rows($r)>0 ){
			$check="select ten_dang_nhap from taikhoan where vai_tro='$vai_tro' && ten_dang_nhap='$u'";
			$q=mysqli_query($conn,$check);
			if(mysqli_num_rows($q)>0){
				echo"<script>alert('Đăng nhập thất bại')</script>";
			}
			else{
				header("location: ../trangchuad.php");
			}
		}
		else{
			echo"<script>alert('Đăng nhập thất bại')</script>";
		}
	}
	?>

    <div class="login-box">
  <h2>Đăng nhập Admin</h2>
  <form method="post">
    <div class="user-box">
      <input type="text" name="txtUsername" required="">
      <label>Tài khoản</label>
    </div>
    <div class="user-box">
      <input type="password" name="txtPassword" required="">
      <label>Mật khẩu</label>
    </div>
    <div class="submit">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <input type="submit" value="Đăng nhập" name="submit" class="btn">
    </div>
  </form>
</div>
    </body>
</html>
</body>
</html>