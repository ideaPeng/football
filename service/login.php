<?php

include('connect_db.php');
session_start();

$uname = $_POST['uname'];
$upwd = $_POST['upwd'];

if ($uname && $upwd) {
    $sql = "select * from user where uname = '$uname' and upwd='$upwd'";
    $result = $conn->query($sql);
    $rows = $result->num_rows;
    if ($rows) {
        $_SESSION['username'] = $uname;
        $row = $result->fetch_assoc();
        $isAdmin = $row['isAdmin'];
        if ($isAdmin == '1') {
            $_SESSION['admin'] = 1;
            header("Location:../admin_home.php");
        } else {
            header("Location:../player_home.php");
        }
        header("refresh:0;url=welcome.html");
        exit;
    } else {
        echo "<h1>We are Sorry but you have input the wrong username or passwd</h1>";
        echo "
          <script>
              setTimeout(function(){window.location.href='../index.html';},3000);
          </script>";
    }
} else {
    echo "
          <script>
              alert('Please ');
              setTimeout(function(){window.location.href='../index.html';},1000);
          </script>";
}

$conn->close();
?>
