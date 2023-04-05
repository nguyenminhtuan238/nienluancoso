
	<style>
		.cart-main{
			display: flex;
			justify-content: center;
			align-items: center;
			padding: 50px;
		}
		.cart-main>div{
			box-shadow: 0 1px 2px 1px #cccccc;
			padding: 50px;
    		margin: 30px 0;
    		overflow: hidden;
    		background: #FFF;
    		font-size: 14px;
		}
		.card, td, th {
			padding: 10px;
			text-align: center;
  			border: 1px solid;
		}
		.cart{
			width: 100%;
			margin-top: 5px;
			border-collapse: collapse;
		}
		.cart>caption{
			font-size: 22px;
			color: red;
			font-weight: 500;
			margin-bottom: 20px;
			float: left;
		}
		.button-cart{
			margin-top: 10px;
		}
		.button-cart>.pay{
			float: right;
			background: red;
			color: white;
			padding: 8px 20px;
			font-size: 15px;	
		}
		.button-cart>a{
			float: left;
			text-decoration: none;
			font-size: 15px;
			padding: 8px 20px;
			background: #666;
			color: white;
		}
	</style>
<div class="cart-main">
	<div >
    <table class="cart">
		<caption>GIỎ HÀNG</caption>
		<tr>
			<th>STT</th>
			<th>Hình ảnh</th>
			<th>Tên Sản Phẩm </th>
			<th>Số Lượng</th>
			<th>Giá</th>
			<th>Thành Tiền</th>
			<th>Xóa</th>
		</tr>
		<tbody id="mycart">
			<?php 
				if(isset($_SESSION['cart'])){
					$stt=1;
					foreach($_SESSION['cart'] as $itempd){		
			?>
			<tr>
				<td><?= $stt++?></td>
				<td><img src="imgpd/<?= $itempd['imgsp']?>" width="100px"></td>
				<td><?= $itempd['tensp']?></td>
				<td><?= $itempd['soluong']?></td>
				<td><?= $itempd['pricesp']?>đ</td>
				<td><?= $itempd['thanhtien']?>đ</td>
				<td><a href="index.php?giohang&deletecart=<?= $itempd['id']?>" ><i class="fas fa-trash"></i></a></td>
			</tr>	
			<?php }?>
			<tr>
				<td colspan="5">Tổng Tiền</td>
				<td colspan="2"><?=  $_SESSION['tientong']?>đ</td>
			</tr>	
			<?php }else{?>
			<tr>
				<td colspan="7">Không có Sản phẩm</td>
				
			</tr>	
			<?php }?>
		</tbody>
	</table>
	<div class="button-cart">
		<a href="index.php">Tiếp Tục Mua</a>
		<?php if(isset($_SESSION['Khachhang'])){?>
		<a href="checkout.php" class="pay" name="Thanhtoan">Thanh Toán</a>
		<?php }else{?>
		<a href="index.php?login" class="pay">Bạn phải đăng nhập để mua hàng</a>	
		<?php }?>
	</div>
	</div>
</div>
