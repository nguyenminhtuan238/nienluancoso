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
    $pdsquery="INSERT INTO products(Namepd,Price,pd_image,Pd_ifm,ID_loai) VALUES (?,?,?,?,?)";
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
        ,$_POST['inpd'],$l['ID_loai']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    if($sthpd && $sthpd->rowCount()==1){
        echo '<p>Trính dẫn của bạn đã được lưu trữ.</p>';
    }else{
        
        echo 'Không rõ nguyên nhân';
        
    }
}
############################## lien ke pd ###################

?>