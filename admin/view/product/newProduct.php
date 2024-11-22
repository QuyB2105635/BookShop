<div class="container-fluid">
    <div class="card">
        <div class="card-header">Thêm sản phẩm</div>
        <div class="card-body">
            <form action="index.php?route=themsanphammoi" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Chọn nhà xuất bản</label> 
                    <select name="brand_id" class="form-select" aria-label="Default select example">
                    <option selected>Chọn nhà xuất bản</option>            
                    <?php 
                        if(isset($results) && (count($results) > 0)){
                            foreach ($results as $bra) {
                                echo '
                                    
                                   <option value="'.$bra['id'].'">'.$bra['brand_name'].'</option>  
                                
                                ';
                            }

                        }
                    ?>
                     </select>
                   
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
                    <input name="tacgia" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Kích thước bao bì</label>
                    <input name="kichthuoc" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Số trang</label>
                    <input name="sotrang" type="text" class="form-control" placeholder="">
                </div>
              
                <div class="form-group">
                    <label>Năm xuất bản</label>
                    <input name="namxuatban" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Ngôn ngữ</label>
                    <input name="ngonngu" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Thể loại</label>
                    <input name="theloai" type="text" class="form-control" placeholder="">
                    <button type="submit" name="themsanphammoi" value="1" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>