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
        if (!empty($_SESSION['User_id'])) {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {
                $this->render('create');
            } else {
                header('location: ../');
            }
        } else {
            echo '<script>';
            echo "location.href= '../index.php?controller=users&action=index';";
            echo '</script>';
        }
    }

    public function store()
    {
        if (!empty($_SESSION['User_id'])) {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {
                if (isset($_POST['ten_khach'])
                    && isset($_POST['mat_khau'])
                    && isset($_POST['re_mat_khau'])
                    && isset($_POST['sdt'])
                    && isset($_POST['dia_chi'])) {
                    $ten_khach = trim(addslashes(htmlspecialchars($_POST['ten_khach'])));
                    $pass = trim(addslashes(htmlspecialchars($_POST['mat_khau'])));
                    $re_pass = trim(addslashes(htmlspecialchars($_POST['re_mat_khau'])));
                    $dia_chi = trim(addslashes(htmlspecialchars($_POST['dia_chi'])));
                    $sdt = trim(addslashes(htmlspecialchars($_POST['sdt'])));

                    if ($ten_khach == '' || $pass == '' || $re_pass == '' || $dia_chi == '') {
                        echo '<script>
                            alert("Vui lòng nhập đầy đủ thông tin!!!");
                            // location.href = "index.php?controller=users&action=create";
                            window.history.back();
                        </script>';
                    } elseif ($pass !== $re_pass) {
                        echo '<script>
                            alert(\'Mật khẩu nhập lại không trùng với mật khẩu !!!\');
                            // location.href = "index.php?controller=users&action=create";
                            window.history.back();
                        </script>';
                    } else {
                        User::insert($ten_khach, md5($pass), $sdt, $dia_chi);
                        echo '<script>
                            alert("Thêm thành công!!");
                            location.href = "index.php?controller=users&action=index";
                        </script>';
                    }
                } else {
                    echo '<script>
                        alert("Không có thông tin nhân viên");
                        location.href = "index.php?controller=users&action=create";
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

    public function edit()
    {
        if (!empty($_SESSION['User_id'])) {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {
                if (isset($_GET['id'])) {
                    $id = trim($_GET['id']);

                    if ($id == '') {
                        echo '<script>
                            alert("Nhân viên không tồn tại");
                            window.history.back();
                        </script>';
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
                    } elseif (!preg_match('/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/', $sdt)) {//chưa kiểm tra được định dạng
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

    public function delete()
    {
        if (!empty($_SESSION['User_id'])) {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {
                if (isset($_POST['id'])) {
                    $id = trim(addslashes(htmlspecialchars($_POST['id'])));
                    if ($id == '') {
                        echo '<script>
                            alert("Không tồn tại nhân viên");
                            location.href = "index.php?controller=users&action=index";
                        </script>';
                    } else {
                        User::delete($id);
                    }
                } else {
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
