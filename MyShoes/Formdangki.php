<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng ký</title>
<link rel="icon" type="image/x-icon" href="../img/icon.PNG">
<?php 
	require "../connect.php";
	if(isset($_POST['submit']))
	{
		
		$username   = addslashes($_POST['txtUsername']);
		$password   = addslashes($_POST['txtPassword']);
		$email      = addslashes($_POST['txtEmail']);
		$fullname   = addslashes($_POST['txtFullname']);
		$birthday   = addslashes($_POST['txtBirthday']);
		$phone      =addslashes($_POST['txtphone']);
		$DiaChi     =addslashes($_POST['txtaddress']);
		$vai_tro =1;
		 //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
		if (!$username || !$password || !$email || !$fullname || !$birthday||!$phone||!$DiaChi)
		{
			echo "<script> alert('Vui lòng nhập đầy đủ thông tin');</script>";
		}
		//Kiểm tra tên đăng nhập này đã có người dùng chưa
		else if (mysqli_num_rows(mysqli_query($conn,"SELECT ten_dang_nhap FROM khachhang  WHERE ten_dang_nhap='$username'")) > 0){
			echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác";
		}
		 //Kiểm tra email đã có người dùng chưa
		else if (mysqli_num_rows(mysqli_query($conn, "SELECT email FROM khachhang WHERE email='$email'")) > 0)
		{
			echo "Email này đã có người dùng. Vui lòng chọn Email khác";
		}
		else
		{
			//Lưu thông tin thành viên vào bảng
		@$addtaikhoan = mysqli_query($conn,"
		INSERT INTO taikhoan(
		ten_dang_nhap,
		mat_khau,
		vai_tro
		) 
		VALUES(
		'$username',
		'$password',
		'$vai_tro'
		)
		");
		@$addkhachhang = mysqli_query($conn,"
			INSERT INTO khachhang (
			   ten_dang_nhap,
			   email,
			   ho_ten,
			   ngay_sinh,
			   status,
			   so_dien_thoai,
			   dia_chi
			)
			VALUES (
				'$username',
				'$email',
				'$fullname',
				'$birthday',
				1,
				'$phone',
				'$DiaChi'
			)
		");

		//Thông báo quá trình lưu
		if ($addkhachhang&&$addtaikhoan){
			$cookie_name = "user";
			$cookie_value = $username;
			setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
			header('location: ../index.php');
		}
		else
			echo "Có lỗi xảy ra trong quá trình đăng ký.";
		}
		
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="css/Formdangki.css">
</head>

<body>
	
	 <h1 style="text-align: center; margin-bottom: 20px; margin-top: 70px">Trang đăng ký thành viên</h1>
     <section>
  <div class="container">
    <div class="form sign-in-form">
      <div class="wrapper">
        
      </div>
    </div>
    <div class="form sign-up-form active">
      <div class="wrapper">
        <form method="POST">
          <h1>Đăng kí</h1>
          <p>Cung cấp đủ thông tin để đăng kí</p>
          <input type="text" name="txtUsername"  size="50" placeholder="Tài khoản" />
          <input type="password" name="txtPassword"  size="50" placeholder="Mật khẩu" />  
          <input type="text" name="txtEmail" size="50" placeholder="Email" />
          <input type="text" name="txtFullname" size="50" placeholder="Họ và tên" />
          <input type="date" name="txtBirthday" size="50" placeholder="Ngày sinh" />
          <input type="text" name="txtphone" size="50" placeholder="Số điện thoại" />
          <input type="text" name="txtaddress" size="50" placeholder="Địa chỉ"/>
          <select name="txtSex" class='select'>
                <option selected value="">Giới tính</option>
                <option value="Nam">Nam</option>
                <option value="Nu">Nữ</option>
          </select>

          <div class="submit">
              <input type="submit"  name="submit" value="Đăng ký" />
              <input type="reset" value="Nhập lại" />

          </div>
        </form>
      </div>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-left">
          <h1>Đăng kí tài khoản</h1>
          <p>hoặc</p>
          <button id="signInButton" onClick="dangnhap()">Đăng nhập</button>
        </div>
        <div class="overlay-right">
        </div>
      </div>
    </div>
  </div>
</section>
<script>
	function dangnhap(){
		window.location="DangNhapForm.php";
	}
	</script>
</body>
</html>