<?php
include('init.php');
isAdmin();
include('connect_db.php');

$mid = $_POST['mid'];
$mname = $_POST['mname'];
$date = date("Y-m-d", strtotime($_POST['date']));
$stime = $_POST['stime'];
$duration = $_POST['duration'];
$location = $_POST['location'];
$capacity = $_POST['capacity'];
$desc = $_POST['desc'];

$sql = "UPDATE game set mid='$mid', mname='$mname', date='$date',start='$stime',"
        . "duration='$duration',location='$location',capacity='$capacity',description='$desc' "
        . "where mid='$mid';";

if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>alert('Update Success!');location.href='../manage_match.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
