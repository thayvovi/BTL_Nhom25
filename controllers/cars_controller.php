<?php

require_once 'controllers/base_controller.php';
require_once 'models/bus.php';
require_once 'models/busroute.php';
require_once 'models/user.php';
require_once 'models/ticketdetails.php';
class CarsController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'cars';
    }

    public function index()
    {
        $xe = Bus::all();
        $route = BusRoute::read();

        $data = [
            'xe' => $xe,
            'routes' => $route,
        ];
        $this->render('index', $data);
    }

    public function create()
    {
        if (isset($_GET['id'])) {
            $id = trim(addslashes(htmlspecialchars($_GET['id'])));
            if ($id === '') {
                echo "<script>
					alert('Không tồn tại xe này');
					window.history.back();
				</script>";
            } else {
                $xe = Bus::all();
                $route = BusRoute::read();
                $tickets = Ticket::find($id);
                $data = [
                    'xe' => $xe,
                    'routes' => $route,
                    'tickets' => $tickets,
                ];
                $this->render('create', $data);
                // echo $tickets->seat;
            }
        } else {
            echo "<script>
				alert('Không tồn tại xe này');
				window.history.back();
			</script>";
        }
    }

    public function edit()
    {
        if (isset($_GET['id'])) {
            $id = trim(addslashes(htmlspecialchars($_GET['id'])));
            if ($id === '') {
                echo "<script>
					alert('Không tồn tại xe này');
					window.history.back();
				</script>";
            } else {
                $xe = Bus::all();
                $route = BusRoute::read();
                $tickets = Ticket::find($id);
                $data = [
                    'xe' => $xe,
                    'routes' => $route,
                    'tickets' => $tickets,
                ];
                $this->render('update', $data);
                // echo $tickets->seat;
            }
        } else {
            echo "<script>
				alert('Không tồn tại xe này');
				window.history.back();
			</script>";
        }
    }

    public function store()
    {
        if (isset($_GET['id'])) {
            $id = trim(addslashes(htmlspecialchars($_GET['id'])));

            if (isset($_POST['name']) && isset($_POST['sdt']) && isset($_POST['route']) && isset($_POST['date']) && isset($_POST['time']) && isset($_POST['diem_don']) && isset($_POST['seat'])) {
                $name = trim(addslashes(htmlspecialchars($_POST['name'])));
                $sdt = trim(addslashes(htmlspecialchars($_POST['sdt'])));
                $route = trim(addslashes(htmlspecialchars($_POST['route'])));
                $date = trim(addslashes(htmlspecialchars($_POST['date'])));
                $time = trim(addslashes(htmlspecialchars($_POST['time'])));
                $diem_don = trim(addslashes(htmlspecialchars($_POST['diem_don'])));
                $seat = trim(addslashes(htmlspecialchars($_POST['seat'])));

                if ($name === '' || $sdt === '' || $route === '' || $date === '' || $time === '' || $diem_don === '' || $seat === '') {
                    echo "<script>
                    	alert('Vui lòng nhập đầy đủ thông tin');
                    	window.history.back();
                    </script>";
                } elseif (!preg_match('/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/', $sdt)) {
                    echo "<script>
						alert('Số điện thoại không đúng định dạng!!!');
						window.history.back();
					</script>";
                } else {
                    Ticket::insert($id, $name, $sdt, $seat, $date, $time, $diem_don);
                    echo "<script>
						alert('Đặt vé thành công.');
						location.href = 'index.php?controller=cars&action=showTicket&id=".$_SESSION['User_id']."';
					</script>";
                }
            } else {
                echo "<script>
					alert('Không tìm thấy giá trị nhập);
					window.history.back();
				</script>";
            }
        } else {
            echo "<script>
				alert('Không tồn tại xe này');
				window.history.back();
			</script>";
        }
    }

    public function update_ticket()
    {
        if (isset($_GET['id'])) {
            $id = trim(addslashes(htmlspecialchars($_GET['id'])));

            if (isset($_POST['name']) && isset($_POST['sdt']) && isset($_POST['route']) && isset($_POST['date']) && isset($_POST['time']) && isset($_POST['diem_don']) && isset($_POST['seat'])) {
                $name = trim(addslashes(htmlspecialchars($_POST['name'])));
                $sdt = trim(addslashes(htmlspecialchars($_POST['sdt'])));
                $route = trim(addslashes(htmlspecialchars($_POST['route'])));
                $date = trim(addslashes(htmlspecialchars($_POST['date'])));
                $time = trim(addslashes(htmlspecialchars($_POST['time'])));
                $diem_don = trim(addslashes(htmlspecialchars($_POST['diem_don'])));
                $seat = trim(addslashes(htmlspecialchars($_POST['seat'])));

                if ($name === '' || $sdt === '' || $route === '' || $date === '' || $time === '' || $diem_don === '' || $seat === '') {
                    echo "<script>
                    	alert('Vui lòng nhập đầy đủ thông tin');
                    	window.history.back();
                    </script>";
                } elseif (!preg_match('/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/', $sdt)) {
                    echo "<script>
						alert('Số điện thoại không đúng định dạng!!!');
						window.history.back();
					</script>";
                } else {
                    Ticket::update($id, $name, $sdt, $seat, $date, $time, $diem_don);
                    echo "<script>
						alert('Cập nhật vé thành công.');
						location.href = 'index.php?controller=cars&action=showTicket&id=".$_SESSION['User_id']."';
					</script>";
                }
            } else {
                echo "<script>
					alert('Không tìm thấy giá trị nhập);
					window.history.back();
				</script>";
            }
        } else {
            echo "<script>
				alert('Không tồn tại xe này');
				window.history.back();
			</script>";
        }
    }

    public function showTicket()
    {
        $buses = Bus::all();
        $routes = BusRoute::read();
        $tickets = Ticket::read();
        $data = [
            'buses' => $buses,
            'tickets' => $tickets,
            'routes' => $routes,
        ];
        $this->render('edit', $data);
    }

    public function delete()
    {
        if (!empty($_SESSION['User_id'])) {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {
                if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    if ($id == '') {
                        echo '<script>alert("Không tồn tại vé xe");
                            location.reload();
                        </script>';
                    } else {
                        Ticket::delete($id);
                    }
                }
            }
        } else {
            echo '<script>alert("Something went wrong!!!");';
            echo 'location.href="index.php?controller=cars&action=showTicket';
        }
    }   
}
