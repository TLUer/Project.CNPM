<!DOCTYPE html>
<?php
setcookie("user", "", time() - (86400 * 30), "/", "", 0);
header('location: ../index.php');
?>
  
<html>
  
<body>
</body>
  
</html>