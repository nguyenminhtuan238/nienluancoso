<?php include 'handlehd.php';?>
<table class="table table-bordered mt-3">
    <tbody>
        <tr>
            <th>Tên Tài khoản</th>
            <th>Email</th>
            <th>mã code</th>
            <th>Xem đơn hàng</th>
            <th>Duyệt đơn hàng</th>
        </tr>
        <?php while($row=$getcart->fetch()){?>
        <tr>
            <td><?=$row['Name']?></td>
            <td class="text-center">
                <?=$row['Email']?>
            </td>
            <td class="text-center">
                    <?= $row['code_cart']?>
                   
            </td>
            <td class="text-center">
            <a href="index.php?nv=kthd&hd=<?=$row['code_cart']?>" class="btn btn-primary">
            <i class="fas fa-eye"></i></a>
            </td>
            <td class="text-center">
            <a href="index.php?nv=addhd&taohd=<?=$row['ID_cart']?>" class="btn btn-primary">
            <i class="fas fa-check"></i>
            </a>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>