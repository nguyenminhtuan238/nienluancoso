<?php include 'handlepd.php';?>
<form action="" method="POST" class="faddproduct" enctype="multipart/form-data">
<table>
    <tbody>
    <tr>
        <td>Tên Sản Phẩm</td>
        <td><input class="addname" type="text" name="namepd"></td>
    </tr>
    <tr>
        <td>Loại Sản phẩm</td>
        <td> 
            <select  name="loai">
                <?php foreach($datal as $addproduct):?>
                    <option><?=htmlspecialchars( $addproduct['ten_loai'])?></option>
                <?php endforeach ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Giá</td>
        <td><input class="addprice" type="number" name="pricepd"></td>
    </tr>
    <tr>
        <td>Hình Ảnh</td>
        <td><input class="addimage" type="file" name="imagepd"></td>
    </tr>
    <tr>
        <td>Thông tin Sản Phẩm</td>
        <td><textarea class="addinformation" name="inpd"></textarea></td>
    </tr>
    <tr>
        <td><button name="summitpd">THêm Sản Phẩm</button></td>
    </tr>
    </tbody>
</table>
</form>