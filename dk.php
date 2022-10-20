<?php
require 'connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php';?>
    <title>dk</title>
    <link rel="stylesheet" type="text/css" href="styleslogin.css"> 
    <style>
      .container{
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 20px;
            box-sizing: border-box;
        }
        .nop{
            text-align: center;
            width: 500px;
            border: 1px solid #dadce0;
            border-radius: 8px;
            padding: 30px;
        }
        .nop>h1{    
            font-size: 24px;
            font-weight: 500;
            margin-bottom: 15px;
        }
        .form-group{
            margin-bottom: 15px;
        }
        .form-control{
           position: relative;
           height: 35px;
           width: 300px;
           outline: none;
           border-radius: 5px;
           font-size: 16px;
           border: 1px solid #dadce0;
           padding: 5px;
        }
        .btn{
            width: 300px;
            border-radius: 5px;
            height: 50px;
            background-color: red;
            color: white;
            border: 1px solid #dadce0;
            cursor: pointer;
        }
        .btn:hover{
            opacity: 0.5;
        }
        .nop>.addac{
            display: flex;
            padding: 5px;
        }
        .addac>p{
            font-size: 13px;
            font-weight: 500;
            color: grey;
            margin-right: 5px;
        }
        .addac>a{
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            color: blue;
        }
        .form-group>p{
          font-size: 13px;
          color: red;
        }
    </style>
</head>
<body>
  <?php include 'header.php'?>
<main>
        <div class="container">
          <form
            
            enctype="multipart/form-data"
            
            class="nop"
            method="POST"
          >
            <h1>Đăng Ký</h1>
            <div class="form-group mb-2">
              <input
                type="email"
                class="form-control"
                placeholder="Email"
                id="email"
                pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$"
                name="Email"
              />
              <p><?php if(isset($error['Email'])){ echo $error['Email'];}
                else if(isset($error['paem'])){echo $error['paem'];}
              ?></p>
            </div>

            <div class="form-group mb-2">
              <input
                type="password"
                class="form-control"
                placeholder="Mật Khẩu"
                id="mk"
                minlength="8"
                name="password"
              />
              <p><?php if(isset($error['paem'])){ echo $error['paem']; }?></p>
            </div>

            <div class="form-group mb-2">
              <input
                type="password"
                class="form-control"
                placeholder="Nhập lại Mật Khẩu"
                name="password2"
                id="mk2"
                minlength="8"
              />
              <p><?php if(isset($error['retypepa'])){ echo $error['retypepa']; }?></p>
            </div>

            <div class="form-group mb-2">
              <button type="submit" class="btn btn-primary w-100" id="bt" name="summitdk">
                Đăng Ký
              </button>
            </div>
          </form>
        </div>
      </main>
      <?php include 'fooder.php'?> 
</body>

</html>
