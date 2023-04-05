<form action="" class="border p-3" method="POST">
  <div class="mb-4 row">
    <label for="exampleFormControlInput1" class="form-label col-sm-4">Sửa Loại Sản Phẩm</label>
    <div class="col-sm-8">
      <input type="text" class="form-control "
       placeholder="Loại Sản Phẩm" 
       name="namel" value="<?=$rowil['ten_loai']?>">
    </div>
  </div>
  <div class="mb-3">
    <button class="btn btn-info w-100" type="submit" name="summitfixl">
      Sửa Loại Sản Phẩm
    </button>
  </div>
</form>