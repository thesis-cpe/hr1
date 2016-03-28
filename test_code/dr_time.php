<?php
	include_once("../file_manage/inc/config.php");
    include_once("../file_manage/inc/connect.php");
	
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>.:: bank_page ::.</title>
</head>

<body>
	<?php 
		/*$sqlSelDrRec = "SELECT SUM(dr_time_hour) AS sumHour,SUM(dr_time_minute) AS sumMinute FROM `daily_record`";
		$querySelDrRec = $conn->query($sqlSelDrRec);
		while ($arrSeldrRec = $querySelDrRec->fetch_array())
		{
			$sumHour =  $arrSeldrRec['sumHour'];
			$sumMinute = $arrSeldrRec['sumMinute'];
		}
		echo $sumHour."<br>";
		echo $sumMinute."<br>";
		echo $sumHour*60*/
		$sqld = ("SELECT SUM(dr_time_hour) AS hourd, SUM(dr_time_minute) AS minuted FROM daily_record WHERE dr_em_id='55022778' AND fk_n_customer_id='551234567890'"); 
		$resultd = $conn->query($sqld);
                while($arrSqld = $resultd->fetch_array())
                {
                    $ohourd = $arrSqld['hourd'];
                    $ominuted = $arrSqld['minuted'];
                }
                //$ohourd = $rowd['hourd'];
		//$ominuted = $rowd['minuted'];
		$nhourd = intval($ominuted/60);
		$nminuted = fmod($ominuted,60);
		$thourd = $ohourd+$nhourd;
		$tminuted = $nminuted;
		$aminuted = $thourd*60;
	 	$allused = $aminuted+$tminuted;
                $allhour = 200*60;
							//@$per = ($alluse/$allhour)*100;
		$dif = $allhour-$allused;
                /*แปลงเวลากลับเป็นชั่วโมง*/
		$dhour = intval($dif/60);
		$dminute = fmod($dif,60); 										
						
		echo intval($thourd); ?>&nbsp;ชั่วโมง&nbsp;<?php echo $tminuted; ?>&nbsp;นาที</td>
		<td><?php echo intval($dhour); ?>&nbsp;ชั่วโมง&nbsp;<?php echo $dminute; ?>&nbsp;นาที</td>
		
	
</body>
</html>