<?php
session_start();
if( !isset($_SESSION['Admin'])){
    header('location:../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
     <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
    crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="adminstyle.css"> 
    <title>Document</title>
</head>
<body>
    <?php include 'header.php';?>
    <?php include 'menu.php';?>
    <?php include 'content.php';?>
    <?php include 'fooder.php';?>
    <script src="admin.js"></script>
</body>
</html>