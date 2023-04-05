<style>
    .HD {
        border-collapse: collapse;
        display: flex;
        margin-top: 10px;
        justify-content: center;
    }

    td,th {
        padding: 10px;
        text-align: center;
        border: 1px solid;
    }
</style>
<div class="grid-container">
    <div class="Main">

        <table class="HD">
            <tbody>
                <tr>
                    <th>Thời gian</th>
                    <th>Tổng tiền</th>
                </tr>
                <?php while($row=$reslHD->fetch()){?>
                <tr>
                    <td><?= $row['tg']?></td>
                    <td><?php echo $row['Tong_tien'];?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>

    </div>
</div>