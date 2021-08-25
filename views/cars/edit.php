<?php $title = 'Xem vé xe'; ?>
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

<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3 text-center"><h1 class="m-0 font-weight-bold text-primary">Vé xe đã đặt</h1></div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" width="100%" celspacing="0">
					<thead>
						<tr>
							<th>Tuyến xe</th>
							<th>Tên khách</th>
							<th>Số điện thoại</th>
							<th>Số ghế đặt</th>
							<th>Ngày xuất phát</th>
							<th>Giờ chạy</th>
							<th>Điểm đón</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>

						<?php foreach ($tickets as $ticket) {
    if ($ticket->sdt === ltrim($_SESSION['User_sdt'], '0')) {
        foreach ($buses as $bus) {
            if ($ticket->idBus === $bus->id) {
                foreach ($routes as $route) {
                    if ($bus->idRoute === $route->id) {
                        ?>
								<tr>
									<td><?php echo $route->routeName; ?></td>
					              	<td><?php echo $ticket->userName; ?></td>
					              	<td>0<?php echo $ticket->sdt; ?></td>
					              	<td><?php echo $ticket->seat; ?></td>
					              	<td><?php echo $ticket->ngay; ?></td>
					              	<td><?php echo $ticket->gio; ?></td>
					              	<td><?php echo $ticket->diem_don; ?></td>
					              	<td style="text-align:center;">
                        				<a class="btn btn-danger" onclick = "return deleteTicket2(<?php echo $ticket->id; ?>);"><i class="fas fa-trash"></i></a>
                        			</td>
					            </tr>
						<?php
                    }
                }
            }
        }
    }
}?>
			        </tbody>
				</table>
			</div>
		</div>
	</div>
</div>