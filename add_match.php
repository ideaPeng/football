<?php
include('./service/init.php');
isAdmin();
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
        <script src="js/add_match.js"></script>
        <script src="js/admin.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><span>Welcome Admin</span></a>
                    <ul class="user-menu">
                        <li class="dropdown pull-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> User <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile </a></li>
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
                <li><a href="admin_home.php"><span class="glyphicon glyphicon-dashboard"></span>View Match</a></li>
                <li><a href="admin_match.php"><span class="glyphicon glyphicon-th"></span>My Match</a></li>
                <li class="active"><a href="add_match.php"><span class="glyphicon glyphicon-th"></span>Add New Match</a></li>
                <li><a href="manage_match.php"><span class="glyphicon glyphicon-stats"></span>Manage Match</a></li>
                <li><a href="manage_user.php"><span class="glyphicon glyphicon-list-alt"></span>Manage Player</a></li>
                <li role="presentation" class="divider"></li>
        </div><!-- end sidebar -->

        <!-- main -->
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li class="active">New Match</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add a new Match</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form role="form" action="/service/madd.php" method="post">
                                    <div class="form-group">
                                        <label>Match Name</label>
                                        <input class="form-control" name="mname">
                                    </div>
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input class="form-control" type="date" placeholder="e.g. 2017-03-04" name="date">
                                    </div>
                                    <div class="form-group">
                                        <label>Starting Time</label>
                                        <input class="form-control" name="stime" placeholder="14:00:00">
                                    </div>
                                    <div class="form-group">
                                        <label>Duration</label>
                                        <input class="form-control" name="duration">
                                    </div>
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input class="form-control" name="location">
                                    </div>
                                    <div class="form-group">
                                        <label>Capacity</label>
                                        <input class="form-control" name="capacity">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="desc"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                    <button type="reset" class="btn btn-default">Reset</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
        </div><!--/.main-->
    </body>
</html>


