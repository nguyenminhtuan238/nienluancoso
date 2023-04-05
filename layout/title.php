<?php if(isset($_GET['login'])){
        echo "<title>Đăng Nhập</title>";
    }elseif(isset($_GET['dk'])){
        echo "<title>Đăng Ký</title>";
    }elseif(isset($_GET['chitiet'])){
        echo "<title>Sản Phẩm</title>";
    }
    elseif(isset($_GET['searchl'])){
        echo "<title>Tìm Kiếm</title>";
    }
    elseif(isset($_GET['giohang'])){
        echo "<title>Giỏ Hàng</title>";
    } elseif(isset($_GET['search'])){
        echo "<title>Tìm Kiếm</title>";
    }elseif(isset($_GET['Gioithieu'])){
        echo "<title>Giới thiệu</title>";
    }
    else echo "<title>Trang Chủ</title>";
?>