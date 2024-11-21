<?php
session_start();
include "../model/connectdb.php";
include "../model/user.php";

if (isset($_POST['dangnhap-admin']) && $_POST['dangnhap-admin']) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = check_user($email, $password);
    if ($user['role_id'] == 0) {
        // Lưu thông tin người dùng vào session
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role_id'];
        $_SESSION['username'] = $user['username'];
        // Chuyển hướng đến trang quản trị
        header('location: index.php');
        exit();
    } else {
        $txt_error = "Sai user, pass hoặc không tồn tại.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="admin/view/image/logo.png" type="image/x-icon">
    <title>BOOK-SHOP</title>
    <link rel="stylesheet" href="./view/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="row">
    <div class="container-login">
        <div class="card-login">
            <h1 class="title">ĐĂNG NHẬP</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form">
                <div>
                    <input type="email" name="email" placeholder="Email address" required>
                </div>
                <div>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="forgot-password">
                    <a href="#">Forgot password?</a>
                </div>
                <input class="btn-login" type="submit" name="dangnhap-admin" value="Log in">
            </form>
            <?php
            if (isset($txt_error)) {
                echo "<div class='text-danger'>$txt_error</div>";
            }
            ?>
            <div class="signup">
                <p>Bạn không có tài khoản?<a href="index.php?route=dangky">Đăng ký ngay</a></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
