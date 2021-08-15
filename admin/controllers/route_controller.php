<?php

require_once '../admin/controllers/base_controller.php';
require_once '../admin/models/busmodel.php';
require_once '../admin/models/routemodel.php';

class RouteController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'routes';
    }

    public function home()
    {
        $routes = RouteModel::selected();
        $data = [
            'routes' => $routes,
        ];
        if (!empty($_SESSION['User_id'])) {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {
                $this->render('route', $data);
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
                $route = RouteModel::selected();
                $data = [
                    'routes' => $route,
                ];

                $this->render('create', $data);
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
                if (isset($_POST['route']) && isset($_POST['bus'])) {
                    $route = trim($_POST['route']);
                    $bus = trim($_POST['bus']);

                    if ($route == '' || $bus == '') {
                        echo '<script>alert("Vui lòng nhập đầy đủ thông tin trước khi thêm")</script>';
                        echo header('location: index.php?controller=route&action=create');
                    } else {
                        RouteModel::insert($route, $bus);

                        echo '<script>alert("Thêm thành công");';
                        echo "location.href = 'index.php?controller=route&action=home';";
                        echo '</script>';
                    }
                } else {
                    header('location: ../index.php?controller=route&action=home');
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
                    $id = $_GET['id'];

                    if ($id == '') {
                        echo '<script>alert("không có giá trị này");
                            location.href = "index.php?controller=route&action=home";
                        </script>';
                    } else {
                        $route = RouteModel::find($id);

                        $data = ['routes' => $route];
                        $this->render('edit', $data);

                        print_r($route);
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
                if (isset($_POST['id']) && isset($_POST['routeName']) && isset($_POST['totalBus'])) {
                    $id = $_POST['id'];
                    $routeName = $_POST['routeName'];
                    $totalbus = $_POST['totalBus'];
                    if ($id == '') {
                        echo '<script>alert("không có giá trị này");
                            location.href = "index.php?controller=route&action=home";
                        </script>';
                    } else {
                        if ($routeName === '' || $totalbus === '') {
                            echo '<script>alert("không có được để trống tên tuyến xe hoặc số xe chạy");
                                location.href = "index.php?controller=route&action=home";
                            </script>';
                        } else {
                            RouteModel::update($id, $routeName, $totalbus);
                            //header('location: index.php?controller=route&action=home');
                            //echo 'Trang update';
                        }
                    }
                } else {
                    echo '<script>alert("không có giá trị sửa này");
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
        // $id = $_POST['id'];
        // print_r($id);
    }

    public function delete()
    {
        if (!empty($_SESSION['User_id'])) {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {
                $id = isset($_POST['idRoute']) ? $_POST['idRoute'] : '';
                if ($id == '') {
                    echo '<script>alert("Tuyến xe không tồn tại")</script>';
                    echo header('location: ../index.php?controller=route&action=home');
                } else {
                    RouteModel::deleteRoute($id);
                    BusModel::deleteRoute($id);
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
