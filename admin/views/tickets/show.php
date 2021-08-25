i<?php $title = 'Quản lý vé xe'; ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h1 mb-2 text-gray-900">Quản lý vé xe</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary"><a href="index.php?controller=users&action=create"><button class="btn btn-primary my-2"><i class="fas fa-plus mr-2"></i>Thêm thành viên</button></a></h6> -->
            Bảng quản lý vé xe đã đặt
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Họ tên</th>
                            <th>Số điện thoại</th>
                            <th>Ghế đặt</th>
                            <th>Ngày</th>
                            <th>Giờ</th>
                            <th>Điểm đón</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($tickets as $ticket) {
    echo '<tr>';
    echo '<td>'.$ticket->id.'</td>';
    echo '<td>'.$ticket->userName.'</td>';
    echo '<td> 0'.$ticket->sdt.'</td>';
    echo '<td> '.$ticket->seat.'</td>';
    echo '<td> '.$ticket->ngay.'</td>';
    echo '<td> '.$ticket->gio.'</td>';
    echo '<td>'.$ticket->diem_don.'</td>';
    echo '<td style="text-align:center;">';
    echo '<a class="btn btn-danger" onclick = "return deleteTicket('.$ticket->id.');"><i class="fas fa-trash"></i></a>';
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
