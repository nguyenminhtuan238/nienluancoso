<?php
    session_start();
    if(isset($_SESSION['Khachhang'])){
        unset($_SESSION['Khachhang']);
    }
    header('location:index.php?login');
?>