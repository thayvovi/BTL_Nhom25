<?php  
class BusModel
{
    public $id;
	public $idRoute; 
	public $ngay; 
	public $gio;
	public $totalSeat;
	
	public function __construct($id, $idRoute, $ngay, $gio, $totalSeat)
	{
		$this->id = $id;
		$this->idRoute = $idRoute;
		$this->ngay = $ngay;
		$this->gio = $gio;
		$this->totalSeat = $totalSeat;
	}

	public static function selected()
	{
		$list = [];

		$db = DB::getInstance();

		$query = $db->query('SELECT * FROM xe');

		foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $item) {
			$list[] = new BusModel($item['id'],$item['idRoute'],$item['ngay'],$item['gio'],$item['totalSeat']);
		}

		return $list;
		$db= DB::disconnect();
	}

	public static function insert($idRoute, $ngay, $gio, $totalSeat)
	{
		$db = DB::getInstance();

		$query = $db->prepare('INSERT INTO xe SET idRoute=:idRoute,ngay=:ngay,gio=:gio,totalSeat=:totalSeat');
		$query->execute(array("idRoute"=>$idRoute,"ngay"=>$ngay,"gio"=>$gio,"totalSeat"=>$totalSeat));
		$db= DB::disconnect();
	}

	public static function update($id,$idRoute, $ngay, $gio, $totalSeat)
	{
		$db = DB::getInstance();

		$query = $db->prepare('UPDATE xe SET idRoute=:idRoute,ngay=:ngay,gio=:gio,totalSeat=:totalSeat WHERE id=:id');
		$query->execute(array("id" => $id,"idRoute"=>$idRoute,"ngay"=>$ngay,"gio"=>$gio,"totalSeat"=>$totalSeat));
		$db= DB::disconnect();
	}

	public static function delete($id)
	{
		$db = DB::getInstance();

		$query = $db->prepare('DELETE FROM xe WHERE id=:id');
		$query->execute(array("id" => $id));
		$db= DB::disconnect();
	}
}

?>