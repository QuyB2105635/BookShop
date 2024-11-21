<?php 
    function getAll_Products() {
        $conn = connectDB();
        $stmt = $conn->prepare("SELECT * FROM product");
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
    
    function update_product($id, $brand_id, $name_product, $selling_price, $import_price, $color, $display, $storage, $camera, $CPU, $battery, $image_path) {
        $conn = connectDB();
        $sql = "UPDATE product SET 
                    brand_id = :brand_id, 
                    name_product = :name_product, 
                    selling_price = :selling_price, 
                    import_price = :import_price, 
                    color = :color, 
                    display = :display, 
                    storage = :storage, 
                    camera = :camera, 
                    CPU = :CPU, 
                    battery = :battery, 
                    image = :image 
                WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':brand_id', $brand_id);
        $stmt->bindParam(':name_product', $name_product);
        $stmt->bindParam(':selling_price', $selling_price);
        $stmt->bindParam(':import_price', $import_price);
        $stmt->bindParam(':color', $color);
        $stmt->bindParam(':display', $display);
        $stmt->bindParam(':storage', $storage);
        $stmt->bindParam(':camera', $camera);
        $stmt->bindParam(':CPU', $CPU);
        $stmt->bindParam(':battery', $battery);
        $stmt->bindParam(':image', $image_path);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    


    // function insertProduct($brand_id, $name_product, $selling_price , $import_price, $color, $display, $storage, $camera, $CPU, $battery, $image_path) {
    //     $conn = connectDB();
    //     $sql = "INSERT INTO product (brand_id, name_product, selling_price, import_price, $color, display, storage, camera, CPU, battery, image) 
    //             VALUES (:brand_id, :name_product, :selling_price, :import_price, :color, :display, :storage, :camera, :CPU, :battery, :image)";
    //     $stmt = $conn->prepare($sql);

    //     $stmt->bindParam(':brand_id', $brand_id);
    //     $stmt->bindParam(':name_product', $name_product);
    //     $stmt->bindParam(':selling_price', $selling_price);
    //     $stmt->bindParam(':import_price', $import_price);
    //     $stmt->bindParam(':color', $color);
    //     $stmt->bindParam(':display', $display);
    //     $stmt->bindParam(':storage', $storage);
    //     $stmt->bindParam(':camera', $camera);
    //     $stmt->bindParam(':CPU', $CPU);
    //     $stmt->bindParam(':battery', $battery);
    //     $stmt->bindParam(':image', $image_path);
        
    //     $stmt->execute();
    // }
    function insertProduct($brand_id, $name_product, $selling_price, $import_price, $color, $display, $storage, $camera, $CPU, $battery, $image_path) {
        $conn = connectDB();
        $sql = "INSERT INTO product (brand_id, name_product, selling_price, import_price, color, display, storage, camera, CPU, battery, image) 
                VALUES (:brand_id, :name_product, :selling_price, :import_price, :color, :display, :storage, :camera, :CPU, :battery, :image)";
        $stmt = $conn->prepare($sql);
    
        $stmt->bindParam(':brand_id', $brand_id);
        $stmt->bindParam(':name_product', $name_product);
        $stmt->bindParam(':selling_price', $selling_price);
        $stmt->bindParam(':import_price', $import_price);
        $stmt->bindParam(':color', $color);
        $stmt->bindParam(':display', $display);
        $stmt->bindParam(':storage', $storage);
        $stmt->bindParam(':camera', $camera);
        $stmt->bindParam(':CPU', $CPU);
        $stmt->bindParam(':battery', $battery);
        $stmt->bindParam(':image', $image_path);
        
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