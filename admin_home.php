<?php
include('./service/init.php');
include('./service/connect_db.php');
isAdmin();
//update the game status
//0 represents Up coming
//1 represents Over
$current_time = time();
$result = $conn->query("select mid, date, start from game where status='0';");
while ($row = $result->fetch_assoc()) {
    $time = $row[date] . ' ' . $row[start];

    $id = $row['mid'];
    $t = strtotime($time);
    #echo "<script>alert($current_time);</script>";
    if ((strtotime($time) - $current_time) < 0) {
        #echo "<script>alert('$time');</script>";
        $conn->query("update game set status='1' where mid='$id'");
    }
}


$sql = "select * from game order by date desc;";
$result = $conn->query($sql);
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
        <script src="js/admin.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Welcome <span><?php echo $_SESSION['username']; ?></span></a>
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
        <!-- sidebar -->
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <form role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </form>
            <ul class="nav menu">
                <li class="active"><a href="admin_home.php"><span class="glyphicon glyphicon-dashboard"></span>View Match</a></li>
                <li><a href="admin_match.php"><span class="glyphicon glyphicon-th"></span>My Match</a></li>
                <li><a href="add_match.php"><span class="glyphicon glyphicon-th"></span>Add New Match</a></li>
                <li><a href="manage_match.php"><span class="glyphicon glyphicon-stats"></span>Manage Match</a></li>
                <li><a href="manage_user.php"><span class="glyphicon glyphicon-list-alt"></span>Manage Player</a></li>
                <li role="presentation" class="divider"></li>
            </ul>
        </div><!-- end sidebar -->

        <!-- main -->
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li class="active">Matches</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View All the Matches</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Match Name</th>
                                        <th>Date</th>
                                        <th>Start Time</th>
                                        <th>Duration</th>
                                        <th>Location</th>
                                        <th>Capacity</th>
                                        <th>Remain</th>
                                        <th>Status</th>
                                        <th>JOIN IT!</th>
                                    </tr>
                                    <?php
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td style='display:none'>$row[mid]</td>";
                                        echo "<td style='display:none'>$_SESSION[username]</td>";
                                        echo "<td> <a href='view_match.php?mid=$row[mid]'>$row[mname]</a></td>";
                                        echo "<td> $row[date]</td>";
                                        echo "<td> $row[start]</td>";
                                        echo "<td> $row[duration] minutes</td>";
                                        echo "<td> $row[location]</td>";
                                        echo "<td> $row[capacity]</td>";
                                        $available = (int) $row[capacity] - (int) $row[already];
                                        echo "<td> $available </td>";
                                        if ($row[status] == '0') {
                                            echo "<td style='color:green'> Up Coming</td>";
                                        } else {
                                            echo "<td style='color:gary'> Over </td>";
                                        } if ($row[status] == '0') {
                                            echo "<td align=center><button class='glyphicon glyphicon-arrow-up ujoin' style='color:green;'></button></td>";
                                        } else {
                                            echo "<td align=center><button class='glyphicon glyphicon-ban-circle' style='color:red;'></button></td>";
                                        }
                                        echo "</tr>";
                                    }
                                    ?>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end main -->
    </body>
</html>
