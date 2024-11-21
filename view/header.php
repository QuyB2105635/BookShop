<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <title>BOOK-SHOP</title>
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="./public/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>



<body>
    <div class="container-fluid">
        <div class="row header d-flex p-2">
            <div class="col-sm-6 d-flex align-items-center">
                <div class="logo"><img src="./public/images/logo.png" alt=""></div>
                <div class="menu d-flex">
                    <li><a href="index.php?route=home">Trang chủ</a></li>
                    <li><a href="index.php?route=sanpham">Sản phẩm</a></li>
                    <li><a href="index.php?route=gioithieu">Giới thiệu</a></li>
                    <li><a href="index.php?route=themgiohang">Giỏ hàng</a></li>
                </div>
            </div>
            <div class="col-sm-6 header-right">
                <div class="search d-none d-md-block">
                    <input type="text" placeholder="Tìm kiếm...">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <div class="dangnhap-dangky">
                    <?php
                        if (isset($_SESSION['email']) && ($_SESSION['email'] != "")) {
                            echo '<li><a href="index.php?route=userinfo">'.$_SESSION['username'].'</a></li>';
                            echo '<li><a href="index.php?route=exit">Exit</a></li>';
                        } else{
                    ?>
                    <li><a href="index.php?route=dangnhap">Đăng nhập</a></li>
                    <li><a href="index.php?route=dangky">Đăng ký</a></li>
                    
                    <?php } ?>
                </div>
            </div>
        </div>

