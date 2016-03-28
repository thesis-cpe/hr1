<?php
/*CONNECT*/
@session_start(); 
include_once('../inc/config.php');
include_once('../inc/connect.php');

/*POST VAR*/
@$txtName = $_POST['txtName'];//ชื่อพนักงาน
@$selStatus = $_POST['selStatus'];//สถานะโครงการ
@$selYear = $_POST['selYear'];//ปี
/*เงื่อนไข SQL*/
$sql = "SELECT * FROM coast_work";
//if($txtName != NULL)
//{ 
	list($firstName, $lastName) = explode(' ', $txtName);
	$sqlSelEmWorkId = "SELECT employee_name, employee_lname, employee_worker_id FROM employee WHERE employee_name LIKE '%$firstName' AND employee_lname LIKE '%$lastName'";
	$querySelEmWorkId = $conn->query($sqlSelEmWorkId); 
	$resultEmployee = $querySelEmWorkId->fetch_assoc(); //นำค่ำออกมาจากTB EMPLOYEE
  	$emWorkId = $resultEmployee['employee_worker_id'];
  	$selCustomer_gen = "SELECT * FROM `coast_work` WHERE `fk_employee_worker_id` = '$emWorkId'";
  	$queryCustomer_gen = $conn->query($selCustomer_gen); 
  	$customer_gen = $queryCustomer_gen->fetch_array();
//}/*.if($txtName != NULL)*/ 	
?>
<!DOCTYPE html>
<html lang="en">
<head><title>ข้อมูลรายงานส่วนบุคคล</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="../styles/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="../styles/font-awesome-4.1.0/css/font-awesome.min.css" >
    <link type="text/css" rel="stylesheet" href="../styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="../styles/bootstrap.min.css">

    <script type="text/javascript" src="../script/jquery.min.js"></script>
    <script type="text/javascript" src="../script/arrow79.js"></script>
