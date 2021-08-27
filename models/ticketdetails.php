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

    public static function read()
    {
        $list = [];
        $db = DB::getInstance();

        $query = $db->query('SELECT * FROM ticket_details');

        foreach ($query->fetchAll() as $item) {
            $list[] = new Ticket($item['id'], $item['idBus'], $item['userName'], $item['sdt'], $item['seat'], $item['ngay'], $item['gio'], $item['diem_don']);
        }

        return $list;
    }

    public static function insert($id, $userName, $sdt, $seat, $ngay, $gio, $diem_don)
    {
        try {
            $db = DB::getInstance();

            $getBus = $db->prepare('SELECT id FROM xe WHERE id =:id');
            $getBus->execute(['id' => $id]);

            if ($getBus->rowCount() > 0) {
                $bus = $getBus->fetch();

                $insert = $db->prepare('INSERT INTO ticket_details SET idBus=:idBus,userName=:userName,sdt=:sdt,seat=:seat,ngay=:ngay,gio=:gio,diem_don=:diem_don');

                $insert->execute(['idBus' => $bus['id'], 'userName' => $userName, 'sdt' => $sdt, 'seat' => $seat, 'ngay' => $ngay, 'gio' => $gio, 'diem_don' => $diem_don]);
            }
        } catch (PDOException $e) {
            echo 'Có lỗi xảy ra '.$e->getMessage();
        }
    }

    public static function update($id, $userName, $sdt, $seat, $ngay, $gio, $diem_don)
    {
        try {
            $db = DB::getInstance();

            $getBus = $db->prepare('SELECT id FROM xe WHERE id =:id');
            $getBus->execute(['id' => $id]);

            if ($getBus->rowCount() > 0) {
                $bus = $getBus->fetch();

                $insert = $db->prepare('UPDATE ticket_details SET idBus=:idBus,userName=:userName,sdt=:sdt,seat=:seat,ngay=:ngay,gio=:gio,diem_don=:diem_don WHERE id=:id');

                $insert->execute(['idBus' => $bus['id'], 'userName' => $userName, 'sdt' => $sdt, 'seat' => $seat, 'ngay' => $ngay, 'gio' => $gio, 'diem_don' => $diem_don]);
            }
        } catch (PDOException $e) {
            echo 'Có lỗi xảy ra '.$e->getMessage();
        }
    }

    public static function find($id)
    {
        try {
            $db = DB::getInstance();

            $list = [];

            $query = $db->prepare('SELECT * FROM ticket_details WHERE idBus = :id');
            $query->execute(['id' => $id]);

            foreach ($query->fetchAll() as $item) {
                // $list[] = new Ticket($item['id'], $item['idBus'], $item['userName'], $item['sdt'], $item['seat'], $item['ngay'], $item['gio'], $item['diem_don']);
                $list = [$item['seat']];
            }

            return $list;

            // $db = DB::getInstance();

            // $query = $db->prepare('SELECT seat FROM ticket_details WHERE idBus = :id');
            // $query->execute(['id' => $id]);

            // $item = $query->fetchAll(); //lấy dữ liệu của id
            // // if (isset($item['id'])) {
            // //     return new Ticket($item['id'], $item['idBus'], $item['userName'], $item['sdt'], $item['seat'], $item['ngay'], $item['gio'], $item['diem_don']);
            // // }

            // // return null;

            // if (isset($item['id'])) {
            //     return $item['seat'];
            // }

            // return null;
        } catch (PDOException $e) {
            echo 'Có lỗi xảy ra '.$e->getMessage();
        }
    }

    public static function delete($id)
    {
        $db = DB::getInstance();

        $query = $db->prepare('DELETE FROM ticket_details WHERE id=:id');
        $query->execute(['id' => $id]);
        $db = DB::disconnect();
    }
}
