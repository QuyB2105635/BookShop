<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_POST['themgiohang']) && $_POST['themgiohang']) {
    // Lấy giá trị từ form
    $name_product=$_POST['name_product'];
    $color = $_POST['mau'];
    $image = $_POST['img'];
    $camera = $_POST['cam'];
    $display = $_POST['display'];
    $storage = $_POST['sto'];
    $CPU = $_POST['CPU'];
    $battery = $_POST['pin'];

    // Tạo mảng con
    $sp = array($name_product, $color, $image, $camera, $battery, $storage, $display);

    // Thêm vào giỏ hàng
    array_push($_SESSION['cart'], $sp);

    // Chuyển hướng đến trang giỏ hàng
    header('Location: viewcart.php');
    exit();
}
?>
