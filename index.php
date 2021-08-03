<?php 
session_start();

require_once("connection.php");
?>
<?php
#điều hướng luồng dữ liệu   
if (isset($_GET['controller'])) {//kiểm tra có controller
	$controller = $_GET['controller'];
	if (isset($_GET['action'])) {//kiểm tra có gọi đến hàm trong controller
		$action = $_GET['action'];
	}
	else{
		$action = 'index';//mặc định trả hàm index
	}
} else{
	$controller = 'pages';//mặc định trả về controller pages
	$action = 'home';//mặc định hàm home trong controller pages
}
?>
<?php require_once("routes.php"); ?>