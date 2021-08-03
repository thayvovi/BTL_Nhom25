<?php 
class DB{
	private static $instance = NULl;

	public static function getInstance(){
		if (!isset(self::$instance)) {//self sử dụng trong phương thức stactic function, this ngược lại
			try {
				self::$instance = new PDO('mysql:host=localhost;dbname=btl_nhom25', 'root', '');
				self::$instance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				self::$instance->exec("SET NAMES 'utf8'");
			} catch (PDOException  $ex) {
				die($ex->getMessage());
			}
		}
		return self::$instance;
	}

	public static function disconnect()
	{
		self::$instance = NULL;
	}
}
?>