<?php
    require '../connect.php';
        $cm="SELECT * FROM `comments`,`users` WHERE comments.ID_users=users.ID_users ";
        $getcm=$conn->query($cm);
        if(isset($_POST['searchcm'])){
            if($_POST['searchcm']==""){
                $cm="SELECT * FROM `comments`,`users` WHERE comments.ID_users=users.ID_users ";
                $getcm=$conn->query($cm);
            }else{
                $cm="SELECT * FROM `comments`,`users` WHERE comments.ID_users=users.ID_users AND 
                users.Name LIKE '{$_POST['searchcm']}%' ";
                $getcm=$conn->query($cm);
            }
        }
    if(isset($_GET['dcm'])){
        $idcm=$_GET['dcm'];
        $icm="DELETE FROM `comments` WHERE ID_cm=(?)";
        $deletecm=$conn->prepare($icm);
        $deletecm->execute([
            $idcm
        ]);
        if($deletecm && $deletecm->rowCount()==1){
            header("Refresh:0;url=index.php?nv=qlbl");
        }else{
          echo '<div class="alert alert-danger alert-dismissible fade show mt-5" role="alert" id="alertX">
          <strong>Xóa Bình luận Thất bại</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
        }
    }
?>