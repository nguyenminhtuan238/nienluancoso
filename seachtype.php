<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php';?>
    <title>Document</title>
</head>
<body>
<?php include 'header.php';?>
<main class="grid-container">
    <div class="Main"> 
            <?php
                 $querypd="SELECT * FROM `loai` 
                 WHERE ID_loai={$_GET['loai']} ";
                 $resultpd=$conn->query($querypd);
                 while($rowl=$resultpd->fetch() ){     
            ?>
            <div class="Main-l">
                <p ><?= $rowl['ten_loai']  ?></p>
                <a href="#">Xem Thêm</a>
            </div>
            <?php }?> 
            <div class="Main-pd">       
            <?php
                 $querypd="SELECT * FROM `products` 
                 WHERE ID_loai={$_GET['loai']} ";
                 $resultpd=$conn->query($querypd);
                 while($rowpd=$resultpd->fetch() ){
                    
            ?>
             <div class="pd-col" >
                <a href="chitietproducts.php?product=<?=$rowpd['ID_pd']?>" class="datapd">
                    <img src="imgpd/<?= $rowpd['pd_image']?>">
                </a>
                <a href="chitietproducts.php?product=<?=$rowpd['ID_pd']?>">
                    <p><?= $rowpd['Namepd']?></p>
                </a>
                <p><?= $rowpd['Price']?>đ</p>
            </div>
            
            <?php }?>
            </div>
    </div>
</main>
<?php include 'fooder.php'?>
</body>
</html>