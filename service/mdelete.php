<?php
include('init.php');
isAdmin();
include('connect_db.php');

$mid = $_POST['mid'];

$sql = "delete from game where mid='$mid'";
$conn->query($sql);

$sql2 = "delete from map where mid='$mid'";
$conn->query($sql2);

$conn->close();
echo "delete success";
?>

