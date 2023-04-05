<?php include 'handlecm.php';?>
<div class="mt-3 mb-3">
<form class="d-flex " role="search" method="POST">
        <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search" name="searchcm">
        <button class="btn btn-outline-success" type="submitsp">Tìm</button>
</form>
</div>
<table class="table table-bordered mt-3">
    <tbody>
        <tr>
            <th>Tên Tài khoản</th>
            <th>Bình luận</th>
            <th></th>
        </tr>
        <?php while($row=$getcm->fetch()){?>
        <tr>
            <td><?=$row['Name']?></td>
            <td><?=$row['Post_cm']?></td>
            <td class="text-center">
                    <a href="index.php?nv=qlbl&dcm=<?= $row['ID_cm'] ?>" 
                    data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row['ID_cm'] ?>">
                        <i class="fas fa-trash"></i></a>
                </td>
        </tr>
         <!-- Modal -->
         <div class="modal fade" id="exampleModal<?= $row['ID_cm'] ?>"
             tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h3>Bạn có chắc xóa Bình luận Này?</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <a type="button" class="btn btn-primary" 
                            href="index.php?nv=qlbl&dcm=<?= $row['ID_cm'] ?>">Xóa Sản Phẩm</a>
                        </div>
                    </div>
                </div>
        <?php }?>
    </tbody>
</table>