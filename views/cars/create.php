<?php $title = 'Đặt vé xe'; ?>
<?php if (isset($_SESSION['User_id'])) { ?>

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
<div class="container-fluid px-4 px-lg-5">
    <div class="row gx-5 justify-content-center">
        <div class="col-md-4">
            <?php if (isset($_GET['notify']) && $_GET['notify'] == 'error') { ?>
             <p style="color:red;">Bạn hãy nhập đủ hoặc kiểm tra lại thông tin đã nhập!</p>                              
            <?php }?>
            <form action="index.php?controller=cars&action=store&id=<?php echo $_GET['id']; ?>" method="post" id="frm">
               <?php if (isset($_GET['id'])) {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    foreach ($xe as $xe) {
        if ($xe->id == $id) {
            foreach ($routes as $route) {
                if ($xe->idRoute === $route->id) {
                    echo '<div class="form-group">';
                    echo '<h4>Tên người đi</h4><input type="text" name="name" class="form-control" value = '.$_SESSION['User_name'].'>';
                    echo '</div>';

                    echo '<div class="form-group">';
                    echo '<h4>Số điện thoại liên hệ</h4><input type="text" name="sdt" class="form-control" value = '.$_SESSION['User_sdt'].'>';
                    echo '</div>';

                    echo '<div class="form-group">';
                    echo '<h4>Tuyến xe </h4><input type="text" id ="route" name="route" class="form-control" value="'.$route->routeName.'">';
                    echo '</div>';

                    echo '<div class="form-group">';
                    echo '<h4>Ngày xuất phát</h4><input type="date" id ="ngay" name="date" class="form-control" value="'.$xe->date.'">';
                    echo '</div>';

                    echo '<div class="form-group">';
                    echo '<h4>Giờ xuất phát</h4><input type="time" id ="gio" name="time" class="form-control" value="'.$xe->time.'">';
                    echo '</div>';

                    echo '<div class="form-group">';
                    echo '<h4>Điểm đón</h4><input type="text" name="diem_don" class="form-control" placeholder="Vui lòng nhập điểm đón">';
                    echo '</div>';

                    echo '<div class="form-group">';
                    echo '<h4>Sơ đồ chỗ ngồi</h4>';
                    echo '</div>'; ?>

                                    <ul class="showcase">
                                        <li>
                                            <div class="seat"></div>
                                            <small>Ghế còn trống</small>
                                        </li>
                                        <li>
                                            <div class="seat driver"></div>
                                            <small>Ghế Tài xế</small>
                                        </li>
                                        <li>
                                            <div class="seat selected"></div>
                                            <small>Ghế đang chọn</small>
                                        </li>
                                        <li>
                                            <div class="seat occupied"></div>
                                            <small>Ghế được đặt trước</small>
                                        </li>
                                    </ul>
                                    <?php
                                    echo '<div class="modal" tabindex="-1" role="dialog" id="myModal">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Thông tin khách tại các vị trí ghế đã được đặt:</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">';
                                                foreach ($tickets as $ticket) {
                                                    if($ticket->idBus == $id){
                                                        echo 'Họ tên: '.$ticket->userName.'<br>';
                                                        echo 'Số điện thoại: '.$ticket->sdt.'<br>';
                                                        echo 'Số ghế: '.$ticket->seat.'<br>';
                                                        echo '<br>';
                                                    }
                                                    
                                                }
                                                echo '</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Okay</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                                    
                                    ?>

                                    <div class="wrapper">
                                        <div class="row">
                                            <?php for ($i = 1; $i <= $xe->totalSeat; $i++) {
                                                if ($i <= 2) {
                                                    echo '<div class="seat driver"></div>';
                                                } else {                                                   
                                                    foreach ($tickets as $ticket) {
                                                        if ($ticket->idBus == $id) {
                                                            if ($i == $ticket->seat) {
                                                                echo '<a type="button" class="seat occupied" data-toggle="modal" data-target="#myModal">'.$i.'</a>';
                                                            } else {
                                                                echo '<div class="seat" id="seat">'.$i.'</div>';
                                                            }
                                                        }
                                                    }
                                                }
                                            } ?>
                                            
                                        </div>
                                    </div>
                                <?php echo '<div class="form-group">';
                    echo '<input type="text" style="margin-bottom:20px;" id="seatSelected" class="form-control" name="seat" placeholder="Hãy nhập ghế cần đặt hoặc chọn ghế trên sơ đồ">';
                    //echo '<p style="color:red;">Lưu ý: Mỗi người chỉ đặt được 1 chỗ!</p>  ';
                    echo '</div>';
                }
            }
        }
    }
} else {
    header('location: index.php?controller=pages&action=error');
}
               ?>
            </form>
            <div class="form-group">
                <button class="form-control btn btn-primary" style="margin-bottom:20px;" type="submit" form="frm">Đặt vé</button>
            </div>
            </div>    
        </div>
    </div>
</div>



<script type="text/javascript">
    const wrapper = document.querySelector('.wrapper');
    const seat = document.querySelector(".row.seat:not(.occupied)");
    const occupied = document.querySelector(".row.seat.occupied");

    $('document').ready(function(){
        $('.wrapper').click(function(e){
            if (e.target.classList.contains('seat') && !e.target.classList.contains('occupied') && !e.target.classList.contains('driver')){
                e.target.classList.toggle('selected');

                let val = e.target.innerHTML;
                let value = parseInt(val, 10);
                
                if (document.getElementById("seatSelected").value != value) {
                    document.getElementById("seatSelected").value = value;
                }
                console.log(typeof value);
            }
        });
    });
    $("#myModal").on("shown.bs.modal", function(){
        $('.modal-backdrop.in').css('opacity', '0.7');
    });


    
    // $(document).ready(function(){
    //     $('.modal').modal('show');
    // });
</script>

<?php } else {
                   header('location: index.php?controller=users&action=index'); ?>
<?php
               } ?>

