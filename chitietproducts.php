<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "head.php"?>
    <title>SAN PHAM</title>
    <style>
        .detail-container{
            display: block;
            max-width: 1320px;
            justify-self: center;
            align-self: center;
        }
        .product-detail>form{
            display: grid;
            gap: 10px;
            grid-template-columns: 50% 50%;
            grid-template-areas: "pdimg pdif";
            
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
            width: 100%;
            max-width: 100%;
        }
        .pdif>div>h1{
            font-size: 1.75rem;
            font-weight: 500;
            margin-bottom: .5rem;
            line-height: 1.2;
        }
        .pdif>div>h3{
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
            while($rowdl=$resultdetail->fetch()){
              
        ?>  
        <form action="" >
        <div class="pdimg">
            <img src="imgpd/<?= $rowdl['pd_image']?>" >
            </div>
        <div class="pdif">
            <div>
                <h1><?= $rowdl['Namepd']?></h1>
                <h3><?= $rowdl['Price']?>đ</h3>
                <hr>
                <h1>Thông Tin Sản Phẩm:</h1>
                <p><?= $rowdl['Pd_ifm']?></p>
            </div>
            <div class="soluong">
                   <label >Số lượng</label>
                   <input type="number" name="soluong">
            </div>
            <div class="addcart">
                <a href="giohang.php?idpd=<?= $rowdl['ID_pd']?>">Thêm vào giỏ hàng</a>
            </div>
            <div class="pdsummit">  
                <a href="giohang.php?idpd=<?= $rowdl['ID_pd']?>">Mua Ngay</a>
            </div>
        </div>
        </form>
        <?php }?>
    </div>
</main>
<?php include 'fooder.php'?>
</body>
</html>