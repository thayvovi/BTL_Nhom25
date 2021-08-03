<?php  
class BaseController{
	protected $folder;

	public function render($file,$data=[])
	{
		$view_file = '../admin/views/'.$this->folder.'/'.$file.'.php';

		if(file_exists($view_file)){
			extract($data);

			ob_start();
			require_once($view_file);
			$content = ob_get_clean();

			require_once('../admin/views/layouts/application.php');
		}
		else{
			header('Location: index.php?controller=pages&action=error');
		}

	}
}
?>