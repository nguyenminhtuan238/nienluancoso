<div class="mt-3 mb-3">
<form class="d-flex " role="search" method="POST">
        <input class="form-control me-2" type="search" placeholder="Tìm kiếm" 
        aria-label="Search" name="searchpd">
        <button class="btn btn-outline-primary" type="submitsp" name>Tìm</button>
</form>
</div>
<table class="table table-bordered">
    <tbody>
        <tr>
            <th>Tên Sản Phẩm</th>
            <th>Loại Sản Phẩm</th>
            <th>Hinh ảnh</th>
            <th>Giá</th>
            <th>Xóa</th>
            <th>Sửa</th>
        </tr>
        <?php while ($row = $getpd->fetch()) { ?>
            <tr>
                <td class="text-center"><?= $row['Namepd'] ?></td>
                <td class="text-center"><?= $row['ten_loai'] ?></td>
                <td class="text-center"><img src="../imgpd/<?= $row['pd_image'] ?>" alt="" width="200px"></td>
                <td class="text-center"><?= $row['Price'] ?>đ</td>
                <td class="text-center">
                    <a href="index.php?q=products&dlpd=<?= $row['ID_pd'] ?>" data-bs-toggle="modal" 
                    data-bs-target="#exampleModal<?= $row['ID_pd'] ?>">
                        <i class="fas fa-trash"></i></a>
                </td>
                <td class="text-center"><a href="index.php?q=fixpd&suapd=<?= $row['ID_pd']?>">
                    <i class="fas fa-pen"></i></a>
                </td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal<?= $row['ID_pd'] ?>" 
                tabindex="-1" aria-labelledby="exampleModalLabel" 
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h3>Bạn có chắc xóa sản phẩm?</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <a type="button" class="btn btn-primary" 
                            href="index.php?q=products&dlpd=<?= $row['ID_pd'] ?>">Xóa Sản Phẩm</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </tbody>
</table>