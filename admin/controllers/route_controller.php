<?php  
require_once('../admin/controllers/base_controller.php');
require_once('../admin/models/busmodel.php');
require_once('../admin/models/routemodel.php');

class RouteController extends BaseController
{
    public function __construct()
    {
    	$this->folder = "routes";
    }

    public function home()
    {
        $routes = RouteModel::selected();
        $data = array(
            "routes" => $routes,
        );
    	if(!empty($_SESSION['User_id']))
        {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {
                $this->render("route",$data);
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