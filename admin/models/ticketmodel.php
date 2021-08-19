<?php

class Ticket
{
    public $id;
    public $idBus;
    public $userName;
    public $sdt;
    public $seat;
    public $ngay;
    public $gio;
    public $diem_don;

    public function __construct($id, $idBus, $userName, $sdt, $seat, $ngay, $gio, $diem_don)
    {
        $this->id = $id;
        $this->idBus = $idBus;
        $this->userName = $userName;
        $this->sdt = $sdt;
        $this->seat = $seat;
        $this->ngay = $ngay;
        $this->gio = $gio;
        $this->diem_don = $diem_don;
    }

    public static function selected()
    {
        try {
            $list = [];
            $db = DB::getInstance();
            $query = $db->prepare('SELECT * FROM ticket_details');
            $query->execute();

            foreach ($query->fetchAll() as $item) {
                $list[] = new Ticket($item['id'], $item['idBus'], $item['userName'], $item['sdt'], $item['seat'], $item['ngay'], $item['gio'], $item['diem_don']);
            }

            return $list;
        } catch (PDOException $e) {
            echo 'Có lỗi xảy ra với user '.$e->getMessage();
        }
    }

    public static function count()
    {
        $db = DB::getInstance();

        $query = $db->prepare('SELECT count(id) FROM ticket_details');
        $query->execute();
        $number_of_rows = $query->fetchColumn();

        return $number_of_rows;
        $db = DB::disconnect();
    }
}
