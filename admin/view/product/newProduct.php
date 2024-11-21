
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Thêm sản phẩm</div>
            <div class="card-body">
                <form action="index.php?route=themsanphammoi" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>NXB id</label>
                        <input name="brand_id" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Tên tác phẩm</label>
                        <input name="name_product" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Giá bán </label>
                        <input name="selling_price" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Giá nhập </label>
                        <input name="import_price" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input name="image" type="file" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Tác giả</label>
                        <input name="color" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Kích thước bao bì</label>
                        <input name="display" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Số trang</label>
                        <input name="storage" type="text" class="form-control-file" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Năm xuất bản</label>
                        <input name="camera" type="text" class="form-control-file" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Ngôn ngữ</label>
                        <input name="CPU" type="text" class="form-control-file" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Thể loại</label>
                        <input name="battery" type="text" class="form-control-file" placeholder="">
                    <button type="submit" name="themsanphammoi" value="1" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
