<?php $title = "Thêm xe chạy";
$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h1 mb-2 text-gray-900">Thêm xe chạy</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="index.php?controller=bus&action=home"><button class="btn btn-primary my-2"><i class="fas fa-arrow-left mr-2"></i>Quay về</button></a></h6>
        </div>
        <div class="card-body">
            <form action="index.php?controller=bus&action=store" method="post" class="row g-3">
              <div class="col-md-6">
                <label for="route" class="form-label">Tuyến Xe</label>
                <select id="route" name="route" class="form-control form-select">
                  <option selected disabled="disabled">===Chọn tuyến xe===</option>
                  <?php foreach ($routes as $route) {
                      echo '<option value='.$route->id.'>'.$route->routeName.'</option>';
                  } ?>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Ngày đi</label>
                <input type="date" class="form-control" name="ngay">
              </div>
              <div class="mt-2 col-md-6">
                <label class="form-label">Giờ đi</label>
                <input type="time" class="form-control" name="gio">
              </div>
              <div class="mt-2 col-md-6">
                <label class="form-label">Số ghế</label>
                <input type="text" class="form-control" name="seat" placeholder="Số ghế trên xe" >
              </div>
              <div class="form-group text-center mt-5 col-md-6">
                  <button type="submit" class="btn btn-primary">Thêm</button>
              </div>
            </form>
        </div>
    </div>

</div>

<!-- /.container-fluid -->
<!-- End of Main Content -->
