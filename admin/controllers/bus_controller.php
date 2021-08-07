<?php  
require_once('../admin/controllers/base_controller.php');
require_once('../admin/models/busmodel.php');
require_once('../admin/models/routemodel.php');

class BusController extends BaseController
{
    public function __construct()
    {
    	$this->folder = "buses";
    }

    public function home()
    {
        $bus = BusModel::selected();
        $routes = RouteModel::selected();
        $data = array(
            "buses" => $bus,
            "routes" => $routes,
        );
    	if(!empty($_SESSION['User_id']))
        {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {
                $this->render("bus",$data);
            }
            else{
                header("location: ../");
            }
        }else{
            echo '<script>';
            echo "location.href= '../index.php?controller=users&action=index';";
            echo '</script>';
        }
    }

    public function create(){
        if(!empty($_SESSION['User_id']))
        {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {
                $route = RouteModel::selected();
                $data = array(
                    "routes" => $route,
                );
                $this->render("create",$data);
            }
            else{
                header("location: ../");
            }
        }else{
            echo '<script>';
            echo "location.href= '../index.php?controller=users&action=index';";
            echo '</script>';
        }
    }

    public function store()
    {

        if(!empty($_SESSION['User_id']))
        {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {
                if(isset($_POST['route'])){
                    $route = $_POST['route'];
                    if(isset($_POST['ngay'])){
                        $ngay = $_POST['ngay'];
                        if(isset($_POST['gio'])){
                            $gio = $_POST['gio'];
                            if(isset($_POST['seat'])){
                                $seat = $_POST['seat'];
                                $them = BusModel::insert($route,$ngay,$gio,$seat);

                                header("location: index.php?controller=bus&action=home");
                            }
                        }
                    }
                }
                else{
                    echo '<script>alert("Vui lòng nhập đầy đủ thông tin.\n Không bỏ trống phần nào.");';
                    echo 'location.href="index.php?controller=bus&action=create";</script>';
                }
             } else{
                header("location: ../");
            }
         } else{
            echo '<script>';
            echo "location.href= '../index.php?controller=users&action=index';";
            echo '</script>';
        }
    }

    public function edit(){
    	if(!empty($_SESSION['User_id']))
        {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {
                if (isset($_GET['id'])) {
                    $route = RouteModel::selected();

                    $buses = BusModel::selected();

                    $data = array(
                        "buses" => $buses,
                        "routes" => $route,
                    );

                    $this->render("edit",$data);
                }else{
                    header("location: index.php?controller=pages&action=error");
                }
            }
            else{
                header("location: ../");
            }
        }else{
            echo '<script>';
            echo "location.href= '../index.php?controller=users&action=index';";
            echo '</script>';
        }
    }

    public function update_bus()
    {
        if(!empty($_SESSION['User_id']))
        {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {

                    $id = $_GET['id'];
                    if(isset($_POST['route'])){
                        $route = $_POST['route'];
                        if(isset($_POST['ngay'])){
                            $ngay = $_POST['ngay'];
                            if(isset($_POST['gio'])){
                                $gio = $_POST['gio'];
                                if(isset($_POST['seat'])){
                                    $seat = $_POST['seat'];
                                    $them = BusModel::update($id,$route,$ngay,$gio,$seat);
                                    echo '<script>alert("Sửa thành công.");';
                                    echo 'location.href="index.php?controller=bus&action=edit&id='.$id.'";</script>';
                                }
                            }
                        }
                    }
                    else{
                        echo '<script>alert("Vui lòng nhập đầy đủ thông tin.\n Không bỏ trống phần nào.");';
                        echo 'location.href="index.php?controller=bus&action=edit&id=<?php echo $id;?>";</script>';
                    }
            }
            else{
                header("location: ../");
            }
        }else{
            echo '<script>';
            echo "location.href= '../index.php?controller=users&action=index';";
            echo '</script>';
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id= $_GET['id'];
            // BusModel::delete($id)
            // header("location: index.php?controller=bus&action=home");
            echo $id;
        }
        else{
            echo '<script>alert("Bạn chưa chọn tuyến xe để xóa");';
            echo 'location.href="index.php?controller=bus&action=home';
        }
    }
}

?>