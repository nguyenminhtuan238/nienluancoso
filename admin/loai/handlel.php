<?php
require 'connect.php';
if (isset($_POST['summitl'])) {
    if (!empty($_POST['namel'])) {
        $pl = $_POST['namel'];
        $getl = "SELECT * FROM `loai` WHERE ten_loai='$pl'";
        $findl = $conn->query($getl);
        $rowl = $findl->fetch();
        if (!isset($rowl['ten_loai'])) {
            $l = "INSERT INTO `loai`(ten_loai) VALUES (?)";
            $insetl = $conn->prepare($l);
            $insetl->execute([
                $pl
            ]);
            if ($insetl && $insetl->rowCount() == 1) {
                echo '<div class="alert alert-success alert-dismissible fade show mt-5" role="alert" id="alertX">
            <strong>Thêm Loại Thành công</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            } else {

                echo '<div class="alert alert-danger alert-dismissible fade show mt-5" role="alert" id="alertX">
            <strong>thêm Loại Thất Bại</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            }
        } else {
            echo '<div class="alert alert-primary alert-dismissible fade show mt-5" role="alert" id="alertX">
            <strong>Loại Sản Phẩm này đã tồn tại</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    } else {
        echo '<div class="alert alert-warning alert-dismissible fade show mt-5" role="alert" id="alertX">
            <strong>Không được để trống</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }
}
############## lien ke loai #############
$getalll="SELECT * FROM `loai`";
$rel=$conn->query($getalll);
################xoa loai ############
if(isset($_GET['dll'])){
    $idpd=$_GET['dll'];
    $xpd="DELETE FROM `products` WHERE ID_loai=(?)";
    $xl="DELETE FROM `loai` WHERE ID_loai=(?)";
    $delecm=$conn->prepare($xl);
    $deletepd=$conn->prepare($xpd);
    $delecm->execute([
        $idpd
    ]);
    $deletepd->execute([
        $idpd
    ]);
    header("Refresh:0;url=index.php?q=loai");
}
############## sua loai #################
if (isset($_GET['sual'])) {
    $l=$_GET['sual'];
    $getal="SELECT * FROM `loai` WHERE ID_loai=$l";
    $getlid=$conn->query($getal);
    $rowil=$getlid->fetch();
    if (isset($_POST['summitfixl'])) {
        $updatel="UPDATE `loai` SET ten_loai=(?) WHERE ID_loai=(?)";
        $reupl=$conn->prepare($updatel);
        $reupl->execute([
            $_POST['namel'],$l
        ]);
        if($reupl && $reupl->rowCount()==1){
            header("Refresh:0;url=index.php?q=loai");
  
          }else{
            echo '<div class="alert alert-danger alert-dismissible fade show mt-5" role="alert" id="alertX">
            <strong>Sửa Loại Sản Phẩm Thất bại</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          ';
          }
    }
}
?>