
<div class="col-9 border">
    <?php
        if(isset($_GET['nv'])){
            if($_GET['nv']=="qlbl"){
                include 'comments/main.php';
            }else if($_GET['nv']=="tksp"){
                include 'thongkesp/main.php';
            }else if($_GET['nv']=="sk"){
                include 'thongkesp/suakho.php';
            }else if($_GET['nv']=="tkhd"){
                include 'thongkehd/main.php';
            }else if($_GET['nv']=="kthd"){
                include 'thongkehd/cart.php';
            }else if($_GET['nv']=="addhd"){
                include 'thongkehd/addhd.php';
            }
        }
    ?>
</div>