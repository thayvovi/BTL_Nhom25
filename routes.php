<?php  
$controllers = array(
	'pages' => ['home','about' ,'error',],
	//Thêm controller thì bố sung tiếp để nhận
	'cars'  => ['index','create','store','showTicket', 'delete', 'update_ticket','edit'],
	'users' => ['index','postIndex','logout','create','edit','store','update','changePassWord'],
);// Các controllers trong hệ thống và các action có thể gọi ra từ controller đó.

// Nếu các tham số nhận được từ URL không hợp lệ (không thuộc list controller và action có thể gọi
// thì trang báo lỗi sẽ được gọi ra.
if (!array_key_exists($controller, $controllers) || !in_array($action,$controllers[$controller])) {
	$controller = 'pages';
	$action = 'error';
}
// Nhúng file định nghĩa controller vào để có thể dùng được class định nghĩa trong file đó
include_once ('controllers/'.$controller.'_controller.php');
// Tạo ra tên controller class từ các giá trị lấy được từ URL sau đó gọi ra để hiển thị trả về cho người dùng.
$kclass = str_replace('_','',ucwords($controller,'_')) . 'Controller';//gọi class có trong $controller

$controller = new $kclass;//khởi tạo class
$controller->$action();//gọi đến các hàm có trong class
?>