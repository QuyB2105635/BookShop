<div class="row home-title d-flex justify-content-center align-items-center">
    <p>CHI TIẾT SẢN PHẨM</p>
</div>
<div style="padding-bottom: 100px" class="row d-flex justify-content-center align-items-center">
    <div class="product-details" style="border:none">
        <?php
        // Debug: Kiểm tra giá trị của $one_product
        // var_dump($one_product);
        
        // Kiểm tra xem $one_product có tồn tại và là một mảng
        if (isset($one_product) && is_array($one_product) && count($one_product) > 0) {

            echo '
            <div class="product-info d-flex">
                <div class="product-detail-image">
                <img style="width: 300px; height: 300px" src="./uploads/' . $one_product['image'] . '" alt="Hình ảnh sản phẩm">
     
                </div>
                <div class="specifications">
                 
                    <h2>' . htmlspecialchars($one_product["name_product"]) . '</h2>
                    <h4 class="price">' . number_format($one_product["selling_price"], 0, ',', '.') . ' vnđ</h4>
                    <del>' . number_format($one_product["import_price"], 0, ',', '.') . ' vnđ</del>
                    <h4 style="padding-top: 15px;">Mô Tả Sản Phẩm</h4>
                    <table>
                        <tbody>
                            <tr>
                                <ul>
                                    <li><b>Tác Giả:</b> ' . htmlspecialchars($one_product["tacgia"]) . '</li>
                                    <li><b>Kích thước bao bì:</b> ' . htmlspecialchars($one_product["kichthuoc"]) . '</li>
                                    <li><b>Số Trang:</b> ' . htmlspecialchars($one_product["sotrang"]) . '</li>
                                    <li><b>Năm XB:</b> ' . htmlspecialchars($one_product["namxuatban"]) . '</li>
                                    <li><b>Ngôn Ngữ:</b> ' . htmlspecialchars($one_product["ngonngu"]) . '</li>
                                    <li><b>Thể Loại:</b> ' . htmlspecialchars($one_product["theloai"]) . '</li>
                                </ul>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <br>
                    <div class="activity">
                    <form action="index.php?route=themgiohang" method="POST">
                    <label for="quantity">Số lượng:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" max="100" step="1">
                    <input name="tacgia" type="hidden" value=' . htmlspecialchars($one_product["tacgia"]) . '>
                    <button name="themgiohang" type="submit" class="add-to-cart">Thêm vào giỏ hàng</button>
                    <input name="image" type="hidden" value=' . htmlspecialchars($one_product["image"]) . '>
                    <input name="kichthuoc" type="hidden" value=' . htmlspecialchars($one_product["kichthuoc"]) . '>
                    <input name="name_product" type="hidden" value="' . htmlspecialchars($one_product["name_product"]) . '">
                    <input name="sotrang" type="hidden" value=' . htmlspecialchars($one_product["sotrang"]) . '>
                    <input name="namxuatban" type="hidden" value=' . htmlspecialchars($one_product["namxuatban"]) . '>
                    <input name="ngonngu" type="hidden" value=' . htmlspecialchars($one_product["ngonngu"]) . '>  
                    <input name="theloai" type="hidden" value=' . htmlspecialchars($one_product["theloai"]) . '>
                    <input name="product_id" type="hidden" value=' . htmlspecialchars($one_product["id"]) . '>
                    <input name="selling_price" type="hidden" value=' . htmlspecialchars($one_product["selling_price"]) . '>
  
                         
                    </form>
                    </div>
                </form>
                </div>
            </div>';
        } else {
            echo '<p>Không có thông tin sản phẩm để hiển thị.</p>';
        }
        ?>
    </div>
</div>