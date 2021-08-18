<?php

require_once '../admin/controllers/base_controller.php';
require_once '../admin/models/busmodel.php';
require_once '../admin/models/routemodel.php';
require_once '../admin/models/usersmodel.php';

class UsersController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'users';
    }

    public function index()
    {
        $users = User::selected();
        $data = [
            'users' => $users,
        ];
        if (!empty($_SESSION['User_id'])) {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {
                $this->render('show', $data);
            } else {
                header('location: ../');
            }
        } else {
            echo '<script>';
            echo "location.href= '../index.php?controller=users&action=index';";
            echo '</script>';
        }
    }

    public function create()
    {
    }

    public function store()
    {
    }

    public function edit()
    {
        if (!empty($_SESSION['User_id'])) {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {
                if (isset($_GET['id'])) {
                    $id = trim($_GET['id']);

                    if ($id == '') {
                        echo '<script
                            alert("Nhân viên không tồn tại");
                            window.history.back();
                        ></script>';
                    } else {
                        $users = User::find($id);
                        $data = [
                            'users' => $users,
                        ];
                        $this->render('edit', $data);
                    }
                }
            } else {
                header('location: ../');
            }
        } else {
            echo '<script>';
            echo "location.href= '../index.php?controller=users&action=index';";
            echo '</script>';
        }
    }

    public function update()
    {
        if (!empty($_SESSION['User_id'])) {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {
                if (isset($_GET['id']) && isset($_POST['ten_khach']) && isset($_POST['sdt']) && isset($_POST['dia_chi']) && isset($_POST['level'])) {
                    $_GET['id'];
                    $ten_khach = $_POST['ten_khach'];
                    $sdt = $_POST['sdt'];
                    $dia_chi = $_POST['dia_chi'];
                    $level = $_POST['level'];
                    if ($id = '') {
                        echo '<script>alert("Không tồn tại nhân viên");
                            window.history.back();
                        </script>';
                    } elseif ($ten_khach == '' || $sdt == '' || $dia_chi == '') {
                        echo '<script>alert("Vui lòng kiểm tra thông tin nhập và không để trống ô");
                            window.history.back();
                        </script>';
                    } elseif (!is_numeric($sdt)) {//chưa kiểm tra được định dạng
                        echo '<script>alert("Số điện thoại không đúng định dạng");
                            window.history.back();
                        </script>';
                    } else {
                        User::update($_GET['id'], $ten_khach, $sdt, $dia_chi, $level);
                        echo '<script>alert("Sửa thành công");
                            location.href = "./index.php?controller=users&action=index";
                        </script>';

                        // echo $id.'<br>';
                        // echo $ten_khach.'<br>';
                        // echo $sdt.'<br>';
                        // echo $dia_chi.'<br>';
                        // echo $level.'<br>';
                    }
                } else {
                    echo '<script>alert("Không tìm thấy dữ liệu !!!");
                            window.history.back();
                    </script>';
                }
            } else {
                header('location: ../');
            }
        } else {
            echo '<script>';
            echo "location.href= '../index.php?controller=users&action=index';";
            echo '</script>';
        }
    }
}
