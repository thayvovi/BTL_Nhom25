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
            'tickets' => $tickets,
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

    public function delete()
    {
        if (!empty($_SESSION['User_id'])) {
            if (!empty($_SESSION['User_level']) && $_SESSION['User_level'] == 1) {
                if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    if ($id == '') {
                        echo '<script>alert("Không tồn tại vé xe");
                            location.reload();
                        </script>';
                    } else {
                        Ticket::delete($id);
                    }
                }
            }
        } else {
            echo '<script>alert("Something went wrong!!!");';
            echo 'location.href="index.php?controller=tickets&action=index';
        }
    }
}
