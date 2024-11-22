<?php
session_start();
ob_start();
include './view/header.php';
include "./model/connectdb.php";
include "./model/user.php";
include "./model/product.php";
$route = isset($_GET['route']) ? $_GET['route'] : '';
switch ($route) {
    case 'home':
        $results = getAll_Products();
        include "./view/banner.php";
        include './view/home.php';
        break;
    case 'sanpham':
        $results = getAll_Products();
        include './view/product.php';
        break;
    case 'add-sanphamm':
        $results = getAll_Products();
        include './view/product.php';
        break;
    case 'chitietsanpham':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $one_product = getone_product($id);
            $one_product = $one_product[0];

            include "./view/product-detail.php";
        }
        break;
    case 'gioithieu':
        include './view/introduce.php';
        break;
    case 'dangnhap':
        include './view/login.php';
        break;
    case 'dangky':
        include './view/signup.php';
        break;
    case 'exit':
        unset($_SESSION['role']);
        unset($_SESSION['id']);
        unset($_SESSION['email']);
        header('location: index.php');
        break;


    case 'xoagiohang':
        if (isset($_GET['color']) && isset($_GET['storage'])) {
            $color = $_GET['color'];
            $storage = $_GET['storage'];

            // Kiểm tra nếu giỏ hàng có sản phẩm
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                foreach ($_SESSION['cart'] as $index => $cart_item) {
                    // Kiểm tra sản phẩm có màu và dung lượng bộ nhớ trùng khớp không
                    if ($cart_item['color'] == $color && $cart_item['storage'] == $storage) {
                        // Xóa sản phẩm khỏi giỏ hàng
                        unset($_SESSION['cart'][$index]);
                        $_SESSION['cart'] = array_values($_SESSION['cart']);  // Làm lại chỉ số của mảng sau khi xóa
                        break;  // Thoát khỏi vòng lặp sau khi tìm thấy sản phẩm cần xóa
                    }
                }
            }
        }

        // Điều hướng lại đến giỏ hàng
        header("Location: index.php?route=xemgiohang");
        exit;
        break;
    case 'xemgiohang':
        include 'view/viewcart.php';
        break;
    case 'themgiohang':
        if (isset($_POST['themgiohang'])) {
            // Lấy thông tin sản phẩm từ POST
            $product_id = $_POST['product_id'];
            $color = $_POST['mau'];
            $image = $_POST['img'];
            $camera = $_POST['cam'];
            $display = $_POST['display'];
            $storage = $_POST['sto'];
            $CPU = $_POST['CPU'];
            $battery = $_POST['pin'];
            $selling_price = $_POST['selling_price'];
            $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;  // Lấy số lượng, mặc định là 1

            // Kiểm tra và đảm bảo số lượng là một số hợp lệ
            if ($quantity <= 0) {
                $quantity = 1;  // Nếu số lượng không hợp lệ, đặt lại là 1
            }

            // Tạo mảng sản phẩm
            $product = array(
                'color' => $color,
                'image' => $image,
                'camera' => $camera,
                'display' => $display,
                'storage' => $storage,
                'CPU' => $CPU,
                'battery' => $battery,
                'selling_price' => $selling_price,
                'quantity' => $quantity,
                'product_id' => $product_id
            );

            // Kiểm tra nếu giỏ hàng chưa tồn tại, tạo mảng giỏ hàng

            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();  // Khởi tạo giỏ hàng nếu chưa có
            }

            // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
            $found = false;
            foreach ($_SESSION['cart'] as &$item) {
                // Sửa lại chính tả sai: $prodduct_id => $product_id
                if ($item['color'] == $color && $item['storage'] == $storage && $item['display'] == $display && $item['product_id'] == $product_id) {
                    // Cập nhật số lượng nếu sản phẩm đã có trong giỏ hàng
                    $item['quantity'] += $quantity;
                    $found = true;
                    break;
                }
            }

            // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
            if (!$found) {
                $_SESSION['cart'][] = $product;
            }

            // Hiển thị giỏ hàng sau khi thêm sản phẩm (debug)
            // echo '<pre>';
            // var_dump($_SESSION['cart']);
            // echo '</pre>';

            // Bao gồm trang giỏ hàng để hiển thị thông tin
            include 'view/viewcart.php';  // Bạn cần tùy chỉnh viewcart.php để hiển thị giỏ hàng
        }
        break;


    case 'thanh-toan':
        include 'view/payment.php';
        break;
    case 'thanh_toan':
        // Kiểm tra giỏ hàng có sản phẩm hay không
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {

            // var_dump($_SESSION['cart']);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Lấy thông tin thanh toán từ form

                $name_customer = $_POST['name'];
                $address = $_POST['address'];
                $phone_number = $_POST['phone'];
                $payment_method = $_POST['payment_method'];

                // Tính tổng tiền giỏ hàng
                $total_price = 0;
                foreach ($_SESSION['cart'] as $cart_item) {
                    $product_id = $cart_item['product_id'];
                    $quantity = $cart_item['quantity'];
                    $total_price += $cart_item['selling_price'] * $cart_item['quantity'];
                }

                // Lưu thông tin đơn hàng vào cơ sở dữ liệu (giả sử bạn có một bảng "orders")
                $date_order = date('Y-m-d H:i:s');
                $order_status = 'pending';  // Trạng thái đơn hàng (chờ xử lý)
                $results = addOrder($name_customer, $address, $phone_number, $product_id, $quantity, $date_order, $total_price, $payment_method, $order_status);
                if ($results) {
                    include 'view/thanks.php';
                    unset($_SESSION['cart']);
                } else {
                    echo 'Đặt hàng không thành công';
                }
                exit;
            }
        } else {
            // Nếu giỏ hàng trống, chuyển hướng đến trang giỏ hàng
            header('Location: index.php?route=viewcart');
            exit;
        }
        break;


    case 'login':
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
            $email = htmlspecialchars($_POST['email']);
            $password = $_POST['password'];
            $user = check_user($email, $password);

            if ($user) {
                if ($user['role_id'] == 0) {
                    // Lưu thông tin người dùng vào session
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['role'] = $user['role_id'];
                    $_SESSION['username'] = $user['username'];
                    // Chuyển hướng đến trang quản trị
                    header('Location: ./admin/index.php');
                    exit();
                } else {
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['role'] = $user['role_id'];
                    $_SESSION['username'] = $user['username'];
                    header('Location: index.php');
                    exit();
                }
            } else {
                // Người dùng không tồn tại
                $_SESSION['error'] = 'Email hoặc mật khẩu không đúng.';
                header('Location: login.php');
                exit();
            }
        }
        break;

    default:
        include "./view/banner.php";
        include "./view/home.php";
        break;
}

include './view/footer.php';
