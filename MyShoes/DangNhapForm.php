<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng nhập</title>
<link rel="icon" type="image/x-icon" href="../img/icon.PNG">
<?php

  require "../connect.php";		$check = false;
	if(isset($_POST['submit'])){
		$u=$_POST['txtUsername'];
		$p=$_POST['txtPassword'];
		// Create connection
		// Check connection
		$sql="select * from taikhoan where ten_dang_nhap='$u' && mat_khau='$p'";
			$r=mysqli_query($conn,$sql);
			if(mysqli_num_rows($r)>0){
				$cookie_name = "user";
				$cookie_value = $u;
				setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
				header('location: ../index.php');
			}else $check = true;
		}
	?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="css/DangNhapForm.css">
</head>

<body>
	 <h1 style="text-align: center; margin-bottom: 20px; margin-top: 70px">Trang đăng nhập thành viên</h1>
     <section>
  <div class="container">
    <div class="form sign-in-form">
      <div class="wrapper">
        
      </div>
    </div>
    <div class="form sign-up-form active">
      <div class="wrapper">
        <form method="POST">
          <h1>Đăng Nhập</h1>
          <input type="text" name="txtUsername"  size="50" placeholder="Tài khoản" />
          <input type="password" name="txtPassword"  size="50" placeholder="Mật khẩu" />  
          <div class="submit">
              <input type="submit" name="submit" value="Đăng nhập" />
              <input type="reset" value="Nhập lại" />

          </div>
          <?php 
          			if($check){
                  echo "Sai thông tin đăng nhập!";
                }
          ?>
        </form>
      </div>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-left">
          <p>Chưa có tài khoản?</p>
          <button id="signInButton" onClick="dangki()">Đăng kí</button>
        </div>
        <div class="overlay-right">
        </div>
      </div>
    </div>
  </div>
</section>
	<script>
	function dangki(){
		window.location="Formdangki.php";
	}
	</script>
</body>
</html>