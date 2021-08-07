<?php  
class Bus{
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

	static function all(){
		$list = [];
		$db = DB::getInstance();
		$query = $db->query('SELECT * FROM xe');

		foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $item) {
			$list[] = new Bus($item['id'],$item['idRoute'],$item['ngay'],$item['gio'],$item['totalSeat']);
		}

		return $list;
	}
	
	static function find($id){

		$db = DB::getInstance();

		$query = $db->prepare('SELECT * FROM xe WHERE id = :id');
		$query->execute(array('id'=>$id));

		$item = $query->fetch();//lấy dữ liệu của id
		if (isset($item['id'])) {
			return new Bus($item['id'],$item['idBus'],$item['idRoute'],$item['ngay'],$item['gio'],$item['totalSeat']);//tồn tại id trả về thông tin của id đó
		}
		return null;
	}

	
}
?>