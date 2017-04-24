<?php
include 'init.php';
include 'connect_db.php';
$mid = $_POST['mid'];
$uname = $_POST['uname'];

$sql = "select * from map where mid='$mid' and uname='$uname'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "Sorry, You've alread been in this match!";
} else {
    $sql1 = "select * from game where mid='$mid'";
    $res1 = $conn->query($sql1);
    $row = $res1->fetch_assoc();
    $available = (int) $row['capacity'] - (int) $row['already'];
    if ($available == 0) {
        echo "Sorry,the match is full, Please choose another match!";
    } else {
        $update = "update game set already=already+1 where mid='$mid'";
        $conn->query($update);
        $join = "insert into map(mid,uname) values('$mid','$uname');";
        $conn->query($join);
        echo 'Enjoy yourself!';
    }
    $conn->close();
}
?>

