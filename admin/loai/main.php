<div class="container">
<?php include 'handlel.php';?>
    <div class="row">
    <div class="loai col-sm-6">
        <?php if(isset($_GET['sual'])){
            include 'sual.php';
        }else{
            include 'addl.php';
        }?>
    </div>
    <div class="lietke col-sm-6">
        <?php include 'lkl.php'?>
    </div>
    </div>
</div>