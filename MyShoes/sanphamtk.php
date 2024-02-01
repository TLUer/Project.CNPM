<?php include('../connect.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/DMSP.css" />
    <link rel="stylesheet" href="css/hd.css" />
    <link rel="stylesheet" href="css/ft.css">
    <link rel="icon" type="image/x-icon" href="../img/icon.PNG">
    <title>Sản phẩm </title>
</head>

<body>

    <?php
    $idDm = isset($_GET["iddm"]) ? $_GET["iddm"] : "";
    $danhSachSanPham = "";
    if (strcmp($idDm, "") == 0) {
        $danhSachSanPham = " and idSale is not null";
    } else {
        $danhSachSanPham = " and idDM = $idDm";
    }

    $sapxep = isset($_GET["sapxep"]) ? $_GET["sapxep"] : "";
    $dieuKien = "";
    $ten = "";
    $giabd = "";
    $giakt = "";
    $dieuKienSapXep = "";

    if ($sapxep == 1) {
        $dieuKienSapXep = " ORDER BY ten_san_pham ASC";
    } else if ($sapxep == 1) {
        $dieuKienSapXep = " ORDER BY ten_san_pham DESC";
    } else if ($sapxep == 3) {
        $dieuKienSapXep = " ORDER BY gia ASC";
    } else if ($sapxep == 4) {
        $dieuKienSapXep = " ORDER BY gia DESC";
    } else {
        $dieuKienSapXep = " ORDER BY id DESC";
    }
    if (isset($_GET["timkiem"]) || isset($_GET["sotrang"])) {
        $ten = $_GET["tensanpham"];
        $giabd = $_GET["giabatdau"];
        $giakt = $_GET["giaketthuc"];

        $dieuKien = "";

        if (strcmp($ten, "") != 0) {
            $dieuKien = $dieuKien . " and ten_san_pham like '%" . $ten . "%'";
        }

        if (strcmp($giabd, "") != 0) {
            $dieuKien = $dieuKien . " and gia >" . $giabd;
        }

        if (strcmp($giakt, "") != 0) {
            $dieuKien = $dieuKien . " and gia <" . $giakt;
        }

    }

    $sotrang = isset($_GET["sotrang"]) ? $_GET["sotrang"] : "";
    if (strcmp($sotrang, "") == 0) {
        $sotrang = 1;
    }


    $sql = "SELECT * FROM SANPHAM WHERE ten_san_pham LIKE '%" . $_GET['name'] . "%'";

    $qrLaySP = mysqli_query($conn, $sql);

    $sqlTongSP = "SELECT * FROM sanpham WHERE 1 = 1" . $danhSachSanPham . $dieuKien . $dieuKienSapXep;
    $qrLayTongSP = mysqli_query($conn, $sqlTongSP);

    $count = 0;
    while ($arrTongSP = mysqli_fetch_array($qrLayTongSP)) {
        $count++;

    }

    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = 'đ')
        {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }


    ?>
    <?php include('header.php');
    ; ?>
    <form action="danhmcsanpham.php" method="get">
        <!-- </form> -->
        <div id="noidung-sanpham">
            <div class="danhsachsanpham">
                <?php

                while ($row = mysqli_fetch_array($qrLaySP)) {
                    ?>
                    <div class="sanpham" onclick="ChiTietSanPham('<?= $row["id"] ?>')">
                        <img src="../admin/qlsp/anh/<?= $row['hinh_anh'] ?>" alt="" class="avatar-san-pham">
                        <p class="ten-san-pham">
                            <?= $row["ten_san_pham"] ?>
                        </p>
                        <p class="gia-tien">
                            <?= currency_format($row["gia"]) ?>
                        </p>
                    </div>
                    <?php

                }
                $tongt = $count / 20;
                if ($count % 20 != 0) {
                    $tongt++;
                } ?>
                <!-- <div class="sanpham">
                        <img src="./image/a1.png" alt="" class="avatar-san-pham">
                        <p class="ten-san-pham">GIÀY ADIDAS RUNFALCON 3.0 NAM - ĐEN TRẮNG</p>
                        <p class="gia-tien">1.690.000₫</p>
                    </div>
                    <div class="sanpham">
                        <img src="./image/a1.png" alt="" class="avatar-san-pham">
                        <p class="ten-san-pham">GIÀY ADIDAS RUNFALCON 3.0 NAM - ĐEN TRẮNG</p>
                        <p class="gia-tien">1.690.000₫</p>
                    </div>
                    <div class="sanpham">
                        <img src="./image/a1.png" alt="" class="avatar-san-pham">
                        <p class="ten-san-pham">GIÀY ADIDAS RUNFALCON 3.0 NAM - ĐEN TRẮNG</p>
                        <p class="gia-tien">1.690.000₫</p>
                    </div>
                    <div class="sanpham">
                        <img src="./image/a1.png" alt="" class="avatar-san-pham">
                        <p class="ten-san-pham">GIÀY ADIDAS RUNFALCON 3.0 NAM - ĐEN TRẮNG</p>
                        <p class="gia-tien">1.690.000₫</p>
                    </div> -->
            </div>
        </div>
        </div>
        <div class="clear"></div>
    </form>
    <?php include "footer.php"; ?>

</body>
<script>
    function SapXepTheo() {
        var sapXep = document.getElementById('loaisapxep').value;
        var idm = document.getElementById('iddanhmuc').value;
        var ten = document.getElementById('tensp').value;
        var giabd = document.getElementById('giabd').value;
        var giakt = document.getElementById('giakt').value;
        window.location = 'danhmcsanpham.php?iddm=' + idm + '&ten=' + ten + '&giabatdau=' + giabd + '&giakt=' + giakt + '&sapxep=' + sapXep;
    }

    function XoaTimKiem(idm) {
        document.getElementById('loaisapxep').value = 0;

        document.getElementById('tensp').value = "";
        document.getElementById('giabd').value = "";
        document.getElementById('giakt').value = "";
        window.location = 'danhmcsanpham.php?iddm=' + idm + '&ten=' + "" + '&giabatdau=' + "" + '&giakt=' + "" + '&sapxep=' + 0;
    }

    function ChiTietSanPham(id) {
        window.location = 'chitietsanpham.php?idsp=' + id + "&soluong=1";
    }



</script>

</html>