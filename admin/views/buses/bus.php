<?php $title = "Quản lý xe chạy";?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h1 mb-2 text-gray-900">Quản lý xe chạy</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="#"><button class="btn btn-primary my-2"><i class="fas fa-plus mr-2"></i>Thêm xe chạy</button></a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tuyến chạy</th>
                            <th>Ngày chạy</th>
                            <th>Giờ chạy</th>
                            <th>Ghế trên xe</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bus as $bus) {
                            foreach ($routes as $route) {
                                if ($bus->idRoute == $route->id) {
                                    echo '<tr>';
                                        echo '<td>'.$bus->id.'</td>';
                                        echo '<td>'.$route->routeName.'</td>';
                                        echo '<td>'.$bus->date.'</td>';
                                        echo '<td>'.$bus->time.'</td>';
                                        echo '<td>'.$bus->totalSeat.'</td>';
                                        echo '<td>';
                                            echo '<a class="mr-2" href="#"><button class="btn btn-primary"><i class="fas fa-edit"></i></button></a>';
                                            echo '<a href="#"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a>';
                                        echo '</td>';
                                    echo '</tr>';
                                }
                            }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->
