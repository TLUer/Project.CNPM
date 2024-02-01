<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/chitietsanpham.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./icon/themify-icons/themify-icons.css">
    <title>Document</title>

    <?php
    require "../connect.php";

    $idsp = $_GET["idsp"];
    $soluong = $_GET["soluong"];

    $laySP = "SELECT * FROM sanpham WHERE id = $idsp";


    $sqlLaySize = "SELECT * FROM size_sp INNER JOIN size ON size_sp.idSize = size.id WHERE idSP = " . $idsp;
    $qrLaySP = mysqli_query($conn, $laySP);
    $qrLaySize = mysqli_query($conn, $sqlLaySize);
    $rowSP = mysqli_fetch_array($qrLaySP);

    $sqlPhanTramSale = "SELECT * FROM sale where id =" . $rowSP['idSale'];
    $qrPhanTramSale = mysqli_query($conn, $sqlPhanTramSale);
    $rowPhanTramSale = mysqli_fetch_array($qrPhanTramSale);

    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = 'đ')
        {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }

    ?>

</head>

<body>




    <?php
    include 'header.php';
    ?>
    <div id="chitietsanpham">
        <img src="../admin/qlsp/anh/<?= $rowSP["hinh_anh"] ?>" alt="" class="hinh-anh">
        <div class="thong-tin-san-pham">
            <p class="ten-san-pham">
                <?= $rowSP["ten_san_pham"] ?>
            </p>
            <div class="gia-tinh-trang">
                <div class="gia"><strong>
                        <?= currency_format($rowSP["gia"] * $soluong * (100 - $rowPhanTramSale['phan_tram']) / 100) ?>
                    </strong> <del>
                        <?= currency_format($rowSP["gia"] * $soluong) ?>
                    </del></div>
                <div class="tinh-trang">
                    <p class="d1">
                        <i class="ti-check"></i> Kho hàng: <strong>CÒN HÀNG</strong>
                    </p>

                    <p>
                        <i class="ti-control-record"></i> Mã sản phẩm:
                        <?= $rowSP["id"] ?>
                    </p>
                </div>
            </div>
            <div class="clear"></div>
            <div class="chon-size">
                <p>Chọn size</p>
                <div class="size">
                    <?php while ($size = mysqli_fetch_array($qrLaySize)) {
                        ?>
                        <input type="button" value="<?= $size["loai_size"] ?>" name="laysize" class="loai-size"
                            id="<?= $size["loai_size"] ?>" onclick="chonSize('<?= $size["loai_size"] ?>')">
                        <!-- <input type="button" value="39" class="loai-size" id="39" onclick="chonSize('39')">
                        <input type="button" value="40" class="loai-size">
                        <input type="button" value="41" class="loai-size"> -->
                    <?php } ?>
                </div>
                <div class="huong-dan" onclick="HuongDanChonSize()">Hướng dẫn chọn size</div>
            </div>
            <div class="mua-so-luong">
                <div class="chon-so-luong">
                    <input type="text" name="so-luong" id="soluong" value="<?= $soluong ?>" readonly>
                    <div class="nut-tang-giam">
                        <div class="tang" onclick="Tang('<?= $idsp ?>')"><i class="ti-angle-up"></i></div>
                        <div class="giam" onclick="Giam('<?= $idsp ?>')"><i class="ti-angle-down"></i></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="them-gio-hang" onclick="ThemGioHang(<?= $idsp ?>, 0)">
                    <i class="ti-shopping-cart"></i>THÊM VÀO GIỎ
                </div>
                <div class="mua-ngay" onclick="ThemGioHang(<?= $idsp ?>, 1)">
                    <i class="ti-money"></i>MUA NGAY
                </div>
                <div class="clear"></div>
            </div>
            <div class="anh-quang-cao">
                <img src="./image/quang_cao.png" alt="">
            </div>
        </div>
        <div class="clear"></div>
        <hr>

        <div class="mo-ta-san-pham">
            <p class="mo-ta">MÔ TẢ SẢN PHẨM</p>
            <p>
                <?= $rowSP["mo_ta"] ?>
            </p>
            <img src="../admin/qlsp/anh/<?= $rowSP['hinh_anh'] ?>" alt="" class="hinh-anh-mo-ta">

            <div class="lien-he">
                <div class="chu-do">* TBG.vn cam kết:</div>
                <p><b>- Giày chính hãng 100%. Phát hiện hàng Fake đền tiền gấp 2 lần giá sản phẩm.</b></p>
                <p><b>- TBG.vn miễn phí giao hàng toàn quốc (với đơn hàng từ 500.000 vnđ).</b></p>
                <p><b>- Đổi hàng trong 30 ngày. </b><i>(Áp dụng với sản phẩm chưa sử dụng, nguyên vẹn như khi nhận
                        hàng)</i></p>
                <p><b>- Bảo hành 6 tháng với các lỗi của nhà sản xuất, hậu mãi trọn đời.</b></p>
                <div class="chu-do">* Cách thức mua hàng:</div>
                <p>Khách hàng tiến hành MUA HÀNG trực tiếp tại các showroom hoặc trên website https://tbg.vn hoặc gọi
                    điện tới Hotline: 0973 711 868 để được tư vấn.</p>
                <div class="chu-do">* Thông tin liên hệ TBG.vn:</div>
                <p><i>+ Showroom : ABC XYZ, Hà Nội.</i></p>
                <p><i>+ Hotline: 0973 711 868 (Zalo, Viber)</i></p>
                <p><i>+ Email: cskh@myshoes.vn</i></p>
            </div>
        </div>
        <div class="huong-dan-chon-size">
            <p class="dong"><i class="ti-close" onclick="DongHuongDanChonSize()"></i></p>
            <div class="clear"></div>
            <div class="anh-chon-size">
                <img src="../admin/qlsp/anh/chon-size.png" />
            </div>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>
    <?php if ($_GET["tb"] == 1) {
        echo ("<script>alert('Thêm sản phẩm thành công');</script>");
    } ?>

</body>

<script>
    var idSize = "";
    function chonSize(id) {
        var s = document.querySelectorAll(".loai-size");
        for (var i = 0; i < s.length; i++) {
            s[i].style.border = "solid";
            s[i].style.borderColor = "rgb(185, 185, 185)";
            s[i].style.borderWidth = "1px";
        }

        document.getElementById(id).style.borderColor = "black";
        idSize = id;
    }

    function Tang(idsp) {
        var sl = document.getElementById('soluong').value;
        sl = parseInt(sl) + 1;
        document.getElementById('soluong').value = sl;
        window.location = "chitietsanpham.php?idsp=" + idsp + "&soluong=" + sl;
    }
    function Giam(idsp) {
        var sl = document.getElementById('soluong').value;
        sl = parseInt(sl) - 1;
        if (parseInt(sl) <= 0) {
            sl = 1;
        }
        document.getElementById('soluong').value = sl;
        window.location = "chitietsanpham.php?idsp=" + idsp + "&soluong=" + sl;
    }

    function ThemGioHang(id, tv) {


        if (idSize == "") {
            alert("Bạn phải chọn size!");
            return;
        }
        var loaisize = document.getElementById(idSize).value;
        var soLuong = document.getElementById('soluong').value;
        window.location = "themgiohang.php?idsp=" + id + "&soluong=" + soLuong + "&size=" + loaisize + "&trave=" + tv;
    }

    function HuongDanChonSize() {
        document.querySelector('.huong-dan-chon-size').style.display = "block";
    }

    function DongHuongDanChonSize() {
        document.querySelector('.huong-dan-chon-size').style.display = "none";
    }


</script>

</html>