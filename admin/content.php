<?php 
if(isset($_GET['q'])){
    $ql=$_GET['q'];
    if($ql=="products"){
        include 'products/main.php';
    }elseif($ql=="fixpd"){
        include 'products/fixpd.php';
    }elseif($ql=="loai"){
        include 'loai/main.php';
    }elseif($ql=="hd"){
        include 'quanlihd/main.php';
    }elseif($ql=="kh"){
        include 'quanlikh/main.php';
    }elseif($ql=="nv"){
        include 'quanlinv/main.php';
    }
}

?>
