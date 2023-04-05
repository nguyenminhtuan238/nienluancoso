
        <div class="container">
          <form
            
            enctype="multipart/form-data"
            
            class="nop"
            method="POST"
          >
            <h1>Đăng Ký</h1>
            <div class="form-group mb-2">
              <input
                type="text"
                class="form-control"
                placeholder="Nhập vào Tên"
                name="Name"
                id="Name"
                minlength="8"
              />
              <p><?php if(isset($error['paem'])){ echo $error['paem']; }?></p>
            </div>
            <div class="form-group mb-2">
              <input
                type="text"
                class="form-control"
                placeholder="Nhập vào số điện thoại"
                name="Phone"
                id="Phone"
                minlength="8"
              />
              <p><?php if(isset($error['paem'])){ echo $error['paem']; }?></p>
            </div>
            <div class="form-group mb-2">
              <input
                type="text"
                class="form-control"
                placeholder="Nhập vào Địa chỉ"
                name="address"
                id="address"
                minlength="8"
              />
              <p><?php if(isset($error['paem'])){ echo $error['paem']; }?></p>
            </div>
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


