<?php

class User
{
    public $id;
    public $ten_khach;
    public $mat_khau;
    public $sdt;
    public $dia_chi;
    public $level;

    public function __construct($id, $ten_khach, $mat_khau, $sdt, $dia_chi, $level)
    {
        $this->id = $id;
        $this->ten_khach = $ten_khach;
        $this->mat_khau = $mat_khau;
        //$this->gioi_tinh = $gioi_tinh;
        $this->sdt = $sdt;
        $this->dia_chi = $dia_chi;
        $this->level = $level;
    }

    public static function selected()
    {
        try {
            $list = [];
            $db = DB::getInstance();
            $query = $db->prepare('SELECT * FROM users');
            $query->execute();

            foreach ($query->fetchAll() as $item) {
                $list[] = new User($item['id'], $item['ten_khach'], $item['mat_khau'], $item['sdt'], $item['dia_chi'], $item['level']);
            }

            return $list;
        } catch (PDOException $e) {
            echo 'Có lỗi xảy ra với user '.$e->getMessage();
        }
    }

    public static function insert($ten_khach, $mat_khau, $sdt, $dia_chi, $level)
    {
        try {
            $db = DB::getInstance();
            $query = $db->prepare('INSERT INTO users SET ten_khach =:ten_khach, mat_khau=:mat_khau, sdt=:sdt, dia_chi=:dia_chi, level=:level');
            $query->execute(['ten_khach' => $ten_khach, 'mat_khau' => $mat_khau, 'sdt' => $sdt, 'dia_chi' => $dia_chi, 'level' => $level]);
        } catch (PDOException  $ex) {
            echo $ex->getMessage();
        }
    }

    public static function find($id)
    {
        $db = DB::getInstance();

        $query = $db->prepare('SELECT * FROM users WHERE id = :id');
        $query->execute(['id' => $id]);

        $item = $query->fetch(); //lấy dữ liệu của id
        if (isset($item['id'])) {
            return new User($item['id'], $item['ten_khach'], $item['mat_khau'], $item['sdt'], $item['dia_chi'], $item['level']); //tồn tại id trả về thông tin của id đó
        }

        return null;
    }

    public static function update($id, $ten_khach, $sdt, $dia_chi, $level)
    {
        try {
            $db = DB::getInstance();

            $sql = 'UPDATE users SET ten_khach= :ten_khach, sdt=:sdt,dia_chi=:dia_chi,level=:level WHERE id= :id';
            $query = $db->prepare($sql);
            $query->execute(['ten_khach' => $ten_khach, 'sdt' => $sdt, 'dia_chi' => $dia_chi, 'level' => $level, 'id' => $id]);
        } catch (PDOException $ex) {
            $ex->getMessage();
        }
    }
}
