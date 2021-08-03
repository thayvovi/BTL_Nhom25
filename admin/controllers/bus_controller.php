<?php  
require_once('../admin/controllers/base_controller.php');

class BusController extends BaseController
{
    public function __construct()
    {
    	$this->folder = "routebus";
    }

    public function home()
    {
    	$this->render("show");
    }
}

?>