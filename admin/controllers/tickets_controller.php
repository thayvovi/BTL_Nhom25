<?php

require_once '../admin/controllers/base_controller.php';
require_once '../admin/models/busmodel.php';
require_once '../admin/models/routemodel.php';
require_once '../admin/models/usersmodel.php';
require_once '../admin/models/ticketmodel.php';

class TicketsController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'tickets';
    }

    public function index()
    {
        $tickets = Ticket::selected();
        $data = [
            'ticketes' => $tickets,
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
}
