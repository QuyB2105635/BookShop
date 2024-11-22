<?php
session_start();

// Kiểm tra nếu người dùng là admin (role_id = 0)
if (!isset($_SESSION['role']) || $_SESSION['role'] != 0) {
    // Nếu không phải admin, chuyển hướng tới trang đăng nhập
    header('location: login.php');
    exit();
}

    include('./view/component/header-admin.php');
    include('../model/connectDB.php');
    include('../model/product.php');
    include('../model/user.php');
    include('../model/brand.php');
    
    $route = isset($_GET['route']) ? $_GET['route'] : '';
    switch ($route) {
        case 'sanpham':
            $results = getAll_Products();
            // var_dump($results);
            include './view/product/product-admin.php';
            break;
        case 'brand':
            $results = getAll_Brand();
            include './view/brand/brand.php';
            break;
        case 'addbrand':
            include './view/brand/newBrand.php';
            break;
        case 'deletebrand':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete_brand($id);
            }
            header('Location: index.php?route=brand');
            exit();
        case "addnewbrand":
            if (isset($_POST['addnewbrand']) && $_POST['addnewbrand']) {
                $brand_name = $_POST['brand_name'];
                insertBrand($brand_name);
                header('Location: index.php?route=brand');
                exit();
            }
            break;
        case 'updatebrand':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $one_brand = getone_brand($id);
                if (!$one_brand) {
                    echo "Thương hiệu không tồn tại.";
                    break;
                }
                $one_brand = $one_brand[0];
                include "./view/brand/updateBrand.php";
            }
            if (isset($_POST['capnhatbrand']) && $_POST['capnhatbrand']) {
                $id = $_POST['brand_id'];
                $brand_name = $_POST['brand_name'];
                update_brand($id, $brand_name);
                header('Location: index.php?route=brand');
                exit();
            }
            break;
        case 'user':
            $results = getAll_User();
            include './view/user/user.php';
            break;
        case 'deleteuser':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete_user($id);
            }
            header('Location: index.php?route=user');
            exit();
        case 'deleteproduct':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete_product($id);
            }
            header('Location: index.php?route=sanpham');
            exit();
        case 'updateuser':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $one_user = getone_user($id);
                if (!$one_user) {
                    echo "Tài khoản không tồn tại.";
                    break;
                }
                $one_user = $one_user[0];
                include "./view/user/updateuser.php";
            }
            if (isset($_POST['capnhatuser']) && $_POST['capnhatuser']) {
                $id = $_POST['user_id'];
                $email = $_POST['email'];
                $role_id = $_POST['role_id'];
                $username = $_POST['username'];
                $address = $_POST['address'];
                $phonenumber = $_POST['phonenumber'];
                $status = $_POST['status'];
                update_user($id, $email, $role_id, $username, $address, $phonenumber, $status);
                header('Location: index.php?route=user');
                exit();
            }
            break;
        case 'addproduct':
            $results = getAll_Brand();
            // var_dump($results);
            include "./view/product/newProduct.php";
            break;
        case "themsanphammoi":
            if (isset($_POST['themsanphammoi']) && $_POST['themsanphammoi']) {
                $name_product = $_POST['name_product'];
                $brand_id = $_POST['brand_id'];
                $selling_price = $_POST['selling_price'];
                $import_price = $_POST['import_price'];
                $tacgia = $_POST['tacgia'];
                $kichthuoc = $_POST['kichthuoc'];
                $sotrang = $_POST['sotrang'];
                $namxuatban = $_POST['namxuatban'];
                $ngonngu = $_POST['ngonngu'];
                $theloai = $_POST['theloai'];
           
                // Xử lý upload ảnh
                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                    $target_dir = "../uploads/";
    
                    // Lấy tên tệp gốc và phần mở rộng
                    $original_filename = basename($_FILES["image"]["name"]);
    
                    // Tạo tên tệp mới với ngày giờ hiện tại
                    $new_filename = date('Ymd_His') . '_' . $original_filename;
                    $target_file = $target_dir . $new_filename;
    
                    // Di chuyển tệp đã tải lên thư mục đích
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    
                    // Lưu chỉ tên tệp vào cơ sở dữ liệu
                    $image_path = $new_filename;
                } else {
                    $image_path = "";
                }
    
                // Chèn sản phẩm vào cơ sở dữ liệu
                insertProduct($brand_id, $name_product, $selling_price, $import_price, $tacgia, $kichthuoc, $sotrang, $namxuatban, $ngonngu, $theloai, $image_path);
    
                // Chuyển hướng về trang danh sách sản phẩm
                header('Location: index.php?route=sanpham');
                exit();
            }
            break;
    
    
        case 'updateproduct':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $one_product = getone_product($id);
                if (!$one_product) {
                    echo "Sản phẩm không tồn tại.";
                    break;
                }
                $one_product = $one_product[0];
                $brands = getAll_Brand();
                include "./view/product/updateproduct.php";
            }
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $id = $_POST['product_id'];
                $brand_id = $_POST['brand_id'];
                $name_product = $_POST['name_product'];
                $selling_price = $_POST['selling_price'];
                $import_price = $_POST['import_price'];
                $tacgia = $_POST['tacgia'];
                $kichthuoc = $_POST['kichthuoc'];
                $sotrang = $_POST['sotrang'];
                $namxuatban = $_POST['namxuatban'];
                $ngonngu = $_POST['ngonngu'];
                $theloai = $_POST['theloai'];
                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                    $image_path = $_FILES["image"]["name"];
                } else {
                    $image_path = $_POST['current_image'];
                }
                update_product($id, $brand_id, $name_product, $selling_price, $import_price, $tacgia, $kichthuoc, $sotrang, $namxuatban, $ngonngu, $theloai, $image_path);

                header('Location: index.php?route=sanpham');
                exit();
            }
            break;
        case 'exit':
            session_unset();
            session_destroy();
            header('location: login.php');
            exit();
        default:
            include "./view/home-admin.php";
            break;

    }
    include './view/component/footer-admin.php';

?>