<?php
include 'init.php';
isAdmin();
include 'connect_db.php';

$uname = $_POST['uname'];

$sql = "update user set isAdmin='1' where uname='$uname'";
$conn->query($sql);
echo 'Success!';
$conn->close();
?>

