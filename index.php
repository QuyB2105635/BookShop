<?php
session_start();
ob_start();
include './view/header.php';
include "./model/connectdb.php";
include "./model/user.php";
include "./model/product.php";
include "./model/order.php";
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
        if (isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];

            // Kiểm tra nếu giỏ hàng có sản phẩm
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                foreach ($_SESSION['cart'] as $index => $cart_item) {
                    // Kiểm tra sản phẩm có màu và dung lượng bộ nhớ trùng khớp không
                    if ($cart_item['product_id'] == $product_id) {
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
        // var_dump($_SESSION['cart']);
        include 'view/viewcart.php';
        break;
    case 'themgiohang':
        if (isset($_POST['themgiohang'])) {
            // Lấy thông tin sản phẩm từ POST
            $product_id = $_POST['product_id'];
            $name_product = $_POST['name_product'];
            $tacgia = $_POST['tacgia'];
            $image = $_POST['image'];
            $kichthuoc = $_POST['kichthuoc'];
            $sotrang = $_POST['sotrang'];
            $namxuatban = $_POST['namxuatban'];
            $ngonngu = $_POST['ngonngu'];
            $theloai = $_POST['theloai'];
            $selling_price = $_POST['selling_price'];
            $quantity = isset($_POST['quantity']) ? (int) $_POST['quantity'] : 1;  // Lấy số lượng, mặc định là 1
            // echo $product_id;
            // Kiểm tra và đảm bảo số lượng là một số hợp lệ
            if ($quantity <= 0) {
                $quantity = 1;  // Nếu số lượng không hợp lệ, đặt lại là 1
            }

            // Tạo mảng sản phẩm
            $product = array(
                'name_product' => $name_product,
                'tacgia' => $tacgia,
                'image' => $image,
                'kichthuoc' => $kichthuoc,
                'sotrang' => $sotrang,
                'namxuatban' => $namxuatban,
                'ngonngu' => $ngonngu,
                'theloai' => $theloai,
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

                if ($item['tacgia'] == $tacgia && $item['kichthuoc'] == $kichthuoc && $item['sotrang'] == $sotrang && $item['product_id'] == $product_id) {

                    $item['quantity'] += $quantity;
                    $found = true;
                    break;
                }
            }

            // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
            if (!$found) {
                $_SESSION['cart'][] = $product;
            }

            include 'view/viewcart.php';
        }
        break;

    case 'capnhatgiohang':
        if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
            $product_id = $_POST['product_id'];
            $quantity = intval($_POST['quantity']);

            // Kiểm tra nếu giỏ hàng có tồn tại
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                foreach ($_SESSION['cart'] as &$cart_item) {
                    // Tìm sản phẩm cần cập nhật
                    if ($cart_item['product_id'] == $product_id) {
                        if ($quantity > 0) {
                            $cart_item['quantity'] = $quantity; // Cập nhật số lượng
                        } else {
                            // Nếu số lượng = 0, xóa sản phẩm
                            unset($_SESSION['cart'][$index]);
                        }
                        break;
                    }
                }
                $_SESSION['cart'] = array_values($_SESSION['cart']); // Làm lại chỉ số mảng
            }
        }

        // Quay lại trang giỏ hàng
        header("Location: index.php?route=xemgiohang");
        exit;
        break;

    case 'thanh-toan':
        // Kiểm tra người dùng đã đăng nhập chưa
        if (!isset($_SESSION['email'])) {
            // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
            header('Location: index.php?route=dangnhap');
            exit();
        }

        include 'view/payment.php';
        break;

        case 'thanh_toan':
            // Kiểm tra người dùng đã đăng nhập chưa
            if (!isset($_SESSION['email'])) {
                header('Location: index.php?route=dangnhap');
                exit();
            }
        
            // Kiểm tra giỏ hàng
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Thông tin thanh toán
                    $user_email = $_SESSION['email'];
                    $name_customer = $_POST['name'];
                    $address = $_POST['address'];
                    $phone_number = $_POST['phone'];
                    $payment_method = $_POST['payment_method'];
                    $date_order = date('Y-m-d H:i:s');
                    $order_status = 1;
        
                    // Tạo mã đơn hàng
                    $order_code = '';
                    $order_code .= strtoupper(chr(rand(65, 90))) . strtoupper(chr(rand(65, 90))) . strtoupper(chr(rand(65, 90)));
                    $order_code .= rand(100000, 999999);
        
                    // Lưu từng sản phẩm trong giỏ hàng
                    $total_price = 0;
                    foreach ($_SESSION['cart'] as $cart_item) {
                        $product_id = $cart_item['product_id'];
                        $quantity = $cart_item['quantity'];
                        $price = $cart_item['selling_price'] * $quantity;
                        $total_price += $price;
        
                        $result = addOrder($user_email, $order_code, $name_customer, $address, $phone_number, $product_id, $quantity, $date_order, $price, $payment_method, $order_status);
                        if (!$result) {
                            echo '<script>alert("Đặt hàng thất bại cho sản phẩm: ' . $cart_item['product_name'] . '");</script>';
                            exit();
                        }
                    }
        
                    // Xóa giỏ hàng và thông báo thành công
                    unset($_SESSION['cart']);
                    echo '<script>alert("Đặt hàng thành công! Mã đơn hàng của bạn là: ' . $order_code . '"); window.location.href = "index.php?route=home";</script>';
                    exit();
                }
            } else {
                header('Location: index.php?route=viewcart');
                exit();
            }
            break;
        

    case 'xemdonhang':
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $allOrder = getOrdersByEmail($email);
            include 'view/customer_viewOrder.php';
        }else{
            header('Location: index.php?route=dangnhap');
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
                header('Location: index.php?route=dangnhap');
                exit();
            }
        }
        break;
    case 'timkiemsanpham':
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['keyword']) && $_POST['keyword'] != '') {
            $keyword = $_POST['keyword'];
            $products = searchProductsByName($keyword);

            if ($products !== false && !empty($products)) {
                include './view/search_result.php';
            } else {

                echo '<script type="text/javascript">
                            alert("Không tìm thấy sản phẩm với từ khóa: ' . htmlspecialchars($keyword) . '");
                            window.location.href = "index.php?route=home"; 
                          </script>';
            }
        } else {
            echo '<div class="alert alert-warning" role="alert">Vui lòng nhập từ khóa tìm kiếm.</div>';
        }
        break;

    case 'updateuserinfo':
        if (isset($_SESSION['email']) && $_SESSION['email'] != '') {
            $email = $_SESSION['email'];


            // Lấy thông tin người dùng từ database
            $userinfonow = getone_userbyemail($email);

            // Kiểm tra xem có dữ liệu người dùng hay không
            if (!empty($userinfonow)) {
                // var_dump($userinfonow);
                include './view/updateuserinfo.php';
            } else {
                // Nếu không tìm thấy người dùng, thông báo lỗi
                echo '<div class="alert alert-warning" role="alert">Không tìm thấy người dùng với email này.</div>';
            }
        } else {
            echo '<div class="alert alert-warning" role="alert">Không có user đăng nhập.</div>';
        }
        break;
    case 'updateuserinfomation':
        if (isset($_POST['updateuserinfomation'])) {
            // Lấy dữ liệu từ form
            $id = $_POST['user_id'];  // Chắc chắn bạn đã gửi user_id qua form
            $email = $_POST['email'];
            $username = $_POST['username'];
            $address = $_POST['address'];
            $phonenumber = $_POST['phonenumber'];

            // Kiểm tra thông tin hợp lệ
            if (empty($id) || empty($email) || empty($username)) {
                // Hiển thị thông báo lỗi và chuyển hướng
                echo '<script type="text/javascript">
                                    alert("Vui lòng điền đầy đủ thông tin.");
                                    window.location.href = "index.php?route=updateuserinfo"; 
                                  </script>';
            } else {
                // Gọi hàm cập nhật thông tin người dùng
                updateuserinfomation($id, $email, $username, $address, $phonenumber);

                // Hiển thị thông báo thành công và chuyển hướng
                echo '<script type="text/javascript">
                                    alert("Cập nhật thông tin người dùng thành công.");
                                    window.location.href = "index.php?route=updateuserinfo"; 
                                  </script>';
            }
        }
        break;




    default:
        include "./view/banner.php";
        include "./view/home.php";
        break;
}

include './view/footer.php';
