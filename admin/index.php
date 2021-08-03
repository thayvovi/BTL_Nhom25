<?php 
session_start();
require_once("../connection.php");
?>
<?php 
	if(isset($_GET['controller'])){
		$controller = $_GET['controller'];
		if (isset($_GET['action'])) {
			$action = $_GET['action'];
		}
		else{
			$action = 'index';
		}
	}else{
		$controller = 'pages';
		$action ='home';
	}
?>


<?php require_once "../admin/routes.php"; ?>