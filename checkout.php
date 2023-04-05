<?php 
  require 'connect.php';
  session_start();
  $code_order=rand(0,9999);
  $insert_Order="INSERT INTO `cart`(ID_users,code_cart,cart_status) VALUES (?,?,?)";
  $resuleOrder=$conn->prepare($insert_Order);
  $resuleOrder->execute([
  $_SESSION['Khachhang']['ID_users'],$code_order,1
  ]);
  if($resuleOrder){
    foreach($_SESSION['cart'] as $va){
       $id_pd=$va['id'];
       $soluong=$va['soluong'];
       $insert_Orderdtail="INSERT INTO cart_details(code_cart,ID_pd,so_luong) VALUES (?,?,?)";
       $resuleOrderdl=$conn->prepare($insert_Orderdtail);
       $resuleOrderdl->execute([
         $code_order,$id_pd,$soluong
       ]);
    }
   
  }
  unset($_SESSION['cart'] );
  unset( $_SESSION['tientong']);
  header('Location:index.php')
?>