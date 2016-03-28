<?php
/* CONNECT */
@session_start();
include_once('../inc/config.php');
include_once('../inc/connect.php');
/* POST VAR */
@$txtCus = $_POST['txtCus']; //รหัสงานบริษัท 
@$txtName = $_POST['txtName']; //ชื่อบริษัท 
@$txtYear = $_POST['txtYear']; //ปี

/* Function */

function calTime($hour, $minute) {
    $newDrHour = intval($minute / 60);
    $newDrMinute = fmod($minute, 60);
    $intDrHour = $newDrHour + $hour; /* เป็นเวลาชั่วโมงที่รวมกับนาทีแล้วจาก dr_rec */
    $intDrMinute = $newDrMinute;
    $intConvMinute = $intDrHour * 60;
    $intTimeUseMinute = $intConvMinute + $intDrMinute;
    return $intTimeUseMinute;
}

function convMinToHourHour($minute) {
    $newhour = intval($minute / 60); //ชั่วโมง
    $newminute = fmod($minute, 60); //นาที
    $newTime = $newhour . "." . $newminute; //ชม . นาที
    return $newTime;
    //return $newhour;
}
//echo "1";
$selWorkReport = "";
/*CASE การเลือก*/
    /*รหัสงานบริษัท*/    /*ชื่อบริษัท*/         /*ปี*/
 if($txtCus == "" && $txtName == "" && $txtYear != "")//0 0 1
 {
     //$var = 1;
     /*จะได้ รหัสงานบริษัท ชื่อบริษัท ค่าจ้างทำบัญชี สถานะ*/
     $sqlSelCustomerAndGen = "SELECT * FROM `customer_gen` JOIN customer ON customer_gen.fk_customer_tax_id = customer.customer_tax_id WHERE customer_gen.customer_gen_year ='$txtYear' ";

     
 }
 if($txtCus == "" && $txtName != "" && $txtYear == "")// 0 1 0
 {
     $sqlSelCustomerAndGen = "SELECT * FROM `customer_gen` JOIN customer ON customer_gen.fk_customer_tax_id = customer.customer_tax_id WHERE customer.customer_company ='$txtName' ";
 }
 if($txtCus != "" && $txtName != "" && $txtYear != "")// 1 1 1
 {
     //$var = 3;
     $sqlSelCustomerAndGen = "SELECT * FROM `customer_gen` JOIN customer ON customer_gen.fk_customer_tax_id = customer.customer_tax_id WHERE customer.customer_company ='$txtName' AND customer_gen.customer_gen_year ='$txtYear' AND customer_gen.n_customer_id ='$txtCus' ";
 }
 if($txtCus != "" && $txtName == "" && $txtYear == "")// 1 0 0
 {
     //$var = 4;  ต้นแบบ
     /*จะได้ รหัสงานบริษัท ชื่อบริษัท ค่าจ้างทำบัญชี สถานะ*/
     $sqlSelCustomerAndGen = "SELECT * FROM `customer_gen` JOIN customer ON customer_gen.fk_customer_tax_id = customer.customer_tax_id WHERE customer_gen.n_customer_id ='$txtCus'";
     $selWorkReport = "SELECT * FROM `coast_work` WHERE `fk_n_customer_id` = '$txtCus'";
     /*จำนวนชั่วโมงการทำงานตั้งต้นคัดจากบริษัท*/
    // $sqlSelSumCoastWork = "SELECT SUM(coast_work_hour) AS coastWorkHour, SUM(coast_work_bath) AS coastWorkBath FROM `coast_work` WHERE fk_n_customer_id = '$txtCus'";
    
     /*จำนวนชั่วโมงการทำงานจริง*/
   //  $sqlSelDrRec = "SELECT SUM(dr_time_hour) AS drTimeHour, SUM(dr_time_minute) AS drTimeMinute, SUM(dr_record) AS drRecord FROM `daily_record` WHERE fk_n_customer_id = '$txtCus' ";
     
 }
 if($txtCus != "" && $txtName == "" && $txtYear != "")// 1 0 1
 {
     //$var = 5;
     $sqlSelCustomerAndGen = "SELECT * FROM `customer_gen` JOIN customer ON customer_gen.fk_customer_tax_id = customer.customer_tax_id WHERE customer_gen.n_customer_id ='$txtCus' ";
     $selWorkReport = "SELECT * FROM `coast_work` WHERE `fk_n_customer_id` = '$txtCus'";
     
 }
  if($txtCus != "" && $txtName != "" && $txtYear == "")// 1 1 0
 {
     //$var = 6;
      $sqlSelCustomerAndGen = "SELECT * FROM `customer_gen` JOIN customer ON customer_gen.fk_customer_tax_id = customer.customer_tax_id WHERE customer.customer_company ='$txtName'AND customer_gen.n_customer_id ='$txtCus' ";
      $selWorkReport = "SELECT * FROM `coast_work` WHERE `fk_n_customer_id` = '$txtCus'";
      
 }
  if($txtCus == "" && $txtName != "" && $txtYear != "")// 0 1 1
 {
     //$var = 7;
      $sqlSelCustomerAndGen = "SELECT * FROM `customer_gen` JOIN customer ON customer_gen.fk_customer_tax_id = customer.customer_tax_id WHERE customer.customer_company ='$txtName' AND customer_gen.customer_gen_year ='$txtYear'";
 }
  
