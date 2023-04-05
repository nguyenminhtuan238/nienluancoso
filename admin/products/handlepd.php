<?php
require 'connect.php';
$lproducts="SELECT * FROM `loai` ";
$resultlproducts=$conn->query($lproducts);
$datal=[];
while($row=$resultlproducts->fetch()){
    $datal[]=array(
    'id_loai'=>$row['ID_loai'],
    'ten_loai'=>$row['ten_loai'],
    );
             
}
if(isset($_POST['summitpd'])){
    $pdsquery="INSERT INTO products(Namepd,Price,pd_image,Pd_ifm,ID_loai,kho) VALUES (?,?,?,?,?,?)";
    $lsquery='SELECT loai.ID_loai FROM  loai WHERE loai.ten_loai=?';
    $filepart='./../imgpd/';
    $uploadfile=$filepart.basename($_FILES['imagepd']['name']);
    move_uploaded_file($_FILES['imagepd']['tmp_name'],$uploadfile);
    try{
    $sthpd=$conn->prepare($pdsquery);
    $sthl=$conn->prepare($lsquery);
    $sthl->execute([
        $_POST['loai'],
    ]);
    $l=$sthl->fetch();
    $sthpd->execute([
        $_POST['namepd'],$_POST['pricepd'],$_FILES['imagepd']['name']
        ,$_POST['inpd'],$l['ID_loai'],$_POST['slk']
        ]);
    }catch(PDOException $e){
         $e->getMessage();
    }
    if($sthpd && $sthpd->rowCount()==1){
        echo '<div class="alert alert-success alert-dismissible fade show mt-5" role="alert" id="alertX">
        <strong>Thêm sản Phẩm Thành công</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }else{
        
        echo '<div class="alert alert-danger alert-dismissible fade show mt-5" role="alert" id="alertX">
        <strong>thêm sản Phẩm Thất Bại</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        
    }
}

############################## lien ke pd ###################
if($_GET['q']=="products"){
    $pd="SELECT * FROM `products` INNER JOIN `loai` ON products.ID_loai=loai.ID_loai";
    $getpd=$conn->query($pd);
    if(isset($_POST['searchpd'])){
        if($_POST['searchpd']==""){
            $pd="SELECT * FROM `products` INNER JOIN `loai` ON products.ID_loai=loai.ID_loai";
            $getpd=$conn->query($pd);
        }else{
            $pd="SELECT * FROM `products` INNER JOIN `loai` ON products.ID_loai=loai.ID_loai AND 
            products.Namepd LIKE '{$_POST['searchpd']}%' ";
            $getpd=$conn->query($pd);
        }
    }

}
############## xoa pd ####################
if(isset($_GET['dlpd'])){
    $idpd=$_GET['dlpd'];
    $xpd="DELETE FROM `products` WHERE ID_pd=(?)";
    $xcm="DELETE FROM `comments` WHERE ID_pd=(?)";
    $delecm=$conn->prepare($xcm);
    $deletepd=$conn->prepare($xpd);
    $delecm->execute([
        $idpd
    ]);
    $deletepd->execute([
        $idpd
    ]);
    header("Refresh:0;url=index.php?q=products");
    if($delecm && $delecm->rowCount()==1){
        if ($deletepd && $deletepd->rowCount() == 1) {
            header("Refresh:0;url=index.php?q=products");
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show mt-5" role="alert" id="alertX">
            <strong>Xóa Sản Phẩm Thất Bại</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          ';
        }
    }
}
#################### sua pd ###################
if (isset($_GET['suapd'])) {
    $idpd = $_GET['suapd'];
    $sp = "SELECT * FROM `products` INNER JOIN `loai`ON products.ID_loai= loai.ID_loai WHERE ID_pd=$idpd";
    $resp = $conn->query($sp);
    $row = $resp->fetch();
    if (isset($_POST['summitfixpd'])) {
        $pd = "UPDATE products SET Namepd=(?),Price=(?),pd_image=(?),ID_loai=(?),Pd_ifm=(?) WHERE ID_pd=(?)";
        $loai = "SELECT loai.ID_loai FROM  loai WHERE loai.ten_loai=?";
        if ($_FILES['imagepd']['name'] == "") {
            $image = $row['pd_image'];
        } else {
            $filepart = '../uploadimg/';
            $uploadfile = $filepart . basename($_FILES['imagepd']['name']);
            move_uploaded_file($_FILES['imagepd']['tmp_name'], $uploadfile);
            $image = $_FILES['imagepd']['name'];
        }
        $reloai = $conn->prepare($loai);
        $repd = $conn->prepare($pd);
        $reloai->execute([
            $_POST['loai']
        ]);
        $l = $reloai->fetch();
        $repd->execute([
            $_POST['namepd'], $_POST['pricepd'], $image, $l['ID_loai'],$_POST['inpd'] ,$idpd
        ]);
        if($repd && $repd->rowCount()==1){
            header("Refresh:0;url=index.php?q=products");
  
          }else{
            echo '<div class="alert alert-danger alert-dismissible fade show mt-5" role="alert" id="alertX">
            <strong>Sửa Sản Phẩm Thất bại</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          ';
          }
    }
}
?>
