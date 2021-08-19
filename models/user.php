<?php

class User
{
    public $id;
    public $ten_khach;
    public $mat_khau;
    //public $gioi_tinh;
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

    public static function read()
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

    public static function checkUser($sdt)
    {
        $db = DB::getInstance();

        $query = $db->prepare('SELECT * FROM users WHERE sdt = :sdt');
        $query->execute(['sdt' => $sdt]);
        //$item=$query->fetch();
        if ($query->rowCount() > 0) {
            $item = $query->fetch();

            return new User($item['id'], $item['ten_khach'], $item['mat_khau'], $item['sdt'], $item['dia_chi'], $item['level']);
        }

        return null;
        $db = DB::disconnect();
    }

    public static function checkSDT($sdt)
    {
        $db = DB::getInstance();
        $query = $db->prepare('SELECT * FROM users WHERE sdt = :sdt');
        $query->execute(['sdt' => $sdt]);
        $db = DB::disconnect();
    }

    public static function insert($ten_khach, $mat_khau, $sdt, $dia_chi, $level)
    {
        try {
            //$gioi_tinh = 0;
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

    public static function update($id, $ten_khach, $mat_khau, $sdt, $dia_chi)
    {
        try {
            $db = DB::getInstance();

            $sql = 'UPDATE users SET ten_khach= :ten_khach,mat_khau=:mat_khau, sdt=:sdt,dia_chi=:dia_chi WHERE id= :id';
            $query = $db->prepare($sql);
            $query->execute(['ten_khach' => $ten_khach, 'mat_khau' => $mat_khau, 'sdt' => $sdt, 'dia_chi' => $dia_chi, 'id' => $id]);
            $_SESSION['User_name'] = $ten_khach; //thực hiện lưu lại biến session
        } catch (PDOException $ex) {
            $ex->getMessage();
        }
    }
}