?>
<!DOCTYPE html>
<html lang="en">
    <head><title>ข้อมูลรายงานส่วนบริษัท</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../images/icons/favicon.ico">
        <link rel="apple-touch-icon" href="../images/icons/favicon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/icons/favicon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/icons/favicon-114x114.png">
        <!--Loading bootstrap css-->
        <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
        <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
        <link type="text/css" rel="stylesheet" href="../styles/jquery-ui-1.10.4.custom.min.css">
        <link type="text/css" rel="stylesheet" href="../styles/font-awesome-4.1.0/css/font-awesome.min.css" >
        <link type="text/css" rel="stylesheet" href="../styles/font-awesome.min.css">
        <link type="text/css" rel="stylesheet" href="../styles/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="../styles/all.css">
        <link type="text/css" rel="stylesheet" href="../styles/main.css">
        <link type="text/css" rel="stylesheet" href="../styles/style-responsive.css">
        <link type="text/css" rel="stylesheet" href="../styles/zabuto_calendar.min.css">
        <link type="text/css" rel="stylesheet" href="../styles/pace.css">
        <link type="text/css" rel="stylesheet" href="../styles/jquery.news-ticker.css">
        <link type="text/css" rel="stylesheet" href="../styles/animate.css">

        <script type="text/javascript" src="../script/jquery.min.js"></script>
        <script type="text/javascript" src="../script/arrow79.js"></script>
    </head>
    <body id="top">
        <div><!--BEGIN THEME SETTING-->
            <div id="wrapper">
                <?php include_once('../sc_browse_data/inc/topbar.php'); ?>
                <?php include_once('../sc_browse_data/inc/menu.php'); ?>
                <div id="page-wrapper">
                    <div class="page-content">
                        <div id="sum_box" class="row mbl">
                            <div class="row"> <!--ข้อมูลทั่วไป-->
                                <div class="col-lg-12">
                                    <div class="panel panel-green">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><span class="fa fa-bar-chart-o"></span> &nbsp;&nbsp; ข้อมูลทั่วไป</h3>
                                        </div>
                                        <div class="panel-body">
                                            <!--BODY-->
                                            <div class="table-responsive"><!--table-responsive-->
                                                <!--TABLE-->
                                                <table  class="table table-striped table-hover-color">
                                                    <tr>
                                                        <th width="188" rowspan="2"><center>รหัสงานบริษัท</center></th>
                                                    <th width="188" rowspan="2"><center>ชื่อบริษัท</center></th>
                                                 <!--   <th width="188" rowspan="2"><center>ตำแหน่ง</center></th> -->
                                                    <th width="188" rowspan="2"><center>ค่าจ้างทำบัญชี</center></th>
                                                    <th colspan="3"><center>ชั่วโมงการทำงาน</center></th>
                                                    <th width="188" rowspan="2"><center>record</center></th>
                                                    <th width="188" rowspan="2"><center>สถานะ</center></th>
                                                    </tr>
                                                    <tr>
                                                        <th width="188"><center>ตั้งต้น</center></th>
                                                    <th width="188"><center>ใช้ไป</center></th>
                                                    <th width="188"><center>เหลือ</center></th>
                                                    </tr>
                                             <?php
                                             /*ตัวแปรเริ่มต้นเอาไว้กรวมค่า*/
                                             $revenueInt = 0; //รายได้ประมาณการ
                                             //$hourCountUse = 0;//ชั่วโมงนับรวมที่ใช้ไป
                                             $chargeInt = 0;
                                             $sumAlPayement = 0;
                                             $sumAllTimeDrUnitMinute = 0;
                                             $sumCoastWorkHourAll = 0;
                                             $sumCoastWorkBathAll = 0;
                                             /*query*/
                                                /*จะได้ รหัสงานบริษัท ชื่อบริษัท ค่าจ้างทำบัญชี สถานะ*/
                                              $queySelCustomerAndGen = mysqli_query($conn, $sqlSelCustomerAndGen);
                                              while($arrSelCustomerAndGen = $queySelCustomerAndGen->fetch_array())
                                              {
                                                  
                                                  /*sum payment*/
                                                  $sqlSumpayment = "SELECT SUM(payment_coast) AS paymentCoast FROM `payment` WHERE fk_n_customer = '$arrSelCustomerAndGenID'";
                                                  $querySumpayment = $conn->query($sqlSumpayment);
                                                  while($arrSumpayment = $querySumpayment->fetch_array())
                                                  {
                                                      $sumAlPayement = $sumAlPayement + $arrSumpayment['paymentCoast'];
                                                  }
                                                  /*.sum payment*/
                                             ?>
                                                    <tr>
                                                        <!--รหัสงานบริษัท-->
                                                        <td align="center"><?php echo $arrSelCustomerAndGenID = $arrSelCustomerAndGen['n_customer_id']; ?></td>
                                                        
                                                        <!--ชื่อบริษัท-->
                                                        <td align="center"><?php echo $arrSelCustomerAndGen['customer_company']; ?></td>
                                                     
                                                         <!--ค่าจ้างทำบัญชี-->
                                                         <td align="center"><?php echo number_format($arrSelCustomerAndGen['customer_gen_revenue']); 
                                                            $revenueInt = $revenueInt + $arrSelCustomerAndGen['customer_gen_revenue'];
                                                            
                                                            /*ค่าใช้จ่ายสำนักงานตั้งต้น*/
                                                                $chargeInt = $chargeInt + $arrSelCustomerAndGen['customer_gen_charge'];
                                                            /*.ค่าใช้จ่ายสำนักงานตั้งต้น*/
                                                        ?></td>
                                                        
                                                        
                                                        <!--เวลาตั้งต้น-->
                                                       <?php
                                                       $sqlSelSumCoastWork = "SELECT SUM(coast_work_hour) AS coastWorkHour, SUM(coast_work_bath) AS coastWorkBath FROM `coast_work` WHERE fk_n_customer_id = '$arrSelCustomerAndGenID'";
                                                       $querySelSumCoastWork = $conn->query($sqlSelSumCoastWork);
                                                       $resultSelSumCoastWork = $querySelSumCoastWork->fetch_assoc();
                                                       
                                                       /*รวมเวลาตั้งต้น*/
                                                       $sumCoastWorkHourAll = $sumCoastWorkHourAll + $resultSelSumCoastWork['coastWorkHour'];
                                                       /*รวมเงินตั้งต้น*/
                                                       $sumCoastWorkBathAll = $sumCoastWorkBathAll + $resultSelSumCoastWork['coastWorkBath'];
                                                       ?>
                                                        <td align="center"><?php echo $resultSelSumCoastWork['coastWorkHour']; ?></td>
                                                        
                                                       
                                                        <!--เวลาใช้ไป-->
                                                      <?php
                                                       $sqlSelDrRec = "SELECT SUM(dr_time_hour) AS drTimeHour, SUM(dr_time_minute) AS drTimeMinute, SUM(dr_record) AS drRecord FROM `daily_record` WHERE fk_n_customer_id = '$arrSelCustomerAndGenID' ";
                                                         $querySelDrRec = mysqli_query($conn, $sqlSelDrRec);
                                                         $resultSelDrRec = $querySelDrRec->fetch_assoc();
                                                         $drTimeHourToMinute = calTime($resultSelDrRec['drTimeHour'], $resultSelDrRec['drTimeMinute']);
                                                         $drTimeHourToMinuteToHour = convMinToHourHour($drTimeHourToMinute);
                                                         
                                                         /*รวมเวลาใช้จริง*/
                                                         $sumAllTimeDrUnitMinute = $sumAllTimeDrUnitMinute + $drTimeHourToMinute;
                                                      ?>
                                                        <td align="center"><?php echo $drTimeHourToMinuteToHour;   ?></td>
                                                        
                                                        <!--เวลาเหลือ-->
                                                        <td align="center">
                                                          <?php
                                                           $coastWorkHourIntToMinute = $resultSelSumCoastWork['coastWorkHour'] * 60;
                                                           $difTimeUseTopMenuToMinute = $coastWorkHourIntToMinute - $drTimeHourToMinute;
                                                          /*เวลาที่เหลือหลัง - แล้ว*/ 
                                                         echo   $difTimeUseTopMenuToHour = convMinToHourHour($difTimeUseTopMenuToMinute);
                                                          ?> 
                                                        </td>
                                                        
                                                        <!--recod-->
                                                        
                                                        <td align="center"><?php 
                                                        if($resultSelDrRec['drRecord'] == "")
                                                        {
                                                            echo "-";
                                                        }
                                                        elseif($resultSelDrRec['drRecord'] != "")
                                                        {
                                                            echo $resultSelDrRec['drRecord'];
                                                        }
                                                        ?></td>
                                                        
                                                        <!--สถานะ-->
                                                        <td><?php   
                                                            if($arrSelCustomerAndGen['check_close'] == 0)
                                                            {
                                                                echo "ดำเนินงาน";
                                                            }
                                                            elseif ($arrSelCustomerAndGen['check_close'] == 1) 
                                                            {
                                                                 echo "ปิดโครงการ";
                                                            }
                                                        
                                                        ?></td>
                                                    </tr>
                                             <?php } //.$arrSelCustomerAndGen ?> 
                                                </table>

                                                <!--.TABLE-->
                                            </div><!--.table-responsive-->
                                            <!--.BODY-->
                                        </div>
                                    </div>
                                </div>
                            </div><!--.ข้อมูลทั่วไป-->


                            <div class="row"> <!--รายงานกำไรขาดทุน-->
                                <div class="col-lg-12">
                                    <div class="panel panel-violet">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><span class="fa fa-bar-chart-o"></span> &nbsp;&nbsp; รายงานกำไรขาดทุน</h3>
                                        </div>
                                        <div class="panel-body">
                                            <!--BODY-->
                                            <div class="table-responsive"><!--table-responsive-->
                                                <!--TABLE-->
                                                <table width="629" class="table table-striped table-hover-color">
                                                    <tr>
                                                        <th width="107">&nbsp;</th>
                                                        <th width="139" align="center">ประมาณการ</th>
                                                        <th width="207" align="center">ใช้จริง</th>
                                                        <th width="148" align="center">ผลต่าง</th>
                                                    </tr>
                              
                                                    <tr>
                                                        <td><strong>รายได้</strong></td>
                                                        <!--ประมาณการ-->
                                                        <td><?php echo  number_format($revenueInt); ?></td>
                                                        <!--ใช้จริง-->
                                                        <td><?php echo  number_format($sumAlPayement); ?></td>
                                                        <!--ผลต่าง-->
                                                        <td><?php $difRevenue = $revenueInt - $sumAlPayement; echo number_format($difRevenue);?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>ค่าแรง</strong></td>
                                                       <!--ประมาณการ-->
                                                      <?php  //ค่าแรงตั้งต้น * ชัั่วโมงการทำงานตั้งต้น
                                                           //$wageInt =  $resultSelSumCoastWork['coastWorkBath'] * $resultSelSumCoastWork['coastWorkHour'];
                                                           
                                                           $wageInt = $sumCoastWorkHourAll* $sumCoastWorkBathAll ;
                                                      
                                                      ?>
                                                       <td><?php echo number_format($wageInt);?></td>
                                                        <!--ใช้จริง-->
                                                     <?php
                                                        //รวมเวลาใช้จริง * ค่าแรงในคอสเวิร์ค
                                                        $sumAllTimeDrUnitMinuteToHour = convMinToHourHour($sumAllTimeDrUnitMinute); //เวลาทั้งหมดใช่จริงชั่วโมง
                                                        $wageUse = $sumAllTimeDrUnitMinuteToHour * $sumCoastWorkBathAll;
                                                     ?>
                                                        <td><?php echo number_format($wageUse);?></td>
                                                        <!--ผลต่าง-->
                                                        <td><?php $difWage = $wageInt - $wageUse;echo number_format($difWage);?></td>
                                                    </tr>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>ค่าใช้จ่ายสำนักงาน</strong></td>
                                                        <!--ประมาณการ-->
                                                   <?php 
                                                       //ค่าใช้จ่ายสำนักงานตั้งต้น * ชัั่วโมงการทำงานตั้งต้น
                                                        $officeChargeInt =  $chargeInt   *  $resultSelSumCoastWork['coastWorkHour'];
                                                   ?>
                                                        <td><?php echo number_format($officeChargeInt);?></td>
                                                        <!--ใช้จริง-->
                                                    <?php
                                                        //ค่าใช้จ่ายสำนักงานตั้งต้น * ชัั่วโมงการทำงานจริง
                                                        $officeChargeUse =   $chargeInt * $sumAllTimeDrUnitMinuteToHour;
                                                    ?>
                                                        
                                                        <td><?php echo number_format($officeChargeUse);?></td>
                                                        <!--ผลต่าง-->
                                                        <td><?php $difOfficeCharge = $officeChargeInt - $officeChargeUse;echo number_format($difOfficeCharge);?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>กำไรขาดทุน</strong></td>
                                                        <!--ประมาณการ-->
                                                      <?php
                                                        //รายได้ - (ค่าแรง + ค่าใช้จ่ายสำนักงาน)
                                                      $proFitInt =   $revenueInt - ($wageInt + $officeChargeInt);
                                                      ?>
                                                        <td><?php echo number_format($proFitInt);?></td>
                                                        <!--ใช้จริง-->
                                                      <?php
                                                         $proFitUse = $sumAlPayement - ($wageUse + $officeChargeUse);
                                                      ?>
                                                        <td><?php echo number_format($proFitUse);?></td>
                                                        <!--ผลต่าง-->
                                                        <td><?php $difProfit = $proFitInt - $proFitUse; echo number_format($difProfit); ?></td>
                                                    </tr>
                                                </table>

                                                <!--.TABLE-->
                                            </div><!--.table-responsive-->
                                            <!--.BODY-->
                                        </div>
                                    </div>
                                </div>
                            </div><!--.รายงานกำไนขาดทุน-->
                            
                            
