<div class="container mt-3">
  <h2>Giỏ hàng</h2>          
  <table class="table">
    <thead>
      <tr>
        <th>STT</th>
        <th>Hình ảnh sản phẩm</th>
        <th>Tác giả</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Tổng tiền</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
    <?php
        // Kiểm tra nếu giỏ hàng có sản phẩm
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            $i = 1;
            $total_price = 0; // Biến để tính tổng tiền giỏ hàng

            // Duyệt qua từng sản phẩm trong giỏ hàng
            foreach ($_SESSION['cart'] as $index => $cart_item) {
                $subtotal = $cart_item['selling_price'] * $cart_item['quantity'];  // Tính tổng tiền cho sản phẩm này
                $total_price += $subtotal;  // Cộng dồn vào tổng tiền giỏ hàng

                // Hiển thị thông tin sản phẩm
                echo '
                    <tr>
                        <td>' . $i . '</td>
                        <td><img src="./uploads/' . htmlspecialchars($cart_item['image']) . '" width="80" height="80" alt="' . htmlspecialchars($cart_item['color']) . '"></td>
                        <td>' . htmlspecialchars($cart_item['color']) . ' </td>
                        <td>' . number_format($cart_item['selling_price'], 0, ',', '.') . ' vnđ</td>
                        <td>' . $cart_item['quantity'] . '</td>
                        <td>' . number_format($subtotal, 0, ',', '.') . ' vnđ</td>
                        <td><a href="index.php?route=xoagiohang&color=' . urlencode($cart_item['color']) . '&storage=' . urlencode($cart_item['storage']) . '">Xóa</a></td>
                    </tr>';
                $i++;
            }

            // Hiển thị tổng tiền giỏ hàng
            echo '
                <tr>
                    <td colspan="5"><b>Tổng cộng:</b></td>
                    <td><b>' . number_format($total_price, 0, ',', '.') . ' vnđ</b></td>
                    <td></td>
                </tr>';
        } else {
            echo '<tr><td colspan="7">Giỏ hàng của bạn hiện tại đang trống.</td></tr>';
        }
    ?>
    </tbody>
  </table>

  <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
    <div class="d-flex justify-content-between">
      <a href="index.php" class="btn btn-primary">Tiếp tục mua sắm</a>
      <a href="index.php?route=thanh-toan" class="btn btn-success">Thanh toán</a>
    </div>
  <?php } ?>
</div>