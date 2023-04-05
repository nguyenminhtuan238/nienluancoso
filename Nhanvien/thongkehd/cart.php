<?php include 'handlehd.php';?>
<a href="index.php?nv=tkhd" class="fs-4"><i class="fas fa-arrow-left "></i></a>
<table class="table table-bordered mt-3">
    <tbody>
        <tr>
            <th>Tên Sản phẩm</th>
            <th>Hinh ảnh</th>
            <th>Price</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
        <?php while($row=$redetails->fetch()){
            $tongtien+=$row['so_luong']*$row['Price'];
            ?>
        <tr>
            <td class="text-center">
                <?=$row['Namepd']?>
            </td>
            <td class="text-center">
               <img src="../imgpd/<?=$row['pd_image']?>" width="100px"> 
            </td>
            <td class="text-center">
                <?=$row['Price']?>đ
            </td>
            <td class="text-center">
                    <?= $row['so_luong']?>
                   
            </td>
            <td class="text-center">
                <?= $row['so_luong']*$row['Price']?>đ
            </td>
        </tr>
       
        <?php }?>
        <tr>
            <td colspan="4" class="text-center">Tổng tiền</td>
            <td class="text-center"><?= $tongtien?>đ</td>
        </tr>
    </tbody>
</table>