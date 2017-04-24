<?php
session_start();
if (isset($_SESSION['username'])) {
    session_unset(); //free all session variable
    session_destroy();
    header('Location:../index.html');
}
?>

