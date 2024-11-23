<div class="row home-title d-flex justify-content-center align-items-center">
    <p>Thông tin người dùng</p>
</div>
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="index.php?route=updateuserinfomation" method="POST" enctype="multipart/form-data">
            <input name="user_id" type="hidden" value="<?= isset($userinfonow[0]['id']) ? htmlspecialchars($userinfonow[0]['id']) : '' ?>" class="form-control" placeholder="">
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" type="email" value="<?= isset($userinfonow[0]['email']) ? htmlspecialchars($userinfonow[0]['email']) : '' ?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" type="text" value="<?= isset($userinfonow[0]['username']) ? htmlspecialchars($userinfonow[0]['username']) : '' ?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input name="address" type="text" value="<?= isset($userinfonow[0]['address']) ? htmlspecialchars($userinfonow[0]['address']) : '' ?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Phone number</label>
                    <input name="phonenumber" type="text" value="<?= isset($userinfonow[0]['phonenumber']) ? htmlspecialchars($userinfonow[0]['phonenumber']) : '' ?>" class="form-control" placeholder="">
                </div>
                <button type="submit" name="updateuserinfomation" value="1" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
