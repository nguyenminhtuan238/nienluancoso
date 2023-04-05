<?php
    require '../connect.php';
    $nv="SELECT * FROM `users` WHERE role=1";
    $getnv=$conn->query($nv);
    if(isset($_GET['xnv'])){
        $xnv="DELETE FROM `users`WHERE ID_users=(?)";
        $getxnv=$conn->prepare($xnv);
        $getxnv->execute([
            $_GET['xnv'],
        ]);
        header("location:index.php?q=nv");
    }
?>
<div class="container">
<table class="table table-bordered">
    <tbody>
        <tr>
            <th> Địa chỉ Email</th>
            <th>Tên</th>
            <th>Số Điện Thoại</th>
            <th>Địa chỉ</th>
            <th></th>
            <th></th>
        </tr>
        <?php while($row=$getnv->fetch()){?>
        <tr>
            <td> <?= $row['Email']?></td>
            <td> <?= $row['Name']?></td>
            <td> <?= $row['Phone']?></td>
            <td> <?= $row['address']?></td>
            <td class="text-center"> 
                <a href="index.php?q=nv&xnv=<?=$row['ID_users']?>" class="btn btn-primary">xóa Nhân viên</a>
            </td>
        </tr>
       <?php }?>
    </tbody>
</table>
</div>