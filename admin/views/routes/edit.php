
<?php $title = 'Tuyến xe: '.$routes->routeName; ?>
<div class="alert alert-danger" hidden></div>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h1 mb-2 text-gray-900">Sửa tuyến xe: <br> <small><?php echo $routes->routeName; ?></small></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="index.php?controller=route&action=home"><button class="btn btn-primary my-2"><i class="fas fa-arrow-left mr-2"></i>Quay về</button></a></h6>
        </div>
        <div class="card-body">
            <form method="post" onsubmit ="return false" id ="EditForm" data-id ="<?php echo $routes->id; ?>"class="row g-3">
              <div class="col-md-6">
                <label for="route" class="form-label">Tên tuyến Xe</label>
                
                <input type="text" id="routeName" name="routeName" class="form-control" value="<?php echo $routes->routeName; ?>">
              </div>
              <div class="mt-2 col-md-6">
                <label class="form-label">Số xe chạy</label>
                <input type="text" id="totalBus" class="form-control" name="bus" value="<?php echo $routes->totalBus; ?>">
              </div>
              <div class="form-group text-center mt-5 col-md-6">
                  <button type="submit" class="btn btn-primary">Cập nhật</button>
              </div>
            </form>
        </div>
    </div>

</div>

<!-- /.container-fluid -->
<!-- End of Main Content -->

<script>

  $('#EditForm button').on('click',function(){
    $id = $('#EditForm').attr('data-id');
    $routeName = $('#routeName').val();
    $totalBus = $('#totalBus').val();

    
      if( $routeName == '' || $totalBus == ''){
        alert("Không bỏ trống tên tuyến hoặc số xe chạy");
      }else{
        $.ajax({
          type: 'POST',
          url : "index.php?controller=route&action=update",
          data : {
            id        : $id,
            routeName : $routeName,
            totalBus  : $totalBus,
          }, success : function(data){
            alert("Sửa thành công");
            window.history.back();
          }, error:function(){
            alert("không có giá trị");
          }
        });
      }
    
  });
</script>
