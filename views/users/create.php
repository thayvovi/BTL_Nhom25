<?php $title="Đăng ký" ?>
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
    <div class="row justify-content-center">
        <div class="col-md-4">
            <?php if(isset($_GET["notify"])&&$_GET["notify"]=="error"): ?>
             <p style="color:red;">Đăng ký chưa thành công. Có thể Số điện thoại bị trùng!</p>
             <p style="color:red;">Vui lòng kiểm tra lại thông tin!</p>
            <?php endif?>
            <form action="index.php?controller=users&action=store" method="post">
                <div class="input-group flex-nowrap my-4">
                  <span class="input-group-text" id="addon-wrapping"><i class="far fa-user"></i></span>
                  <input type="text" class="form-control" id="userName" name="ten_khach" placeholder="Họ và tên người dùng" aria-label="Username" aria-describedby="addon-wrapping" autofocus>
                </div>
                <div class="input-group flex-nowrap my-4">
                  <span class="input-group-text" id="addon-wrapping"><i class="fas fa-phone-alt"></i></span>
                  <input type="text" class="form-control" id="userPhone" name="sdt" placeholder="Số điện thoại" aria-label="Phonenumber" aria-describedby="addon-wrapping">
                </div>
                <div class="input-group flex-nowrap my-4">
                  <span class="input-group-text" id="addon-wrapping"><i class="fas fa-key"></i></span>
                  <input type="password" class="form-control" id="userPass" name="mat_khau" placeholder="Mật khẩu" aria-label="Password" aria-describedby="addon-wrapping">
                </div>
                <div class="input-group flex-nowrap my-4">
                  <span class="input-group-text" id="addon-wrapping"><i class="fas fa-map-marked-alt"></i></span>
                  <input type="text" class="form-control" id="userAddress" placeholder="Địa chỉ" name="dia_chi" aria-label="Address" aria-describedby="addon-wrapping">
                </div>
                <div class="input-group flex-nowrap my-4">
                  <button type="submit" id="btnSingUp" class="form-control btn btn-primary">Đăng ký</button>
                </div>
                <hr class="my-4">
                <div class="input-group flex-nowrap my-4">
                    <span>Nếu bạn đã có tài khoản?</span>
                    <a href="index.php?controller=users&action=index" style="color:#2980b9;">Đăng nhập</a>
                </div>
            </form>
        </div>
    </div>
</div>

