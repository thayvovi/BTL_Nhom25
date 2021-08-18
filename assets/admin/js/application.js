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


//Cập nhật nhân viên
// $("#editUserForm button").on('click', function() {
//     $id = $("#editUserForm").attr('data-id');
//     $ten_khach = $('#ten_khach').val();
//     $sdt = $('#sdt').val();
//     $dia_chi = $('#dia_chi').val();
//     $("#level").change(function() {
//         var level = $('#level option:selected').text();
//         console.log(level);
//         if ($ten_khach == '' || $dia_chi == '') {
//             alert("Vui lòng không để trống tên nhân viên hoặc địa chỉ");
//             location.reload();
//         } else if (isNaN($sdt) || $sdt == '') {
//             alert("Vui lòng không nhập ký tự khác ngoài số hoặc không để trống số điện thoại");
//             location.reload();
//         } else {
//             $.ajax({
//                 type: "POST",
//                 url: "index.php?controller=users&action=update",
//                 data: {
//                     id: $id,
//                     ten_khach: $ten_khach,
//                     sdt: $sdt,
//                     dia_chi: $dia_chi,
//                     level: level
//                 },
//                 success: function($data) {
//                     alert("Sửa thành công");
//                     location.reload();
//                 },
//                 error: function() {
//                     alert("Sửa không thành thành công");
//                     location.reload();
//                 }
//             });
//         }
//     });

// });