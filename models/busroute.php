<?php 
class BusRoute{
	public $id,$routeName,$totalBus;

	function __construct($id, $routeName, $totalBus){
		$this->id = $id;
		$this->routeName = $routeName;
		$this->totalBus = $totalBus;
	}

	static function read(){
		$list = [];

		$db = DB::getInstance();

		$query = $db->query('SELECT * FROM bus_route');

		foreach ($query->fetchAll() as $item) {
			$list[] =  new BusRoute($item['id'],$item['routeName'],$item['totalBus']);
		}

		return $list;
	}
}
?>