<?php $title ="Đăng nhập" ?>

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
            <?php if(isset($_GET['notify']) && $_GET['notify'] =="error"): ?>
                <div class="alert alert-danger"><h3>Số điện thoại hoặc mật khẩu không chính xác</h3></div>
            <?php elseif(isset($_GET['notify']) && $_GET['notify'] =="success"): ?>
                <div class="alert alert-success"><h3>Đăng ký thành công. Hãy đăng nhập số điện thoại và mật khẩu vừa đăng ký</h3></div>
            <?php endif ?>
            <form action="index.php?controller=users&action=postIndex" method="post">
                <div class="input-group flex-nowrap my-4">
                  <span class="input-group-text" id="addon-wrapping"><i class="far fa-user"></i></span>
                  <input type="text" class="form-control" name="sdt" placeholder="Số điện thoại" aria-label="PhoneNumber" aria-describedby="addon-wrapping" autofocus>
                </div>
                <div class="input-group flex-nowrap my-4">
                  <span class="input-group-text" id="addon-wrapping"><i class="fas fa-key"></i></span>
                  <input type="password" class="form-control" name="mat_khau" placeholder="Mật khẩu" aria-label="Username" aria-describedby="addon-wrapping">
                </div>
                <div class="input-group flex-nowrap my-4">
                  <button type="submit" class="btn btn-primary form-control">Đăng nhập</button>
                </div>
                <hr class="my-4">
                <div class="input-group flex-nowrap my-4">
                    <span>Nếu bạn chưa có tài khoản?</span>
                    <a href="index.php?controller=users&action=create" style="color:#2980b9;">Đăng ký ngay</a>
                </div>
                <div class="input-group flex-nowrap my-4">
                    <span>Quên mật khẩu?</span>
                    <a href="index.php?controller=users&action=create" style="color:#2980b9;">Lấy lại mật khẩu</a>
                </div>
            </form>
        </div>
    </div>
</div>
