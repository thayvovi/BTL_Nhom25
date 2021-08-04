<?php  
require_once('controllers/base_controller.php');
require_once('models/user.php');
class UsersController extends BaseController
{
	public function __construct(){
		$this->folder = 'users';
	}

	//trang đăng nhập
    public function index(){
    	$this->render("index");
    }
    public function postIndex(){        
    	if(!empty($_POST['sdt']) || !empty($_POST['mat_khau']))
    	{
            $sdt = $_POST['sdt'];
            $mat_khau = $_POST['mat_khau'];
            $mat_khau = md5($mat_khau);

            $getAccount = User::checkUser($_POST['sdt']);
            if ($sdt == $getAccount->sdt ) {
                $_SESSION['User_sdt'] = $sdt;
                if($mat_khau == $getAccount->mat_khau ){
                    $_SESSION['User_id'] = $getAccount->id;
                    $_SESSION['User_name'] = $getAccount->ten_khach;
                    $_SESSION['User_level'] = $getAccount->level;
                    if($getAccount->level == false)
                        header("Location: ./");
                    else {                        
                        header("Location: admin");
                    }
                }
                else
                    header("location: index.php?controller=users&action=index&notify=error");
            }
            else {
                header("location: index.php?controller=users&action=index&notify=error");
            }
    	}
        else{
    		header("location: index.php?controller=users&action=index&notify=error");
    	}
    }

    public function logout()
    {
    	session_destroy();
    	header("location: index.php?controller=users&action=index");
    }

    //phần đăng ký
    public function create(){
    	$this->render("create");
    }

    public function store(){
        $ten_khach = isset($_POST['ten_khach'])? $_POST['ten_khach'] : '';
        $mat_khau = isset($_POST['mat_khau'])? $_POST['mat_khau'] : '';
        $sdt = isset($_POST['sdt'])? $_POST['sdt'] : '';
        $dia_chi = isset($_POST['dia_chi'])? $_POST['dia_chi'] : '';
        $level = 0;

        if ($ten_khach != '' && $mat_khau != '' && $sdt != '' && $dia_chi != '') {
            $check = User::checkUser($_POST['sdt']);
            if($check->sdt !== $sdt){
                if (is_numeric($sdt)) {
                    $mat_khau = md5($mat_khau);
                    User::insert($ten_khach,$mat_khau,$sdt,$dia_chi,$level);
                    header("location: index.php?controller=users&action=index&notify=success");
                }
                else {
                    header("location: index.php?controller=users&action=create&notify=error");
                }
            }else {
                header("location: index.php?controller=users&action=create&notify=error");
            }
        }
        else {
            header("location: index.php?controller=users&action=create&notify=error");
        }
    }

    //phần chỉnh sửa
    public function edit(){
        $user = User::find($_SESSION['User_id']);
        $data = array("user"=>$user);
        $this->render("edit",$data);
    }
    public function update(){
        $ten_khach = isset($_POST['ten_khach'])? $_POST['ten_khach'] : '';
        $sdt = isset($_POST['sdt'])? $_POST['sdt'] : '';
        $dia_chi = isset($_POST['dia_chi'])? $_POST['dia_chi'] : '';
        if ($ten_khach != '' && $sdt != '' && $dia_chi != ''){
            $getID = User::find($_SESSION['User_id']);
            if($ten_khach != $getID->ten_khach || $sdt != $getID->sdt || $dia_chi != $getID->dia_chi){
                if (is_numeric($sdt)) {
                User::update($getID->id,$ten_khach,$getID->mat_khau,$sdt,$dia_chi,);
                header("location: index.php?controller=users&action=edit&id=$getID->id&notify=success");
                }
                else {
                    header("location: index.php?controller=users&action=edit&id=$getID->id&notify=error");
                }
            }
            else {
                header("location: index.php?controller=users&action=edit&id=$getID->id&notify=error");
            }
        }
        else {
            header("location: index.php?controller=users&action=edit&id=$check->id&notify=error");
        }
    }
    public function changePassWord()
    {
        $mat_khau_cu = isset($_POST['mat_khau_cu'])? $_POST['mat_khau_cu'] : '';
        $mat_khau_moi = isset($_POST['mat_khau_moi'])? $_POST['mat_khau_moi'] : '';
        $re_pass = isset($_POST['re-pass'])? $_POST['re-pass'] : '';

        if ($mat_khau_cu != '' && $mat_khau_moi != '' && $re_pass != ''){
            $getID = User::find($_SESSION['User_id']);
            $mat_khau_cu = md5($mat_khau_cu);
            if($mat_khau_cu == $getID->mat_khau){
                if ($mat_khau_moi == $re_pass) {
                $mat_khau_moi = md5($mat_khau_moi);
                User::update($getID->id,$getID->ten_khach,$mat_khau_moi,$getID->sdt,$getID->dia_chi);
                header("location: index.php?controller=users&action=edit&id=$getID->id&notify=success");
                }
                else {
                    header("location: index.php?controller=users&action=edit&id=$getID->id&notify=error");
                }
            }
            else {
                header("location: index.php?controller=users&action=edit&id=$getID->id&notify=error");
            }
        }
        else {
            header("location: index.php?controller=users&action=edit&id=$check->id&notify=error");
        } 
    }
}

?>