<!--รายงานผลการทำงาน-->
<?php if($selWorkReport != ""){
    
    

?>
                            <div class="row"> 
                                <div class="col-lg-12">
                                    <div class="panel panel-red">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><span class="fa fa-bar-chart-o"></span> &nbsp;&nbsp; รายงานผลการทำงาน</h3>
                                        </div>
                                        <div class="panel-body">
                                            <!--BODY-->
                                            <div class="table-responsive"><!--table-responsive-->
                                                <!--TABLE-->
                                                <table width="1115" class="table table-striped table-hover-color">
                                                    <tr>
                                                        <td width="184" rowspan="2" align="center" valign="middle"><strong>ชื่อ-สกุล</strong></td>
                                                        <td width="100" rowspan="2" align="center" valign="middle"><strong>ตำแหน่ง</strong></td>
                                                        <td colspan="2" align="center" valign="middle"><strong>ชั่วโมง</strong></td>
                                                        <td width="113" rowspan="2" align="center" valign="middle"><strong>ผลต่าง(ชั่วโมง)</strong></td>
                                                        <td width="65" rowspan="2" align="center" valign="middle"><strong>record</strong></td>
                                                        <td colspan="3" align="center" valign="middle"><strong>ค่าแรง</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="140" align="center" valign="middle"><strong>ประมาณการ</strong></td>
                                                        <td width="140" align="center" valign="middle"><strong>ใช้ไป</strong></td>
                                                        <td width="105" align="center" valign="middle"><strong>ประมาณการ</strong></td>
                                                        <td width="105" align="center" valign="middle"><strong>ใช้จริง</strong></td>
                                                        <td width="105" align="center" valign="middle"><strong>ผลต่าง</strong></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                </table>

                                                <!--.TABLE-->
                                            </div><!--.table-responsive-->
                                            <!--.BODY-->
                                        </div>
                                    </div>
                                </div>
                            </div><!--.รายงานผลการทำงาน-->
<?php } ?>
                        </div>
                    </div>
                    <!--BEGIN FOOTER-->
                    <?php include_once('../sc_browse_data/inc/footer.php'); ?>
                    <!--END FOOTER-->
                </div>
            </div>
        </div>
        <script src="../script/jquery-1.10.2.min.js"></script>
        <script src="../script/jquery-migrate-1.2.1.min.js"></script>
        <script src="../script/jquery-ui.js"></script>
        <!--loading bootstrap js-->
        <script src="../script/bootstrap.min.js"></script>
        <script src="../script/bootstrap-hover-dropdown.js"></script>
        <script src="../script/html5shiv.js"></script>
        <script src="../script/respond.min.js"></script>
        <script src="../script/jquery.metisMenu.js"></script>
        <script src="../script/jquery.slimscroll.js"></script>
        <script src="../script/jquery.cookie.js"></script>
        <script src="../script/icheck.min.js"></script>
        <script src="../script/custom.min.js"></script>
        <script src="../script/jquery.news-ticker.js"></script>
        <script src="../script/jquery.menu.js"></script>
        <script src="../script/pace.min.js"></script>
        <script src="../script/holder.js"></script>
        <script src="../script/responsive-tabs.js"></script>
        <!--LOADING SCRIPTS FOR PAGE--><!--CORE JAVASCRIPT-->
        <script src="../script/main.js"></script>
        <script>(function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-145464-12', 'auto');
            ga('send', 'pageview');


        </script>
    </body>
</html>
