<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="asd" />
    <meta name="description" content="Sdsd" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Blog Management</title>
    <link rel="icon" type="image/png" sizes="16x16" href="https://triptohoneymoon.com/assets/img/logo.png" />
    <link href="<?= BASE_URL; ?>assets/admin/assets/libs/flot/css/float-chart.css" rel="stylesheet" />
    <link href="<?= BASE_URL; ?>assets/admin/dist/css/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>assets/admin/assets/extra-libs/multicheck/multicheck.css" />
    <link href="<?= BASE_URL; ?>assets/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" />
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <a class="navbar-brand" href="#">
                        <b class="logo-icon ps-2">
                        </b>
                        <span class="logo-text ms-2">
                            <img src="<?= BASE_URL; ?>assets/admin/assets/images/blog2.webp"
                                alt="Homepage"
                                style="height: 70px; background-color: #ffffff; margin-top: 16px; margin-left: 10px;" />
                        </span>

                        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-start me-auto">
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav float-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link  dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?= BASE_URL; ?>assets/admin/assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31" />
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= BASE_URL ?>admin/logout"><i class="fa fa-power-off me-1 ms-1"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar" data-sidebarbg="skin5">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="pt-4">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Blog Detail</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="<?= BASE_URL ?>admin/dashboard" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">Blog List</span></a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?= BASE_URL ?>admin/addblock" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu">Blog Add</span></a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">User</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="<?= BASE_URL ?>admin/userlist" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">User List</span></a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?= BASE_URL ?>admin/adduser" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu">User Add</span></a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Comment</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="<?= BASE_URL ?>admin/commentlist" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">Comment List</span></a>
                                </li>
                                
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>