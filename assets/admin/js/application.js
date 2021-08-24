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

//xoá xe bus
function deleteAjax(id) {
    $confirm = confirm("Bạn có muốn xoá hay không?");
    if ($confirm == true) {
        $.ajax({
            type: "POST",
            url: "index.php?controller=bus&action=delete",
            data: {
                id: id,
            },
            success: function(data) {
                alert("Xoá thành công");
                location.reload();
            },
            error: function() {
                alert("Đã có lỗi xảy ra");
            }
        });
    } else {
        return false;
    }
}
//show password
// function showPass() {
//     var x = document.getElementById("password");
//     if (x.type === "password") {
//         x.type = "text";
//     } else {
//         x.type = "password";
//     }
// }

$('#checkShowPass').change(function() {

    if ($(this).is(":checked")) {
        $("#password").prop("type", "text");
        $("#re_password").prop("type", "text");
    } else {
        $("#password").prop("type", "password");
        $("#re_password").prop("type", "password");
    }
});

//xoá nhân viên
function deleteUser(id, idCurrent) {
    $confirm = confirm("Bạn có chắc muốn xoá id này không?");
    if ($confirm == true) {
        if (id == '') {
            alert('Không tồn tại nhân viên này!!!!');
            location.reload();
        } else if (id == idCurrent) {
            alert('Không thể xoá tài khoản của chính mình!!!!');
            location.reload();
        } else {
            $.ajax({
                type: 'POST',
                url: 'index.php?controller=users&action=delete',
                data: {
                    id: id,
                },
                success: function(data) {
                    alert("Xoá thành công");
                    location.reload();
                },
                error: function() {
                    alert("Không tồn tại nhân viên");
                    location.reload();
                }
            });
        }
    }
}