<?php
include('init.php');
isAdmin();
include('connect_db.php');

function create_uuid($prefix = "") {
    $str = md5(uniqid(mt_rand(), true));
    $uuid = substr($str, 0, 8) . '-';
    $uuid .= substr($str, 8, 4) . '-';
    $uuid .= substr($str, 12, 4) . '-';
    $uuid .= substr($str, 16, 4) . '-';
    $uuid .= substr($str, 20, 12);
    return $prefix . $uuid;
}

$mid = create_uuid();
$mname = $_POST['mname'];
$date = date("Y-m-d", strtotime($_POST['date']));
$stime = $_POST['stime'];
$duration = $_POST['duration'];
$location = $_POST['location'];
$capacity = $_POST['capacity'];
$desc = $_POST['desc'];

$sql = "INSERT INTO game(mid, mname, date, start, duration, capacity, location, description) VALUES ('$mid', '$mname', '$date', '$stime', '$duration', '$capacity', '$location', '$desc');";

if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>alert('Success!');location.href='../add_match.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>

