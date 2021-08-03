Các bước thực hiện cơ bản
Bước 1: Tạo các thư mục: mvc,index,connection(kết nối DB),routes(xử lý đường dẫn URL)
Bước 2: thêm các file cần thiết vào index
Bước 3: Kết nối cơ sở dữ liệu ở conntection
Bước 4: Thiết lập đường truyền ở routes
Bước 5: Vào controller để tạo 1 base_controller.php làm lớp cha cho các controller khác trong hệ thống(mục đích: để có thể định nghĩa các hàm mà mọi controller đều có thể gọi ra mà không phải định nghĩa lại ở mỗi controller)
Bước 6: viết content cho views/layouts/applicaiton.php
Bước 7: viết controllers/pages_controller.php
Bước 8: viết content views/pages/home.php và error.php
Bước 9: viết content (models/car.php)->(controlelrs/cars_controller.php)->(views/cars/index.php)+thêm controller= cars&action=index vào routes.php
Bước 9: Bổ sung "static function find" trong (models/car.php)->thêm content (controlelrs/cars_controller.php)->(views/cars/show.php) thêm action=showCar vào routes.php