</head>
<body>
<!--TABLE-->
	<table width="100%" border="1">
		<tr>
			<th width="180" rowspan="2"><center>รหัสนิติบุคคล</center></th>
			<th width="400" rowspan="2"><center>ชื่อบริษัท</center></th>
			<th width="188" rowspan="2"><center>ตำแหน่ง</center></th>
			<th width="188" rowspan="2"><center>ค่าจ้างทำบัญชี (บาท)</center></th>
			<th colspan="3"><center>ชั่วโมงการทำงาน</center></th>
			<th width="188" rowspan="2"><center>Record</center></th>
			<th width="188" rowspan="2"><center>สถานะ</center></th>
		</tr>

		<tr>
			<th width="188"><center>ตั้งต้น(Hr)</center></th>
			<th width="188"><center>ใช้ไป(Hr)</center></th>
			<th width="188"><center>เหลือ(Hr)</center></th>
		</tr>

		<?php 
			while ($customer_gen = $queryCustomer_gen->fetch_array()) 
			{ 
				$customerTaxId = $customer_gen['fk_customer_tax_id'];
		?> 
		<tr>
			<td><?php echo $customer_gen_id = $customer_gen['fk_n_customer_id'];?></td>
			<td>
		<?php  
			$selCompanyName = "SELECT * FROM customer WHERE customer_tax_id = '$customerTaxId'";
			$queryCompanyName = $conn->query($selCompanyName); 

			while ($company = $queryCompanyName->fetch_array()) 
			{ 
				echo $company['customer_company']; 
			}
		?>
			</td>
		<?php
			$sqlCoastWork = "SELECT DISTINCT coast_work_role FROM coast_work WHERE fk_employee_worker_id = '$emWorkId' AND fk_n_customer_id = '$customer_gen_id'";
			$queryCoastWork = $conn->query($sqlCoastWork);

			while ($coasWork = $queryCoastWork->fetch_array()) 
			{
		?>
			<td align="center">
		<?php 
				if($coasWork['coast_work_role'] == 0)
				{
					echo "ผู้ทำบัญชี";
				}
				elseif ($coasWork['coast_work_role'] == 1) 
				{
					echo "ผู้ปฎิบัติงาน";
				} 
			} //.$coasWork 
		?>
			</td>

			<td align="center">
		<?php 
			$sqlCoastWork2 = "SELECT SUM(coast_work_bath) AS sumBath,SUM(coast_work_hour) AS sumHour FROM coast_work WHERE fk_employee_worker_id = '$emWorkId' AND fk_n_customer_id = '$customer_gen_id'"; 
			$queryCoastWork2 = $conn->query($sqlCoastWork2);
			
			while ($coasWork2 = $queryCoastWork2->fetch_array()) 
			{
				echo $coasWork2['sumBath'];

		?>
			</td>
			<td align="center">
		<?php 
			echo $sumHour = $coasWork2['sumHour'];
			}//.$coasWork2	
		?>
			</td>
			<td align="center">
		<?php
			/*เวลาที่ใช้ไปจากบันทึกประจำวัน*/
			$spendTime = "SELECT SUM(dr_time_hour) AS drSumHour, SUM(dr_time_minute) AS drSumMinute,SUM(dr_record) AS sumRec FROM daily_record WHERE dr_em_id = '$emWorkId' AND fk_n_customer_id = '$customer_gen_id'";
			$querySpendTime = $conn->query($spendTime);
			
			while($arrSpendTime = $querySpendTime->fetch_array())
			{
				$drTimeHour = $arrSpendTime['drSumHour'];
				$drTimeMinute = $arrSpendTime['drSumMinute'];
				$sumRecord = $arrSpendTime['sumRec'];
			}

			if($drTimeMinute>59)
			{
				$drTimeMinute = $drTimeMinute/60;
				$drTimeHour  = intval($drTimeMinute) + $drTimeHour;
				$drTimeMinute = 0.60 - fmod($drTimeMinute,1);
			}
			/*else
			{
			echo $drTimeHour.".".$drTimeMinute;
			} */

			//echo $drTimeHour.".".$drTimeMinute;
			//echo $drTimeMinute;
				$sumDailyTimeUse =  intval($drTimeHour)+$drTimeMinute;
				echo $sumDailyTimeUseFormat = number_format($sumDailyTimeUse , 2, '.', '');


		?>
			</td>
			<td align="center"><?php  /*$difTimeUse = ($sumHour - $drTimeHour)*60 - $drTimeMinute; 
				echo $sumTimeLimit = $difTimeUse/60; */ 
				$difTimeUse =  ($sumHour - $sumDailyTimeUseFormat); 
			if($difTimeUse<1 &&$difTimeUse >0)
			{
				$difTimeUse = $difTimeUse - 0.60;  //ติดตรงนี้ยังไม่สมบูรณ์
			}
				echo $difTimeUse; 
		?>
			</td>
			<td align="center"><?php echo $sumRecord; ?></td>
			<td align="center">
		<?php 
			$sqlChcekCustomer = "SELECT * FROM customer_gen WHERE n_customer_id = '$customer_gen_id'";
			$qryChcekCustomer = $conn->query($sqlChcekCustomer);
			
			while ($arrChcekCustomer = $qryChcekCustomer->fetch_array()) 
			{
				$statusCustomer =  $arrChcekCustomer['check_close'];
			}

			if($statusCustomer == 0)
			{
				echo "ดำเนินงาน";
			}
			elseif($statusCustomer == 1)
			{
				echo "ปิดโครงการ";
			}
		?>
			</td>
		</tr>

		<?php 

		}//.$customer_gen
		?> 
	</table><br><br>
<!--.TABLE-->					

