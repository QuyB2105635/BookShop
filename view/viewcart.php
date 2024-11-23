<div class="container mt-3">
  <h2>Giỏ hàng</h2>
  <table class="table">
    <thead>
      <tr>
        <th>STT</th>
        <th>Hình ảnh sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Tổng tiền</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        // var_dump($_SESSION['cart']);
        $i = 1;
        $total_price = 0;

        foreach ($_SESSION['cart'] as $index => $cart_item) {
          $subtotal = $cart_item['selling_price'] * $cart_item['quantity'];
          $total_price += $subtotal;

          echo '
        <tr>
            <td>' . $i . '</td>
            <td><img src="./uploads/' . htmlspecialchars($cart_item['image']) . '" width="80" height="80" alt="' . htmlspecialchars($cart_item['tacgia']) . '"></td>
            <td style="width: 200px;">' . htmlspecialchars($cart_item['name_product']) . '</td>
            <td>' . number_format($cart_item['selling_price'], 0, ',', '.') . ' vnđ</td>
            <td style="width: 200px;">
                <form action="index.php?route=capnhatgiohang" method="POST" class="d-flex align-items-center">
                    <input type="hidden" name="product_id" value="' . htmlspecialchars($cart_item['product_id']) . '">
                    <input type="number" name="quantity" value="' . htmlspecialchars($cart_item['quantity']) . '" min="1" class="form-control w-50" style="display: inline-block;">
                    <button type="submit" class="btn btn-sm btn-primary ms-2">Cập nhật</button>
                </form>
            </td>
            <td>' . number_format($subtotal, 0, ',', '.') . ' vnđ</td>
            <td><a href="index.php?route=xoagiohang&product_id=' . urlencode($cart_item['product_id']) . '" class="btn btn-danger btn-sm">Xóa</a></td>
        </tr>';
          $i++;
        }

        echo '
    <tr>
        <td style="font-size: 20px;" colspan="1"><b>Tổng cộng:</b></td>
        <td style="font-size: 20px; color: red;"><b>' . number_format($total_price, 0, ',', '.') . ' vnđ</b></td>
        
    </tr>';
      } else {
        echo '<tr><td colspan="7">Giỏ hàng của bạn hiện tại đang trống.</td></tr>';
      }
      ?>
    </tbody>

  </table>

  <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
    <div >
    <a  href="index.php?route=thanh-toan" class="btn btn-success">Thanh toán</a>
      <a href="index.php" class="btn btn-primary">Tiếp tục mua sắm</a>
    </div>
  <?php } ?>
</div>