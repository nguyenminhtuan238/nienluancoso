<?php
    require 'connect.php';
    session_start();
  if(isset($_POST['summit'])){
       $Name=$_POST['Name'];
       $Phone=$_POST['phone'];
       $address=$_POST['address'];
       $checkIDuser="SELECT ID_users FROM users WHERE Email='$_SESSION[Khachhang]'";
       $resultIduser=$conn->query($checkIDuser);
      if($row=mysqli_fetch_assoc($resultIduser)){
        $sql="INSERT INTO `information` (`ID_users`,`Name`,`phone`,`address`) VALUES ('$row[ID_users]','$Name','$Phone','$address')";
        if($conn->query($sql)===TRUE){
         echo"<script>alert('gui thanh cong');</script>";
        }
        else{
         echo "khong thanh cong";
        }
      }
     
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dk</title>
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" 
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" 
    crossorigin="anonymous">
    </script>
    
</head>
<body>
<main>
        <div class="container mt-5">
          <form
            
            enctype="multipart/form-data"
            id="nop"
            class="p-3"
            method="POST"
          >
            <h1>information</h1>
            <div class="form-group mb-2">
              <input
                type="text"
                class="form-control"
                placeholder="nhap ten"
                name="Name"
              />
            </div>

            <div class="form-group mb-2">
              <input
                type="text"
                class="form-control"
                placeholder="nhap so dien thoai"
                
                pattern="^[0-90-9]{10}"
                name="phone"
              />
            </div>

            <div class="form-group mb-2">
              <input
                type="text"
                class="form-control"
                placeholder="Nhập lại dia chi"
                
                minlength="8"
                name="address"
              />
            </div>

            <div class="form-group mb-2">
              <button type="submit" class="btn btn-primary w-100" id="bt" name="summit">
                gửi
              </button>
            </div>
          </form>
        </div>
      </main>
</body>

</html>