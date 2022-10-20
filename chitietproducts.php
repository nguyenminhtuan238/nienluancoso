<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "head.php"?>
    <title>SAN PHAM</title>
    <style>
        .detail-container{
            display: block;
            width: 1140px;
            justify-self: center;
            align-self: center;
        }
        .product-detail{
            display: grid;
            gap: 10px;
            grid-template-columns: 50% 50%;
            grid-template-areas: "pdimg pdif";
            padding-top: 10px;
        }
        .pdimg{
            
            grid-area: pdimg;
        }
        .pdimg>img{
            display: block;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }
        .pdif{
            grid-area: pdif;
            
        }
        .pdif>h1{
            font-size: 1.75rem;
            font-weight: 500;
            margin-bottom: .5rem;
            line-height: 1.2;
        }
        .pdif>h3{
            font-size: 1.75rem;
            font-weight: 500;
            margin-bottom: .5rem;
            line-height: 1.2;
            color: #0984e3;
        }
    </style>
</head>
<body>
<?php include "header.php"?>
<main  class="detail-container">
    <div class="product-detail">
        <?php 
            $IDpd=$_GET['product'];
            $detailpd="SELECT * FROM `products` WHERE ID_pd=$IDpd";
            $resultdetail=$conn->query($detailpd);
            while($rowdl=$resultdetail->fetch()){
        ?>  
            <div class="pdimg">
            <img src="imgpd/<?= $rowdl['pd_image']?>" >
            </div>
            <div class="pdif">
                <h1><?= $rowdl['Namepd']?></h1>
                <h3><?= $rowdl['Price']?>đ</h3>
                <hr>
                <h1>Thông Tin Sản Phẩm:</h1>
                <p><?= $rowdl['Pd_ifm']?></p>
            </div>
        <?php }?>
    </div>
</main>
<?php include 'fooder.php'?>
</body>
</html>