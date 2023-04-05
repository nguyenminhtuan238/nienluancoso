<?php
    require '../connect.php';
    $hd="SELECT Tong_tien,DATE(createup) as tg,users.Name FROM `bill`,`users` WHERE ID_nhanvien=users.ID_users";
    $gethd=$conn->query($hd);
    $today = getdate();
    $tongt=0;
    if(isset($_POST['submitdate'])){
      $hd="SELECT Tong_tien,DATE(createup) as tg,users.Name FROM `bill`,`users` 
      WHERE ID_nhanvien=users.ID_users AND DAY(createup)=(?) AND
      MONTH(createup)=(?) AND YEAR(createup)=(?)";
       $gethd=$conn->prepare($hd);
       $gethd->execute([
         $_POST['day'],$_POST['month'],$_POST['year']
       ]);
    }
?>