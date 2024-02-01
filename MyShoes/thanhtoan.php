<?php
session_start();
require "../connect.php";
include "header.php";

if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = 'đ')
    {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
}

if (isset($_SESSION['giohang'])) {
    $arrSanPham = $_SESSION["giohang"];
}

if (isset($_POST["muahang"])) {
    $hoTen = $_POST["hoten"];
    $sdt = $_POST["sdt"];
    $email = $_POST["email"];
    $diaChiNhan = $_POST["diachinhan"];
    $phuongThucGioHang = $_POST["ptgh"];
    $PhuongThucThanhToan = $_POST["pttt"];
    $today = date('Y-m-d');

    if (isset($_COOKIE['user'])) {
        $tdn = $_COOKIE['user'];
        $sqlThemKhachHang = "INSERT INTO khachhang(ho_ten, email, so_dien_thoai,dia_chi,ten_dang_nhap)
                VALUES ('$hoTen', '$email', '$sdt','$diaChiNhan', '$tdn')";
        $qrThemKhachHang = mysqli_query($conn, $sqlThemKhachHang);
    } else {
        $sqlThemKhachHang = "INSERT INTO khachhang(ho_ten, email, so_dien_thoai)
                    VALUES ('$hoTen', '$email', '$sdt')";
        $qrThemKhachHang = mysqli_query($conn, $sqlThemKhachHang);
    }

    $idKhachHang = mysqli_insert_id($conn);

    $sqlThemHoaDon = "INSERT INTO hoadon(ngay_tao, hinh_thuc_thanh_toan, hinh_thuc_van_chuyen, dia_chi_nhan, tinh_trang, idKH)
        VALUES ('$today','$PhuongThucThanhToan','$phuongThucGioHang','$diaChiNhan','Đang xử lý', '$idKhachHang')";
    $qrThemHoaDon = mysqli_query($conn, $sqlThemHoaDon);

    $idHoaDon = mysqli_insert_id($conn);

    foreach ($_SESSION["giohang"] as $keys => $vals) {
        $sqlSize = "SELECT * FROM size WHERE loai_size = '$vals[4]'";
        $size = mysqli_fetch_array(mysqli_query($conn, $sqlSize));
        $idSize = $size["id"];
        $chiTietHoaDon = "INSERT INTO chitiethoadon(idHD, idSize, idSP, so_luong_mua) 
                            VALUES ($idHoaDon,$idSize,$vals[5],$vals[2])";
        mysqli_query($conn, $chiTietHoaDon);
    }

    $sql = "SELECT ten_san_pham, loai_size, so_luong_mua, gia, phan_tram FROM chitiethoadon INNER JOIN hoadon ON chitiethoadon.idHD = hoadon.id INNER JOIN sanpham ON chitiethoadon.idSP = sanpham.id INNER JOIN size ON chitiethoadon.idSize = size.id INNER JOIN sale ON sanpham.idSale = sale.id 
        WHERE chitiethoadon.idHD = $idHoaDon";
    $query = mysqli_query($conn, $sql);
    $t = 0;
    $vc = 20000;
    while ($row = mysqli_fetch_array($query)) {
        $t += $row["gia"] * $row["so_luong_mua"] * (100 - $row["phan_tram"]) / 100;
    }
    $que = mysqli_query($conn, "UPDATE hoadon SET tong_tien ='$t' WHERE id = '$idHoaDon' ");

    session_destroy();

    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/thanhtoan.css">
    <link rel="stylesheet" type="text/css" href="./css/hd.css">
    <link rel="icon" type="image/x-icon" href="../img/icon.PNG">
    <title>Đơn hàng</title>
</head>

<body>
    <form action="/shopbangiay/Myshoes/thanhtoan.php" method="post">
        <div class="main">
            <div class="information-user">
                <div class="defined-user">
                    <h4 class="title">THÔNG TIN GIAO HÀNG</h4>
                    <input type="text" placeholder="Họ và tên:" name="hoten" class="import_infor" required /><br>
                    <input type="text" placeholder="Điện thoại:" name="sdt" class="import_infor" required /><br>
                    <input type="text" placeholder="Email(nếu có):" name="email" class="import_infor" /><br>
                </div>
                <div class="address-user">
                    <h4 class="title">ĐỊA CHỈ GIAO HÀNG</h4>
                    <input type="text" placeholder="Địa chỉ nhận hàng..." class="import_infor" name="diachinhan"
                        required /><br>
                </div>
            </div>

            <div class="information-deliver">
                <div class="chon-ship-payment">
                    <div class="method-deliver">
                        <h4 class="title">PHƯƠNG THỨC GIAO HÀNG</h4>
                        <input type="radio" checked value="Tiết kiệm - 20.000đ" name="ptgh" />Tiết kiệm - 20.000đ <br>
                        <input type="radio" value="Hỏa tốc - 60.000đ" name="ptgh" />Hỏa tốc - 60.000đ<br>
                    </div>
                    <div class="method-pay">
                        <h4 class="title">PHƯƠNG THỨC THANH TOÁN</h4>
                        <input type="radio" checked value="Thanh toán khi nhận hàng" name="pttt" />Thanh toán khi nhận
                        hàng <br>
                        <input type="radio" value="Chuyển khoản ngân hàng" name="pttt" /> Chuyển khoản ngân hàng <br>
                        <input type="radio" value="Tiền mặt tại của hàng" name="pttt" /> Tiền mặt tại của hàng<br>
                    </div>
                </div>
                <div class="list-product">
                    <table style="width:100%; text-align: center; border-collapse: collapse;" border="1">
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Mã sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Thành tiền</th>
                        </tr>
                        <?php foreach ($arrSanPham as $keys => $vals) { ?>
                            <tr>
                                <td style="padding:10px;"><img src="../admin/qlsp/anh/<?= $vals[3] ?>" width="100px"
                                        height="100px"></td>
                                <td><?= $vals[0] ?></td>
                                <td><?= $vals[5] ?></td>
                                <td><?= $vals[2] ?></td>
                                <td><?= number_format($vals[1]) ?></td>
                                <td><?= number_format($vals[1] * $vals[2] * (100 - $vals[6]) / 100) ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <input class="button_muahang" type="submit" value="Mua hàng" name="muahang" class="mua-hang"
                    onclick="showConfirmation()">
            </div>
        </div>
    </form>

    <script>
        function showConfirmation() {
            if (confirm("Xác nhận thanh toán?")) {
            }
        }
    </script>
</body>

</html>