<!--TABLE-->
	<table width="100%" border="1">
		<?php //ดูรายได้ประมาณการ
			$sqlProfit = "SELECT SUM(customer_gen_revenue) AS revenue, SUM(customer_gen_charge) AS charge FROM coast_work JOIN customer_gen ON customer_gen.n_customer_id = coast_work.fk_n_customer_id  WHERE fk_employee_worker_id = '$emWorkId' AND customer_gen.n_customer_id ='$customer_gen_id'";
			$qryProfit = $conn->query($sqlProfit);
			while ($arrProfit = $qryProfit->fetch_array()) {
				$companyRevenue = $arrProfit['revenue'];
				$companyCharge = $arrProfit['charge'];
			}

			//ใช้จริง
			$sqlSelCosts = "SELECT SUM(coast_work_hour) AS sumCoastHr,SUM(coast_work_bath) AS sumCoastBath FROM coast_work WHERE fk_employee_worker_id = '$emWorkId'";
			$qrySelCosts  = $conn->query($sqlSelCosts);
			while ($arrSelCosts = $qrySelCosts->fetch_array()) {
				$sumCoastHr = $arrSelCosts['sumCoastHr'];
				$sumCoastBath = $arrSelCosts['sumCoastBath'];

			}
		?>
		  <tr>
			<th width="107">&nbsp;</th>
			<th width="139" align="center">ประมาณการ</th>
			<th width="207" align="center">ใช้จริง</th>
			<th width="148" align="center">ผลต่าง</th>
		  </tr>
		  <tr>
			<td><strong>รายได้</strong></td>
			<td><?php echo $companyRevenue; //รายได้ประมาณการ  ?></td> 
			<td><?php echo $companyRevenue; ; //รายได้ใช้จริง ที่จิงต้องเอาของบอร์สมาซัม  ?></td>
			<td><?php echo $difAsset = $companyRevenue - $companyRevenue;// ผลต่าง?></td>
		  </tr>
		  <tr>
			<td rowspan="2"><strong>ค่าใช้จ่าย</strong></td>
			<td>ค่าแรง = <?php /* ค่าแรงประมาณการ */
			$sumSelHWFromEmHr = 0;
			$sumSelHWFromEmBath = 0;

				$sqlSelCustomerFromEmID = "SELECT * FROM coast_work WHERE fk_employee_worker_id = '$emWorkId' GROUP BY (fk_n_customer_id)";
				$qrySelCustomerFromEmID = $conn->query($sqlSelCustomerFromEmID);
				while($arrSelCustomerFromEmID = $qrySelCustomerFromEmID->fetch_array())
				{
					$CustomerIdFromSelEm =  $arrSelCustomerFromEmID['fk_n_customer_id'];
					/*เลือก เวลาที่มีรหัสบรืษัทไม่ซ้ำกัน*/
					$sqlSelHWFromEm = "SELECT * FROM coast_work WHERE fk_employee_worker_id = '$emWorkId' AND fk_n_customer_id = '$CustomerIdFromSelEm' GROUP BY(fk_n_customer_id)";
					$qrySelHWFromEm = $conn->query($sqlSelHWFromEm);
					while ($arrSelHWFromEm = $qrySelHWFromEm->fetch_array()) {
						
						$sumSelHWFromEmHr = $sumSelHWFromEmHr + $arrSelHWFromEm['coast_work_hour']; // ค่าชมตั้งต้น
						$sumSelHWFromEmBath = $sumSelHWFromEmBath + $arrSelHWFromEm['coast_work_bath']; //ค่าใช้ต่ายตั้งต้น
					}

				}
				echo  $sumIntEmHrBt = $sumSelHWFromEmHr * $sumSelHWFromEmBath;//ค่าแรงตั้งต้น
				



			?>


			</td>
			<td><?php 
				$sqlWageUse = "SELECT SUM(coast_work_bath) AS sumWorkHour,SUM(coast_work_hour) AS sumWorkBath FROM coast_work WHERE fk_employee_worker_id = '$emWorkId'";
				//echo $sqlWageUse;
				$qryWageWageUse = $conn->query($sqlWageUse);
				while ($arrWageWageUse = $qryWageWageUse->fetch_array()) {
					$coastWorkBathUse = $arrWageWageUse['sumWorkBath'];
					$coastWorkHourUse = $arrWageWageUse['sumWorkHour'];

				}
				echo $sumWageUse = $coastWorkBathUse*$coastWorkHourUse; //ค่าแรงใช้จริง 
			?></td>
			<td><?php  echo  $sumIntEmHrBt - $sumWageUse //ผลต่างค่าแรง ;?></td>
		  </tr>
		  <tr>
			<td>ค่าใช้จ่ายสำนักงาน = <?php 
				echo $sumChargeIntial = $companyCharge * $sumSelHWFromEmHr; //ค่าใช้จ่ายสำนักงานตั้งต้น
			?></td>
			<td><?php echo $sumCharge = $companyCharge * $sumCoastHr //ค่าใช้จ่ายสำนักงานใช้จริง  ?></td>
			<td><?php echo $difAsset2 = $sumChargeIntial - $sumCharge;  ?></td>
		  </tr>
		  <tr>
			<td><strong>กำไรขาดทุน</strong></td>
			<td><?php echo $sumAssetInt = $companyRevenue - ($sumIntEmHrBt + $sumChargeIntial);    ?> </td>
			<td><?php echo $sumAssetUse = $companyRevenue - ($sumCharge + $sumWageUse); ?></td>
			<td><?php echo $difSumall = $sumAssetInt - $sumAssetUse; ?></td>
		  </tr>
	</table><br><br>
<!--.TABLE-->

