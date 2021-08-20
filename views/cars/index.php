<?php $title = 'Tuyến xe'; ?>
<header class="masthead" style="background-image: url('assets/img/home-bg2.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Hệ thống</h1>
                    <span class="subheading">Đặt vé xe chất lượng cao</span>
                </div>
            </div>
        </div>
    </div>
</header> 
<!-- Main Content-->
<div class="container-fluid">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <h1 class="h3 mb-5 text-gray-800 text-center text-uppercase text-primary">Các lịch trình hiện có</h1>
          <div class="col-md-10 col-lg-8 col-xl-8">
            <table class="table table-bordered" width="100%" celspacing="0">
              <thead>
                <tr>
                  <th scope="col">Tuyến chạy</th>
                  <th scope="col">Ngày chạy(y-m-d)</th>
                  <th scope="col">Giờ chạy</th>
                  <th scope="col">Số xe chạy</th>
                  <th scope="col">Hành động</th>
                </tr>
              </thead>
              <tbody>
            <?php foreach ($xe as $xe) {
    foreach ($routes as $route) {
        if ($xe->idRoute == $route->id) {
            echo '<tr>';
            echo '<td>'.$route->routeName.'</td>';
            echo '<td>'.$xe->date.'</td>';
            echo '<td>'.$xe->time.'</td>';
            echo '<td>'.$route->totalBus.'</td>'; ?>
                    <td><a href="index.php?controller=cars&action=create&id=<?php echo $xe->id; ?>"><button class="btn btn-primary">Đặt vé</button></a></td>
                    <?php echo '</tr>';
        }
    }
}
            ?>
            </tbody>
            </table>
        </div>
    </div>
</div>
