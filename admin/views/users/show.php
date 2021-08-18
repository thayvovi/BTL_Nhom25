i<?php $title = 'Quản lý nhân viên'; ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h1 mb-2 text-gray-900">Quản lý nhân viên</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="index.php?controller=users&action=create"><button class="btn btn-primary my-2"><i class="fas fa-plus mr-2"></i>Thêm thành viên</button></a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Họ tên</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Cấp độ</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $user) {
    if ($user->level == 1) {
        echo '<tr>';
        echo '<td>'.$user->id.'</td>';
        echo '<td>'.$user->ten_khach.'</td>';
        echo '<td> 0'.$user->sdt.'</td>';
        echo '<td>'.$user->dia_chi.'</td>';
        echo '<td>';
        if ($user->level == 1) {
            echo 'Nhân viên';
        }
        echo '</td>';
        echo '<td>';

        echo '<a class="mr-2" href="index.php?controller=users&action=edit&id='.$user->id.'"><button class="btn btn-primary"><i class="fas fa-edit"></i></button></a>';
        echo '<a class="btn btn-danger" onclick = "return deleteUser('.$user->id.','.$_SESSION['User_id'].')"><i class="fas fa-trash"></i></a>';
        echo '</td>';
        echo '</tr>';
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
