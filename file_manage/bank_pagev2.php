﻿<?php
  @session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: TiTle ::.</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Loading bootstrap css-->
    <!-- Custom Fonts -->
    <link type="text/css" rel="stylesheet" href="styles/font-awesome-4.1.0/css/font-awesome.min.css" >
    <link type="text/css" rel="stylesheet" href="styles/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="styles/main.css">
    <link type="text/css" rel="stylesheet" href="styles/style-responsive.css">
    <link type="text/css" rel="stylesheet" href="styles/jquery.news-ticker.css">
    <link rel="stylesheet" type="text/css" href="inc/bootstrap/css/jquery-ui.css">

    <script type="text/javascript" src="script/jquery.min.js"></script>
    <script type="text/javascript" src="script/arrow79.js"></script>
    
</head>
<body>
<?php
    if(isset($_SESSION['user']))
    {
        include_once('inc/config.php');
        include_once('inc/connect.php');
?>
    <div> 
        <div id="wrapper">
            <?php include_once('inc/topbar.php'); ?>
            <?php include_once('inc/menu.php'); ?>
            <div id="page-wrapper">
                <div class="page-content">
                    <div id="sum_box" class="row mbl">
                        <div class="row">
                            <div class="col-lg-12">
                                
                                <!-- ใส่ส่วนนี้ -->

                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- row mbl -->
                </div>
                <!-- /.content -->
                <?php include_once('inc/footer.php'); ?>
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
    </div>
<?php $conn->close(); ?>

    <script src="script/jquery-1.10.2.min.js"></script>
    <script src="script/jquery-migrate-1.2.1.min.js"></script>
    <script src="script/jquery-ui.js"></script>
    <script src="script/bootstrap.min.js"></script>
    <script src="script/bootstrap-hover-dropdown.js"></script>
    <script src="script/html5shiv.js"></script>
    <script src="script/respond.min.js"></script>
    <script src="script/jquery.metisMenu.js"></script>
    <script src="script/jquery.slimscroll.js"></script>
    <script src="script/jquery.cookie.js"></script>
    <script src="script/icheck.min.js"></script>
    <script src="script/custom.min.js"></script>
    <script src="script/jquery.news-ticker.js"></script>
    <script src="script/jquery.menu.js"></script>
    <script src="script/pace.min.js"></script>
    <script src="script/holder.js"></script>
    <script src="script/responsive-tabs.js"></script>
    <script src="script/index.js"></script>
    <!--CORE JAVASCRIPT-->
    <script src="script/main.js"></script>
    <script type="text/javascript" src="inc/bootstrap/js/scriptm.js"></script>

    <!-- Datepicker JavaScript -->
    <script type="text/javascript" src="inc/bootstrap/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="inc/bootstrap/js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>

<?php 
    } 
    else
    {
        header("Location: ../index.html");
    }
?>
    
</body>
</html>