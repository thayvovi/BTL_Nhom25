<?php

require_once '../admin/controllers/base_controller.php';
require_once '../admin/models/busmodel.php';
require_once '../admin/models/routemodel.php';
require_once '../admin/models/usersmodel.php';
require_once '../admin/models/ticketmodel.php';

class PagesController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'pages';
    }

    public function home()
    {
        if (!empty($_SESSION['User_id'])) {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {
                $countBus = BusModel::count();
                $countRoute = RouteModel::count();
                $countUser = User::count();
                $countTicket = Ticket::count();
                $data = [
                    'countBus' => $countBus,
                    'countRoute' => $countRoute,
                    'countUser' => $countUser,
                    'countTicket' => $countTicket,
                ];
                $this->render('home', $data);
            } else {
                header('location: ../');
            }
        } else {
            echo '<script>';
            echo "location.href= '../index.php?controller=users&action=index';";
            echo '</script>';
        }
    }

    public function error()
    {
        if (!empty($_SESSION['User_id'])) {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {
                $this->render('error');
            } else {
                header('location: ../');
            }
        } else {
            echo '<script>';
            echo "location.href= '../index.php?controller=users&action=index';";
            echo '</script>';
        }
    }
}
