<?php $title = 'Thêm tuyến xe';
$previous = 'javascript:history.go(-1)';
if (isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h1 mb-2 text-gray-900">Thêm tuyến xe</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="index.php?controller=route&action=home"><button class="btn btn-primary my-2"><i class="fas fa-arrow-left mr-2"></i>Quay về</button></a></h6>
        </div>
        <div class="card-body">
            <form action="index.php?controller=route&action=store" method="post" class="row g-3">
              <div class="col-md-6">
                <label for="route" class="form-label">Tên tuyến Xe</label>
                
                <input type="text" name="route" class="form-control" placeholder="Nhập tên tuyến xe">
              </div>
              <div class="mt-2 col-md-6">
                <label class="form-label">Số xe chạy</label>
                <input type="text" class="form-control" name="bus" placeholder="Số xe chạy" >
              </div>
              <div class="form-group text-center mt-5 col-md-6">
                  <button type="submit" class="btn btn-primary">Thêm</button>
              </div>
            </form>
        </div>
    </div>

</div>
