<?php function getAll_Products() {
    $conn = connectDB();
    $sql = "
        SELECT p.*, b.brand_name 
        FROM product p
        LEFT JOIN brand b ON p.brand_id = b.id
    ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Kiểm tra dữ liệu trả về
    // echo '<pre>';
    // print_r($results); // In dữ liệu ra để kiểm tra
    // echo '</pre>';

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
    

    function searchProductsByName($query) {
        $conn = connectDB();
    
        $sql = "SELECT * FROM product WHERE name_product LIKE :searchTerm";
        $stmt = $conn->prepare($sql);
        
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->errorInfo()[2]));
        }
    
        $searchTerm = "%" . $query . "%";
        $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();
        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result === false) {
            die('Execute failed: ' . htmlspecialchars($stmt->errorInfo()[2]));
        }
    
        if (count($result) > 0) {
            return $result;
        } else {
            return false; // Không có kết quả
        }
    }
    
    
    
    
?>