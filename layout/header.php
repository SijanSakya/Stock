<?php

// include '../php/config/autoload.php';
extract($_POST);

if (isset($logout)) {

    session_unset();
    session_destroy();
    header("location:Login.php");
}


?>

<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8" />
    <title>Add stock</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link href="assets/css/app.min.css" rel="stylesheet" />


</head>

<body>

    <div>

        <div id="app" class="app">

            <div id="header" class="app-header">

                <div class="mobile-toggler">
                    <button type="button" class="menu-toggler" data-toggle="sidebar-mobile">
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </button>
                </div>


                <div class="brand">
                    <div class="desktop-toggler">
                        <button type="button" class="menu-toggler" data-toggle="sidebar-minify">
                            <span class="bar"></span>
                            <span class="bar"></span>
                        </button>
                    </div>
                    <a href="#" class="brand-logo">
                        <img src="assets/img/logo.png" alt="" height="20" />
                    </a>
                </div>


                <div class="menu">
                    <form class="menu-search" method="POST" name="header_search_form">
                        <div class="menu-search-icon"><i class="fa fa-search"></i></div>
                        <div class="menu-search-input">
                            <input type="text" class="form-control" placeholder="Search menu..." />
                        </div>
                    </form>
                    <div class="menu-item dropdown">
                        <a href="#" data-bs-toggle="dropdown" data-display="static" class="menu-link">
                            <div class="menu-icon"><i class="fa fa-bell nav-icon"></i></div>
                            <div class="menu-label">3</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-notification">
                            <h6 class="dropdown-header text-gray-900 mb-1">Notifications</h6>
                            <a href="#" class="dropdown-notification-item">
                                <div class="dropdown-notification-icon">
                                    <i class="fa fa-receipt fa-lg fa-fw text-success"></i>
                                </div>
                                <div class="dropdown-notification-info">
                                    <div class="title">Your store has a new order for 2 items totaling $1,299.00</div>
                                    <div class="time">just now</div>
                                </div>
                                <div class="dropdown-notification-arrow">
                                    <i class="fa fa-chevron-right"></i>
                                </div>
                            </a>
                            <a href="#" class="dropdown-notification-item">
                                <div class="dropdown-notification-icon">
                                    <i class="far fa-user-circle fa-lg fa-fw text-muted"></i>
                                </div>
                                <div class="dropdown-notification-info">
                                    <div class="title">3 new customer account is created</div>
                                    <div class="time">2 minutes ago</div>
                                </div>
                                <div class="dropdown-notification-arrow">
                                    <i class="fa fa-chevron-right"></i>
                                </div>
                            </a>
                            <a href="#" class="dropdown-notification-item">
                                <div class="dropdown-notification-icon">
                                    <img src="assets/img/icon/android.svg" alt="" width="26" />
                                </div>
                                <div class="dropdown-notification-info">
                                    <div class="title">Your android application has been approved</div>
                                    <div class="time">5 minutes ago</div>
                                </div>
                                <div class="dropdown-notification-arrow">
                                    <i class="fa fa-chevron-right"></i>
                                </div>
                            </a>
                            <a href="#" class="dropdown-notification-item">
                                <div class="dropdown-notification-icon">
                                    <img src="assets/img/icon/paypal.svg" alt="" width="26" />
                                </div>
                                <div class="dropdown-notification-info">
                                    <div class="title">Paypal payment method has been enabled for your store</div>
                                    <div class="time">10 minutes ago</div>
                                </div>
                                <div class="dropdown-notification-arrow">
                                    <i class="fa fa-chevron-right"></i>
                                </div>
                            </a>
                            <div class="p-2 text-center mb-n1">
                                <a href="#" class="text-gray-800 text-decoration-none">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="menu-item dropdown">
                        <a href="" data-bs-toggle="dropdown" class="menu-link">
                            <div class="menu-img online">
                                <span class="ms-100 mh-100 rounded-circle justify-content-center"> <?= $user->username ?> </span>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right me-lg-3">
                            <a class="dropdown-item d-flex align-items-center" href="#">Edit Profile <i class="fa fa-user-circle fa-fw ms-auto text-gray-400 f-s-16"></i></a>
                            <a class="dropdown-item d-flex align-items-center" href="#">Inbox <i class="fa fa-envelope fa-fw ms-auto text-gray-400 f-s-16"></i></a>
                            <a class="dropdown-item d-flex align-items-center" href="#">Calendar <i class="fa fa-calendar-alt fa-fw ms-auto text-gray-400 f-s-16"></i></a>
                            <a class="dropdown-item d-flex align-items-center" href="#">Setting <i class="fa fa-wrench fa-fw ms-auto text-gray-400 f-s-16"></i></a>
                            <div class="dropdown-divider"></div>
                            <!-- <a class="dropdown-item d-flex align-items-center" href="../stock/login.php">Log Out <i class="fa fa-toggle-off fa-fw ms-auto text-gray-400 f-s-16"></i></a> -->
                            <form method="POST" action="">
                                <input value="Logout" type="submit" class="dropdown-item d-flex align-items-center" name="logout"><i class="fa fa-toggle-off fa-fw ms-auto text-gray-400 f-s-16"></i></input>
                            </form>
                        </div>
                    </div>
                </div>
            </div>