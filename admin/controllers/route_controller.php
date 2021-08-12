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
                if (isset($_POST['route'])) {
                    $route = $_POST['route'];
                        if (isset($_POST['bus'])) {
                            $bus = $_POST['bus'];
                            RouteModel::insert($route, $bus);
                            echo '<script>';
                            echo 'location.href="index.php?controller=route&action=home";</script>';
                        }
                } else {
                    echo '<script>alert("Vui lòng nhập đầy đủ thông tin.\n Không bỏ trống phần nào.");';
                    echo 'location.href="index.php?controller=route&action=create";</script>';
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
                    $data = [
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

    public function update_route()
    {
        if (!empty($_SESSION['User_id'])) {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {
                $id = $_GET['id'];
                if (isset($_POST['routeName'])) {
                    $routeName = $_POST['routeName'];
                    if (isset($_POST['totalBus'])) {
                        $totalBus = $_POST['totalBus'];
                        $them = RouteModel::update($id, $routeName, $totalBus);
                        echo '<script>alert("Sửa thành công.");';
                        echo 'location.href="index.php?controller=route&action=edit&id='.$id.'";</script>';
                    }
                    echo header('location: index.php?controller=route&action=home');
                } else {
                    echo '<script>alert("Vui lòng nhập đầy đủ thông tin.\n Không bỏ trống phần nào.");';
                    echo 'location.href="index.php?controller=route&action=edit&id=<?php echo $id;?>";</script>';
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
