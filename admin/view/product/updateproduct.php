<div class="row home-title d-flex justify-content-center align-items-center"><p>ADMIN - PAGE</p></div>
<div class="row">
    <h2>Cập nhật thông tin sản phẩm</h2>
</div> 

<div class="container-fluid">
    <div class="card">
        <div class="card-header">Cập nhật sản phẩm</div>
        <div class="card-body">
            <form action="index.php?route=updateproduct" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="product_id" value="<?=$one_product['id']?>">
                <input type="hidden" name="current_image" value="<?=$one_product['image']?>">
                <div class="form-group">
                    <label>NXB id</label>
                    <input name="brand_id" type="text" value="<?=$one_product['brand_id']?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Tên tác phẩm</label>
                    <input name="name_product" type="text" value="<?=$one_product['name_product']?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Giá nhập </label>
                    <input name="import_price" type="text" value="<?=$one_product['import_price']?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Giá bán </label>
                    <input name="selling_price" type="text" value="<?=$one_product['selling_price']?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input name="image" type="file" class="form-control" placeholder="">
                    <img src="uploads<?=$one_product['image']?>" alt="" width="100px" height="100px">
                </div>
                <div class="form-group">
                        <label>Tác giả</label>
                        <input name="color" type="text" class="form-control" placeholder="">
                    </div>
                <div class="form-group">
                    <label>Kích thước bao bì</label>
                    <input name="display" type="text" value="<?=$one_product['display']?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Số trang</label>
                    <input name="storage" type="text" value="<?=$one_product['storage']?>" class="form-control-file" placeholder="">
                </div>
                <div class="form-group">
                    <label>Năm xuất bản</label>
                    <input name="camera" type="text" value="<?=$one_product['camera']?>" class="form-control-file" placeholder="">
                </div>
                <div class="form-group">
                    <label>Ngôn ngữ</label>
                    <input name="CPU" type="text" value="<?=$one_product['CPU']?>" class="form-control-file" placeholder="">
                </div>
                <div class="form-group">
                    <label>Thể loại</label>
                    <input name="battery" type="text" value="<?=$one_product['battery']?>" class="form-control-file" placeholder="">
                <button type="submit" name="capnhat" value="1" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
