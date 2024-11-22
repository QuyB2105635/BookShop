<?php 
function getAll_Products() {
    $conn = connectDB();
    // Lấy thông tin sản phẩm cùng với tên nhà xuất bản từ bảng brand
    $sql = "
        SELECT p.*, b.brand_name 
        FROM product p
        LEFT JOIN brand b ON p.brand_id = b.id
    ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}


    

    function delete_product($id){
        $conn = connectdb();
        $stmt = $conn->prepare("DELETE FROM product WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    
    function getone_product($id){
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * FROM product WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $one_product = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $one_product;
    }
    
    function update_product($id, $brand_id, $name_product, $selling_price, $import_price, $tacgia, $kichthuoc, $sotrang, $namxuatban, $ngonngu, $theloai, $image_path) {
        $conn = connectDB();
        $sql = "UPDATE product SET 
                    brand_id = :brand_id, 
                    name_product = :name_product, 
                    selling_price = :selling_price, 
                    import_price = :import_price, 
                    tacgia = :tacgia, 
                    kichthuoc = :kichthuoc, 
                    sotrang = :sotrang, 
                    namxuatban = :namxuatban, 
                    ngonngu = :ngonngu, 
                    theloai = :theloai, 
                    image = :image_path 
                WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':brand_id', $brand_id);
        $stmt->bindParam(':name_product', $name_product);
        $stmt->bindParam(':selling_price', $selling_price);
        $stmt->bindParam(':import_price', $import_price);
        $stmt->bindParam(':tacgia', $tacgia);
        $stmt->bindParam(':kichthuoc', $kichthuoc);
        $stmt->bindParam(':sotrang', $sotrang);
        $stmt->bindParam(':namxuatban', $namxuatban);
        $stmt->bindParam(':ngonngu', $ngonngu);
        $stmt->bindParam(':theloai', $theloai);
        $stmt->bindParam(':image_path', $image_path);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    
    function insertProduct($brand_id, $name_product, $selling_price, $import_price, $tacgia, $kichthuoc, $sotrang, $namxuatban, $ngonngu, $theloai, $image_path) {
        $conn = connectDB();
        $sql = "INSERT INTO product (brand_id, name_product, selling_price, import_price, tacgia, kichthuoc, sotrang, namxuatban, ngonngu, theloai, image) 
                VALUES (:brand_id, :name_product, :selling_price, :import_price, :tacgia, :kichthuoc, :sotrang, :namxuatban, :ngonngu, :theloai, :image_path)";
        $stmt = $conn->prepare($sql);
    
        $stmt->bindParam(':brand_id', $brand_id);
        $stmt->bindParam(':name_product', $name_product);
        $stmt->bindParam(':selling_price', $selling_price);
        $stmt->bindParam(':import_price', $import_price);
        $stmt->bindParam(':tacgia', $tacgia);
        $stmt->bindParam(':kichthuoc', $kichthuoc);
        $stmt->bindParam(':sotrang', $sotrang);
        $stmt->bindParam(':namxuatban', $namxuatban);
        $stmt->bindParam(':ngonngu', $ngonngu);
        $stmt->bindParam(':theloai', $theloai);
        $stmt->bindParam(':image_path', $image_path);
        
        $stmt->execute();
    }
    
    function  addOrder($name_customer, $address, $phone_number, $product_id, $quantity, $date_order, $total_price, $payment_method, $order_status) {
        // Kết nối cơ sở dữ liệu
        $conn = connectDB();
        
        // Câu lệnh SQL để thêm đơn hàng mới
        $sql = "INSERT INTO `orders` (name_customer, address, phone_number, product_id, quantity, date_order, total_price, payment_method, order_status) 
                VALUES (:name_customer, :address, :phone_number, :product_id, :quantity, :date_order, :total_price, :payment_method, :order_status )";
        
        // Chuẩn bị câu lệnh SQL
        $stmt = $conn->prepare($sql);
        
       
        // Bind tham số vào câu lệnh
        $stmt->bindParam(':name_customer', $name_customer);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':date_order', $date_order);
        $stmt->bindParam(':total_price', $total_price);
        $stmt->bindParam(':payment_method', $payment_method);
        $stmt->bindParam(':order_status', $order_status);

        
        // Thực thi câu lệnh SQL
        $stmt->execute();
        
        // Trả về ID của đơn hàng vừa được thêm
        return $conn->lastInsertId();
    }


    
    
?>