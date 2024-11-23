

<div class="home-title">
    <p style="font-size: 40px; color: #017EB6; border-bottom: 5px solid #017EB6; font-weight: 900" class="text-center">Cập nhật trạng thái đơn hàng</p>
</div>

<div class="container d-flex justify-content-center">
    <div style="width: 500px; margin-bottom: 50px" class="card">
        <div class="card-header">Cập nhật trạng thái đơn hàng</div>
        <div class="card-body">
            <?php 
                // Kiểm tra nếu có đơn hàng với order_code cụ thể
                if (isset($orders) && !empty($orders)) {
                    // Giả sử bạn lấy order_code từ phần tử đầu tiên trong mảng
                    $order_code = $orders[0]['order_code'];
            ?>
            <form action="index.php?route=updateOrderStatus" method="POST">
                <input type="hidden" name="order_code" value="<?= $order_code ?>">

                <div class="form-group">
                    <label>Trạng thái đơn hàng: <?= $order_code ?></label>
                    <select name="order_status" class="form-select">
                        <option value="1" <?= $orders[0]['order_status'] == '1' ? 'selected' : '' ?>>Đang chờ xử lý</option>
                        <option value="2" <?= $orders[0]['order_status'] == '2' ? 'selected' : '' ?>>Người bán đang chuẩn bị hàng</option>
                        <option value="3" <?= $orders[0]['order_status'] == '3' ? 'selected' : '' ?>>Đơn hàng hàng giao cho đơn vị vận chuyển</option>
                        <option value="4" <?= $orders[0]['order_status'] == '4' ? 'selected' : '' ?>>Đơn hàng đang vận chuyển</option>
                        <option value="5" <?= $orders[0]['order_status'] == '5' ? 'selected' : '' ?>>Đơn hàng đã được thanh toán thành công</option>
                    </select>
                </div>
                <button type="submit" name="capnhat" value="1" class="btn btn-primary">Cập nhật</button>
            </form>
            <?php
                } else {
                    echo "Không có đơn hàng để cập nhật.";
                }
            ?>
        </div>
    </div>
</div>
