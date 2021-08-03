<?php  
class BaseController{
	protected $folder;//mục đích:là tên thư mục có trong views, chứa các file view template của phần đang truy cập.

	//Hiển thị kết quả trả về
	public function render($file,$data =[])
	{
		//Kiểm tra file có tồn tại không
		$view_file = 'views/'.$this->folder.'/'.$file.'.php';//<=> views/folder/file.php

		if (file_exists($view_file)) {
			extract($data);//Nếu tồn tại file đó thì tạo ra các biến chứa giá trị truyền vào lúc gọi hàm

			// Sau đó lưu giá trị trả về khi chạy file view template với các dữ liệu đó vào 1 biến chứ chưa hiển thị luôn ra trình duyệt
      		ob_start();
      		require_once($view_file);
      		$content = ob_get_clean();
      		// Sau khi có kết quả đã được lưu vào biến $content, gọi ra template chung của hệ thống đế hiển thị ra cho người dùng
      		require_once('views/layouts/application.php');
		} else{
			header('Location: index.php?controller=pages&action=error');//tự trả về trang báo lỗi nếu file cần gọi không tồn tại
		}
	}

}
?>