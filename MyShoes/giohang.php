<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/giohang.css">
    <link rel="stylesheet" type="text/css" href="./css/hd.css">
    <link rel="stylesheet" href="./icon/themify-icons/themify-icons.css">
    <link rel="icon" type="image/x-icon" href="../img/icon.PNG">
    <title>Giỏ hàng</title>
</head>

<body>
    <!-- dữ liệu test -->
    <?php
    include('../connect.php');
    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = 'đ')
        {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }


    session_start();
    if (!isset($_SESSION['giohang'])) {
        $_SESSION['giohang'] = [];
    }
    $arrGioHang = $_SESSION["giohang"];
    $tongtien = 0;
    ?>
    <?php
    include "header.php"; ?>
    <div class="main">
        <div class="main_content">
            <div style="padding: 20px;">
                <h3>GIỎ HÀNG CỦA BẠN</h3>
            </div>
            <div class="content">
                <table style="width:100%; text-align: center; border-collapse: collapse;" border="1">
                    <tr>
                        <td>Hình ảnh</td>
                        <td>Tên sản phẩm</td>
                        <td>Mã hàng</td>
                        <td>Số lượng</td>
                        <td>Đơn giá</td>
                        <td>Giảm giá</td>
                        <td>Thành tiền</td>
                    </tr>


                    <?php
                    foreach ($_SESSION["giohang"] as $keys => $val) { ?>
                        <tr>
                            <!-- đổ dữ liệu -->
                            <td><img src="../admin/qlsp/anh/<?= $val[3] ?>" width="200px" height="200px"></td>
                            <td>
                                <a class="ten-san-pham" onclick="ChiTietSanPham(<?= $val[5] ?>)"><?= $val[0] ?></a> <br>
                                <small>Chọn size:
                                    <?= $val[4] ?>
                                </small>
                            </td>
                            <td>
                                <?= $val[5] ?>
                            </td>
                            <td>
                                <div class="chon-so-luong">
                                    <input type="text" name="so-luong" id="soluong" value="<?= $val[2] ?>" readonly />
                                    <div class="nut-tang-giam">
                                        <div class="tang"
                                            onclick="Tang(<?= $val[2] ?>, '<?= $val[5] ?>', '<?= $val[4] ?>')"><i
                                                class="ti-angle-up"></i></div>
                                        <div class="giam"
                                            onclick="Giam(<?= $val[2] ?>, '<?= $val[5] ?>', '<?= $val[4] ?>')"><i
                                                class="ti-angle-down"></i></div>
                                    </div>
                                    <div class="loaibo">
                                        <button class="remove" onclick="XoaSanPham('<?= $val[5] ?>', '<?= $val[4] ?>')"><i
                                                class="ti-close"></i></button>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </td>
                            <td>
                                <?= currency_format($val[1]) ?>
                            </td>
                            <td>
                                <?php echo $val[6] . "%"; ?>
                            </td>
                            <td>
                                <?= currency_format($val[1] * $val[2]) ?>
                            </td>
                            <?php
                            $tongtien += $val[1] * $val[2] * (100 - $val[6]) / 100;
                            ?>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <div class="thanhtoan">
            <div class="tongtien">
                <table style="text-align: right; width: 100%;">
                    <tr>
                        <th>Thành tiền:</th>
                        <th>
                            <?php echo currency_format($tongtien); ?>
                        </th>
                    </tr>
                    <tr>
                        <th>Miễn phí giao hàng:</th>
                        <th>
                            <?php echo '0'; ?>
                        </th>
                    </tr>
                    <tr>
                        <th>Tổng:</th>
                        <th>
                            <?php echo currency_format($tongtien); ?>
                        </th>
                    </tr>
                </table>
            </div>
            <div class="button_thanhtoan" onclick="MuaHang()"><i>THANH TOÁN</i></div>
        </div>
    </div>
    <div class="footer">

    </div>
</body>

<script>
    function Tang(soLuong, id, size) {
        soLuong = parseInt(soLuong) + 1;
        window.location = "themgiohang.php?idsp=" + id + "&soluong=" + 1 + "&size=" + size + "&trave=2";
    }

    function Giam(soLuong, id, size) {
        if (parseInt(soLuong) > 1) {
            soLuong = parseInt(soLuong) - 1;
            window.location = "themgiohang.php?idsp=" + id + "&soluong=" + (-1) + "&size=" + size + "&trave=2";
        }
    }

    function XoaSanPham(id, size) {
        window.location = "xoasanphamgiohang.php?idsp=" + id + "&size=" + size;
    }

    function MuaHang() {
        window.location = "thanhtoan.php";
    }
    function ChiTietSanPham(id) {
        window.location = 'chitietsanpham.php?idsp=' + id + "&soluong=1";
    }
</script>

</html>