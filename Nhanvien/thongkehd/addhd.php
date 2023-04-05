<?php 
require '../connect.php';
if(isset($_GET['taohd'])){
    $id_cart=$_GET['taohd'];
    $hd="SELECT so_luong, Price,kho,cart_details.ID_pd FROM `cart`,`cart_details`,`products` 
        WHERE cart.ID_cart=$id_cart AND cart.code_cart=cart_details.code_cart 
        AND cart_details.ID_pd=products.ID_pd";
    $rehs=$conn->query($hd);
    $tong_tien=0;
    while($row=$rehs->fetch()){
        $tong_tien+=$row['so_luong']*$row['Price'];
        $tongsp=$row['kho']-$row['so_luong'];
        if($tongsp>=0){
            $kho="UPDATE `products` SET kho=(?) WHERE ID_pd=(?)";
            $upkho=$conn->prepare($kho);
            $upkho->execute([
                $tongsp,$row['ID_pd']
            ]);
            $e="cập nhập kho thành công";
        }else{
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Hàng Trong kho Không đủ vui lòng nhập thêm</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          $e="không thể cập nhật kho";
          break;
        }
    }
    if($e=="cập nhập kho thành công"){
    $id_users="SELECT ID_users,code_cart FROM `cart` WHERE cart.ID_cart=$id_cart";
    $reidus=$conn->query($id_users);
    $idus=$reidus->fetch();
    $bill="INSERT INTO `bill`(ID_users,Tong_tien,ID_nhanvien,code_cart) VALUES(?,?,?,?)";
    $inbill=$conn->prepare($bill);
    $inbill->execute([
        $idus['ID_users'],$tong_tien,$_SESSION['nhanvien']['ID_users'],$idus['code_cart']
    ]);
    $xoacart="DELETE FROM `cart` WHERE ID_cart=(?)";
    $deletecart=$conn->prepare($xoacart);
    $deletecart->execute([
        $id_cart
    ]);
    
    header("Location:index.php?nv=tkhd");
    }

}
?>
