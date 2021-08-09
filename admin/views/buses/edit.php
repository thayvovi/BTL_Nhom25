<?php $title = "Quản lý lịch trình";
$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h1 mb-2 text-gray-900"> 
      Thông tin:
      <?php foreach ($buses as $bus): ?>
        <?php if ($bus->id == $_GET['id']): ?>
          <?php foreach ($routes as $route): ?>
            <?php if ($bus->idRoute == $route->id): ?>
              <h3>Tuyến xe: <?php echo $route->routeName; ?></h3>
              <h3>Ngày chạy: <?php echo $bus->date; ?></h3>
            <?php endif ?>
          <?php endforeach ?>
        <?php endif ?>
      <?php endforeach ?>
    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="index.php?controller=bus&action=home"><button class="btn btn-primary my-2"><i class="fas fa-arrow-left mr-2"></i>Quay về</button></a></h6>
        </div>
        <div class="card-body">
            <form action="index.php?controller=bus&action=update_bus&id=<?php if(isset($_GET['id'])) echo $_GET['id']; else header("location: indexx.php?controller=bus&action=error");?>" method="post" class="row g-3">
              <div class="col-md-6">
                <label for="route" class="form-label">Tuyến Xe</label>
                <select id="route" name="route" class="form-control form-select" autofocus>
                  <?php foreach ($buses as $bus) {
                    if($bus->id == $_GET['id']){
                      foreach ($routes as $route) {
                        if($bus->idRoute == $route->id){
                          echo '<option value='.$route->id.' selected>'.$route->routeName.'</option>';
                        }
                        else{
                          echo '<option value='.$route->id.'>'.$route->routeName.'</option>';
                        }
                      }
                    }
                  } ?>
                </select>
              </div>
              <?php foreach ($buses as $bus): ?>
                <?php if($_GET['id'] == $bus->id): ?>
                <div class="col-md-6">
                  <label class="form-label">Ngày đi</label>
                  <input type="date" class="form-control" name="ngay" value="<?php echo $bus->ngay; ?>" >
                </div>
                <div class="mt-2 col-md-6">
                  <label class="form-label">Giờ đi</label>
                  <input type="time" class="form-control" name="gio" value="<?php echo $bus->gio; ?>" >
                </div>
                <div class="mt-2 col-md-6">
                  <label class="form-label">Số ghế</label>
                  <input type="text" class="form-control" name="seat" value="<?php echo $bus->totalSeat; ?>" >
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
