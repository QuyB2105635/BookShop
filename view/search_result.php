







<div class="row home-title d-flex justify-content-center align-items-center">
            <p>Kết quả tìm kiếm với từ khóa: "<?php echo htmlspecialchars($keyword); ?>"</p>
        </div>
        <div class="row products" id="products">
        <?php
        // var_dump($results);
            if (isset($products) && (count($products) > 0)) {
                $i = 1;
                // từ cái mảng result chạy qua các item là product
                foreach ($products as $product) {
                
                    echo '
                                 
                                        <div class="col-sm-3 products-container mt-3">
                                            <div class="box">
                                                <img src="../uploads/' . $product['image'] . '" alt="' . htmlspecialchars($product['name_product']) . '" />
                                                <div class="box-text">
                                                 
                                                    <h2 class="name-product">' . htmlspecialchars($product['name_product']) . '</h2>
                                                    <h2>Số trang: ' . htmlspecialchars($product['sotrang']) . '</h2>
                                                    <h2>Tác giả: ' . htmlspecialchars($product['tacgia']) . '</h2>
                                                   <h4 class="price">'.number_format($product["selling_price"], 0, ',', '.') . ' vnđ</h4>
                                                    <del style="text-decoration: line-through;">'. number_format($product["import_price"], 0, ',', '.') . ' vnđ</del>
                                                   
                                                    <a href="index.php?route=chitietsanpham&id=' . $product['id'] . '"><button type="button" class="btn btn-info">Xem chi tiết</button></a>
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                    
                                                </div>
                                            </div>
                                        </div>

                               
                            ';
                    $i++;
                }
            }else{
                echo '<h1 class="text-center">Không có sản phẩm nào phù hợp với từ khóa của bạn.</h1>';
            }
            
        ?>

</div>
