<div class="row home-title d-flex justify-content-center align-items-center">
    <p>ADMIN - PAGE</p>
</div>
<div class="row">
    <h2>Cập nhật thông tin sản phẩm</h2>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">Cập nhật sản phẩm</div>
        <div class="card-body">
            <form action="index.php?route=updateproduct" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="product_id" value="<?= $one_product['id'] ?>">
                <input type="hidden" name="current_image" value="<?= $one_product['image'] ?>">
                <div class="form-group">
                    <label>Nhà xuất bản</label>
                    <select name="brand_id" class="form-select">
                        <!-- Nếu brand_id là null thì option này sẽ disabled -->
                        <option value="" <?= (is_null($one_product['brand_id']) || $one_product['brand_id'] == '') ? 'disabled' : '' ?>>Chọn nhà xuất bản</option>
                        <?php foreach ($brands as $brand): ?>
                            <option value="<?= $brand['id'] ?>" <?= ($brand['id'] == $one_product['brand_id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($brand['brand_name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>



                <div class="form-group">
                    <label>Tên tác phẩm</label>
                    <input name="name_product" type="text" value="<?= $one_product['name_product'] ?>"
                        class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Giá nhập </label>
                    <input name="import_price" type="text" value="<?= $one_product['import_price'] ?>"
                        class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Giá bán </label>
                    <input name="selling_price" type="text" value="<?= $one_product['selling_price'] ?>"
                        class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input name="image" type="file" class="form-control" placeholder="">
                    <img src="uploads<?= $one_product['image'] ?>" alt="" width="100px" height="100px">
                </div>
                <div class="form-group">
                    <label>Tác giả</label>
                    <input name="tacgia" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Kích thước bao bì</label>
                    <input name="kichthuoc" type="text" value="<?= $one_product['kichthuoc'] ?>" class="form-control"
                        placeholder="">
                </div>
                <div class="form-group">
                    <label>Số trang</label>
                    <input name="sotrang" type="text" value="<?= $one_product['sotrang'] ?>" class="form-control"
                        placeholder="">
                </div>
                <div class="form-group">
                    <label>Năm xuất bản</label>
                    <input name="namxuatban" type="text" value="<?= $one_product['namxuatban'] ?>" class="form-control"
                        placeholder="">
                </div>
                <div class="form-group">
                    <label>Ngôn ngữ</label>
                    <input name="ngonngu" type="text" value="<?= $one_product['ngonngu'] ?>" class="form-control"
                        placeholder="">
                </div>
                <div class="form-group">
                    <label>Thể loại</label>
                    <input name="theloai" type="text" value="<?= $one_product['theloai'] ?>" class="form-control"
                        placeholder="">
                </div>

                <button type="submit" name="capnhat" value="1" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>