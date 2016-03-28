<?php
	@session_start();
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
include_once('inc/config.php');
include_once('inc/connect.php');
$cusnew = $_GET['cusnew'];
//echo $_SESSION['login'];

$sql=("SELECT condition_name,condition_check FROM conditions WHERE n_customer_id = '".$cusnew."'");
$sqli=("SELECT customer.customer_company AS name FROM customer_gen LEFT OUTER JOIN customer ON customer_gen.fk_customer_tax_id=customer.customer_tax_id WHERE customer_gen.n_customer_id = '".$cusnew."'");
$resulti = $conn->query($sqli);
$rowi = $resulti->fetch_assoc();

$sqlz = ("SELECT SUM(dr_time_hour) AS hour, SUM(dr_time_minute) AS minute 
		FROM daily_record WHERE fk_n_customer_id='$cusnew' AND dr_em_id=$_SESSION[login]");
	$resultz = $conn->query($sqlz);
	@$rowz = $resultz->fetch_array();
	//print_r($rowz);
	$ohour = $rowz['hour'];
	$ominute = $rowz['minute'];
	$nhour = intval($ominute/60);
	$nminute = fmod($ominute,60);
	//$remainTime_minute = fmod($sumTimeCon,60);
	$thour = $ohour+$nhour;
	$tminute = $nminute;
	$aminute = $thour*60;
	$alluse = $aminute+$tminute;

	$sqlq = ("SELECT coast_work_hour FROM coast_work WHERE fk_n_customer_id='$cusnew' AND fk_employee_worker_id='$_SESSION[login]'");
	$resultq = $conn->query($sqlq);
	$rowq = $resultq->fetch_assoc();
	$allhour = $rowq['coast_work_hour']*60;
	@$per = ($alluse/$allhour)*100;
	//@number_format($per, 2, '.', '');
	$dif = $allhour-$alluse;
	$dhour = intval($dif/60);
	$dminute = fmod($dif,60);
	//$remainTime_minute = fmod($sumTimeCon,60);
?>
<br>
<label><span style="color:red">เหลือชั่วโมงทำงาน : <b><?php echo $dhour; ?></b>&nbsp;ชั่วโมง&nbsp;<b><?php echo $dminute; ?></b>&nbsp;นาที</span></label><br>
<label><b><span style="color:blue">บริษัท : <?php echo $rowi["name"]; ?></span></b></label>

<select name="txtDetail" class="form-control input-sm" required>
	<option value="">เลือกเงื่อนไขการทำบัญชี</option>
    <?php
foreach ($conn->query($sql) as $row) { ?>
    <option value="<?php echo $row['condition_name']; ?>"><?php echo $row['condition_name']; ?></option>
<?php
}
?> </select>
<input type="hidden" name="txtDetail"/>

<?php
$conn->close();
?>
</body>
</html>