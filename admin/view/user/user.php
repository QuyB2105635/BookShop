<div class="container-fluid">


<div class="row home-title d-flex justify-content-center align-items-center">
    <p>Danh sách tài khoản</p>
</div>
    
<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Email</th>
                <th>Role_id</th>
                <th>Username</th>
                <th>Address</th>
                <th>Phone number</th>
                <th>Status</th>
                <th>Quản lý</th>
            </tr>
        </thead>

        <tbody>
            <?php
       
            if (isset($results) && (count($results) > 0)) {
                $i = 1;
            
                foreach ($results as $user) {
                    echo '
                        <tr>
                            <td>' . $i . '</td>
                            <td>' . htmlspecialchars($user['email']) . '</td>
                            <td>' . htmlspecialchars($user['role_id']) . '</td>
                            <td>' . htmlspecialchars($user['username']) . '</td>
                            <td>' . htmlspecialchars($user['address']) . '</td>
                            <td>' . htmlspecialchars($user['phonenumber']) . '</td>
                            <td>' . htmlspecialchars($user['status']) . '</td>
                            <td><a href="index.php?route=updateuser&id=' . $user['id'] . '">Sửa</a> | <a href="index.php?route=deleteuser&id=' . $user['id'] . '">Xóa</a></td>
                        </tr>
                            ';
                    $i++;
                }
            }
            ?>


        </tbody>
    </table>
</div>
</div>