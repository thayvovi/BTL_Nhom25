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
            $list[] = new BusModel($item['id'], $item['idRoute'], $item['date'], $item['time'], $item['totalSeat']);
        }

        return $list;
        $db = DB::disconnect();
    }

    public static function insert($idRoute, $date, $time, $totalSeat)
    {
        $db = DB::getInstance();

        $query = $db->prepare('INSERT INTO xe SET idRoute=:idRoute,date=:date,time=:time,totalSeat=:totalSeat');
        $query->execute(['idRoute' => $idRoute, 'date' => $date, 'time' => $time, 'totalSeat' => $totalSeat]);
        $db = DB::disconnect();
    }

    public static function update($id, $idRoute, $date, $time, $totalSeat)
    {
        $db = DB::getInstance();

        $query = $db->prepare('UPDATE xe SET idRoute=:idRoute,date=:date,time=:time,totalSeat=:totalSeat WHERE id=:id');
        $query->execute(['id' => $id, 'idRoute' => $idRoute, 'date' => $date, 'time' => $time, 'totalSeat' => $totalSeat]);
        $db = DB::disconnect();
    }

    public static function delete($id)
    {
        $db = DB::getInstance();

        $query = $db->prepare('DELETE FROM xe WHERE id=:id');
        $query->execute(['id' => $id]);
        $db = DB::disconnect();
    }

    public static function deleteRoute($id)
    {
        $db = DB::getInstance();

        $query = $db->prepare('DELETE FROM xe WHERE idRoute=:id');
        $query->execute(['id' => $id]);
        $db = DB::disconnect();
    }

    public static function count()
    {
        $db = DB::getInstance();

        $query = $db->prepare('SELECT count(id) FROM xe');
        $query->execute();
        $number_of_rows = $query->fetchColumn();

        return $number_of_rows;
        $db = DB::disconnect();
    }
}
