<?php  
class Ticket{
	public $id, $idBus, $userName,$sdt,$seat,$ngay,$gio,$diem_don;

	public function __construct($id, $idBus, $userName,$sdt,$seat,$ngay,$gio,$diem_don){
		$this->id = $id; 
		$this->idBus = $idBus; 
		$this->userName = $userName;
		$this->sdt = $sdt;
		$this->seat = $seat;
		$this->ngay = $ngay;
		$this->gio = $gio;
		$this->diem_don = $diem_don;
	}

	static function read(){
		$list = [];
		$db = DB::getInstance();

		$query = $db->query('SELECT * FROM ticket_details');

		foreach($query->fetchAll() as $item){
			$list[] = new Ticket($item['id'],$item['idBus'],$item['userName'],$item['sdt'],$item['seat'],$item['ngay'],$item['gio'],$item['diem_don']);
		}

		return $list;
	}

	static function insert($id,$userName,$sdt,$seat,$ngay,$gio,$diem_don){
		try {
			$db = DB::getInstance();
			$getBus = $db->prepare('SELECT id FROM xe WHERE idRoute =:id');
			$getBus->execute(array('id'=>$id));

			if($getBus->rowCount() > 0){
				$bus = $getBus->fetch();

				$insert = $db->prepare('INSERT INTO ticket_details SET idBus=:idBus,userName=:userName,sdt=:sdt,seat=:seat,ngay=:ngay,gio=:gio,diem_don=:diem_don');
				
				$insert->execute(array("idBus"=>$bus['id'],"userName"=>$userName,"sdt"=>$sdt,"seat"=>$seat,"ngay"=>$ngay,"gio"=>$gio,"diem_don"=>$diem_don));
			}
		} catch (PDOException $e) {
			echo 'Có lỗi xảy ra '.$e->getMessage();
		}
	}
}