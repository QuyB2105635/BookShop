
<div class="container-fluid">
        <div class="card">
            <div class="card-header">Thêm NXB</div>
            <div class="card-body">
                <form action="index.php?route=addnewbrand" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Tên NXB</label>
                        <input name="brand_name" type="text" class="form-control" placeholder="">
                    </div>
                    <button type="submit" name="addnewbrand" value="1" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
