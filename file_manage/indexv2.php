<?php
  @session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: Main ::.</title>
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
    <script language="javascript">
      function fncSubmit()
      {
        if(document.form1.txtEmail.value == "")
        {
          alert('กรุณากรอกชื่ผู้ใช้');
          document.form1.txtEmail.focus();
          return false;
        } 
        if(document.form1.txtPassword.value == "")
        {
          alert('กรุณากรอกรหัสผ่าน');
          document.form1.txtPassword.focus();    
          return false;
        } 
        document.form1.submit();
      }
    </script>
</head>
<body>
<?php
    if(isset($_SESSION['user']) )
    {
    include_once('inc/config.php');
    include_once('inc/connect.php');
    $sql = ("SELECT * FROM company");
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
    <div>
        <div id="wrapper">
            <?php include_once('inc/topbar.php'); ?>
            <?php include_once('inc/menu.php'); ?>
            <div id="page-wrapper">
                <div class="page-content">
                    <div id="sum_box" class="row mbl">
                        <div class="row">
                            <center><img class="img-responsive img-rounded" src="<?php echo("$row[company_img]"); ?>" width="600" height="200"></center>
                        </div><br>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-red">
                                    <div class="panel-heading">
                                        <h1 class="panel-title"><span class="fa fa-building-o"></span> &nbsp;&nbsp;  รายละเอียดบริษัท </h1>
                                    </div>
                                    
                                    <div class="panel-body">
                                        <form action='sc_editcompany.php' method="POST" class="form-horizontal">
                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label"><b>ชื่อกิจการ : </b></label>
                                                            <div class="col-md-8"><p class="form-control-static"><?php echo("$row[company_name]"); ?></p></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label"><b>เลขประจำตัวผู้เสียภาษี : </b></label>
                                                            <div class="col-md-8"><p class="form-control-static"><?php echo("$row[company_tax_id]"); ?></p></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label"><b>เลขทะเบียนการค้า : </b></label>
                                                            <div class="col-md-8"><p class="form-control-static"><?php echo("$row[company_trade_id]"); ?></p></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label"><b>ที่อยู่(ภาษาไทย) : </b></label>
                                                            <div class="col-md-8"><p class="form-control-static"><?php echo("$row[company_addr_th]"); ?></p></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label"><b>ที่อยู่(ภาษาอังกฤษ) : </b></label>
                                                            <div class="col-md-8"><p class="form-control-static"><?php echo("$row[company_addr_en]"); ?></p></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label"><b>โทรศัพท์ : </b></label>
                                                            <div class="col-md-8"><p class="form-control-static"><?php echo("$row[company_tel]"); ?></p></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label"><b>โทรสาร : </b></label>
                                                            <div class="col-md-8"><p class="form-control-static"><?php echo("$row[company_fax]"); ?></p></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label"><b>เว็บไซต์ : </b></label>
                                                            <div class="col-md-8"><p class="form-control-static"><?php echo("$row[company_web]"); ?></p></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label"><b>อีเมล์ : </b></label>
                                                            <div class="col-md-8"><p class="form-control-static"><?php echo("$row[company_email]"); ?></p></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label"><span style="color:green">ผู้มีอำนาจลงนาม </span></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php
                                                    $sqli = ("SELECT * FROM signatory_company WHERE signatory_company_tax_id = $row[company_tax_id]");
                                                    //echo $row["customer_tax_id"];
                                                    $resulti = $conn->query($sqli);
                                                    $rowi = $resulti->fetch_all();
                                                    //print_r($rowi);

                                                    foreach ($rowi as $rs) 
                                                    {
                                                ?>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label"><b> ผู้มีอำนาจลงนาม : </b></label>
                                                                <div class="col-md-8"><p class="form-control-static"><?php echo ($rs['1']);?></p></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label"><b>สถานะ : </b></label>
                                                                <div class="col-md-8"><p class="form-control-static"><?php echo ($rs['2']);?></p></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                    }
                                                ?>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label"><span style="color:red"> ผู้ทำบัญชีกิจการ </span></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php
                                                    $sqll = ("SELECT * FROM company_audit INNER JOIN employee ON company_audit.employee_work_id=employee.employee_worker_id WHERE  company_audit.company_tax_id= $row[company_tax_id]");
                                                    //echo $row["customer_tax_id"];
                                                    $resultl = $conn->query($sqll);
                                                    $rowl = $resultl->fetch_all();
                                                    //print_r($rowl);

                                                    foreach ($rowl as $rl) 
                                                    {
                                                ?>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label"> <b>ผู้ทำบัญชีกิจการ : </b></label>
                                                                <div class="col-md-8"><p class="form-control-static"><?php echo ($rl['4']); ?>&nbsp;<?php echo ($rl['5']);?></p></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label"><b>เลขทะเบียนผู้ทำบัญชี : </b></label>
                                                                <div class="col-md-8"><p class="form-control-static"><?php echo ($rl['7']);?></p></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                    }
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label"><b>หมายเหตุ : </b></label>
                                                            <div class="col-md-8"><p class="form-control-static"><?php echo("$row[company_note]"); ?></p></div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </form><!-- END form -->
                                    </div><!-- /#panel body -->
                                <?php  
                                    if(@$_SESSION['status'] == "ADMIN")
                                    {
                                ?>      
                                        <div class="modal-footer">
                                            <center>
                                                <a type="submit" class="btn btn-green" href="ed_company.php?com_tax_id=<?php echo("$row[company_tax_id]"); ?>" >แก้ไขข้อมูลบริษัท</a>
                                            </center>
                                        </div>
                                <?php
                                    }
                                ?>
                                </div><!-- /#panel panel-info --> 
                            </div><!-- END col-lg-12 -->
                        </div><!-- /.row -->
                        
                        <!-- modal login -->
                        <form name="form1" action="sc_login.php" method="post" onSubmit="JavaScript:return fncSubmit();">
                            <div id="pnlLogin" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                            <h3 class="form-signin-heading">เข้าสู่ระบบ</h3>
                                        </div>
                                        <!-- /modal-header --> 

                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <div class="col-sm-offset-1 col-sm-2">
                                                    <label><b>ชื่อผู้ใช้ : </b></label>
                                                </div>
                                                
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name="txtEmail" placeholder="example@example.com" />
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-sm-offset-1 col-sm-2">
                                                    <label><b>รหัสผ่าน : </b></label>
                                                </div>
                                                
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="password" name="txtPassword" placeholder="password"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /model-body -->
                                        
                                        <div class="modal-footer">
                                            <div class="form-group row">
                                                <div class="col-md-offset-4 col-md-8">
                                                    <button class="btn btn-success" type="submit" value="login">เข้าสู่ระบบ</button>
                                                    <button class="btn btn-danger" data-dismiss="modal" type="button">ปิด</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /modal-footer -->

                                    </div>
                                    <!-- /modal-content -->                             
                                </div>
                                <!-- /modal-dialog -->                          
                            </div>
                            <!-- /pnlLogin -->                      
                        </form>
                        <!-- /modal login -->

                    </div><!-- END row mbl -->
                </div><!-- END PAGE-CONTENT -->
                <!--BEGIN FOOTER-->
                <?php include_once('inc/footer.php');  ?>
                <!--END FOOTER-->
            </div>
            <!--END PAGE WRAPPER-->
        </div>
        <!--END WRAPPER-->
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
