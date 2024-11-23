<?php

function check_user($email, $password)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        return $user; // Trả về toàn bộ thông tin người dùng
    } else {
        return null;
    }
}


function getAll_User()
{
    $conn = connectDB();
    $stmt = $conn->prepare("SELECT * FROM users");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getone_user($id)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $one_user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $one_user;
}


function getone_userbyemail($email)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR); 
    $stmt->execute();
    $one_user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $one_user;
}


function delete_user($id)
{
    $conn = connectdb();
    $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function update_user($id, $email, $role_id, $username, $address, $phonenumber, $status)
{
    $conn = connectDB(); // Kết nối cơ sở dữ liệu

    // Câu truy vấn SQL với các tham số
    $sql = "UPDATE users SET email = :email, role_id = :role_id, username = :username, 
            address = :address, phonenumber = :phonenumber, status = :status 
            WHERE id = :id";

    // Chuẩn bị câu truy vấn
    $stmt = $conn->prepare($sql);

    // Gán các giá trị cho các tham số
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':role_id', $role_id);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':phonenumber', $phonenumber);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $id);

    // Thực hiện câu truy vấn
    $stmt->execute();
}

function updateuserinfomation($user_id, $email, $username, $address, $phonenumber)
{
    $conn = connectDB(); // Kết nối cơ sở dữ liệu

    $sql = "UPDATE users SET email = :email, username = :username,
            address = :address, phonenumber = :phonenumber
            WHERE id = :user_id";

    // Chuẩn bị câu truy vấn
    $stmt = $conn->prepare($sql);

    // Gán các giá trị cho các tham số
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':email', $email);

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':phonenumber', $phonenumber);

    // Thực hiện câu truy vấn
    $stmt->execute();
}


function get_userinfo($email, $password)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetch();

    if ((count($kq) > 0) && password_verify($password, $kq['password'])) {
        return $kq;
    }
}

?>