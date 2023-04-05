<?php 
require 'connect.php';
$nav="SELECT * FROM `loai` ";
$resultnav=$conn->query($nav);
$datal=[];
$inav=0;
while($row=$resultnav->fetch()){
    $datal[]=array(
        'ten_loai'=>$row['ten_loai'],
        'ID_loai'=>$row['ID_loai']
    );
    $inav++;
             
}
##dang nhap
if(isset($_POST['summitlg'])){
    $Email=$_POST['Email'];
    $error=array();
    $checkrole="SELECT role FROM `users` WHERE Email=(?)";
    $checkEmail="SELECT Email FROM `users` WHERE Email=(?)";
    $getif="SELECT * FROM `users` WHERE Email=(?)";
    $checkpassword="SELECT Password FROM `users` WHERE Password= md5(?)";
    $resultpass=$conn->prepare($checkpassword);
    $resultpass->execute([
        $_POST['Password']
    ]);
    $resultEmail=$conn->prepare($checkEmail);
    $resultEmail->execute([
        $Email
    ]);
    $resultif=$conn->prepare($getif);
    $resultif->execute([
        $Email
    ]);
    $reEM=$resultEmail->fetch();
    $repa= $resultpass->fetch();
    $resultrole=$conn->prepare($checkrole);
    $resultrole->execute([
        $Email
    ]);
    $rowro = $resultrole->fetch();
    if(!empty($_POST['Email'] && !empty($_POST['Password']))){
        if(isset($repa['Password'])  && isset($reEM['Email'])){
                if($rowro['role']===0){
                    while($rowil=$resultif->fetch()){
                        $_SESSION['Khachhang']=$rowil;
                    }
                    header('location:index.php');
                    exit();
                }
                else if($rowro['role']===1){
                    while($rowil=$resultif->fetch()){
                        $_SESSION['nhanvien']=$rowil;
                    }            
                    header('location:nhanvien/');
                  exit();
                
                }else{
                $_SESSION['Admin']=$Email;
                header('location:admin/');
                exit();
                }
        } else{
            $error['wrong']="Mật Khẩu hoặc Email bị sai";
        }
    }else{
        $error['EmPa']="Mật Khẩu và Email không được để trống";
    }
   
}
## đăng ký
if(isset($_POST['summitdk']) ){
    $Email=$_POST['Email'];
    $error=array();
    $testEmail="SELECT * FROM `users` WHERE users.Email=(?)";
    $resultem=$conn->prepare($testEmail);
    $resultem->execute([
    $Email
    ]); 
    $rowem=$resultem->fetch();
    if(!empty($Email) && !empty($_POST['password'])){
        if(!isset($rowem['Email'])){
            if($_POST['password']==$_POST['password2']){
            try{
                $sql= "INSERT INTO `users`(`Email`,`Password`,`Name`,`Phone`,`address`) VALUES (?,md5(?),?,?,?)";
                $result=$conn->prepare($sql);
                $result->execute([
                $_POST['Email'],$_POST['password'],
                $_POST['Name'],$_POST['Phone'],$_POST['address']
            ]);
            }catch(PDOException $e){
                echo $e->getMessage();
            }
                if ($result && $result->rowCount()==1) {
                    echo '<script>alert("đăng ký thành công");</script>';
                }
            }else{
                $error['retypepa']="nhập lại mật khẩu không đúng";
            }
        }else{
            $error['Email']="Email của bạn đã có người sử dụng";
        }
    }else{
        $error['paem']="không được để trống";
    }
    
} 
## chi tiet product
if(isset($_GET['product'])){
$IDpd=$_GET['product'];
$detailpd="SELECT * FROM `products` WHERE ID_pd=$IDpd";
$resultdetail=$conn->query($detailpd); 
}
## giohang

