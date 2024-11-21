<?php
include "./model/connectDB.php";
include "./view/header.php";
$conn = connectDB();

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

    if (!empty($email) && !empty($password)) {
        // Kiểm tra xem tên người dùng đã tồn tại chưa
        $stmt = $conn->prepare("SELECT * FROM `users` WHERE `email` = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo "<h1 class='signup p-5 text-center'>Thông báo<br>Đăng ký không thành công<br>Tài khoản đã tồn tại</h1>";
        } else {
            // Mã hóa mật khẩu
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $role_id = 1;
            $sql = "INSERT INTO `users` ( `username`, `email`, `password`, `role_id`) VALUES( :username,:email, :hashed_password, :role_id)";
            $stmt = $conn->prepare($sql);
            if ($stmt->execute(['username' => $username,'email' => $email, 'hashed_password' => $hashed_password, 'role_id' => $role_id])) {
                echo "<h1 class='signup p-5 text-center'>Thông báo<br>Đã đăng ký thành công</h1>";
            } else {
                echo "<h1 class='signup p-5 text-center'>Thông báo<br>Đăng ký không thành công</h1>";
            }
        }
    } else {
        echo "<h1 class='signup p-5 text-center'>Thông báo<br>Vui lòng nhập đầy đủ thông tin</h1>";
    }
}

include "./view/footer.php";
?>
