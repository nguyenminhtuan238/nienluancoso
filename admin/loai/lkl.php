<table class="table table-bordered">
    <tbody>
        <tr>
            <th>Tên Loại</th>
            <th></th>
            <th></th>
        </tr>
        <?php while ($row = $rel->fetch()) { ?>
            <tr>
                <td><?= $row['ten_loai'] ?></td>
                <td class="text-center">
                    <a href="index.php?q=loai&dll=<?= $row['ID_loai'] ?>" 
                    data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row['ID_loai'] ?>">
                        <i class="fas fa-trash"></i></a>
                </td>
                <td class="text-center"><a href="index.php?q=loai&sual=<?= $row['ID_loai'] ?>">
                        <i class="fas fa-pen"></i></a>
                </td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal<?= $row['ID_loai'] ?>"
             tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h3>Bạn có chắc xóa Loại sản phẩm?</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <a type="button" class="btn btn-primary" 
                            href="index.php?q=loai&dll=<?= $row['ID_loai'] ?>">Xóa Sản Phẩm</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
    </tbody>
</table>