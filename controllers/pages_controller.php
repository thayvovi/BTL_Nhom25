<?php  
require_once('controllers/base_controller.php');
require_once('models/user.php');
class PagesController extends BaseController{
	public function __construct(){
		$this->folder = 'pages';
	}
	public function home(){
		$user = User::read();

		$this->render('home');
	}

	public function about()
	{
		$this->render("about");
	}

	public function error()
	{
		$this->render('error');
	}


}
?>