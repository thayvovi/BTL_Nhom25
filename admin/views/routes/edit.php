<?php $title = "Quản lý lịch trình";
$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="index.php?controller=route&action=home"><button class="btn btn-primary my-2"><i class="fas fa-arrow-left mr-2"></i>Quay về</button></a></h6>
        </div>
        <div class="card-body">
            <form action="index.php?controller=route&action=update_route&id=<?php if(isset($_GET['id'])) echo $_GET['id']; else header("location: indexx.php?controller=route&action=error");?>" method="post" class="row g-3">
              <?php foreach ($routes as $route): ?>
                <?php if($_GET['id'] == $route->id): ?>
                <div class="col-md-6">
                  <label class="form-label">Tên tuyến xe</label>
                  <input type="text" class="form-control" name="routeName" value="<?php echo $route->routeName; ?>" >
                </div>
                <div class="mt-2 col-md-6">
                  <label class="form-label">Số xe chạy</label>
                  <input type="text" class="form-control" name="totalBus" value="<?php echo $route->totalBus; ?>" >
                </div>
                <div class="form-group text-center mt-5 col-md-6">
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
              <?php endif ?>
              <?php endforeach ?>
              
            </form>
        </div>
    </div>

</div>

<!-- /.container-fluid -->
<!-- End of Main Content -->
