<?php
    include 'handldqlhd.php';
?>
<div class="container">
<div class="d-flex justify-content-center">

  <form action="" method="post">
   <div class="input-group mb-3">
   <input type="number"  class="form-control w-25" name="day" value="<?= $today['mday']?>">
   <input type="number" class="form-control w-25" name="month" value="<?= $today['mon']?>" >
   <input type="number" class="form-control w-25" name="year" value="<?= $today['year']?>">
   <button class="btn btn-primary" type="submitdate" name="submitdate"><i class="fas fa-search"></i></button>
    </div>
  </form>
</div>
<table class="table table-bordered">
    <tbody>
        <tr>
            <th>Ngày tháng Năm</th>
            <th>Nhân viên xuất Hóa đơn</th>
            <th>Tổng Hóa đơn</th>
        </tr>
        <?php while($row=$gethd->fetch()){
            $tongt+=$row['Tong_tien'];
          ?>
        <tr>
            <td><?=$row['tg']?></td>
            <td><?=$row['Name']?></td>
            <td><?=$row['Tong_tien']?>đ</td>
        </tr>
        <?php }?>
        <tr>
            <th colspan="2">Tổng tiền bán được</th>
            <td><?= $tongt?>đ</td>
        </tr>
    </tbody>
</table>
</div>