<?php
error_reporting(0);
date_default_timezone_set('PRC');//set the timezone;
session_start();

Function isLogin() {
    if (!isset($_SESSION['username'])) {
        session_unset(); //free all session variable
        session_destroy();
        header('Location:/index.html');
        return false;
    } else {
        return true;
    }
}

Function isAdmin() {
    if (!isset($_SESSION['admin'])) {
        if (isset($_SESSION['username'])) {
            header('Location:/player_home.php');
        } else {
            session_unset(); //free all session variable
            session_destroy();
            header('Location:/index.html');
        }
        return false;
    } else {
        return true;
    }
}

isLogin();
$uname = $_SESSION['username'];
?>