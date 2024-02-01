<?php 
    //static $count_sp = 0;
    session_start();
    $_SESSION["gh"] = array();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

    require "../connect.php";

    //session_start();
    //session_destroy();

    $traVe = $_GET["trave"];
    $idSP = $_GET["idsp"];
    $soLuong = $_GET["soluong"];
    $size = $_GET["size"];
    // Kiểm tra xem $_SESSION['giohang'] đã tồn tại hay chưa
    if (!isset($_SESSION['giohang'])) {
        $_SESSION['giohang'] = array(); // Nếu chưa tồn tại, khởi tạo một mảng rỗng
    }



    
    $sql = "SELECT * FROM sanpham INNER JOIN sale ON sanpham.idSale = sale.id WHERE sanpham.id = $idSP";
    
    $qrSanPham = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($qrSanPham);
    
    $arrSanPhamGH = $_SESSION['giohang'];
    $arrMa = array_keys($arrSanPhamGH);
    $vt = -1;
    for($i = 0; $i < count($arrMa); $i++){
        if($arrSanPhamGH[$arrMa[$i]][5] == $idSP and $arrSanPhamGH[$arrMa[$i]][4] == $size){
            $vt = $i;
        }
    }


    if($vt == -1){
        $arrSP = array($row["ten_san_pham"], $row["gia"], $soLuong ,$row["hinh_anh"], $size, $idSP, $row["phan_tram"]);
        $arrSanPhamGH[count($arrSanPhamGH)] = $arrSP;
    } else {
        $arrSanPhamGH[$arrMa[$vt]][2] += $soLuong;
    }

    $_SESSION["giohang"] = $arrSanPhamGH;
    //$count_sp ++;
    
    if($traVe == 0){
        header ("Location:/shopbangiay/MyShoes/chitietsanpham.php?idsp=$idSP&soluong=$soLuong&&tb=1");
    } if($traVe == 1){
        header ("Location:/shopbangiay/MyShoes/thanhtoan.php");
    } 
    else {
        header ("Location:/shopbangiay/MyShoes/giohang.php");
    }

?>  
</body>
</html>