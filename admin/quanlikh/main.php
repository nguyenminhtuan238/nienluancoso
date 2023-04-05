<?php include 'handlekh.php';?>
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
        <?php while($row=$getkh->fetch()){?>
        <tr>
            <td> <?= $row['Email']?></td>
            <td> <?= $row['Name']?></td>
            <td> <?= $row['Phone']?></td>
            <td> <?= $row['address']?></td>
            <td class="text-center"> 
                <a href="index.php?q=kh&xkh=<?=$row['ID_users']?>" class="btn btn-primary">xóa tài khoản</a>
            </td>
            <td class="text-center"> 
                <a href="index.php?q=kh&lnv=<?=$row['ID_users']?>" class="btn btn-primary">làm Nhân viên</a>
            </td>
        </tr>
       <?php }?>
    </tbody>
</table>
</div>