
    <style>
        .Main>h1{
            color: red;
            text-align: center;
        }
    </style>
    <div class="grid-container">
    <div class="Main"> 
            <div class="Main-l">
                <p ><?= $_GET['catemh']  ?></p>
                <a href="#">Xem Thêm</a>
            </div>
            <h1><?=$_GET['search']?></h1>
            <div class="Main-pd">      
            <?php
                
                 $querypd="SELECT * FROM `products` 
                 JOIN `loai`ON products.ID_loai=loai.ID_loai 
                 WHERE loai.ten_loai='{$_GET['catemh']}' AND products.Namepd LIKE '{$_GET['search']}%' ";
                 $queryallpd="SELECT * FROM `products` 
                 JOIN `loai`ON products.ID_loai=loai.ID_loai 
                 WHERE products.Namepd LIKE '{$_GET['search']}%' ";
                 $querysearch=$_GET['catemh']=='Tất cả'? $queryallpd:$querypd;
                 $resultpd=$conn->query($querysearch);
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
    </div>
