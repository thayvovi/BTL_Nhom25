<?php  
require_once('controllers/base_controller.php');
require_once('models/bus.php');
require_once('models/busroute.php');
require_once('models/user.php');
require_once('models/ticketdetails.php');
class CarsController extends BaseController{
	function __construct(){
		$this->folder = "cars";
		
	}

	public function index(){
		
		$xe = Bus::all();		
		$route = BusRoute::read();		
		
		$data = array(
			"xe" => $xe,
			"routes" => $route,
		);
		$this->render("index",$data);
	}

	public function create(){
		$xe = Bus::all();		
		$route = BusRoute::read();		
		
		$data = array(
			"xe" => $xe,
			"routes" => $route,
		);
		$this->render("create",$data);
	}
	public function store(){
		if (!empty($_GET['id'])) {
			$id = isset($_GET['id'])? $_GET['id']:'';
			$userName = isset($_POST['name']) ? $_POST['name'] : '';
			$sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
			$route = isset($_POST['route']) ? $_POST['route'] : '';
			$ngay = isset($_POST['date']) ? $_POST['date'] : '';
			$gio = isset($_POST['time']) ? $_POST['time'] : '';
			$diem_don = isset($_POST['diem_don']) ? $_POST['diem_don'] : '';
			$seat = isset($_POST['seat']) ? $_POST['seat'] : '';

			if ($userName != '' && is_numeric($sdt) != '' && $diem_don != '' && is_numeric($seat) != '') {
				$insert = Ticket::insert($id,$userName,$sdt,$seat,$ngay,$gio,$diem_don);

				header("location: index.php?controller=pages&action=home");
			}else{
				header("location: index.php?controller=cars&action=create&id=$id&notify=error");
			}
			

		}
		else{
			header("location: index.php?controller=pages&action=error");
		}
	}

	public function showTicket(){
		$buses = Bus::all();
		$routes = BusRoute::read();
		$tickets = Ticket::read();
		$data = array(
			"buses"   => $buses,
			"tickets" => $tickets,
			"routes" => $routes,
		);
		$this->render('edit',$data);
	}
}
?>