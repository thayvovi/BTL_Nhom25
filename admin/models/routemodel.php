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

    public static function deleteRoute($id)
    {
        $db = DB::getInstance();
        $query = $db->prepare('DELETE FROM bus_route WHERE id = :id');
        $query->execute(['id' => $id]);
        $db = DB::disconnect();
    }
}
