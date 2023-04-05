<?php
require '../connect.php';
$cart="SELECT * FROM `cart`,`users` WHERE cart.ID_users=users.ID_users ";
$getcart=$conn->query($cart);
$tongtien=0;
if(isset($_GET['hd'])){
    $code_cart=$_GET['hd'];
    $cartdetails="SELECT * FROM `cart_details`,`products` 
        WHERE code_cart=$code_cart AND cart_details.ID_pd=products.ID_pd";
    $redetails=$conn->query($cartdetails);
   
}

?>