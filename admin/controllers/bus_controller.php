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
            "bus" => $bus,
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

    public function edit(){
    	if(!empty($_SESSION['User_id']))
        {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {
                $this->render("edit");
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
}

?>