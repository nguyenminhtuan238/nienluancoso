<?php
    session_start();
    if(isset($_SESSION['Admin'])){
    unset($_SESSION['Admin']);
    }
    header('location:../index.php?login');
?>