<?php

function getAll_Brand() {
    $conn = connectDB();
    $stmt = $conn->prepare("SELECT * FROM brand");
    $stmt->execute();   
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}


function getBrandByID($id) {
    $conn = connectDB();
    $stmt = $conn->prepare("SELECT * FROM brand WHERE id =:id");
    $stmt->execute();   
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getone_brand($id){
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM brand WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $one_brand = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $one_brand;
}


function delete_brand($id){
    $conn = connectdb();
    $stmt = $conn->prepare("DELETE FROM brand WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function update_brand($id, $brand_name) {
    $conn = connectDB(); // Kết nối cơ sở dữ liệu

    // Câu truy vấn SQL với các tham số
    $sql = "UPDATE brand SET brand_name = :brand_name WHERE id = :id";
    // Chuẩn bị câu truy vấn
    $stmt = $conn->prepare($sql);

    // Gán các giá trị cho các tham số
    $stmt->bindParam(':brand_name', $brand_name);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    // Thực hiện câu truy vấn
    $stmt->execute();
}


function insertBrand($brand_name) {
    $conn = connectDB();
    $sql = "INSERT INTO brand (brand_name) VALUES (:brand_name)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':brand_name', $brand_name);

    $stmt->execute();
}


?>
