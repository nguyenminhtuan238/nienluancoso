<?php
    require '../connect.php';
    $sp="SELECT * FROM `products` WHERE 1";
    $getsp=$conn->query($sp);
   if(isset($_POST['searchsp'])){
       if($_POST['searchsp']==""){
        $sp="SELECT * FROM `products` WHERE 1";
        $getsp=$conn->query($sp);
       }else{
        $sp="SELECT * FROM `products` WHERE Namepd LIKE '{$_POST['searchsp']}%' ";
        $getsp=$conn->query($sp);
       }
   }
    if(isset($_POST['summitlkho'])){
        $idsp=$_GET['kho'];
        $spl="SELECT * FROM `products` WHERE ID_pd=$idsp";
        $respl=$conn->query($spl);
        $khocu=0;
        while($row=$respl->fetch()){
            $khocu=$_POST['suakho']+$row['kho'];
        }
        $kho="UPDATE `products` SET kho=(?) WHERE ID_pd=(?) ";
        $upkho=$conn->prepare($kho);
        $upkho->execute([
           $khocu,$_GET['kho']
        ]);
        if($upkho && $upkho->rowCount()==1){
            header("Refresh:0;url=index.php?nv=tksp");
        }else{
          echo '<div class="alert alert-danger alert-dismissible fade show mt-5" role="alert" id="alertX">
          <strong>Sửa Kho Thất bại</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
        }
    }
?>