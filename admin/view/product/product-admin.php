<div class="container-fluid">


<div class="home-title">
        <p style="font-size: 40px; color: #017EB6;border-bottom: 5px solid #017EB6;font-weight: 900" class="text-center">Danh sách sản phẩm </p>
    </div>
<div class="row">
    <a href="index.php?route=addproduct"><button class="btn btn-primary">Thêm sản phẩm</button></a>
</div>
<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>NXB</th>
                <th>Tên tác phẩm</th>
                <th>Giá nhập</th>
                <th>Giá bán</th>
                <th>Image</th>
                <th>Tác giả</th>
                <th>Kích thước</th>
                <th>Số trang</th>
                <th>Năm xuất bản</th>
                <th>Ngôn ngữ</th>
                <th>Thể loại</th>
                <th>Quản lý</th>
            </tr>
        </thead>

        <tbody>
            <?php
            // var_dump($results);
            if (isset($results) && (count($results) > 0)) {
                $i = 1;
                // từ cái mảng result chạy qua các item là product
                foreach ($results as $product) {

                    echo '
                        <tr>
                            <td>' . $i . '</td>
                            <td>' . htmlspecialchars($product['brand_name']) . '</td>
                            <td style="width: 200px;">' . htmlspecialchars($product['name_product']) . '</td>
                            <td>' . htmlspecialchars(number_format($product["import_price"], 0, ',', '.')) . ' VNĐ</td>
                            <td>' . htmlspecialchars(number_format($product["selling_price"], 0, ',', '.')) . ' VNĐ</td> 
                            <td><img style="width: 100px; height: 100px" src="../uploads/' . $product['image'] . '" alt="Hình ảnh sản phẩm"></td>
                            <td>' . htmlspecialchars($product['tacgia']) . '</td>
                            <td style="width: 200px;">' . htmlspecialchars($product['kichthuoc']) . '</td>
                            <td>' . htmlspecialchars($product['sotrang']) . '</td>
                            <td>' . htmlspecialchars($product['namxuatban']) . '</td>
                            <td>' . htmlspecialchars($product['ngonngu']) . '</td>
                            <td>' . htmlspecialchars($product['theloai']) . '</td>
                            <td><a href="index.php?route=updateproduct&id=' . $product['id'] . '">Sửa</a> | <a href="index.php?route=deleteproduct&id=' . $product['id'] . '">Xóa</a></td>
                        </tr>
                            ';
                    $i++;
                }
            }
            ?>


        </tbody>
    </table>
</div>
</div>