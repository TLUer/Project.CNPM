<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/hd.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <title>My Shop</title>
</head>

<body>
    <div class="header">
        <div class="header-contain">
            <div class="logo" onclick="TrangChu()">
                <img class="img_lg" src="img/lg.jpg" width="250" alt="">
            </div>
            <div class="search">
                <input type="text" name="search" class="tk">
                <button onClick="TimKiem()"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="login">
                <div class="main-login">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    <div class="account">
                        <?php
                        if (isset($_COOKIE["user"]))
                            echo "<p>Tài khoản</p><br><p>Chào " . $_COOKIE['user'] . "</p>\n";
                        else {
                            echo "<p>Tài khoản</p><br>";
                            echo "
                                <p>Đăng nhập/Đăng kí</p>";
                        }
                        ?>
                    </div>
                    <div class="sub-account">
                        <ul>
                            <?php
                            if (isset($_COOKIE["user"])) {
                                ?>
                                <li>
                                    <a href="/shopbangiay/MyShoes/dangxuat.php">
                                        <i class="fa-regular fa-user"></i>
                                        Đăng xuất
                                    </a>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li>
                                    <a href="/shopbangiay/MyShoes/DangNhapForm.php">

                                        <i class="fa-regular fa-user"></i>
                                        Đăng nhập
                                    </a>
                                </li>
                                <li>
                                    <a href="/shopbangiay/MyShoes/Formdangki.php">

                                        <i class="fa-solid fa-right-to-bracket"></i>
                                        Đăng kí
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>

                <div class="cart">
                    <div class="quatity"></div>
                    <i class="fa-solid fa-cart-shopping" onclick="GioHang()"></i>
                </div>
            </div>


        </div>
        <div class="nav">
            <ul class="">
                <?php
                $sql = "select * from danhmuc";
                $qrLayDM = mysqli_query($conn, $sql);
                ?>

                <?php
                while ($row = mysqli_fetch_array($qrLayDM)) {
                    ?>
                    <li class="tab-item"><a href="/shopbangiay/MyShoes/danhmcsanpham.php?iddm=<?= $row["id"] ?>"><?= $row["ten_danh_muc"] ?></a>
                    </li>
                <?php } ?>
                <li><a href="/shopbangiay/MyShoes/danhmcsanpham.php">Tất cả sản phẩm</a></li>
                <li><a href="/shopbangiay/MyShoes/thongtinlienhe.php">Liên hệ</a></li> 
                <li><a href="#">Blog</a></li> 
            </ul>
        </div>
    </div>

    <script>
        // Thêm lớp active cho phần tử được nhấp và lưu trạng thái vào localStorage
        var tabItems = document.querySelectorAll('.tab-item');
        tabItems.forEach(function (item) {
            item.addEventListener('click', function () {
                tabItems.forEach(function (tab) {
                    tab.classList.remove('active');
                });
                this.classList.add('active');
            });
        });




        function GioHang() {
            window.location = "/shopbangiay/Myshoes/giohang.php";
        }

        function TrangChu() {
            window.location = "/shopbangiay/index.php";
        }
        function TimKiem() {
            var giaTriTheInput = document.querySelector('.tk').value;
            window.location = "/shopbangiay/Myshoes/sanphamtk.php?name=" + giaTriTheInput;
        }
    </script>
</body>

</html>