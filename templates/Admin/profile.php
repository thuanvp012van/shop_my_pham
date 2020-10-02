<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Thông tin cá nhân</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Thông tin cá nhân</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Thông tin cá nhân</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="http://m-shop.com/admin   /update-profile" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_admin" value="<?= $admin->id ?>">
            <div class="card-body">
                <div class="form-group">
                    <label for="email">Email </label>
                    <input type="email" id="email" class="form-control" disabled="disabled" value="<?= $admin->email ?>">
                </div>
                <div class="form-group">
                    <label for="full_name">Họ tên</label>
                    <input type="text" id="full_name" class="form-control" name="full_name" value="<?= $admin->full_name ?>">
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" id="phone" class="form-control" name="phone" value="<?= $admin->phone ?>">
                </div>
                <div class="form-group">
                    <label for="gender">Giới tính</label>
                    <select class="form-control" id="gender" name="gender">
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="position">Chức vụ</label>
                    <input type="text" id="position" class="form-control" disabled="disabled" value="<?php
                        if($admin->level==1)
                        {
                            echo "Admin";
                        }
                        else{
                            echo "Người viết bài";
                        }
                    ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ảnh</label><br>
                    <label for="exampleInputFile">
                        <img src="http://m-shop.com/images/avatar/<?= $admin->avatar ?>" style="width:100px">
                    </label>
                <input type="file" class="custom-file-input" name="avatar" id="exampleInputFile">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
        </div>
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