if(isset($_POST['addcart'])){
    $id=$_GET['idpd'];
    $soluong=$_POST['soluong'];
    $sql="SELECT * FROM `products` WHERE ID_pd=$id LIMIT 1"; 
    $rowgh=$conn->query($sql);
    $row=$rowgh->fetch();
   if($row){
        $newpd=array(array('id'=>$id,'tensp'=>$row['Namepd'],'imgsp'=>$row['pd_image'],
        'pricesp'=>$row['Price'],'soluong'=>$soluong,'thanhtien'=>$row['Price']*$soluong));
        $tonghk=$row['Price']*$soluong;
        if(isset($_SESSION['cart'])){
            $f=false;
            foreach($_SESSION['cart'] as $item){
                $tonghk+=$item['thanhtien'];
                if($item['id']==$id){
                    $ttsl=$soluong+$item['soluong'];
                    $pd[]=array('id'=>$item['id'],'tensp'=>$item['tensp'],'imgsp'=>$item['imgsp'],
                    'pricesp'=>$item['pricesp'],'soluong'=>$ttsl,
                    'thanhtien'=>$item['pricesp']*$ttsl);
                    $f=true;
                }else{
                    $pd[]=array('id'=>$item['id'],'tensp'=>$item['tensp'],'imgsp'=>$item['imgsp'],
                    'pricesp'=>$item['pricesp'],'soluong'=>$item['soluong'],
                    'thanhtien'=>$item['pricesp']*$item['soluong']);
                }
               
                
            }
            $_SESSION['tientong']=$tonghk;
            if($f == false){
                $_SESSION['cart']=array_merge($pd,$newpd);
            }else{
                $_SESSION['cart']=$pd;
            }
            
        }else{
            $_SESSION['tientong']=$tonghk;
            $_SESSION['cart']=$newpd;
        }
    }
    
   
} 

