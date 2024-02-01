<?php
    session_start();
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

    session_start();
    //session_destroy();

   
    $idSP = $_GET["idsp"];
    
    $size = $_GET["size"];
    
    
    $arrSanPhamGH = $_SESSION["giohang"];
    $arrMa = array_keys($arrSanPhamGH);
    $vt = -1;
    for($i = 0; $i < count($arrMa); $i++){
        if($arrSanPhamGH[$arrMa[$i]][5] == $idSP and $arrSanPhamGH[$arrMa[$i]][4] == $size){
            $vt = $i;
        }
    }


    unset($arrSanPhamGH[$vt]);
    $_SESSION["giohang"] = $arrSanPhamGH;
    
    
    
    header ("Location:/shopbangiay/MyShoes/giohang.php");
    

?>  
</body>
</html>