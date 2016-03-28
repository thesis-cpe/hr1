<?php
/*CONNECT*/
@session_start(); 
include_once('../inc/config.php');
include_once('../inc/connect.php');
/*POST VAR*/
$txtName = $_POST['txtName']; //รหัสนิติบุคคล
@$txtCus = $_POST['$txtCus'];
/*FUNCT SEACH*/
/*เรียกดูชื่อบริษัท*/
			if($txtCus == "") /*กรณีกรอกรหัสงาน*/

				{
							$sqlSelCusName ="SELECT * FROM `customer_gen` JOIN customer ON customer_gen.fk_customer_tax_id = customer.customer_tax_id WHERE n_customer_id = '$txtName'";

							$querySelCusName = $conn->query($sqlSelCusName);
							$resultSelCusName = $querySelCusName->fetch_array();
							$customerName =  $resultSelCusName['customer_company'];
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
														<th width="188" rowspan="2"><center>รหัสนิติบุคคล</center></th>
														<th width="188" rowspan="2"><center>ชื่อบริษัท</center></th>
														<th width="188" rowspan="2"><center>ตำแหน่ง</center></th>
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
													  <tr>
													  	<!--รหัสนิติบุคลล-->
														<td align="center"><?php echo $txtName;?></td>
														<!--ชื่อบริษัท-->
														<td align="center">
															<?php
															
															echo $customerName; //ชื่อบรืษัท

															?>

														</td>
														<td align="center"><?php echo  $resultSelCusName['customer_status'];  ?></td>
														<td align="center"><?php echo $resultSelCusName['customer_gen_revenue'];?></td>
														<!--ชั่วโมงการทำงานตั้งต้นและเงินบาท-->
														<?php 
														$sumSelHrBathIntHr = 0 ;
														$sumSelHrBathIntBath = 0 ;
															$sqlSelHrBathInt = "SELECT * FROM `coast_work` WHERE fk_n_customer_id = '$txtName' GROUP BY (fk_employee_worker_id)";
															$querySelHrBathInt = $conn->query($sqlSelHrBathInt);
															while ($arrSelHrBathInt = $querySelHrBathInt->fetch_array()) {
																/*ชั่วโมงตั้งต้น*/
																$sumSelHrBathIntHr = $sumSelHrBathIntHr + $arrSelHrBathInt['coast_work_hour'];
																/*รายได้ตั้งต้น*/
																$sumSelHrBathIntBath = $sumSelHrBathIntBath + $arrSelHrBathInt['coast_work_bath'];
															}
														?>
														<!--ชั่วโมงตั้งต้น-->
														<td align="center"><?php echo $sumSelHrBathIntHr;  ?> </td>
														<!--ชั่วโมงตใช้ไป-->
														<?php
															$sqlSelHrUse = "SELECT SUM(coast_work_hour) AS sum_coast_work_hour, SUM(coast_work_bath) AS sum_coast_work_bath FROM `coast_work` WHERE fk_n_customer_id = '$txtName'";
															$querySelHrUse = $conn->query($sqlSelHrUse);
															$resultSelHrUse = $querySelHrUse->fetch_array();

														?>
														<td align="center"><?php echo $resultSelHrUse['sum_coast_work_hour'];  ?></td>
														<!--คงเหลือชั่วโมง-->
														<td align="center"><?php echo $sumSelHrUse = $sumSelHrBathIntHr - $resultSelHrUse['sum_coast_work_hour'];?></td>
														

														<!--จำนวน record-->
														<?php 
														 $selSumRecord = "SELECT SUM(dr_record) AS sum_dr_record FROM daily_record WHERE fk_n_customer_id = '$txtName'";
														 $querySumRecord = $conn->query($selSumRecord);
														 $resultSumRecord = $querySumRecord->fetch_array();
														?>
														<td align="center"><?php echo $resultSumRecord['sum_dr_record'];  ?></td>

														
														<!--จำนวน สถานะ-->
														<td><?php 
															if($resultSelCusName['check_close'] == 0)
															{
															 echo "ดำเนินโครงการ";
															}
															elseif ($resultSelCusName['check_close'] == 1)
															{
																echo "ปิดโครงการ";
															}
														?></td>
													  </tr>
												</table>
												
											<!--.TABLE-->
										</div><!--.table-responsive-->
									<!--.BODY-->
								</div>
                            </div>
                        </div>
                    </div><!--.ข้อมูลทั่วไป-->
					
					
					<div class="row"> <!--รายงานกำไนขาดทุน-->
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
														<!--รายได้ประมาณการ และค่าใช้จ่ายสำนักงานประมาณการ-->
														<?php $sqlSelRevenue = "SELECT * FROM `customer_gen` WHERE n_customer_id = '$txtName'"; 
														$querySelRevenue = $conn->query($sqlSelRevenue);
														$resultSumSelRevenue = $querySelRevenue ->fetch_array();

														?>
														<!--แสเดงรายได้ประมาณการ-->
														<td><?php echo $resultSumSelRevenue['customer_gen_revenue'];  ?></td>
														<!--รายได้ใช้จริง-->
														<?php
															$sqlSelPaymentSum = "SELECT SUM(payment_coast) AS sum_payment_coast FROM `payment` WHERE fk_n_customer ='$txtName'";
															$querySelPaymentSum = $conn->query($sqlSelPaymentSum);
															$resultSelPaymentSum = $querySelPaymentSum->fetch_array();
														?>
														<!--แสดงรายได้ใช้จริง-->
														<td><?php echo  $paymentSum = intval($resultSelPaymentSum['sum_payment_coast']); ?></td>
														<!--แสดงรายได้ใช้จริง - ค่าเริ่มต้น-->
														<td><?php echo $paymentSumAll =  $resultSumSelRevenue['customer_gen_revenue']- $paymentSum; ?></td>
													  </tr>
													  <tr>
														<td rowspan="2"><strong>ค่าใช้จ่าย</strong></td>
														
														<!--ค่าแรงประมานการ-->
														<td>ค่าแรง = 
															<?php
															 echo $sumHRandBathint = $sumSelHrBathIntHr * $sumSelHrBathIntBath; ?>
														</td>
														<!--ค่าแรงใช้จริง-->
														<?php
															$sqlSelDrSumHrAndBath = "SELECT SUM(dr_time_hour) AS sum_hour,SUM(dr_time_minute) AS sum_minute FROM `daily_record` WHERE fk_n_customer_id = '$txtName'";
															$querySelDrSumHrAndBath = $conn->query($sqlSelDrSumHrAndBath);
															$resultSelDrSumHrAndBath = $querySelDrSumHrAndBath->fetch_array();
															
															 /*หาเศษนาที*/

															 if($resultSelDrSumHrAndBath['sum_minute'] >59)
															 {
															 	$calMinute =  fmod($resultSelDrSumHrAndBath['sum_minute'], 60);  //จะได้เศษนาที
															 	$conMinToHr = intval($resultSelDrSumHrAndBath['sum_minute']/60);
															 	$sumTimeHr = $conMinToHr +  $resultSelDrSumHrAndBath['sum_hour']; //รวมเวลาชั่วโมงที่ได้จากการแปลง
															 }

															 $sumSpendTime = $sumTimeHr.".".$calMinute; //เวลาที่ใช้พร้อมนาที
															 $sumWageUse = $sumSpendTime *  $resultSelHrUse['sum_coast_work_bath']; //ค่าแรงที่ใช้จริง
															 ?>
														<!---แสดงค่าแรงที่ใช้จริง -->	 
														<td><?php  echo $sumWageUse;   ?></td>
														<!---ผลต่างค่าแรง-->	
														<td><?php echo $difWage = ($sumHRandBathint- $sumWageUse);?></td>
													  </tr>
													  <tr>
													  	<!--ค่าใช้จ่ายสำนักงานประมาฯการ-->
														<td>ค่าใช้จ่ายสำนักงาน = <?php echo $intChage = $resultSumSelRevenue['customer_gen_charge'] * $sumSelHrBathIntHr;?></td>
														<!--ค่าใช้จ่ายสำนักงานจริง-->
														<td><?php echo $realChard = $resultSumSelRevenue['customer_gen_charge'] * $resultSelHrUse['sum_coast_work_hour'];;?></td>
														<!--ผลต่างค่าใช้จ่ายสำนักงาน-->
														<td><?php echo $difChardUse = $difWage - $realChard;?></td>
													  </tr>
													  <tr>
														<td><strong>กำไรขาดทุน</strong></td>
														<!--กำไรขาดทุนตั้งต้น-->
														<td><?php echo $benefitInt = $resultSumSelRevenue['customer_gen_revenue'] - ($sumHRandBathint+$intChage); ?></td>
														<!--กำไรขาดทุนของจริง-->
														<td><?php echo $benefitUse = $paymentSum - ($sumWageUse+$realChard); ?></td>
														<!--ผลต่างกำไร-->
														<td><?php echo $difBenefit  = $benefitInt - $benefitUse; ?></td>
													  </tr>
													</table>
												
											<!--.TABLE-->
										</div><!--.table-responsive-->
									<!--.BODY-->
								</div>
                            </div>
                        </div>
                    </div><!--.รายงานกำไนขาดทุน-->
					
					<div class="row"> <!--รายงานผลการทำงาน-->
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
													 <!--รายงานผลการทำงาน-->
													 <?php
													 	$sqlSelEmployee = "SELECT * FROM `coast_work` JOIN employee ON coast_work.fk_employee_worker_id = employee.employee_worker_id WHERE coast_work.fk_n_customer_id = '$txtName' GROUP BY(fk_employee_worker_id)";
														$querySelEmployee  = $conn->query($sqlSelEmployee);
														
														 ?>
													<!--แสดงชื่อ นามสกุล-->	 
													<?php foreach($querySelEmployee  as $resultSelEmployee)
													{  

														/*ดึงบทบาทและข้อมูลใน coast_work ค่าตั้งต้น*/
														$employeeIdFromCoast = $resultSelEmployee['fk_employee_worker_id'];
														$sqlSelRoleAndCoast = "SELECT * FROM `coast_work` WHERE fk_employee_worker_id = '$employeeIdFromCoast' AND fk_n_customer_id = '$txtName' GROUP BY (fk_employee_worker_id)";
														$querySelRoleAndCoast = $conn->query($sqlSelRoleAndCoast);
														$resultSelRoleAndCoast = $querySelRoleAndCoast->fetch_array();
													?>
													  <tr>
													  	
														<!--ชื่อ นามสกุล-->
														<td><?php echo $resultSelEmployee['employee_name']."&nbsp;".$resultSelEmployee['employee_lname']; ?></td>
														<!--แสดงสถานะ ผู้ทำบัญชี-->
														<td><?php 
														if($resultSelRoleAndCoast['coast_work_role'] == 0)
														{
															echo "ผู้ทำบัญชี";
														}
														elseif($resultSelRoleAndCoast['coast_work_role'] == 1)
														{
															echo "ผู้ปฎิบัติงาน";
														}



														?></td>
														<!--ชั่วตั้งต้นโมงประมาณการ-->
														<?php 
															$sqlSelCoastWandHr = "SELECT * FROM `coast_work` WHERE `fk_n_customer_id` = '$txtName' AND `fk_employee_worker_id` ='$employeeIdFromCoast' GROUP BY (fk_employee_worker_id)";
															$querySelCoastWandHr = $conn->query($sqlSelCoastWandHr);
															$resultSelCoastWandHr = $querySelCoastWandHr->fetch_array();

														?>
														<!--แสดงชั่วตั้งต้นโมงประมาณการ-->
														<td><?php echo $resultSelCoastWandHr['coast_work_hour']; ?></td>
														<?php /*ชั่วโมงงานที่ใช้ไป*/
															$sqlSelCoastWandHUse = "SELECT SUM(dr_time_hour) AS sum_dr_hour, SUM(dr_time_minute) AS sum_dr_min, SUM(dr_record) AS sum_dr_record FROM `daily_record` WHERE `fk_n_customer_id` ='$txtName' AND `dr_em_id` = '$employeeIdFromCoast'";
															$querySelCoastWandHUse = $conn->query($sqlSelCoastWandHUse);
															$resultSelCoastWandHUse = $querySelCoastWandHUse->fetch_array();

															/*คำนวนชั่วโมงที่ใช้ไป*/
															$CoastWandHUseMinToHr = $resultSelCoastWandHUse['sum_dr_min']/60;
															$CoastWandHUseMinToHr = intval($CoastWandHUseMinToHr);
															/*ได้เวลาทั้งหมดรวมกับนาที่ที่ถูกแปลงแล้ว*/
															$coastWandHUseSumHr = $CoastWandHUseMinToHr + $resultSelCoastWandHUse['sum_dr_hour'];
															/*เอาเหลือแต่นาที*/
															$CoastWandHUseContoMin =  fmod($resultSelCoastWandHUse['sum_dr_min'],60);
															/*เวลาที่ใช้แบบเต็มรูปแบบ ชั่วโมงตามด้วยนาที*/
															$coastWandHUseTimeUse = $coastWandHUseSumHr.".".$CoastWandHUseContoMin
														?>
														<!--แสดงชั่วโมงงานที่ใช้ไป-->
														<td><?php echo $coastWandHUseTimeUse; ?></td>
														<!--ผลต่างชั่วโมง-->
														
														<td><?php echo $difTimeUse = $resultSelCoastWandHr['coast_work_hour'] - $coastWandHUseTimeUse;  ?></td>
														<!-- จำนวน record -->
														<td><?php echo $resultSelCoastWandHUse['sum_dr_record'];?> </td>
														<!--ค่าแรงประมาณการ-->
														<td><center><?php echo $sumBathIntial =  $resultSelEmployee['coast_work_hour'] *  $resultSelEmployee['coast_work_bath']; ?></center></td>
														<!--ค่าแรงใช้จริง-->
														<?php
															$drHourUse = 	$resultSelCoastWandHUse['sum_dr_hour'];
															$drHourUseMinuteUse = $resultSelCoastWandHUse['sum_dr_min'];
															$drHourUseMinuteUseContoHr =  intval($resultSelCoastWandHUse['sum_dr_min']/60 );
															$drHourUse = $drHourUse+$drHourUseMinuteUseContoHr;
															$drHourUseMinuteUseMinute =  fmod($drHourUseMinuteUse,60);
															$allDrTimeUse = $drHourUse.".".$drHourUseMinuteUseMinute;
														?>
														<td><center><?php  echo $allDrTimeUse ;  ?></center></td>
														<td><center><?php echo $difKalang =  $sumBathIntial - $allDrTimeUse; ?></center></td>
													  </tr>
													
													<?php   
														} //.foreach แสดงชื่อ นามสกุล   ?>
													</table>
												
											<!--.TABLE-->
										</div><!--.table-responsive-->
									<!--.BODY-->
								</div>
                            </div>
                        </div>
                    </div><!--.รายงานผลการทำงาน-->
                </div>
            </div>
            <!--BEGIN FOOTER-->
            <?php include_once('../sc_browse_data/inc/footer.php');  ?>
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
