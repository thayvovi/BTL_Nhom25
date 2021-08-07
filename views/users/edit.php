<?php $title = 'Chỉnh sửa: '.$user->ten_khach; 
$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
?>
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
            <?php if (isset($_GET['notify']) && $_GET['notify'] == 'error') { ?>
             <p style="color:red;">Vui lòng điền đầy đủ thông tin để cập nhật.</p>
             <p style="color:red;">Nếu bạn đổi mật khẩu vui lòng kiểm tra kỹ mật khẩu cũ và mật khẩu mới phải trùng với mật khẩu nhập lại</p>
            <?php } elseif (isset($_GET['notify']) && $_GET['notify'] == 'success') { ?>
              <p style="color:green;">Chỉnh sửa thành công</p>
            <?php }?>

            <form action="index.php?controller=users&action=update&id=<?php echo $_SESSION['User_id']; ?>" method="post">
              <div class="input-group flex-nowrap my-4">
                <span class="input-group-text" id="addon-wrapping"><i class="far fa-user"></i></span>
                <input type="text" class="form-control" name="ten_khach" onkeyup="ChangeToSlug();" value="<?php echo $user->ten_khach; ?>" aria-label="Username" aria-describedby="addon-wrapping" autofocus>
              </div>
              <div class="input-group flex-nowrap my-4">
                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-phone-alt"></i></span>
                <input type="text" class="form-control" name="sdt" value='0<?php echo $user->sdt; ?>' aria-label="Phonenumber" aria-describedby="addon-wrapping">
              </div>
              <div class="input-group flex-nowrap my-4">
                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-map-marked-alt"></i></span>
                <input type="text" class="form-control" id="userAddress" value='<?php echo $user->dia_chi; ?>' name="dia_chi" aria-label="Address" aria-describedby="addon-wrapping">
              </div>
              <div class="input-group flex-nowrap my-4">
                <button type="submit" id="btnSingUp" class="form-control btn btn-primary">Sửa</button>                
              </div>
            </form>
            <form action="index.php?controller=users&action=changePassWord&id=<?php echo $_SESSION['User_id']; ?>" method="post">
              <div class="input-group flex-nowrap my-4">
                <input type="checkbox" id="changePassWord" name="changePassWord">
                <span>Đổi mật khẩu</span>
              </div>
              <div class="input-group flex-nowrap my-4">
                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-key"></i></span>
                <input type="password" class="form-control password" disabled id="userPass" name="mat_khau_cu" placeholder="Mật khẩu cũ" aria-label="Password" aria-describedby="addon-wrapping">
              </div>
              <div class="input-group flex-nowrap my-4">
                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-key"></i></span>
                <input type="password" class="form-control password" disabled id="userPass" name="mat_khau_moi" placeholder="Mật khẩu mới" aria-label="Password" aria-describedby="addon-wrapping">
              </div>
              <div class="input-group flex-nowrap my-4">
                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-key"></i></span>
                <input type="password" class="form-control password" disabled id="userPass" name="re-pass" placeholder="Nhập lại mật khẩu" aria-label="Password" aria-describedby="addon-wrapping">
              </div>
              <div class="input-group flex-nowrap my-4">
                <button type="submit" id="btnSingUp" class="form-control btn btn-primary password" disabled>Đổi mật khẩu</button>
            </form>
        </div>
        <a href="./"><button class="form-control btn btn-info">Cancel</button></a>
    </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#changePassWord').change(function(){
      if ($(this).is(":checked")) {
        $('.password').removeAttr('disabled');
        console.log("Mở đổi mật khẩu");
      }else{
        $('.password').attr('disabled','');
        console.log('Khóa đổi mật khẩu');
      }
    });
  });
</script>




