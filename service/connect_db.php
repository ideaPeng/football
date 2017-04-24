<?php

$server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = 'football';

$conn = new mysqli($server, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
?>
