    <style>
      .product-detail{
	display: flex;
    justify-content: center;
    align-items: center;
}
.product-detail>form{
    display: grid;
    gap: 10px;
    grid-template-columns: 50% 50%;
    grid-template-areas: "pdimg pdif";        
 }
.pdimg{
    grid-area: pdimg;
    margin-top: 10px;
    border: none;
    margin-bottom: 50px;
    position: relative;
 }
        .pdimg>img{
            
			display: inline-block;
             width: 100%;
            height: auto;
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
		.addcart{
			margin-top:20px;
			cursor:pointer;
		}
		.addcart>button{
            cursor:pointer;
			text-decoration:none;
			color:white;
			width:100%;
			display:inline;
			padding:15px 25px;
			background-color:#0089e5;
			border:1px solid #0089e5;
			font-size:16px;
		}
		.addcart> button:hover{
			color:#0089e5;
			background:white;
			border:1px solid #0089e5;
		}
		.addcart> button>i{
			margin-left:10px;
			margin-right:10px;
		}
		.soluong>span{
			font-size:16px;
			margin-right:15px;
		}
		.soluong>input{
			background: #fff;
			margin: 3px 0;
			width: 93px;
			padding-top: 3px;
			padding-bottom: 3px;
			border:1px solid grey;
			opacity:0.5;
		}
		.soluong>input:hover{
			opacity:1;
			
		}
        .comment{
            position: relative;
            left: 200px;
            width: 1028px;
            background: #FFF;
            border: 1px solid #EEE;
            border-radius: 3px;
        }
        .comment-form{
            width: 100%;
        }
        .comment-form>form{
            width: 100%;
        }
        .comment-text{
            margin-top: 10px;
            width: 97%;
            height: 59px;
            padding: 15px;
            border-radius: 3px;
            outline: none;
            border-color: #bfbfbf;
        }
        .comment-text:focus{
            border-color: #4671EA;
        }
        .Buttoncm{
            position: relative;
            left: 85%;
            width: 150px;
            padding: 5px;
            background-color: blue;
            color: white;
            cursor: pointer;
        }
        .alogincm{
            padding: 5px;
        }
        .alogincm>a{
            text-decoration: none;

        }
        .alogincm>a:hover{
            color: blue;
        }
        .getcomment>div>p{
            margin: 5px;
            
        }
        .postcm{
            background: #F5F5F5;
            padding: 10px 15px;
            border-radius: 4px;
        }
        .postcm>a{
           display: inline;
           float: right;
           margin: 5px;
           text-decoration: none;
        }
        .postcm>a:hover{
            color: red;
        }
        .postcm>p{
            display: inline;
        }
        .namecm{
            display: inline;
            font-size: 25px;
            margin-left: 5px;
            font-weight: 1000;
        }
        .cmdate{
            display: inline;
            font-size: 13px;
            margin-left: 5px;
            font-weight: 300;
        }
    </style>

    <div class="product-detail">
        <?php    
            while($rowdl=$resultdetail->fetch()){
              
        ?> 
        <form action="index.php?giohang&idpd=<?= $rowdl['ID_pd']?>" method="POST">
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
                   <input type="number" min="1" name="soluong" value="1">
            </div>
            <div class="addcart" >
                <button name="addcart">
                <i class="fas fa-shopping-cart"></i>
                Thêm vào giỏ hàng</button>
            </div>
        </div>
        </form>
        <?php }?>
    </div>
    <div class="comment ">
        <h1>Bình luận</h1>
        <div class="comment-form">
        <form action="" method="POST">
        <textarea name="message" class="comment-text" placeholder="*Nội Dung của Bạn"></textarea>
        <input name="Buttoncm" type="submit" value="Bình Luận" class="Buttoncm"></input>
        </form>
        <?php if(!isset($_SESSION['Khachhang']) && isset($_POST['Buttoncm'])){?>
            <div class="alogincm">
            <a href="login.php">Bạn phải đăng nhập để bình luận</a>
            </div>    
        <?php } ?>
        </div>
        <?php  while($row=$reshowcm->fetch()){
                if($row['ID_pd']==$_GET['product']){    
        ?>
        <div class="getcomment">
            <div class="ifcm">
            <p class="namecm"><?= $row['Name']?></p>
            <p class="cmdate"><?= $row['DATE(date_post)']?></p>
            </div>
            <div class="postcm">
            <p><?= $row['Post_cm']?></p>
            <?php if(isset($_SESSION['Khachhang'])){
                if($_SESSION['Khachhang']['ID_users']==$row['ID_users']){?>
            <a href="index.php?chitiet&product=<?=$row['ID_pd']?>&suaidcm=<?= $row['ID_cm'] ?>">sửa</a>
            <a href="index.php?chitiet&product=<?=$row['ID_pd']?>&xoaidcm=<?= $row['ID_cm'] ?>">xóa</a>
            <?php if(isset($_GET['suaidcm'])){?>
            <form action="" method="Post">
            <input type="text" name="fixcm">
            <button name="fixcmbu">Sửa Bình luận</button>
            </form>
            <?php }}?>
            </div>
        </div>
        <?php }}}?>
    </div>       
    
