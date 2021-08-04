<?php 
class RouteModel
{
	public $id,$routeName,$totalBus;

	function __construct($id, $routeName, $totalBus){
		$this->id = $id;
		$this->routeName = $routeName;
		$this->totalBus = $totalBus;
	}

	static function selected(){
		$list = [];

		$db = DB::getInstance();

		$query = $db->query('SELECT * FROM bus_route');

		foreach ($query->fetchAll() as $item) {
			$list[] =  new RouteModel($item['id'],$item['routeName'],$item['totalBus']);
		}

		return $list;
	}
}
?>