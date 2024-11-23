<?php 
function getAll_Order() {
    // Kết nối đến cơ sở dữ liệu
    $conn = connectDB();

    // Câu lệnh SQL kết hợp bảng orders với bảng products theo product_id
    $stmt = $conn->prepare("
        SELECT o.id AS order_id, o.order_code, o.user_email, o.name_customer, o.address, o.phone_number, 
               o.quantity, o.date_order, o.total_price, o.payment_method, o.order_status,
               p.id AS product_id, p.name_product, p.selling_price
        FROM orders o
        JOIN product p ON o.product_id = p.id
    ");

    // Thực thi câu lệnh SQL
    $stmt->execute();

    // Lấy tất cả kết quả trả về
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Trả về kết quả
    return $results;
}



function getOrdersByEmail($email)
{
    $conn = connectdb();
    $stmt = $conn->prepare("
        SELECT o.*, p.name_product, p.selling_price
        FROM orders o
        LEFT JOIN product p ON o.product_id = p.id
        WHERE o.user_email = :email
    ");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($results);
    return $results;
}


    function delete_Order($order_code){
        $conn = connectdb();
        $stmt = $conn->prepare("DELETE FROM orders WHERE order_code = :order_code");
        $stmt->bindParam(':order_code', $order_code, PDO::PARAM_STR);
        $stmt->execute();
    }

    // function getone_Order($order_code){
    //     $conn = connectdb();
    //     if ($conn) {
    //         $stmt = $conn->prepare("SELECT * FROM orders WHERE order_code = :order_code");
    //         $stmt->bindParam(':order_code', $order_code, PDO::PARAM_STR);
    //         if ($stmt->execute()) {
    //             $one_order = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //             return $one_order;
    //         } else {
    //             echo "Error executing the query";
    //             return [];
    //         }
    //     } else {
    //         echo "Database connection failed.";
    //         return [];
    //     }
    // }



    function getOrderByOrderCode($order_code) {
        $conn = connectDB();
        
        // Truy vấn lấy tất cả các sản phẩm trong một đơn hàng cụ thể
        $stmt = $conn->prepare("
            SELECT o.order_code, o.user_email, o.name_customer, o.address, o.phone_number, 
                   o.date_order, o.total_price, o.payment_method, o.order_status, 
                   p.name_product, p.selling_price, o.quantity
            FROM orders o
            JOIN product p ON o.product_id = p.id
            WHERE o.order_code = :order_code
        ");
        
        // Liên kết tham số :order_code với giá trị thực tế
        $stmt->bindParam(':order_code', $order_code, PDO::PARAM_STR);
    
        // Thực thi câu lệnh SQL
        $stmt->execute();
        
        // Lấy kết quả
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $results;
    }
    
    
    function updateStatus_Order($order_code, $new_status) {
        // Kết nối với cơ sở dữ liệu (giả sử bạn đã có hàm connectdb())
        $conn = connectdb();
        
        // Cập nhật trạng thái cho tất cả đơn hàng có cùng order_code
        $stmt = $conn->prepare("UPDATE orders SET order_status = :order_status WHERE order_code = :order_code");
        $stmt->bindParam(':order_code', $order_code, PDO::PARAM_STR);
        $stmt->bindParam(':order_status', $new_status, PDO::PARAM_INT);
        
        // Thực thi câu lệnh
        return $stmt->execute(); // Trả về true nếu thành công, false nếu có lỗi
    }
    
    
    
    function addOrder($user_email, $order_code, $name_customer, $address, $phone_number, $product_id, $quantity, $date_order, $total_price, $payment_method, $order_status) {
        $conn = connectdb();
        $stmt = $conn->prepare("
            INSERT INTO orders (user_email, order_code, name_customer, address, phone_number, product_id, quantity, date_order, total_price, payment_method, order_status)
            VALUES (:user_email, :order_code, :name_customer, :address, :phone_number, :product_id, :quantity, :date_order, :total_price, :payment_method, :order_status)
        ");
        $stmt->bindParam(':user_email', $user_email, PDO::PARAM_STR);
        $stmt->bindParam(':order_code', $order_code, PDO::PARAM_STR);
        $stmt->bindParam(':name_customer', $name_customer, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':phone_number', $phone_number, PDO::PARAM_STR);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':date_order', $date_order, PDO::PARAM_STR);
        $stmt->bindParam(':total_price', $total_price, PDO::PARAM_STR);
        $stmt->bindParam(':payment_method', $payment_method, PDO::PARAM_STR);
        $stmt->bindParam(':order_status', $order_status, PDO::PARAM_INT);
    
        return $stmt->execute();
    }
    
    
?>