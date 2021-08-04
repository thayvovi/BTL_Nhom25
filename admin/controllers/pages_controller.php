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
    	if(!empty($_SESSION['User_id']))
        {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {
                $this->render("home");
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

    public function error()
    {
        if(!empty($_SESSION['User_id']))
        {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {
                $this->render("error");
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