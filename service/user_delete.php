<?php

include('init.php');
isAdmin();
include 'connect_db.php';

$uname = $_POST['uname'];

$sql = "delete from user where uname='$uname'";
$conn->query($sql);
$sql2 = "delete from map where uname='$uname'";
$conn->query($sql2);

echo 'Success!';

$conn->close();
?>