## xoa gio hang
if(isset($_SESSION['cart']) && isset($_GET['deletecart'])){
    $id=$_GET['deletecart'];
    $tonghk=0;
    foreach($_SESSION['cart'] as $item){
        if($item['id']!=$id){
            $pd[]=array('id'=>$item['id'],'tensp'=>$item['tensp'],'imgsp'=>$item['imgsp'],
            'pricesp'=>$item['pricesp'],'soluong'=>$item['soluong'],
            'thanhtien'=>$item['pricesp']*$item['soluong']);
        }else{
            if(!empty($_SESSION['tientong'])){
                $_SESSION['tientong']-=$item['thanhtien'];
            }
        }
        
        $_SESSION['cart']=$pd;
        header('location:index.php?giohang');
    }
    
}
## them Binh luan
if(isset($_POST['Buttoncm'])){
    $error=array();
    if(isset($_SESSION['Khachhang'])){
        $addcomment="INSERT INTO `comments`(`ID_users`,`ID_pd`,`Post_cm`) VALUES (?,?,?)";
        $resultcm=$conn->prepare($addcomment);
        $resultcm->execute([
            $_SESSION['Khachhang']['ID_users'],$_GET['product'],$_POST['message']
        ]);
        if($resultcm && $resultcm->rowCount()==1){
            echo '<script>alert("Bạn đã bình luận");</script>';
        }
    }
}
## hinh bình luận
if(isset($_GET['product'])){
    $idpd=$_GET['product'];
    $showcm="SELECT Name,DATE(date_post),Post_cm,comments.ID_pd,ID_cm,users.ID_users
        FROM `comments`,`users`,`products` 
        WHERE comments.ID_users=users.ID_users AND products.ID_pd=(?)";
    $reshowcm=$conn->prepare($showcm);
    $reshowcm->execute([
        $idpd
    ]);
    $row=$reshowcm->fetch();

}
## xoa binh luan
if(isset($_GET['xoaidcm'])){
    $deletecm="DELETE FROM comments WHERE ID_cm=(?)";
    $resultdlcm=$conn->prepare($deletecm);
    $resultdlcm->execute([
        $_GET['xoaidcm']
    ]);
    $url="index.php?chitiet&product=".$_GET['product'];
    header('location:'.$url);
   
}
## sua binh luan
if(isset($_GET['suaidcm'])){
    if(isset($_POST['fixcmbu'])){
    $fixpost="UPDATE comments SET Post_cm=(?) WHERE ID_cm=(?)";
    $resultfixpost=$conn->prepare($fixpost);
    $resultfixpost->execute([
        $_POST['fixcm'],$_GET['suaidcm']
    ]);
    $url="index.php?chitiet&product=".$_GET['product'];
    header('location:'.$url);
    }
    
}
if(isset($_GET['Hoadon'])){
   $getHoadon="SELECT Tong_tien,DATE(createup)as tg FROM `bill` WHERE ID_users=(?)";
   $reslHD=$conn->prepare($getHoadon);
   $reslHD->execute([
    $_SESSION['Khachhang']['ID_users']
   ]);

}
?>
<header>
        <style>
            .headerright{
                display:flex;
            }
        </style>
        <div class="headertop">
                <ul class="clear">
                    <li>
                        <i class="far fa-clock iconheader"></i>
                        <span class="text"> T2-T6:8h-17h</span>
                    </li>
                    <li>
                        <i class="fas fa-phone-square iconheader"></i>
                        <span class="text">điện Thoại:0385.64.5987</span> 

                    </li>
                </ul>
                <div class="headerright">
                    <?php if(isset($_SESSION['Khachhang'])){?>
                        <p class='text'><?=  $_SESSION['Khachhang']['Name']?></p>
                        <a href='logout.php' class='text aheader'>đăng xuất</a>
                        <a href='index.php?Hoadon'  class='text aheader'>
                        <i class="fal fa-file-invoice"></i>Hóa Đơn</a>
                  <?php }else{?>
               <a href="index.php?login" class="text aheader"><i class="fas fa-lock"></i>Đăng Nhập</a>
                    <?php }?>
                <a href="index.php?giohang" class="text iconheader aheader"><i class="fas fa-cart-plus">
                    <?php  if(isset($_SESSION['tientong'])){echo $_SESSION['tientong'];}else{echo '0đ';}?>

                </i></a> 
                </div>
        </div>
        <div class="nav-top">
        <img src="images.jfif" width="70px" height="70px"/>
        <a href="index.php" class="textnav-a"> Trang Chủ</a>
        <a href="index.php?Gioithieu" class="textnav-a">Giới Thiệu</a>
        <a href="#" class="textnav-a">Tin Tức</a>
        <form method="GET" class="nav-search">
                <div id="catebt">
                        <select name="catemh" id="cate"  >
                            <option>Tất cả</option>
                            <?php foreach ($datal as $np) {
                            ?>
                            <option><?=$np['ten_loai']?></option>
                            <?php }?>
                        </select>
                </div> 
                <div id="searchbt">
                        <input type="text" name="search" placeholder="Nhập từ khóa" class="search">
                </div>
                <button id="button-search" ><i class="fas fa-search"></i></button> 
                
        </form>
            
        </div>
</header>
    <nav>
    <a class="nav-home"><i class="fas fa-home "></i></a>
       
        <?php for($inav1=0;$inav1<4;$inav1++){?>
        <a href="index.php?searchl&loai=<?=$datal[$inav1]['ID_loai']?>" class="nav-a">
            <?= $datal[$inav1]['ten_loai']?>
        </a>
        <?php }?>
        
        <a href="#" id="nav-a" class="nav-a" 
        onmouseover="navcateover(this)" 
        onmouseout="navcateout(this)">
        DANH MỤC KHÁC 
        </a>
        
        <script>
            function navcateout(event){
                document.getElementById("nav-cate").classList.remove("nav-cate-block");
                document.getElementById("nav-a").classList.remove("nav-a-l");
            }
            function navcateover(event){
                document.getElementById("nav-cate").classList.add("nav-cate-block");
                document.getElementById("nav-a").classList.add("nav-a-l");
                
            }
        </script>
    </nav>
    <div class="nav-cate-node"  id="nav-cate" onmouseover="navcateover(this)" onmouseout="navcateout(this)">
            <?php for($inav1=4;$inav1<$inav;$inav1++){?>
            <a href="index.php?searchl&loai=<?=$datal[$inav1]['ID_loai']?>">
                <?=$datal[$inav1]['ten_loai'] ?>
            </a>
            <?php }?>
    </div>