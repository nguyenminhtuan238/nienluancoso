
<div class="grid-container"> 
        <div class="Menu">
           <img src="img/banner-chay-bo.jpg">
         </div>
        <div class="Main">
            <?php 
            foreach ($datal as $np) {
               
            ?>
            
            <div class="Main-l">
                <p ><?= $np['ten_loai']  ?></p>
                <a href="index.php?searchl&loai=<?=$np['ID_loai']?>">Xem Thêm</a>
            </div>
           <div class="Main-pd">
            <?php
                 $querypd="SELECT DISTINCT * FROM `products` WHERE ID_loai='$np[ID_loai]' ";
                 $resultpd=$conn->query($querypd);
                 while($rowpd=$resultpd->fetch() ){
                    
            ?>
             <div class="pd-col" >
                <a href="index.php?chitiet&product=<?=$rowpd['ID_pd']?>" class="datapd">
                    <img src="imgpd/<?= $rowpd['pd_image']?>">
                </a>
                <a href="index.php?chitiet&product=<?=$rowpd['ID_pd']?>">
                    <p><?= $rowpd['Namepd']?></p>
                </a>
                <p><?= $rowpd['Price']?>đ</p>
            
                </div>
            
            <?php }
            echo '</div>';}?>
            
        </div>  
    
        <div class="Right">
            <img src="img/banner112.jpg" width="280px" height="500px">

        </div>