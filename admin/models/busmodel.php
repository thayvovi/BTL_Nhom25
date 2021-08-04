<?php  
class BusModel
{
    public $id;
	public $idRoute; 
	public $date; 
	public $time;
	public $totalSeat;
	
	public function __construct($id, $idRoute, $date, $time, $totalSeat)
	{
		$this->id = $id;
		$this->idRoute = $idRoute;
		$this->date = $date;
		$this->time = $time;
		$this->totalSeat = $totalSeat;
	}

	public static function selected()
	{
		$list = [];

		$db = DB::getInstance();

		$query = $db->query('SELECT * FROM xe');

		foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $item) {
			$list[] = new BusModel($item['id'],$item['idRoute'],$item['date'],$item['time'],$item['totalSeat']);
		}

		return $list;
	}

	public static function insert()
	{
		
	}
}

?>