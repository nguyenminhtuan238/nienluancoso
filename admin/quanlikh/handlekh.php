<?php
    require '../connect.php';
    $kh="SELECT * FROM `users` WHERE role=0";
    $getkh=$conn->query($kh);
    if(isset($_GET['lnv'])){
        $lnv="UPDATE `users` SET role=1 WHERE ID_users=(?)";
        $getlnv=$conn->prepare($lnv);
        $getlnv->execute([
            $_GET['lnv'],
        ]);
        header("location:index.php?q=kh");
    }
    if(isset($_GET['xkh'])){
        $xnv="DELETE FROM `users`WHERE ID_users=(?)";
        $getxnv=$conn->prepare($xnv);
        $getxnv->execute([
            $_GET['xkh'],
        ]);
        header("location:index.php?q=kh");
    }
?>