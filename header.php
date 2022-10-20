<?php 
session_start();
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
    $checkpassword="SELECT Password FROM `users` WHERE Password= md5(?)";
    $resultpass=$conn->prepare($checkpassword);
    $resultpass->execute([
        $_POST['Password']
    ]);
    $resultEmail=$conn->prepare($checkEmail);
    $resultEmail->execute([
        $Email
    ]);
    $reEM=$resultEmail->fetch();
    $repa= $resultpass->fetch();
    $resultrole=$conn->prepare($checkrole);
    $resultrole->execute([
        $Email
    ]);
    if(!empty($_POST['Email'] && !empty($_POST['Password']))){
        if(isset($repa['Password'])  && isset($reEM['Email'])){
            while($row = $resultrole->fetch()){
                print_r($row);
                if($row['role']===0){
                    $_SESSION['Khachhang']=$Email;
                    header('location:index.php');
                    exit();
                }
                else if($row['role']===1){
                $_SESSION['nhanvien']=$Email;
                header('location:nhanvien.php');
                exit();
                }else{
                $_SESSION['Admin']=$Email;
                header('location:admin/');
                exit();
                }
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
                $sql= "INSERT INTO `users`(`Email`,`Password`) VALUES (?,md5(?))";
                $result=$conn->prepare($sql);
                $result->execute([
                $_POST['Email'],$_POST['password']
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
        $error['paem']="Mật Khẩu và Email không được để trống";
    }
    
} 
## chi tiet product
if(isset($_GET['product'])){
$IDpd=$_GET['product'];
$detailpd="SELECT * FROM `products` WHERE ID_pd=$IDpd";
$resultdetail=$conn->query($detailpd); 
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
                    <?php if(isset($_SESSION['Khachhang'])){
                        echo "<p class='text'>Khách hàng</p>
                        <a href='logout.php' class='text aheader'>đăng xuất</a>";
                    }else{?>
               <a href="login.php" class="text aheader"><i class="fas fa-lock"></i>Đăng Nhập</a>
                    <?php }?>
                <a href="" class="text iconheader aheader"><i class="fas fa-cart-plus"></i></a> 
                </div>
        </div>
        <div class="nav-top">
        <img src="images.jfif" width="70px" height="70px"/>
        <a href="index.php" class="textnav-a"> Trang Chủ</a>
        <a href="#" class="textnav-a">Giới Thiệu</a>
        <a href="#" class="textnav-a">Tin Tức</a>
        <a href="#" class="textnav-a">Liên Hệ </a>
        <form method="GET" class="nav-search" action="timkiem.php">
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
        <a href="seachtype.php?loai=<?=$datal[$inav1]['ID_loai']?>" class="nav-a">
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
            <a href="seachtype.php?loai=<?=$datal[$inav1]['ID_loai']?>">
                <?=$datal[$inav1]['ten_loai'] ?>
            </a>
            <?php }?>
    </div>