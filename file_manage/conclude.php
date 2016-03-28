<?php
  @session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: Conclude ::.</title>
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
    
    <script src="inc/highcharts/highcharts.js"></script>
    <script src="inc/highcharts/exporting.js"></script>
    <script type="text/javascript" src="script/jquery.min.js"></script>
    <script type="text/javascript" src="script/arrow79.js"></script>
    
</head>
<body>
<?php
    if(isset($_SESSION['user']))
    {
        include_once('inc/config.php');
        include_once('inc/connect.php');
        $sql = ("SELECT * FROM coast_work LEFT OUTER JOIN employee ON coast_work.fk_employee_worker_id=employee.employee_worker_id WHERE coast_work.fk_n_customer_id=$_GET[cus]");
        $result = $conn->query($sql);
        $row = $result->fetch_array();
        //print_r($row);
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
                                <div class="panel panel-red">
                                    <div class="panel-heading">
                                        <h1 class="panel-title"><span class="fa fa-bar-chart-o"></span> &nbsp;&nbsp; สรุปผล : <?php echo "$_GET[cus]"; ?>&nbsp; ชื่อบริษัท : <?php echo "$_GET[name]"; ?></h1>
                                    </div>

                                    <!-- ใส่ส่วนนี้ -->
                                    <div class="table-responsive">
                                        <table class="table table-hover-color">
                                            <thead>
                                                <tr class="danger">
                                                    <th>ลำดับ</th>
                                                    <th>ขื่อ-นามสกุล</th>
                                                    <th>สถานะ</th>
                                                    <th>ชั่วโมงกำหนด</th>
                                                    <th>ชั่วโมงที่ใช้</th>
                                                    <th>Record</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                        
                                    <?php 
                                    $i=0;
                                        do
                                        {$i++;
                                    ?>  
                                            <tbody>
                                                <tr class="active">
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row['employee_name']; ?>&nbsp;<?php echo $row['employee_lname']; ?></td>
                                                    <td><?php if($row['coast_work_role']==0){echo "ผู้ทำบัญชี";}else{echo "ผู้ปฏิบัติงาน";} ?></td>
                                                    <td><?php echo $row['coast_work_hour']; ?>&nbsp;ชั่วโมง</td>
                                                    <td>
                                                    <?php  
                                                        $sqlj = ("SELECT SUM(dr_time_hour) AS hour, SUM(dr_time_minute) AS minute FROM daily_record WHERE dr_em_id=$row[employee_worker_id] AND fk_n_customer_id=$_GET[cus]");
                                                        $resultj = $conn->query($sqlj);
                                                        @$rowj = $resultj->fetch_array();
                                                       // print_r($rowj);
                                                        $ohour = $rowj['hour'];
                                                        $ominute = $rowj['minute'];
                                                        $nhour = $ominute/60;
                                                        $nminute = $ominute%60;
                                                        $thour = $ohour+$nhour;
                                                        $tminute = $nminute;
                                                        echo intval($thour);?>&nbsp;ชั่วโมง&nbsp;<?php echo intval($tminute);?>&nbsp;นาที
                                                    </td>
                                                    <td>
                                                    <?php 
                                                        $sqli = ("SELECT SUM(dr_record) AS rec FROM daily_record WHERE dr_em_id=$row[employee_worker_id] AND fk_n_customer_id=$_GET[cus]");
                                                        $resulti = $conn->query($sqli);
                                                        $rowi = $resulti->fetch_assoc();
                                                        $orec = $rowi['rec'];
                                                        //print_r($rowi);
                                                        if($orec==""){echo ("0"); }else{echo $orec;}?>&nbsp;Record
                                                    </td>
                                                    <td>
                                                        <!--<a href="http://127.0.0.1/audit/file_manage/highcharts/highcharts_db.php?em=<?php //echo $row['fk_employee_worker_id']; ?>&cus=<?php echo $_GET['cus']; ?>" target="_black" title="กราฟแสดงRecord" class="btn btn-success btn-sm"><span class="fa fa-bar-chart-o"></span></a>-->
                                                        <!--<a title="กราฟแสดงการทำงาน" class="btn btn-success btn-sm" data-toggle="modal" data-target="#pnlGraph<?php //echo ("$_GET[cus]");?>"><span class="fa fa-bar-chart-o"></span></a>-->
                                                        <!-- modal show graph -->
                                                        <div class="modal fade" id="pnlGraph<?php echo ("$_GET[cus]");?>" >
                                                            <div class="modal-dialog" >
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <div class="panel panel-info">
                                                                            <div class="panel-heading">
                                                                                <h3 class="panel-title"><span class="fa fa-search"></span> &nbsp;ข้อมูลแสดงการทำงาน</h3>
                                                                            </div><br>

                                                                            <div id="graph" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                                                                            
                                                                            <div class="modal-footer">
                                                                                <div class="form-group row">
                                                                                    <div class="col-md-offset-4 col-md-8">
                                                                                        
                                                                                        <button class="btn btn-danger" data-dismiss="modal" type="button">ปิด</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div><!-- /modal-footer -->
                                                                        </div>
                                                                        <!-- END panel-info -->
                                                                    </div>
                                                                    <!-- END modal-body -->

                                                                </div><!-- /modal-content -->                               
                                                            </div><!-- /modal-custom -->                            
                                                        </div><!-- /pnlDetail -->

                                                        <a href="workuserv2.php?worker=<?php echo ("$row[employee_worker_id]"); ?>" class="btn btn-info btn-sm"><span class="fa fa-users"></span></a>
                                                        
                                                    </td>
                                                </tr>
                                            </tbody>
                                    <?php
                                        }while($row = $result->fetch_array())
                                    ?>
                                        </table>
                                    </div><br><br>
                                </div>
                                
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

<?php 
    } 
    else
    {
        header("Location: ../index.html");
    }
?>
    
</body>
</html>