<?php

require_once '../admin/controllers/base_controller.php';
require_once '../admin/models/busmodel.php';
require_once '../admin/models/routemodel.php';
require_once '../admin/models/usersmodel.php';

class UsersController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'users';
    }

    public function index()
    {
        $users = User::selected();
        $data = [
            'users' => $users,
        ];
        if (!empty($_SESSION['User_id'])) {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {
                $this->render('show', $data);
            } else {
                header('location: ../');
            }
        } else {
            echo '<script>';
            echo "location.href= '../index.php?controller=users&action=index';";
            echo '</script>';
        }
    }

    public function create()
    {
    }

    public function store()
    {
    }

    public function edit()
    {
    }

    public function update()
    {
    }
}
