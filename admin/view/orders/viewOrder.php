<div class="container-fluid">
    <div class="home-title">
        <p style="font-size: 40px; color: #017EB6; border-bottom: 5px solid #017EB6; font-weight: 900" class="text-center">Danh sách đơn đặt hàng</p>
    </div>

    <div class="row">
        <table class="table table-bordered">
            <thead>
                <?php
                // Kiểm tra và hiển thị thông báo flash
                if (isset($_SESSION['flash_message'])) {
                    // Hiển thị thông báo
                    echo '<div class="alert ' . htmlspecialchars($_SESSION['flash_message_type']) . '">';
                    echo htmlspecialchars($_SESSION['flash_message']);
                    echo '</div>';

                    // Xóa thông báo flash sau khi đã hiển thị
                    unset($_SESSION['flash_message']);
                    unset($_SESSION['flash_message_type']);
                }
                ?>
                <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Tổng giá</th>
                    <th>Phương thức thanh toán</th>
                    <th>Tình trạng</th>
                    <th>Cập nhật</th>
                </tr>
            </thead>

            <tbody>
                <?php
                // Mảng ánh xạ các giá trị order_status thành tên trạng thái và màu chữ tương ứng
                $order_status_map = [
                    1 => ['status' => 'Đang chờ xử lý', 'color' => 'text-warning'],
                    2 => ['status' => 'Người bán đang chuẩn bị hàng', 'color' => 'text-info'],
                    3 => ['status' => 'Đơn hàng đã giao cho đơn vị vận chuyển', 'color' => 'text-primary'],
                    4 => ['status' => 'Đơn hàng đang vận chuyển', 'color' => 'text-primary'],
                    5 => ['status' => 'Đơn hàng đã được thanh toán thành công', 'color' => 'text-success']
                ];

                // Kiểm tra nếu có dữ liệu đơn hàng
                if (isset($allOrder) && count($allOrder) > 0) {
                    $i = 1;
                    $grouped_orders = [];

                    // Nhóm các đơn hàng theo order_code
                    foreach ($allOrder as $order) {
                        $grouped_orders[$order['order_code']][] = $order;
                    }

                    // Lặp qua các đơn hàng đã nhóm
                    foreach ($grouped_orders as $order_code => $orders) {
                        // Lấy trạng thái đơn hàng từ đơn hàng đầu tiên trong nhóm
                        $order_status_text = isset($order_status_map[$orders[0]['order_status']]) ? $order_status_map[$orders[0]['order_status']]['status'] : 'Trạng thái không xác định';
                        $order_status_color = isset($order_status_map[$orders[0]['order_status']]) ? $order_status_map[$orders[0]['order_status']]['color'] : 'text-secondary';

                        // Tính tổng số lượng và tổng giá
                        $total_quantity = 0;
                        $total_price = 0;
                        $product_details = '';
                        $product_counter = 1; // Bộ đếm sản phẩm

                        foreach ($orders as $order) {
                            $total_quantity += $order['quantity'];
                            $total_price += $order['total_price'];
                            $product_details .= $product_counter . '. ' . htmlspecialchars($order['name_product']) . " (x" . $order['quantity'] . ")<br>";
                            $product_counter++; // Tăng bộ đếm sản phẩm sau mỗi lần lặp
                        }

                        // In ra thông tin đơn hàng
                        echo '
                        <tr>
                            <td>' . $i . '</td>
                            <td>' . htmlspecialchars($order_code) . '</td>
                            <td>' . htmlspecialchars($orders[0]['name_customer']) . '</td>
                            <td>' . htmlspecialchars($orders[0]['phone_number']) . '</td>
                            <td>' . htmlspecialchars($orders[0]['address']) . '</td>
                            <td style="width: 200px;">' . $product_details . '</td>
                            <td>' . $total_quantity . '</td>
                            <td>' . htmlspecialchars(number_format($total_price, 0, ',', '.')) . ' VNĐ</td>
                            <td>' . htmlspecialchars($orders[0]['payment_method']) . '</td>
                            <td ><span class="' . $order_status_color . '">' . $order_status_text . '</span></td>
                            <td style="display: flex; justify-content: space-between;">
                                <a href="index.php?route=updateOrderStatus&order_code=' . $order_code . '">
                                    <button class="btn btn-warning">Cập nhật</button>
                                </a>
                                <a href="index.php?route=deleteOrder&order_code=' . $order_code . '">
                                    <button class="btn btn-danger">Xóa</button>
                                </a>
                            </td>
                        </tr>';
                        $i++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
