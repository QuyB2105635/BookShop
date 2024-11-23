<div class="container">


<div class="home-title">
        <p style="font-size: 40px; color: #017EB6;border-bottom: 5px solid #017EB6;font-weight: 900" class="text-center">Danh sách nhà xuất bản</p>
    </div>
<div class="row">
    <a href="index.php?route=addbrand"><button class="btn btn-primary">Thêm NXB</button></a>
</div>
<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên NXB</th>
                <th>Quản lý</th>
            </tr>
        </thead>

        <tbody>
            <?php
       
            if (isset($results) && (count($results) > 0)) {
                $i = 1;
            
                foreach ($results as $brand) {
                    echo '
                        <tr>
                            <td>' . $i . '</td>
                            <td>' . htmlspecialchars($brand['brand_name']) . '</td>
                            <td><a href="index.php?route=updatebrand&id=' . $brand['id'] . '">Sửa</a> | <a href="index.php?route=deletebrand&id=' . $brand['id'] . '">Xóa</a></td>
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