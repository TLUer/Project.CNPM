<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/trangchu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="icon" type="image/x-icon" href="../img/icon.PNG">
    <title>Trang chủ</title>
</head>

<body>
    <div class="ads">
        <div>
            <a href="http://localhost/shopbangiay/MyShoes/danhmcsanpham.php?iddm=10">
                <img src="./img/banner2.jpg" width="300" height="400" alt="">
            </a>
        </div>
        <div>
            <a href="http://localhost/shopbangiay/MyShoes/danhmcsanpham.php?iddm=12">
                <img src="./img/banner.jpg" width="400" height="400" alt="">
            </a>
        </div>
        <div>
            <a href="http://localhost/shopbangiay/MyShoes/danhmcsanpham.php?iddm=11">
                <img src="./img/banner1.jpg" width="300" height="400" alt="">
            </a>
        </div>

    </div>

    <div class="infor">
        <table>
            <tr style="height: 120px;">
                <td style="width: 33.33%;">
                    <img src="./img/icon1_2.png" width="50px" height="50px" alt="">
                    <h3>GIAO HÀNG NHANH</h3>
                    <p>Giao hàng nhanh trong 1-2 ngày.</p>
                </td>
                <td style="width: 33.34%;">
                    <img src="./img/icon2_2.png" width="50px" height="50px" alt="">
                    <h3>CAM KẾT CHẤT LƯỢNG</h3>
                    <p>Hàng chính hãng 100%, fake đền gấp 10.</p>
                </td>
                <td style="width: 33.33%;">
                    <img src="./img/icon3_2.png" width="50px" height="50px" alt="">
                    <h3>HỖ TRỢ MUA HÀNG</h3>
                    <p>Tư vấn tận tình, hỗ trợ đổi hàng.</p>
                </td>
            </tr>
        </table>
    </div>

    <section>
        <div class="content">
            <div class="title">
                <h1>SẢN PHẨM MỚI</h1>
            </div>
            <div class="decript">
                #NEW
            </div>
            <div class="listPro">
                <?php
                $sql = "SELECT sanpham.id, hinh_anh, ten_san_pham, gia, phan_tram FROM sanpham INNER JOIN sale ON sanpham.idSale = sale.id ORDER BY sanpham.id DESC LIMIT 8";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query)) {
                    $gia = (100 - $row["phan_tram"]) / 100;
                    ?>
                    <div class="pro">
                        <img src="./admin/qlsp/anh/<?php echo $row["hinh_anh"]; ?>" alt="" class="imgFirst">
                        <img src="./admin/qlsp/anh/<?php echo $row["hinh_anh"]; ?>" alt="" class="imgSecond">
                        <p class="type">NEW</p>
                        <a href="/shopbangiay/MyShoes/chitietsanpham.php?idsp=<?php echo $row["id"]; ?>&soluong=1"
                            class="name"><?php echo $row["ten_san_pham"]; ?></a>
                        <p class="discount"><s>
                                <?php if ($gia != 1)
                                    echo $row["gia"] . " đ"; ?>
                            </s></p>
                        <p class="price">
                            <?php echo ($row["gia"] * $gia); ?> <u>đ</u>
                        </p>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="content">
            <div class="title">
                <h1>SẢN PHẨM NỔI BẬT</h1>
            </div>
            <div class="decript">
                #FE
            </div>
            <div class="listPro">
                <?php
                $sql = "SELECT * FROM sanpham INNER JOIN chitiethoadon ON sanpham.id = chitiethoadon.idSP INNER JOIN sale ON sanpham.idSale = sale.id GROUP BY chitiethoadon.idSP ORDER BY COUNT(chitiethoadon.idHD) DESC LIMIT 8";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query)) {
                    $gia = (100 - $row["phan_tram"]) / 100;
                    ?>
                    <div class="pro">
                        <img src="./admin/qlsp/anh/<?php echo $row["hinh_anh"]; ?>" alt="" class="imgFirst">
                        <img src="./admin/qlsp/anh/<?php echo $row["hinh_anh"]; ?>" alt="" class="imgSecond">
                        <p class="type">HOT</p>
                        <a href="/shopbangiay/MyShoes/chitietsanpham.php?idsp=<?php echo $row["idSP"]; ?>&soluong=1"
                            class="name"><?php echo $row["ten_san_pham"]; ?></a>
                        <p class="discount"><s>
                                <?php if ($gia != 1)
                                    echo $row["gia"] . " đ"; ?>
                            </s></p>
                        <p class="price">
                            <?php echo ($row["gia"] * $gia); ?> <u>đ</u>
                        </p>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
</body>

</html>