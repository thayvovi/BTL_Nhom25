<?php  
require_once('../admin/controllers/base_controller.php');

class PagesController extends BaseController
{
    public function __construct()
    {
    	$this->folder = "pages";
    }

    public function home()
    {
    	$this->render("home");
    }

    public function error()
    {
    	$this->render("error");
    }
}

?>