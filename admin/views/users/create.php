<?php $title = 'QUẢN LÝ NHÂN VIÊN - THÊM NHÂN VIÊN';
$previous = 'javascript:history.go(-1)';
if (isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
$pass = rand();
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h1 mb-2 text-gray-900">Thêm nhân viên</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="index.php?controller=users&action=index"><button class="btn btn-primary my-2"><i class="fas fa-arrow-left mr-2"></i>Quay về</button></a></h6>
        </div>
        <div class="card-body">
            <form action="index.php?controller=users&action=store" method="post" id = "createFormUser" class="row g-3">
              <div class="col-md-6">
                <label for="ten_khach" class="form-label">Họ tên nhân viên</label>
                <input id="userName" name="ten_khach" class="form-control" placeholder="Nhập họ tên nhân viên" autofocus>
              </div>
              
              <div class="col-md-6">
                <label for="sdt" class="form-label">Số điện thoại</label>
                <input id="sdt" name="sdt" class="form-control" placeholder="Nhập số điện thoại" autofocus>
              </div>
              
              <div class="col-md-6">
                <label class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="password" value = "
                    <?php
                        echo $pass;
                    ?>
                " name="mat_khau">
                
              </div>

              <div class="col-md-6">
                <label class="form-label">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" id="re_password" value = "
                    <?php
                        echo $pass;
                    ?>
                " name="re_mat_khau">
              </div>
              <div class="col-md-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="checkShowPass">
                  <label class="form-check-label" for="flexCheckDefault">
                    Hiển thị mật khẩu
                  </label>
                </div>
              </div>
              <div class="col-md-12"></div>
              <div class="col-md-6">
                <label class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="dia_chi">
              </div>
            </form>

            <div class="form-group text-center mt-5 col-md-12">
                  <button type="submit" class="btn btn-primary" form ="createFormUser">Thêm</button>
              </div>
        </div>
    </div>

</div>

<!-- /.container-fluid -->
<!-- End of Main Content -->
