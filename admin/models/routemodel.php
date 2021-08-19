<?php

class RouteModel
{
    public $id;
    public $routeName;
    public $totalBus;

    public function __construct($id, $routeName, $totalBus)
    {
        $this->id = $id;
        $this->routeName = $routeName;
        $this->totalBus = $totalBus;
    }

    public static function selected()
    {
        $list = [];

        $db = DB::getInstance();

        $query = $db->query('SELECT * FROM bus_route');

        foreach ($query->fetchAll() as $item) {
            $list[] = new RouteModel($item['id'], $item['routeName'], $item['totalBus']);
        }

        return $list;
    }

    public static function find($id)
    {
        try {
            $db = DB::getInstance();
            $query = $db->prepare('SELECT * FROM bus_route WHERE id = :id');
            $query->execute(['id' => $id]);

            if ($query->rowCount() > 0) {
                $item = $query->fetch();

                if (isset($item['id'])) {
                    return new RouteModel($item['id'], $item['routeName'], $item['totalBus']);
                }

                return null;
            }
            $db = DB::disconnect();
        } catch (PDOException $ex) {
            echo 'có lỗi xảy ra' + $ex->getMessage();
        }
    }

    public static function insert($routeName, $totalBus)
    {
        try {
            $db = DB::getInstance();
            $query = $db->prepare('INSERT INTO bus_route SET routeName = :routeName, totalBus=:totalBus ');
            $query->execute(['routeName' => $routeName, 'totalBus' => $totalBus]);
            $db = DB::disconnect();
        } catch (PDOException $ex) {
            echo 'có lỗi xảy ra' + $ex->getMessage();
        }
    }

    public static function update($id, $routeName, $totalBus)
    {
        try {
            $db = DB::getInstance();
            $query = $db->prepare('UPDATE bus_route SET routeName = :routeName, totalBus=:totalBus WHERE id = :id ');
            $query->execute(['routeName' => $routeName, 'totalBus' => $totalBus, 'id' => $id]);
            $db = DB::disconnect();
        } catch (PDOException $ex) {
            echo 'có lỗi xảy ra' + $ex->getMessage();
        }
    }

    public static function deleteRoute($id)
    {
        $db = DB::getInstance();
        $query = $db->prepare('DELETE FROM bus_route WHERE id = :id');
        $query->execute(['id' => $id]);
        $db = DB::disconnect();
    }

    public static function count()
    {
        $db = DB::getInstance();

        $query = $db->prepare('SELECT count(id) FROM bus_route');
        $query->execute();
        $number_of_rows = $query->fetchColumn();

        return $number_of_rows;
        $db = DB::disconnect();
    }
}
