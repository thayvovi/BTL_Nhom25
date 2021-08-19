<?php $title = 'Quản lý xe chạy'; ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h1 mb-2 text-gray-900">Quản lý lịch trình xe</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="index.php?controller=bus&action=create"><button
                        class="btn btn-primary my-2"><i class="fas fa-plus mr-2"></i>Thêm lịch trình mới</button></a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tuyến xe</th>
                            <th>Ngày chạy(YYYY-MM-DD)</th>
                            <th>Giờ chạy(HH:MM:SS)</th>
                            <th>Ghế trên xe</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($buses as $bus) {
                            foreach ($routes as $route) {
                                if ($bus->idRoute == $route->id) {
                                    echo '<tr>';
                                    echo '<td>'.$bus->id.'</td>';
                                    echo '<td>'.$route->routeName.'</td>';
                                    echo '<td>'.$bus->date.'</td>';
                                    echo '<td>'.$bus->time.'</td>';
                                    echo '<td><a href="../index.php?controller=cars&action=create&id= '.$bus->id.'" ><button
                                                class="btn btn-primary mr-2">Đặt vé</button></a></td>';
                                    echo '<td>';
                                    echo '<a class="mr-2" href="index.php?controller=bus&action=edit&id='.$bus->id.'"><button class="btn btn-primary"><i class="fas fa-edit"></i></button></a>';
                                    // echo '<button class="btn btn-danger" data-toggle="modal" data-target="#deleteBus"><i class="fas fa-trash"></i></button>';
                                    echo '<a class="btn btn-danger" onclick = "return deleteAjax('.$bus->id.')"><i class="fas fa-trash"></i></a>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            }
                        } ?>
                        <div class="modal fade" id="seat" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tổng số ghế: </h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="wrapper">
                                            <div class="row">
                                                <?php for ($i = 1; $i <= $bus->totalSeat; ++$i) {
                                                    if ($i <= 2) {
                                                        echo '<div class="seat driver"></div>';
                                                    } else {
                                                        echo '<div class="seat" id="seat">'.$i.'</div>';
                                                    }
                                                } ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-primary" href="../index.php?controller=cars&action=create&id= <?php echo $bus->id;?>">Đặt vé hộ</a>
                                        <button class="btn btn-secondary" type="button"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
<!-- End of Main Content -->
