<div class="row home-title d-flex justify-content-center align-items-center"><p>ADMIN - PAGE</p></div>
<div class="row">
    <h2>Cập nhật thông tin NXB</h2>
</div> 

<div class="container-fluid">
    <div class="card">

        <div class="card-body">
            <form action="index.php?route=updatebrand" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="brand_id" value="<?=$one_brand['id']?>">
                <div class="form-group">
                    <label>Tên NXB</label>
                    <input name="brand_name" type="text" value="<?=$one_brand['brand_name']?>" class="form-control" placeholder="">
                </div>
                
                <button type="submit" name="capnhatbrand" value="1" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>

    </div>
</div>
