<?php
include 'init.php';
include 'connect_db.php';
$mid = $_POST['mid'];
$uname = $_POST['uname'];

$sql = "delete from map where mid='$mid' and uname='$uname'";

if (($conn->query($sql)) === True) {
    $sql2 = "update game set already=already-1 where mid='$mid'";
    if ($conn->query($sql2) === True) {
        echo "Quit Success!";
    }
}
$conn->close();
?>

