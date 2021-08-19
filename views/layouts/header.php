<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php echo $title; ?></title>
    <base href="http://localhost/BTL_Nhom25/"> <!-- đường dẫn cơ bản -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="assets/js/all.js" crossorigin="anonymous"></script>
    <script language="javascript" src="assets/js/jquery-2.0.0.min.js"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
</head>
<body>
    <!-- Navigation(menu)-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand"><h3 style="cursor: default">Nhóm 25</h3></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>

            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Nhập tên tuyến xe cần tìm" aria-label="Search">
                <button class="btn btn-success" type="submit">Search</button>
            </form>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="./">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?controller=cars&action=index">Lịch trình</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?controller=pages&action=about">Liên hệ</a></li>
                    <?php if (isset($_SESSION['User_id'])) { ?>
                       <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                          <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                              <a class="nav-link btn btn-primary dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i><span class="p-1"></span><?php echo $_SESSION['User_name']; ?>
                              </a>
                              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <?php if (isset($_SESSION['User_level']) && $_SESSION['User_level'] == 1) { ?>
                                    <li><a class="dropdown-item" href="./admin/">Đi đến trang admin</a></li>
                                <?php } ?>
                                <li><a class="dropdown-item" href="index.php?controller=users&action=edit&id=<?php echo $_SESSION['User_id']; ?>">Chỉnh sửa thông tin</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=cars&action=showTicket&id=<?php echo $_SESSION['User_id']; ?>">Xem vé xe</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=users&action=logout">Đăng xuất</a></li>
                              </ul>
                            </li>
                          </ul>
                        </div>
                    <?php } else { ?>
                        <li class="nav-item"><a class="nav-link btn btn-primary px-lg-3 py-3 py-lg-4" href="index.php?controller=users&action=index">Đăng nhập</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Header-->
