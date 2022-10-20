<?php if(isset($_SESSION['Khachhang'])){
        header('location:checkout.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trang CHu</title>
    <?php include 'head.php' ?>
</head>
<body>
    <?php include 'header.php'?>
    <?php include 'content.php'?>
    <?php include 'fooder.php'?>
</body>

</html>