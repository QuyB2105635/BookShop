<div class="row home-title d-flex justify-content-center align-items-center"><p>ADMIN - PAGE</p></div>
<div class="row">
    <h2>Cập nhật thông tin người dùng</h2>
</div> 

<div class="container-fluid">
    <div class="card">

        <div class="card-body">
            <form action="index.php?route=updateuser" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="user_id" value="<?=$one_user['id']?>">
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" type="email" value="<?=$one_user['email']?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Role_id</label>
                    <input name="role_id" type="text" value="<?=$one_user['role_id']?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" type="text" value="<?=$one_user['username']?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input name="address" type="text" value="<?=$one_user['address']?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Phone number</label>
                    <input name="phonenumber" type="text" value="<?=$one_user['phonenumber']?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <input name="status" type="text" value="<?=$one_user['status']?>" class="form-control" placeholder="">
                </div>
                <button type="submit" name="capnhatuser" value="1" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
