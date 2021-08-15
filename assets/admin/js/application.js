//chỉnh sửa tuyến xe

$('#EditForm button').on('click', function() {
    $id = $('#EditForm').attr('data-id');
    $routeName = $('#routeName').val();
    $totalBus = $('#totalBus').val();


    if ($routeName == '' || $totalBus == '') {
        alert("Không bỏ trống tên tuyến hoặc số xe chạy");
    } else {
        $.ajax({
            type: 'POST',
            url: "index.php?controller=route&action=update",
            data: {
                id: $id,
                routeName: $routeName,
                totalBus: $totalBus,
            },
            success: function(data) {
                alert("Sửa thành công");
                window.history.back();
            },
            error: function() {
                alert("không có giá trị");
            }
        });
    }

});

//xoá tuyến xe

function Delete(id) {
    $confirm = confirm("Bạn có muốn xoá hay không?");

    if ($confirm == true) {
        $.ajax({
            type: "POST",
            url: "index.php?controller=route&action=delete",
            data: {
                idRoute: id,
            },
            success: function(data) {
                alert("Xoá thành công");
                location.reload();
            },
            error: function() {
                alert("Có lỗi xảy ra");
            }
        });
    } else {
        return false;
    }
}