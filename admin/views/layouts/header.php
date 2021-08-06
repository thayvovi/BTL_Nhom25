<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Custom fonts for this template-->
    <link href="../assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <!-- Custom styles for this template-->
    <link href="../assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <script src="../assets/js/all.js" crossorigin="anonymous"></script>
    <script language="javascript" src="../assets/js/jquery-2.0.0.min.js"></script>
    <!-- Custom styles for this page -->
    <link href="../assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<title><?php echo $title; ?></title>
</head>
<body id="page-top">
  <!-- Page Wrapper -->
    <div id="wrapper">    	
    	<!-- Phần sidebar-menu -->
       	<?php require_once("menu.php"); ?>
		
		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
    			<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    				<!-- responsive menu-->
    			    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    			        <i class="fa fa-bars"></i>
    			    </button>
    			    <ul class="navbar-nav ml-auto">
    		    	<!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['User_name']?></span>
                                <img class="img-profile rounded-circle"
                                    src="../assets/admin/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../">
                                    <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đi đến trang khách hàng
                                </a>
                                <a class="dropdown-item" href="../index.php?controller=users&action=edit&id=<?php echo $_SESSION['User_id'];?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../index.php?controller=users&action=logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
    			    </ul>
    			</nav>