<!--TABLE-->
	<table width="100%" border="1">
		  <tr>
			<td width="184" rowspan="2" align="center" valign="middle"><strong>ชื่อ-นามสกุล</strong></td>
			<td width="100" rowspan="2" align="center" valign="middle"><strong>ตำแหน่ง</strong></td>
			<td colspan="2" align="center" valign="middle"><strong>ชั่วโมงการทำงาน (ชั่วโมง)</strong></td>
			<td width="113" rowspan="2" align="center" valign="middle"><strong>ผลต่าง(ชั่วโมง)</strong></td>
			<td width="65" rowspan="2" align="center" valign="middle"><strong>Record</strong></td>
			<td colspan="3" align="center" valign="middle"><strong>ค่าแรง (บาท)</strong></td>
		  </tr>
		  <tr>
			<td width="140" align="center" valign="middle"><strong>ประมาณการ</strong></td>
			<td width="140" align="center" valign="middle"><strong>ใช้ไป</strong></td>
			<td width="105" align="center" valign="middle"><strong>ประมาณการ</strong></td>
			<td width="105" align="center" valign="middle"><strong>ใช้จริง</strong></td>
			<td width="105" align="center" valign="middle"><strong>ผลต่าง</strong></td>
		  </tr>
		  <?php /*ดูชั่วโมงการทำงานประมาณการจาก coastwork ทุกโครงการที่รับผิดชอบ*/
		  $sqlSelAllProject = "SELECT SUM(coast_work_hour) AS sumHourAllproject,SUM(coast_work_bath) AS coastWorkBathEmUse FROM coast_work WHERE `fk_employee_worker_id` = '$emWorkId'";
		  $qrySelAllProject = $conn->query($sqlSelAllProject);
		  while($arrSelAllProject = $qrySelAllProject->fetch_array())
		  {
		  	$hourAllProject = $arrSelAllProject['sumHourAllproject'];
		  	$coastWorkBathEmUse = $arrSelAllProject['coastWorkBathEmUse'];
		  }
		  /*ดูชั่วโมงที่ใช้ไปจากบันทึกประจำัน*/
		  $sqlSelDayRecAll = "SELECT SUM(`dr_time_hour`) AS drTimeHr, SUM(`dr_time_minute`) AS drTimemit, SUM(dr_record) AS sumDrRecord FROM daily_record WHERE dr_em_id = '$emWorkId'";
		  $qrySelDayRecAll = $conn->query($sqlSelDayRecAll);
		  while ($arrSelDayRecAll = $qrySelDayRecAll->fetch_array()) {
		  	$drTimeHr = $arrSelDayRecAll['drTimeHr'];
		  	$drTimemit = $arrSelDayRecAll['drTimemit'];
		  	$sumDrRecord = $arrSelDayRecAll['sumDrRecord'];
		  }
		  ?>
		  <tr>
			<td><?php echo $resultEmployee['employee_name']; ?>&nbsp;<?php echo $resultEmployee['employee_lname']; ?></td>
			<td>&nbsp;</td>
			<!--ส่วนแสดงเวลา-->
			<td align="center"><?php echo $hourAllProject; ?></td>
			<td align="center"><?php 
				if($drTimemit>59)
				{
					$drTimemit = $drTimemit/60;
					$drTimeHr = intval($drTimemit)+$drTimeHr;
					$drTimemit = fmod($drTimemit,1)-0.60;
				}

				$sumDrTimeUse = intval($drTimeHr)+$drTimemit;
				echo $sumDrTimeUseFormat = number_format($sumDrTimeUse, 2, '.', '');
			 ?></td>
			<td align="center"><?php echo $difDrtimeAll = $hourAllProject - $sumDrTimeUseFormat; ?></td>
			<td align="center"><?php echo $sumDrRecord; ?></td>
			<td align="center"><?php $sqlSelIntitialCoastWorkUseAll = "SELECT min(coast_work_id),coast_work_bath FROM coast_work WHERE fk_employee_worker_id = '$emWorkId'";
			$qrySelIntitialCoastWorkUseAll = $conn->query($sqlSelIntitialCoastWorkUseAll);
			$resultSelIntitialCoastWorkUseAll = $qrySelIntitialCoastWorkUseAll->fetch_assoc();
			echo $resultSelIntitialCoastWorkUseAll['coast_work_bath'];
			?></td>
			<td align="center" ><?php echo $coastWorkBathEmUse; ?></td>
			<td align="center"><?php echo $difCoastWorkUse =  $resultSelIntitialCoastWorkUseAll['coast_work_bath'] - $coastWorkBathEmUse;?></td>
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
	</table><br><br>
<!--.TABLE-->

<!--loading bootstrap js-->
<script src="../script/bootstrap.min.js"></script>

</body>
</html>
