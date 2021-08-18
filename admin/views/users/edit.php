
<?php $title = 'Nhân viên: '.$users->ten_khach; ?>
<div class="alert alert-danger" hidden></div>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h1 mb-2 text-gray-900">Thông tin nhân viên: <br> <small><?php echo $users->ten_khach; ?></small></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="index.php?controller=users&action=index"><button class="btn btn-primary my-2"><i class="fas fa-arrow-left mr-2"></i>Quay về</button></a></h6>
        </div>
        <div class="card-body">
            <form method="post" action = "index.php?controller=users&action=update&id=<?php echo $users->id; ?>"class="row g-3">
              <div class="col-md-6">
                <label for="route" class="form-label">Tên nhân viên</label>
                
                <input type="text" id="ten_khach" name="ten_khach" class="form-control" value="<?php echo $users->ten_khach; ?>" autofocus>
              </div>
              <div class="mt-2 col-md-6">
                <label class="form-label">Số điện thoại</label>
                <input type="text" id="sdt" class="form-control" name="sdt" value="<?php echo $users->sdt; ?>">
              </div>
              <div class="mt-2 col-md-6">
                <label class="form-label">Địa chỉ</label>
                <input type="text" id="dia_chi" class="form-control" name="dia_chi" value="<?php echo $users->dia_chi; ?>">
              </div>
              <div class="mt-2 col-md-6">
                <label class="form-label">Cấp độ</label>
                <!-- <input type="text" id="totalBus" class="form-control" name="bus" value="<?php echo $users->level; ?>"> -->
                <select id="level" name="level" class="form-control form-select">
                  <option value="0">Khách</option>
                  <option value="1" selected>Nhân viên</option>
                </select>
              </div>
              <div class="form-group text-center mt-5 col-md-6">
                  <button type="submit" class="btn btn-primary">Cập nhật</button>
              </div>
            </form>
        </div>
    </div>

</div>

<!-- /.container-fluid -->
<!-- End of Main Content -->
