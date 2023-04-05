<?php include 'handldtk.php';?>
<div class="mt-3 mb-3">
<form class="d-flex " role="search" method="POST">
        <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search" name="searchsp">
        <button class="btn btn-outline-success" type="submitsp">Tìm</button>
</form>
</div>
<table class="table table-bordered mt-3">
    <tbody>
        <tr>
            <th>Tên Sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Kho</th>
            <th>Sửa</th>
        </tr>
        <?php while($row=$getsp->fetch()){?>
        <tr>
            <td><?=$row['Namepd']?></td>
            <td class="text-center"><img src="../imgpd/<?=$row['pd_image']?>" width="100px"></td>
            
            <td class="text-center">
                    <?= $row['kho']?>
                   
            </td>
            <td class="text-center">
            <a href="index.php?nv=sk&kho=<?=$row['ID_pd']?>" class="btn btn-primary">
            <i class="fas fa-pen-square"></i></a>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>