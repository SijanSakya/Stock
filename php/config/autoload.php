<?php
session_start();

include './php/config/db.php';
include './php/model/company.php';
include './php/model/myStock.php';
include './php/model/stocktype.php';
include './php/model/user.php';




if (isset($_SESSION['user_id'])) {

    $user = new user($_SESSION['user_id'], $_SESSION['username'], $_SESSION['email'], $_SESSION['password'], $_SESSION['is_activated'], $_SESSION['created_at']);
} else {

    if ($_SERVER['REQUEST_URI'] == "/stock/Login.php" || $_SERVER['REQUEST_URI'] == "/stock/register.php") {
    } else {
        header("Location: Login.php");
    }
}
