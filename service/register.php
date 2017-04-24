<?php

include('connect_db.php');

$uname = $_POST['uname'];
$upwd = $_POST['upwd'];
$uphone = $_POST['uphone'];
$uemail = $_POST['uemail'];

$sql = "select uname from user where uname='$uname'";
$result = $conn->query($sql);
$rows = $result->num_rows;

if ($rows > 0) {
    echo "<script type='text/javascript'>alert('User already exists');location.href='../register.html';</script>";
} else {
    $user_in = "insert into user (uname,upwd,uphone,uemail) values ('$uname','$upwd','$uphone','$uemail')";
    $conn->query($user_in);
    echo "<script type='text/javascript'>alert('Sign Up Success! Click confirm to Sign in!');location.href='../index.html';</script>";
}

$conn->close();
?>