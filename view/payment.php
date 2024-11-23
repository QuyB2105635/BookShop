<div class="container mt-3">
  <h2>Thông tin thanh toán</h2>
  <?php
    // Kiểm tra giỏ hàng
    // var_dump($_SESSION['cart']);
    if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
        echo '<p>Giỏ hàng của bạn hiện tại trống. Vui lòng thêm sản phẩm vào giỏ hàng trước khi thanh toán.</p>';
        echo '<a href="index.php" class="btn btn-primary">Tiếp tục mua sắm</a>';
    } else {
        // Hiển thị thông tin giỏ hàng
        echo '<h4>Giỏ hàng của bạn</h4>';
        echo '<table class="table">';
        echo '<thead><tr><th>STT</th><th>Tên sản phẩm</th><th>Giá</th><th>Số lượng</th><th>Tổng tiền</th></tr></thead>';
        echo '<tbody>';
        $total_price = 0;
        $i = 1;
        foreach ($_SESSION['cart'] as $cart_item) {
            $subtotal = $cart_item['selling_price'] * $cart_item['quantity'];
            $total_price += $subtotal;
            echo "<tr>
                    <td>{$i}</td>
                    <td>{$cart_item['name_product']}</td>
                    <td>" . number_format($cart_item['selling_price'], 0, ',', '.') . " vnđ</td>
                    <td>{$cart_item['quantity']}</td>
                    <td>" . number_format($subtotal, 0, ',', '.') . " vnđ</td>
                  </tr>";
            $i++;
        }
        echo '</tbody>';
        echo '</table>';
        echo '<p style="font-size: 25px;"><b>Tổng cộng: </b><b style="color: red;">' . number_format($total_price, 0, ',', '.') . ' vnđ</b></p>';
    }
  ?>

  <h3>Nhập thông tin thanh toán</h3>
  <form action="index.php?route=thanh_toan" method="POST">
    <div class="form-group">
      <label for="name">Họ và tên:</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Vui lòng nhập họ và tên" required>
    </div>
    <div class="form-group">
      <label for="address">Địa chỉ:</label>
      <input type="text" class="form-control" id="address" name="address" placeholder="Vui lòng nhập địa chỉ giao hàng" required>
    </div>
    <div class="form-group">
      <label for="phone">Số điện thoại:</label>
      <input type="text" class="form-control" id="phone" name="phone" placeholder="Vui lòng nhập số diện thoại" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Vui lòng nhập đúng email tài khoản đăng ký" required>
    </div>
    <div class="form-group">
      <label for="payment_method">Phương thức thanh toán:</label>
      <select class="form-control" id="payment_method" name="payment_method" required>
        <option value="COD">Thanh toán khi nhận hàng (COD)</option>
        <option value="bank_transfer">Chuyển khoản ngân hàng</option>
        <option value="online_payment">Thanh toán trực tuyến</option>
      </select>
    </div>

    <button type="submit" class="btn btn-success">Xác nhận thanh toán</button>
  </form>
</div>