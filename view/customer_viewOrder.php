<div class="container-fluid">
    <div class="home-title">
        <p style="font-size: 40px; color: #017EB6;border-bottom: 5px solid #017EB6;font-weight: 900" class="text-center">Danh sách đơn hàng của bạn</p>
    </div>

    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Sản phẩm</th>
                    <th>Tổng tiền</th>
                    <th>Phương thức thanh toán</th>
                    <th>Tình trạng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Mảng ánh xạ trạng thái đơn hàng
                $order_status_map = [
                    1 => ['status' => 'Đang chờ xử lý', 'color' => 'text-warning'],
                    2 => ['status' => 'Người bán đang chuẩn bị hàng', 'color' => 'text-info'],
                    3 => ['status' => 'Đơn hàng đã giao cho đơn vị vận chuyển', 'color' => 'text-primary'],
                    4 => ['status' => 'Đơn hàng đang vận chuyển', 'color' => 'text-primary'],
                    5 => ['status' => 'Đơn hàng đã được thanh toán thành công', 'color' => 'text-success']
                ];

                // Nhóm dữ liệu theo order_code
                $groupedOrders = [];
                foreach ($allOrder as $order) {
                    $code = $order['order_code'];
                    if (!isset($groupedOrders[$code])) {
                        $groupedOrders[$code] = [
                            'name_customer' => $order['name_customer'],
                            'phone_number' => $order['phone_number'],
                            'payment_method' => $order['payment_method'],
                            'order_status' => $order['order_status'],
                            'products' => [],
                            'total_price' => 0
                        ];
                    }
                    // Thêm sản phẩm vào danh sách
                    $groupedOrders[$code]['products'][] = $order['name_product'] . ' (x' . $order['quantity'] . ')';
                    // Tính tổng tiền
                    $groupedOrders[$code]['total_price'] += $order['quantity'] * $order['selling_price'];
                }

                // Hiển thị dữ liệu đã nhóm
                $i = 1;
                foreach ($groupedOrders as $order_code => $data) {
                    $order_status_text = $order_status_map[$data['order_status']]['status'] ?? 'Không xác định';
                    $order_status_color = $order_status_map[$data['order_status']]['color'] ?? 'text-secondary';

                    echo '<tr>';
                    echo '<td>' . $i . '</td>';
                    echo '<td>' . htmlspecialchars($order_code) . '</td>';
                    echo '<td>' . htmlspecialchars($data['name_customer']) . '</td>';
                    echo '<td>' . htmlspecialchars($data['phone_number']) . '</td>';
                    echo '<td>' . implode('<br>', $data['products']) . '</td>'; // Sản phẩm xuống dòng
                    echo '<td>' . number_format($data['total_price'], 0, ',', '.') . ' VNĐ</td>';
                    echo '<td>' . htmlspecialchars($data['payment_method']) . '</td>';
                    echo '<td><span class="' . $order_status_color . '">' . $order_status_text . '</span></td>';
                    echo '</tr>';
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
