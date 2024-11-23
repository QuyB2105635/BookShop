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
                    <li><a href="index.php?route=xemgiohang">Giỏ hàng</a></li>
                    <li><a href="index.php?route=xemdonhang">Danh sách đơn hàng</a></li>
                </div>
            </div>
            <div class="col-sm-6 header-right">
                <form action="index.php?route=timkiemsanpham" method="POST" class="search d-none d-md-block">
                    <input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm..." required>
                    <button type="submit" class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>

                </form>

                <div class="dangnhap-dangky">
                    <?php
                    if (isset($_SESSION['email']) && ($_SESSION['email'] != "")) {
                        echo '
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ' . $_SESSION['username'] . '
                            </a>
                            <div class="dropdown-menu" >
                            <a class="dropdown-item" href="index.php?route=updateuserinfo">Chỉnh sửa thông tin</a>
                             
                            </div>
                        </li>
                        
                                        ';
                        echo '<li style="padding-top: 18px"><a  href="index.php?route=exit">Đăng xuất</a></li>';
                    } else {
                        ?>
                        <li><a href="index.php?route=dangnhap">Đăng nhập</a></li>
                        <li><a href="index.php?route=dangky">Đăng ký</a></li>

                    <?php } ?>
                </div>
            </div>
        </div>