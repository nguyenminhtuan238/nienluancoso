<main>
    <?php if(isset($_GET['login'])){
        include 'page/login.php';
    }elseif(isset($_GET['dk'])){
        include 'page/dk.php';
    }elseif(isset($_GET['chitiet'])){
        include 'page/chitietproducts.php';
    }
    elseif(isset($_GET['searchl'])){
        include 'page/seachtype.php';
    }
    elseif(isset($_GET['giohang'])){
        include 'page/giohang.php';
    } elseif(isset($_GET['search'])){
        include 'page/timkiem.php';
    }elseif(isset($_GET['Hoadon'])){
        include 'page/hoadon.php';
    }elseif(isset($_GET['Gioithieu'])){
        include 'page/gioithieu.php';
    }
    else include 'page/mainid.php'?>;
</div>
</main>