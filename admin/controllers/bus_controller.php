<?php

require_once '../admin/controllers/base_controller.php';
require_once '../admin/models/busmodel.php';
require_once '../admin/models/routemodel.php';

class BusController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'buses';
    }

    public function home()
    {
        $bus = BusModel::selected();
        $routes = RouteModel::selected();
        $data = [
            'buses' => $bus,
            'routes' => $routes,
        ];
        if (!empty($_SESSION['User_id'])) {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {
                $this->render('bus', $data);
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
                if (isset($_POST['route'])) {
                    $route = $_POST['route'];
                    if (isset($_POST['ngay'])) {
                        $ngay = $_POST['ngay'];
                        if (isset($_POST['gio'])) {
                            $gio = $_POST['gio'];
                            if (isset($_POST['seat'])) {
                                $seat = $_POST['seat'];
                                $them = BusModel::insert($route, $ngay, $gio, $seat);

                                header('location: index.php?controller=bus&action=home');
                            }
                        }
                    }
                } else {
                    echo '<script>alert("Vui lòng nhập đầy đủ thông tin.\n Không bỏ trống phần nào.");';
                    echo 'location.href="index.php?controller=bus&action=create";</script>';
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
                    $route = RouteModel::selected();

                    $buses = BusModel::selected();

                    $data = [
                        'buses' => $buses,
                        'routes' => $route,
                    ];

                    $this->render('edit', $data);
                } else {
                    header('location: index.php?controller=pages&action=error');
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

    public function update_bus()
    {
        if (!empty($_SESSION['User_id'])) {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {
                if (isset($_GET['id']) && isset($_POST['route']) && isset($_POST['ngay']) && isset($_POST['gio']) && isset($_POST['seat'])) {
                    $id = trim(addslashes(htmlspecialchars($_GET['id'])));
                    $route = trim(addslashes(htmlspecialchars($_POST['route'])));
                    $ngay = trim(addslashes(htmlspecialchars($_POST['ngay'])));
                    $gio = trim(addslashes(htmlspecialchars($_POST['gio'])));
                    $seat = trim(addslashes(htmlspecialchars($_POST['seat'])));

                    if ($id === '' || $route === '' || $ngay === '' || $gio === '' || $seat === '') {
                        echo '<script>
                            alert("Vui lòng kiểm tra lại thông tin sửa !!!");
                            window.history.back();
                        </script>';
                    } else {
                        BusModel::update($id, $route, $ngay, $gio, $seat);
                        echo '<script>
                            alert("Sửa thành công !!!");
                            location.href = "index.php?controller=bus&action=home2";
                        </script>';
                    }
                } else {
                    echo '<script>
                        alert("Không tồn tại xe chạy");
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
                    $id = $_POST['id'];
                    if ($id == '') {
                        echo '<script>alert("Không tồn tại bus");
                            location.reload();
                        </script>';
                    } else {
                        BusModel::delete($id);
                    }
                }
            }
        } else {
            echo '<script>alert("Something went wrong!!!");';
            echo 'location.href="index.php?controller=bus&action=home';
        }
    }
}
