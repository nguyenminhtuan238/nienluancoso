<form action="" class="m-3 border p-2" method="POST" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label for="exampleFormControlInput1" class="form-label col-sm-2">Tên Sản Phẩm</label>
            <div class="col-sm-10">
                <input type="text" class="form-control " 
                placeholder="Tên Sản Phẩm" name="namepd" 
                >
            </div>
        </div>
        <div class="mb-3 row">
            <label for="exampleFormControlInput1" class="form-label col-sm-2">Loại Sản Phẩm</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="loai">
                    <?php foreach ($datal as $addproduct):?>
                        <option selected><?= htmlspecialchars($addproduct['ten_loai']) ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="form-label col-sm-2" for="inputGroupFile01">Hình Ảnh</label>
            <div class="col-sm-10">
            <input type="file" class="form-control" id="inputGroupFile01" name="imagepd">
            </div>
           
        </div>
        <div class="mb-3 row">
            <label for="exampleFormControlInput1" class="form-label col-sm-2" >Giá</label>
            <div class="col-sm-10">
                <input type="Number" class="form-control " 
                placeholder="Giá Sản Phẩm" name="pricepd"
               
                >
            </div>

        </div>
        <div class="mb-3 row">
            <label for="exampleFormControlInput1" class="form-label col-sm-2" >Kho</label>
            <div class="col-sm-10">
                <input type="Number" class="form-control " 
                placeholder="Số lượng" name="slk"
                >
            </div>

        </div>
        <div class="mb-3 row">
            <label for="exampleFormControlTextarea1" class="form-label col-sm-2">Thông tin sản phẩm</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" 
                name="inpd" ></textarea>
            </div>
        </div>
        <div class="mb-3">
        <button class="btn btn-primary w-100" type="submit" name="summitpd">
        THêm Sản Phẩm
        </button>
        </div>

</form>