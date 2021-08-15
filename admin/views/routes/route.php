<?php $title = 'Quản lý tuyến xe'; ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h1 mb-2 text-gray-900">Quản lý tuyến xe</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="index.php?controller=route&action=create"><button class="btn btn-primary my-2"><i class="fas fa-plus mr-2"></i>Thêm tuyến xe</button></a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tuyến xe</th>
                            <th>Số xe chạy</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($routes as $route) {
    echo '<tr>';
    echo '<td>'.$route->id.'</td>';
    echo '<td>'.$route->routeName.'</td>';
    echo '<td>'.$route->totalBus.'</td>';
    echo '<td>';
    echo '<a class="mr-2" href="index.php?controller=route&action=edit&id='.$route->id.'"><button class="btn btn-primary"><i class="fas fa-edit"></i></button></a>';
    echo '<button class="btn btn-danger" onclick = "return Delete('.$route->id.')"><i class="fas fa-trash"></i></button>';
    echo '</td>';
    echo '</tr>';
} ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->
