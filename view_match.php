<?php
include('./service/init.php');
include('./service/connect_db.php');

$mid = $_GET['mid'];

$sql = "select * from game where mid='$mid';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <script src="js/jquery-2.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" >Welcome <span><?php echo $_SESSION['username']; ?></span></a>
                    <ul class="user-menu">
                        <li class="dropdown pull-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> User <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                                <li><a href="service/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="sidebar-collapse" class="col-sm-3 col-lg-5 sidebar">
            <img src="pic/bg_detail.jpg" style="width: 100%; height: 100%;"/>
        </div><!-- end sidebar -->

        <!-- main -->
        <div class="col-sm-9 col-sm-offset-3 col-lg-7 col-lg-offset-5 main">			
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="admin_home.php"><span class="glyphicon glyphicon-home"></span></a></li>
                    <?php
                    if (isset($_SESSION['admin'])) {
                        echo "<li class='active'><a href='admin_home.php'><span>Go Back</span></a></li>";
                    } else {
                        echo "<li class='active'><a href='player_home.php'><span>Go Back</span></a></li>";
                    }
                    ?>

                </ol>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Match Detail</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p><?php echo "$row[description]"; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end main -->
    </body>
</html>


