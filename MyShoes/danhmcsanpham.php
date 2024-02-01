<?php include('../connect.php')?>
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
    
    <title>Sản phẩm</title>
</head>
<body>
        <?php      include('header.php'); 
        ?>
    <?php
    $idDm = '';
    if(isset($_GET["iddm"]))  $idDm = $_GET["iddm"];
    $danhSachSanPham = "";
    if(strcmp($idDm, "") == 0){
        $danhSachSanPham = " and idSale is not null";
    } else {
        $danhSachSanPham = " and idDM = $idDm";
    }


    $dieuKien = "";
    $ten = "";
    $giabd = "";
    $giakt = "";
    $sapxep = 0;
    if(isset($_REQUEST["sapxep"]))
    $sapxep = $_REQUEST["sapxep"];
    $dieuKienSapXep = "";
    
   if($sapxep == 1){
        $dieuKienSapXep = " ORDER BY ten_san_pham ASC";
    } else if ($sapxep == 1){
        $dieuKienSapXep = " ORDER BY ten_san_pham DESC";
    } else if($sapxep == 3){
        $dieuKienSapXep = " ORDER BY gia ASC";
    } else if($sapxep == 4) {
        $dieuKienSapXep = " ORDER BY gia DESC";
    } else {
        $dieuKienSapXep = " ORDER BY id DESC";
    }
    if(isset($_GET["timkiem"]) || isset($_GET["sotrang"])){
        $ten = $_GET["tensanpham"];
        $giabd = $_GET["giabatdau"];
        $giakt = $_GET["giaketthuc"];

        $dieuKien = "";

    if(strcmp($ten, "") != 0){
        $dieuKien = $dieuKien . " and ten_san_pham like '%" . $ten . "%'";
    }

    if(strcmp($giabd, "") != 0){
        $dieuKien = $dieuKien . " and gia >" . $giabd;
    }

    if(strcmp($giakt, "") != 0){
        $dieuKien = $dieuKien . " and gia <" . $giakt;
    }
    
    }
    $sotrang = 1;
    if(isset($_REQUEST["sotrang"]))
    $sotrang = $_REQUEST["sotrang"];
    if(strcmp($sotrang,"") == 0){
        $sotrang = 1;
    }

    
    $sql = "SELECT * FROM (SELECT *, row_number() over (order by id desc) as r FROM sanpham WHERE 1 = 1" . $danhSachSanPham . $dieuKien . $dieuKienSapXep . ") AS tam WHERE (r between " . ($sotrang*20-19) . " and " . ($sotrang*20) . ")";
    
    $qrLaySP = mysqli_query($conn, $sql);

    $sqlTongSP = "SELECT * FROM sanpham WHERE 1 = 1" . $danhSachSanPham . $dieuKien . $dieuKienSapXep;
    $qrLayTongSP = mysqli_query($conn, $sqlTongSP);
    
    $count = 0;
    while($arrTongSP = mysqli_fetch_array($qrLayTongSP)){
       $count++;
        
    }

    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = 'đ') {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }
    

    ?>  

    <form action="danhmcsanpham.php" method="get">
        
        <div id="body-content">
            <form action="danhmcsanpham.php" method="get">
            
            <div id="timkiemtheo">
                <div class="timkiemmuc">TÌM KIẾM THEO <input type="button" value="Xóa" onclick="XoaTimKiem(<?=$idDm?>)"></div>
                <div class="theotensanpham">
                    <p>TÊN SẢN PHẨM</p>
                    <input type="text" name="tensanpham" id="tensp" placeholder="Nhập tên sản phẩm" value="<?=$ten?>">
                </div>
                <div class="theogia">
                    <p>GIÁ</p>
                    <input type="text" name="giabatdau" placeholder="min" id="giabd" value="<?=$giabd?>" class="giabatdau">đ
                    <input type="text" name="giaketthuc" id="giakt" placeholder="max" class="giaketthuc" value="<?=$giakt?>">đ
                </div>
                <input type="text" name="iddm" id="iddanhmuc"  value="<?=$idDm?>" style="display: none;"> 
                <div class="timkiem">
                    <input type="submit" name="timkiem" id="" value="Tìm kiếm">
                </div>
            </div>
            <!-- </form> -->
            <div id="noidung-sanpham">
                <img src=<?php echo "../img/danh_muc_".$idDm.".png";?> width="1150px" height="250" alt="">
                <div class="sap-xep">
                    <div>Sắp xếp theo: 
                        <select name="sapxep" id="loaisapxep" onchange="SapXepTheo()">
                            <option <?php if($sapxep == 0 ) echo("selected");?> value="0">Mặc định</option>
                            <option <?php if($sapxep == 1 ) echo("selected");?> value="1">Tên (A-Z)</option>
                            <option <?php if($sapxep == 2 ) echo("selected");?> value="2">Tên (Z-A)</option>
                            <option <?php if($sapxep == 3 ) echo("selected");?> value="3">Giá (Thấp-Cao)</option>
                            <option <?php if($sapxep == 4 ) echo("selected");?> value="4">Giá (Cao-Thấp)</option>
                        </select>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="danhsachsanpham">
                    <?php
                        
                        while($row = mysqli_fetch_array($qrLaySP)){
                            $sqlPhanTramSale = "SELECT * FROM sale where id =" . $row['idSale'];
                            $qrPhanTramSale = mysqli_query($conn, $sqlPhanTramSale);
                            $rowPhanTramSale = mysqli_fetch_array($qrPhanTramSale);
                    ?>
                    <div class="sanpham" onclick="ChiTietSanPham('<?= $row["id"]?>')">
                        <?php
                            if(strcmp($rowPhanTramSale["phan_tram"], "") != 0 && $rowPhanTramSale["phan_tram"] > 0) {
                        ?>
                            <div class="phan-tram-sale">
                                <p><?=$rowPhanTramSale["phan_tram"]?>%</p>
                            </div>

                        <?php } ?>
                            
                        <img src="../admin/qlsp/anh/<?=$row['hinh_anh']?>" alt="" class="avatar-san-pham">
                        <p class="ten-san-pham"><?= $row["ten_san_pham"]?></p>
                        <p class="gia-tien"><strong><?= currency_format($row["gia"]*(100-$rowPhanTramSale['phan_tram'])/100)?></strong> <del><?php if($rowPhanTramSale['phan_tram'] != 0) echo currency_format($row["gia"]);?></del></p>
                    </div>
                    <?php 
                    
                    }
                    $tongt = $count / 20; 
                    if($count % 20 != 0){ $tongt++;}?>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    <div class="phan-trang">
        
        <?php for($j = 1; $j <= $tongt; $j++){

         ?>
            <input type="submit" value="<?=$j?>" name="sotrang">
         <?php }?>
        <!-- </form> -->
    </div>

    <?php include "footer.php"; ?>

</body>
<script>
    function SapXepTheo(){
        var sapXep = document.getElementById('loaisapxep').value;
        var idm = document.getElementById('iddanhmuc').value;
        var ten = document.getElementById('tensp').value;
        var giabd = document.getElementById('giabd').value;
        var giakt = document.getElementById('giakt').value;
        window.location = 'danhmcsanpham.php?iddm=' + idm + '&ten=' + ten + '&giabatdau=' + giabd + '&giakt=' + giakt + '&sapxep=' + sapXep;
    }

    function XoaTimKiem(idm){
        document.getElementById('loaisapxep').value = 0;
        
        document.getElementById('tensp').value = "";
        document.getElementById('giabd').value= "";
        document.getElementById('giakt').value = "";
        window.location = 'danhmcsanpham.php?iddm=' + idm + '&ten=' + "" + '&giabatdau=' + "" + '&giakt=' + "" + '&sapxep=' + 0;
    }

    function ChiTietSanPham(id){
        window.location = 'chitietsanpham.php?idsp=' + id + "&soluong=1";
    }



</script>
</html>