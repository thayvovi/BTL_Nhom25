<?php

require_once 'controllers/base_controller.php';
require_once 'models/user.php';
class UsersController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'users';
    }

    //trang đăng nhập
    public function index()
    {
        $this->render('index');
    }

    public function postIndex()
    {
        if (isset($_POST['sdt']) && isset($_POST['mat_khau'])) {
            $sdt = trim(addslashes(htmlspecialchars($_POST['sdt'])));
            $mat_khau = trim(addslashes(htmlspecialchars($_POST['mat_khau'])));

            if ($sdt === '' || $mat_khau == '') {
                echo "<script>
                    alert('Vui lòng không để trống số điện thoại hoặc mật khẩu');
                    window.history.back();
                </script>";
            } elseif (!preg_match('/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/', $sdt)) {
                echo "<script>
                    alert('Số điện thoại không đúng định dạng!!!');
                    window.history.back();
                </script>";
            } else {
                $getAccount = User::checkUser($_POST['sdt']);
                $mat_khau = md5($mat_khau);
                if ($sdt == $getAccount->sdt && $mat_khau == $getAccount->mat_khau) {
                    $_SESSION['User_sdt'] = $sdt;
                    $_SESSION['User_id'] = $getAccount->id;
                    $_SESSION['User_name'] = $getAccount->ten_khach;
                    $_SESSION['User_level'] = $getAccount->level;
                    if ($getAccount->level == true) {
                        header('Location: admin');
                    } else {
                        header('Location: ./');
                    }
                } else {
                    echo "<script>
                        alert('Số điện thoại hoặc mật khẩu không chính xác!');
                        window.history.back();
                    </script>";
                }
            }
        } else {
            echo "<script>
                alert('Không lấy được dữ liệu');
                window.history.back();
            </script>";
        }
    }

    public function logout()
    {
        session_destroy();
        header('location: index.php?controller=users&action=index');
    }

    //phần đăng ký
    public function create()
    {
        $this->render('create');
    }

    public function store()
    {
        if (isset($_POST['ten_khach']) && isset($_POST['mat_khau']) && isset($_POST['sdt']) && isset($_POST['dia_chi'])) {
            $ten_khach = trim(addslashes(htmlspecialchars($_POST['ten_khach'])));
            $mat_khau = trim(addslashes(htmlspecialchars($_POST['mat_khau'])));
            $sdt = trim(addslashes(htmlspecialchars($_POST['sdt'])));
            $dia_chi = trim(addslashes(htmlspecialchars($_POST['dia_chi'])));
            $level = 0;

            if ($ten_khach === '' || $mat_khau === '' || $sdt === '' || $dia_chi === '') {
                echo "<script>
                    alert('Vui lòng không để trống các ô');
                    window.history.back();
                </script>";
            } elseif (!preg_match('/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/', $sdt)) {
                echo "<script>
                    alert('Số điện thoại không đúng định dạng!!!');
                    window.history.back();
                </script>";
            } else {
                if (User::checkSDT($sdt) == true) {
                    User::insert($ten_khach, $mat_khau, $sdt, $dia_chi, $level);
                    echo "<script>
                        alert('Đăng ký thành công!');
                        location.href = 'index.php?controller=users&action=index';
                    </script>";
                } else {
                    echo "<script>
                        alert('Số điện thoại đã tồn tại');
                        window.history.back();
                    </script>";
                }
            }
        } else {
            echo "<script>
                alert('Không tìm thấy dữ liệu đăng ký!');
                window.history.back();
            </script>";
        }
    }

    //phần chỉnh sửa
    public function edit()
    {
        $user = User::find($_SESSION['User_id']);
        $data = ['user' => $user];
        $this->render('edit', $data);
    }

    public function update()
    {
        if (isset($_SESSION['User_id'])) {
            if (isset($_POST['ten_khach']) && isset($_POST['sdt']) && isset($_POST['dia_chi'])) {
                $ten_khach = trim(addslashes(htmlspecialchars($_POST['ten_khach'])));
                $sdt = trim(addslashes(htmlspecialchars($_POST['sdt'])));
                $dia_chi = trim(addslashes(htmlspecialchars($_POST['dia_chi'])));

                if ($ten_khach === '' || $sdt === '' || $dia_chi === '') {
                } elseif (!preg_match('/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/', $sdt)) {
                    echo "<script>
                        alert('Số điện thoại không đúng định dạng');
                        window.history.back();
                    </script>";
                } else {
                    $getID = User::find($_SESSION['User_id']);
                    User::update($_SESSION['User_id'], $ten_khach, $getID->mat_khau, $sdt, $dia_chi);
                    echo '<script>
                        alert("Sửa thành công");
                        location.href = "index.php?controller=users&action=edit&id='.$_SESSION['User_id'].'";
                    </script>';
                }
            } else {
                echo "<script>
                    alert('Không tồn tại tài khoản này');
                    window.history.back();
                </script>";
            }
        } else {
            header('location: index.php?controller=users&action=index');
        }
    }

    public function changePassWord()
    {
        if (isset($_SESSION['User_id'])) {
            if (isset($_POST['mat_khau_cu']) && isset($_POST['mat_khau_moi']) && isset($_POST['re-pass'])) {
                $mat_khau_cu = trim(addslashes(htmlspecialchars($_POST['mat_khau_cu'])));
                $mat_khau_moi = trim(addslashes(htmlspecialchars($_POST['mat_khau_moi'])));
                $re_pass = trim(addslashes(htmlspecialchars($_POST['re-pass'])));

                if ($mat_khau_cu === '' || $mat_khau_moi === '' || $re_pass === '') {
                    echo '<script>
                        alert("Không để trống các ô phần đổi mật khẩu");
                        location.href = "index.php?controller=users&action=edit&id='.$_SESSION['User_id'].'";
                    </script>';
                } elseif ($mat_khau_moi !== $re_pass) {
                    echo '<script>
                        alert("Xác nhận mật khẩu không trùng khớp");
                        location.href = "index.php?controller=users&action=edit&id='.$_SESSION['User_id'].'";
                    </script>';
                } else {
                    $getID = User::find($_SESSION['User_id']);
                    if (md5($mat_khau_cu) === $getID->mat_khau) {
                        echo '<script>
                            alert("Vui lòng xem lại mật khẩu cũ");
                            window.history.back();
                        </script>';
                    } else {
                        User::update($_SESSION['User_id'], $getID->ten_khach, md5($mat_khau_moi), $getID->sdt, $getID->dia_chi);
                        echo '<script>
                            alert("Cập nhật thành công");
                            location.href = "index.php?controller=users&action=edit&id='.$_SESSION['User_id'].'";
                        </script>';
                    }
                }
            }
        } else {
            header('location: index.php?controller=users&action=index');
        }
    }
}
