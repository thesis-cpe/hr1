<?php
/* CONNECT */
@session_start();
include_once('../inc/config.php');
include_once('../inc/connect.php');

/* POST VAR */
@$txtName = $_POST['txtName']; //ชื่อพนักงาน
@$selStatus = $_POST['selStatus']; //สถานะโครงการ
@$selYear = $_POST['selYear']; //ปี
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

/* .Function */
/* เงื่อนไข SQL */
$sql = "SELECT * FROM coast_work";
if ($txtName != NULL) {

    list($firstName, $lastName) = explode(' ', $txtName);
    $sqlSelEmWorkId = "SELECT employee_name, employee_lname, employee_worker_id FROM employee WHERE employee_name LIKE '%$firstName' AND employee_lname LIKE '%$lastName'";
    $querySelEmWorkId = $conn->query($sqlSelEmWorkId);
    $resultEmployee = $querySelEmWorkId->fetch_assoc(); //นำค่ำออกมาจากTB EMPLOYEE
    $emWorkId = $resultEmployee['employee_worker_id'];
    $selCustomer_gen = "SELECT * FROM `coast_work` WHERE `fk_employee_worker_id` = '$emWorkId'";

    /* เชคค่า $selStatus เพื่อดูสถานะโปรเจค */
    if ($selStatus != "" && $selYear == "") {
        $selCustomer_gen = "SELECT * FROM `coast_work` JOIN customer_gen ON coast_work.fk_n_customer_id = customer_gen.n_customer_id WHERE `fk_employee_worker_id` = '$emWorkId' AND check_close = '$selStatus' GROUP BY(fk_n_customer_id)";
        /* รายได้ประมาณการ */
        $selCustomer_gen_sum = "SELECT SUM(customer_gen_revenue) AS revenue, SUM(customer_gen_charge) AS charge  FROM `coast_work` JOIN customer_gen ON coast_work.fk_n_customer_id = customer_gen.n_customer_id WHERE `fk_employee_worker_id` = '$emWorkId' AND check_close = '$selStatus'";
        /* ค่าแรงประมาณการ */
        $selCustomer_gen_int_wage = "SELECT SUM(coast_work_hour) AS coast_hour, SUM(coast_work_bath) AS coast_bath FROM `coast_work` JOIN customer_gen ON coast_work.fk_n_customer_id = customer_gen.n_customer_id WHERE `fk_employee_worker_id` = '$emWorkId' AND check_close = '$selStatus' GROUP BY(fk_n_customer_id)";
        /* รายได้จริง */
        $selCustomer_gen_coast_real = "SELECT payment.payment_coast FROM `coast_work` JOIN customer_gen ON coast_work.fk_n_customer_id = customer_gen.n_customer_id JOIN payment ON payment.fk_n_customer = customer_gen.n_customer_id WHERE `fk_employee_worker_id` = '$emWorkId' AND check_close = '$selStatus' GROUP BY(payment.payment_id)";
        /* ชั่วโมงใช้จริงจาก dr_rec */
        $sqlselDrTImeReal = "SELECT SUM(dr_time_hour) AS dr_hour, SUM(dr_time_minute) AS dr_minute FROM `daily_record`JOIN customer_gen ON daily_record.fk_n_customer_id = customer_gen.n_customer_id WHERE `dr_em_id` = '$emWorkId' AND check_close = '$selStatus'";
        /* เอาไปหาค่า rate ช่วง คูณค่าเวลาที่ถูกต้อง */
        $selCustomer_gen_asc = "SELECT * FROM `coast_work` JOIN customer_gen ON coast_work.fk_n_customer_id = customer_gen.n_customer_id WHERE `fk_employee_worker_id` = '$emWorkId' AND check_close = '$selStatus' ORDER BY `coast_work`.`fk_n_customer_id` ASC";
    }




    if ($selStatus != "" && $selYear != "") {
        $selCustomer_gen = "SELECT * FROM `coast_work` JOIN customer_gen ON coast_work.fk_n_customer_id = customer_gen.n_customer_id WHERE `fk_employee_worker_id` = '$emWorkId' AND check_close = '$selStatus' AND customer_gen_year = '$selYear' GROUP BY(fk_n_customer_id)";
        /* รายได้ประมาณการ */
        $selCustomer_gen_sum = "SELECT SUM(customer_gen_revenue) AS revenue, SUM(customer_gen_charge) AS charge FROM `coast_work` JOIN customer_gen ON coast_work.fk_n_customer_id = customer_gen.n_customer_id WHERE `fk_employee_worker_id` = '$emWorkId' AND check_close = '$selStatus' AND customer_gen_year = '$selYear'";
        /* ค่าแรงประมาณการ */
        $selCustomer_gen_int_wage = "SELECT SUM(coast_work_hour) AS coast_hour, SUM(coast_work_bath) AS coast_bath FROM `coast_work` JOIN customer_gen ON coast_work.fk_n_customer_id = customer_gen.n_customer_id WHERE `fk_employee_worker_id` = '$emWorkId' AND check_close = '$selStatus' AND customer_gen_year = '$selYear' GROUP BY(fk_n_customer_id)";
        /* รายได้จริง */
        $selCustomer_gen_coast_real = "SELECT payment.payment_coast FROM `coast_work` JOIN customer_gen ON coast_work.fk_n_customer_id = customer_gen.n_customer_id JOIN payment ON payment.fk_n_customer = customer_gen.n_customer_id WHERE `fk_employee_worker_id` = '$emWorkId' AND check_close = '$selStatus' AND customer_gen_year = '$selYear' GROUP BY(payment.payment_id)";
        /* ชั่วโมงใช้จริงจาก dr_rec */
        $sqlselDrTImeReal = "SELECT SUM(dr_time_hour) AS dr_hour, SUM(dr_time_minute) AS dr_minute FROM `daily_record`JOIN customer_gen ON daily_record.fk_n_customer_id = customer_gen.n_customer_id WHERE `dr_em_id` = '$emWorkId' AND check_close = '$selStatus' AND customer_gen_year = '$selYear'";
        /* เอาไปหาค่า rate ช่วง คูณค่าเวลาที่ถูกต้อง */
        $selCustomer_gen_asc = "SELECT * FROM `coast_work` JOIN customer_gen ON coast_work.fk_n_customer_id = customer_gen.n_customer_id WHERE `fk_employee_worker_id` = '$emWorkId' AND check_close = '$selStatus' AND customer_gen_year = '$selYear' ORDER BY `coast_work`.`fk_n_customer_id` ASC";
    }

    if ($selStatus == "" && $selYear == "") {
        $selCustomer_gen = "SELECT * FROM `coast_work` JOIN customer_gen ON coast_work.fk_n_customer_id = customer_gen.n_customer_id WHERE `fk_employee_worker_id` = '$emWorkId' GROUP BY(fk_n_customer_id)";
        /* รายได้ประมาณการ */
        $selCustomer_gen_sum = "SELECT SUM(customer_gen_revenue) AS revenue, SUM(customer_gen_charge) AS charge FROM `coast_work` JOIN customer_gen ON coast_work.fk_n_customer_id = customer_gen.n_customer_id WHERE `fk_employee_worker_id` = '$emWorkId' GROUP BY(fk_n_customer_id)";
        /* ค่าแรงประมาณการ */
        $selCustomer_gen_int_wage = "SELECT SUM(coast_work_hour) AS coast_hour, SUM(coast_work_bath) AS coast_bath  FROM `coast_work` JOIN customer_gen ON coast_work.fk_n_customer_id = customer_gen.n_customer_id WHERE `fk_employee_worker_id` = '$emWorkId' GROUP BY(fk_n_customer_id)";
        /* รายได้จริง */
        $selCustomer_gen_coast_real = "SELECT payment.payment_coast FROM `coast_work` JOIN customer_gen ON coast_work.fk_n_customer_id = customer_gen.n_customer_id JOIN payment ON payment.fk_n_customer = customer_gen.n_customer_id WHERE `fk_employee_worker_id` = '$emWorkId' GROUP BY(payment.payment_id)";

        /* ชั่วโมงใช้จริงจาก dr_rec */
        $sqlselDrTImeReal = "SELECT SUM(dr_time_hour) AS dr_hour, SUM(dr_time_minute) AS dr_minute FROM `daily_record`JOIN customer_gen ON daily_record.fk_n_customer_id = customer_gen.n_customer_id WHERE `dr_em_id` = '$emWorkId'";
        /* เอาไปหาค่า rate ช่วง คูณค่าเวลาที่ถูกต้อง */
        $selCustomer_gen_asc = "SELECT * FROM `coast_work` JOIN customer_gen ON coast_work.fk_n_customer_id = customer_gen.n_customer_id WHERE `fk_employee_worker_id` = '$emWorkId' ORDER BY `coast_work`.`fk_n_customer_id` ASC";
    }

    if ($selStatus == "" && $selYear != "") {
        $selCustomer_gen = "SELECT * FROM `coast_work` JOIN customer_gen ON coast_work.fk_n_customer_id = customer_gen.n_customer_id WHERE `fk_employee_worker_id` = '$emWorkId'  AND customer_gen_year = '$selYear' GROUP BY(fk_n_customer_id)";
        /* รายได้ประมาณการ */
        $selCustomer_gen_sum = "SELECT SUM(customer_gen_revenue) AS revenue, SUM(customer_gen_charge) AS charge FROM `coast_work` JOIN customer_gen ON coast_work.fk_n_customer_id = customer_gen.n_customer_id WHERE `fk_employee_worker_id` = '$emWorkId'  AND customer_gen_year = '$selYear'";
        /* ค่าแรงประมาณการ */
        $selCustomer_gen_int_wage = "SELECT SUM(coast_work_hour) AS coast_hour, SUM(coast_work_bath) AS coast_bath  FROM `coast_work` JOIN customer_gen ON coast_work.fk_n_customer_id = customer_gen.n_customer_id WHERE `fk_employee_worker_id` = '$emWorkId'  AND customer_gen_year = '$selYear' GROUP BY(fk_n_customer_id)";
        /* รายได้จริง */
        $selCustomer_gen_coast_real = "SELECT payment.payment_coast FROM `coast_work` JOIN customer_gen ON coast_work.fk_n_customer_id = customer_gen.n_customer_id JOIN payment ON payment.fk_n_customer = customer_gen.n_customer_id WHERE `fk_employee_worker_id` = '$emWorkId'  AND customer_gen_year = '$selYear' GROUP BY(payment.payment_id)";
        /* ชั่วโมงใช้จริงจาก dr_rec */
        $sqlselDrTImeReal = "SELECT SUM(dr_time_hour) AS dr_hour, SUM(dr_time_minute) AS dr_minute FROM `daily_record`JOIN customer_gen ON daily_record.fk_n_customer_id = customer_gen.n_customer_id WHERE `dr_em_id` = '$emWorkId'  AND customer_gen_year = '$selYear'";
        /* เอาไปหาค่า rate ช่วง คูณค่าเวลาที่ถูกต้อง */
        $selCustomer_gen_asc = "SELECT * FROM `coast_work` JOIN customer_gen ON coast_work.fk_n_customer_id = customer_gen.n_customer_id WHERE `fk_employee_worker_id` = '$emWorkId'  AND customer_gen_year = '$selYear' ORDER BY `coast_work`.`fk_n_customer_id` ASC";
    }




    $queryCustomer_gen = $conn->query($selCustomer_gen);
}
/* .if($txtName != NULL) */
?>
<!DOCTYPE html>
<html lang="en">
    <head><title>ข้อมูลรายงานส่วนบุคคล</title>
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
                                                    <th width="188" rowspan="2"><center>จำนวนรายการที่บันทึก</center></th>
                                                    <th width="188" rowspan="2"><center>สถานะ</center></th>
                                                    </tr>
                                                    <tr>
                                                        <th width="188"><center>ตั้งต้น(Hr)</center></th>
                                                    <th width="188"><center>ใช้ไป(Hr)</center></th>
                                                    <th width="188"><center>เหลือ(Hr)</center></th>
                                                    </tr>
                                                    <?php
                                                    while ($customer_gen = $queryCustomer_gen->fetch_array()) {
                                                        $customerTaxId = $customer_gen['fk_customer_tax_id'];
                                                        ?> 
                                                        <tr>

                                                            <td><?php echo $customer_gen_id = $customer_gen['fk_n_customer_id']; ?></td>
                                                            <td>
                                                                <?php
                                                                $selCompanyName = "SELECT * FROM customer WHERE customer_tax_id = '$customerTaxId'";
                                                                $queryCompanyName = $conn->query($selCompanyName);
                                                                while ($company = $queryCompanyName->fetch_array()) {
                                                                    echo $company['customer_company'];
                                                                }
                                                                ?>

                                                            </td>
                                                            <?php
                                                            $sqlCoastWork = "SELECT DISTINCT coast_work_role FROM coast_work WHERE fk_employee_worker_id = '$emWorkId' AND fk_n_customer_id = '$customer_gen_id'";
                                                            $queryCoastWork = $conn->query($sqlCoastWork);

                                                            while ($coasWork = $queryCoastWork->fetch_array()) {
                                                                ?>
                                                                <td align="center">
                                                                    <?php
                                                                    if ($coasWork['coast_work_role'] == 0) {
                                                                        echo "ผู้ทำบัญชี";
                                                                    } elseif ($coasWork['coast_work_role'] == 1) {
                                                                        echo "ผู้ปฎิบัติงาน";
                                                                    }
                                                                } //.$coasWork 
                                                                ?></td>


                                                            <td align="center">
                                                                <?php
                                                                $sqlCoastWork2 = "SELECT SUM(coast_work_bath) AS sumBath,SUM(coast_work_hour) AS sumHour FROM coast_work WHERE fk_employee_worker_id = '$emWorkId' AND fk_n_customer_id = '$customer_gen_id'";
                                                                $queryCoastWork2 = $conn->query($sqlCoastWork2);
                                                                while ($coasWork2 = $queryCoastWork2->fetch_array()) {
                                                                    echo number_format($coasWork2['sumBath']);
                                                                    ?>

                                                                </td>
                                                                <td align="center">
                                                                    <?php
                                                                    $sumHour = $coasWork2['sumHour'];
                                                                    echo number_format($sumHour);
                                                                }//.$coasWork2	
                                                                ?>

                                                            </td>
                                                            <td align="center">
                                                                <?php
                                                                /* เวลาที่ใช้ไปจากบันทึกประจำวัน */
                                                            echo   $spendTime = "SELECT SUM(dr_time_hour) AS drSumHour, SUM(dr_time_minute) AS drSumMinute,SUM(dr_record) AS sumRec FROM daily_record WHERE dr_em_id = '$emWorkId' AND fk_n_customer_id = '$customer_gen_id'";
                                                                $querySpendTime = $conn->query($spendTime);
                                                                while ($arrSpendTime = $querySpendTime->fetch_array()) {
                                                                    $drTimeHour = $arrSpendTime['drSumHour'];
                                                                    $drTimeMinute = $arrSpendTime['drSumMinute'];
                                                                    $sumRecord = $arrSpendTime['sumRec'];
                                                                }
                                                                if ($drTimeMinute > 59) {
                                                                    $drTimeMinute = $drTimeMinute / 60;
                                                                    $drTimeHour = intval($drTimeMinute) + $drTimeHour;
                                                                    $drTimeMinute = 0.60 - fmod($drTimeMinute, 1);
                                                                }
                                                                if ($sumRecord == "") {
                                                                    $sumRecord = "-";
                                                                }
                                                                /* else
                                                                  {
                                                                  echo $drTimeHour.".".$drTimeMinute;
                                                                  } */

                                                                //echo $drTimeHour.".".$drTimeMinute;
                                                                //echo $drTimeMinute;
                                                                $sumDailyTimeUse = intval($drTimeHour) + $drTimeMinute;
                                                                echo $sumDailyTimeUseFormat = number_format($sumDailyTimeUse, 2, '.', '');
                                                                ?>
                                                            </td>
                                                            <td align="center"><?php
                                                                /* $difTimeUse = ($sumHour - $drTimeHour)*60 - $drTimeMinute; 
                                                                  echo $sumTimeLimit = $difTimeUse/60; */
                                                                $difTimeUse = ($sumHour - $sumDailyTimeUseFormat);
                                                                if ($difTimeUse < 1 && $difTimeUse > 0) {
                                                                    $difTimeUse = $difTimeUse - 0.60;  //ติดตรงนี้ยังไม่สมบูรณ์
                                                                }
                                                                echo $difTimeUse
                                                                ?>
                                                            </td>
                                                            <!--ECHO RECORD-->
                                                            <td align="center"><?php echo $sumRecord; ?></td>
                                                            <td align="center"><?php
                                                                $sqlChcekCustomer = "SELECT * FROM customer_gen WHERE n_customer_id = '$customer_gen_id'";
                                                                $qryChcekCustomer = $conn->query($sqlChcekCustomer);
                                                                while ($arrChcekCustomer = $qryChcekCustomer->fetch_array()) {
                                                                    $statusCustomer = $arrChcekCustomer['check_close'];
                                                                    $genYear = $arrChcekCustomer['customer_gen_year'];
                                                                }
                                                                if ($statusCustomer == 0) {
                                                                    echo "ดำเนินงาน";
                                                                } elseif ($statusCustomer == 1) {
                                                                    echo "ปิดโครงการ";
                                                                }
                                                                //echo $genYear;
                                                                ?></td>   

                                                        </tr>

                                                    <?php }//.$customer_gen 
                                                    ?> 
                                                </table>

                                                <!--.TABLE-->
                                            </div><!--.table-responsive-->
                                            <center><a href="print_person_report_1.php?txtName=<?php echo $txtName; ?>&selStatus=<?php echo $selStatus; ?>&selYear=<?php echo $selYear; ?>" class="btn btn-info">พิมพ์</a></center>
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
                                                    <?php
//ดูรายได้ประมาณการ
                                                    /* $sqlProfit = "SELECT SUM(customer_gen_revenue) AS revenue, SUM(customer_gen_charge) AS charge FROM coast_work JOIN customer_gen ON customer_gen.n_customer_id = coast_work.fk_n_customer_id  WHERE fk_employee_worker_id = '$emWorkId' AND customer_gen.n_customer_id ='$customer_gen_id'";
                                                      $qryProfit = $conn->query($sqlProfit);
                                                      while ($arrProfit = $qryProfit->fetch_array()) {
                                                      $companyRevenue = $arrProfit['revenue'];
                                                      $companyCharge = $arrProfit['charge'];
                                                      } */
                                                    $intitialRevenue = 0;
                                                    $intitialCharge = 0;

                                                    $queryProfit = $conn->query($selCustomer_gen_sum);
                                                    while ($arrProfit = $queryProfit->fetch_array()) {
                                                        $intitialRevenue0 = $arrProfit['revenue'];
                                                        $intitialCharge0 = $arrProfit['charge'];
                                                        $intitialRevenue = $intitialRevenue + $intitialRevenue0;
                                                        $intitialCharge = $intitialCharge + $intitialCharge0;
                                                    }


//ใช้จริง
                                                    /* $sqlSelCosts = "SELECT SUM(coast_work_hour) AS sumCoastHr,SUM(coast_work_bath) AS sumCoastBath FROM coast_work WHERE fk_employee_worker_id = '$emWorkId'";
                                                      $qrySelCosts  = $conn->query($sqlSelCosts);
                                                      while ($arrSelCosts = $qrySelCosts->fetch_array()) {
                                                      $sumCoastHr = $arrSelCosts['sumCoastHr'];
                                                      $sumCoastBath = $arrSelCosts['sumCoastBath'];

                                                      } */
                                                    /* ค่าแรงประมาณการ */
                                                    $sumIntialWageHour = 0;
                                                    $sumIntialWageMoney = 0;
                                                    $queryIntialWage = $conn->query($selCustomer_gen_int_wage);
                                                    while ($arrIntialWage = $queryIntialWage->fetch_array()) {
                                                        $sumIntialWageHour = $sumIntialWageHour + $arrIntialWage['coast_hour'];
                                                        $sumIntialWageMoney = $sumIntialWageMoney + $arrIntialWage['coast_bath'];
                                                    }
                                                    /* รายได้ใช้จริง */
//echo $selCustomer_gen_coast_real;
                                                    $queryCoastReal = $conn->query($selCustomer_gen_coast_real);
                                                    $sumCoastReal = 0;
                                                    while ($arrCoastReal = $queryCoastReal->fetch_array()) {
                                                        $sumCoastReal = $sumCoastReal + $arrCoastReal['payment_coast'];
                                                    }

                                                    /* ค่าแรงใช้จริง */
//echo $selCustomer_gen_int_wage;
//echo $sqlselDrTImeReal;
                                                    /* รวมเวลาจาก dr แปลงเป็นนาที เอาใช้ส่วนรายงานผลการทำงานได้ */
                                                    $queryTimeFromDr = $conn->query($sqlselDrTImeReal);
                                                    while ($arrTimeFromDr = $queryTimeFromDr->fetch_array()) {
                                                        $drHour = $arrTimeFromDr['dr_hour'];
                                                        $drMinute = $arrTimeFromDr['dr_minute'];
                                                    }
                                                    $realDrMinute = calTime($drHour, $drMinute); //ค่าที่ได้จากการคำนวณนำไป echo ได้เลย
                                                    $realDrHourHour = convMinToHourHour($realDrMinute); //ค่านี้เอาไปใช้คำนวณค่าใช้จ่ายจริง

                                                    /* .รวมเวลาจาก dr แปลงเป็นนาที เอาใช้ส่วนรายงานผลการทำงานได้ */
//echo   $selCustomer_gen_asc."<br>";
//echo $selCustomer_gen."<br>";
// echo   $realDrHourHour."<br>".$intitialCharge."<br>".$selCustomer_gen_sum;
                                                    $queryCustomerGenAsc = $conn->query($selCustomer_gen_asc);
                                                    /* while หาบริษัทตามเงื่อนไขแบบ ASC */
                                 /*ส่วนนี้รอการทดสอบทางตรรกะ*/                  
                                                    $sw1 = 0; //เซทค่าสวิต
                                                    $sumRealWage1 = 0;
                                                    $sumRealWage2 = 0;
                                                    $sumRealForSw = 0;
                                                    while ($arrCustomerGenAsc = $queryCustomerGenAsc->fetch_array()) {
                                                        $sw1 = 0;
                                                        $fixHourToMinute = $arrCustomerGenAsc['coast_work_hour'] * 60; //นาทีจาก coast_work เอาไว้เป็นตัวลบ
                                                        $fixCustomergen = $arrCustomerGenAsc['fk_n_customer_id'];
                                                        //echo $fixHourToMinute."<br>";
                                                        $sqlSelDrHrFix = "SELECT SUM(dr_time_hour) AS sumDrHour,SUM(dr_time_minute) AS sumDrMinute FROM `daily_record` WHERE fk_n_customer_id = '$fixCustomergen' AND dr_em_id = '$emWorkId'";
                                                        //echo $sqlSelDrHrFix."<br>";
                                                        $querySelDrHrFix = $conn->query($sqlSelDrHrFix);
                                                        while (($arrSelDrHrFix = $querySelDrHrFix->fetch_array()) && ($sw1 == 0)) {//ถ้า sw ==1 จะหยุดวนทันทีที่คิดไว้
                                                            //echo $sqlSelDrHrFix . "<br>";
                                                            $selDrHrFixSumHour = $arrSelDrHrFix['sumDrHour'];
                                                            $selDrHrFixSumMinute = $arrSelDrHrFix['sumDrMinute'] . "<br>";
                                                            $fixDrHourMinute = calTime($selDrHrFixSumHour, $selDrHrFixSumMinute); //นาทีทั้งหมดที่ + กับชั่วโมงแล้ว
                                                           // echo $fixDrHourMinute."<br>";
                                                            $fixDrMinuteToHour = convMinToHourHour($fixDrHourMinute);//ชั่วโมงที่รวมกับนาทีแล้ว รูปแบบ ชั่วโมง.นาที
                                                            /*เอาค่า dr hour ไปคูณกับเรทค่าแรงตามขั้นชั่วโมง หากติดลบไปให้หยุดคูณเพราะแสดงว่ายังงใช้เวลาไม่เกิน*/
                                                           
                                                           $sumRealForSw = $fixDrMinuteToHour - $fixHourToMinute;
                                                            if($sumRealForSw <0)
                                                            {
                                                                $sumRealWage1 =  $fixDrMinuteToHour * $arrCustomerGenAsc['coast_work_bath'];
                                                                $sw1 = 1;
                                                            }elseif($sumRealForSw >0)
                                                            {
                                                                $sumRealWage1 =  $fixDrMinuteToHour * $arrCustomerGenAsc['coast_work_bath'];
                                                                $sw1 = 0;
                                                            } 
                                                            $sumRealWage2 = $sumRealWage2 +$sumRealWage1; //ผลรวมตามค่าเป็นชุด
                                                            }
                                                    } /* .while หาบริษัทตามเงื่อนไขแบบ ASC */
                                                   /*.ส่วนนี้รอการทดสอบทางตรรกะ*/      
                                                    ?>
                                                    <tr>
                                                          <!---<th width="107">&nbsp;</th>
                                                          <th width="139" align="center">ประมาณการ</th>
                                                          <th width="207" align="center">ใช้จริง</th>
                                                          <th width="148" align="center">ผลต่าง</th> -->
                                                        <th>&nbsp;</th>
                                                        <th align="center">ประมาณการ</th>
                                                        <th align="center">ใช้จริง</th>
                                                        <th align="center">ผลต่าง</th>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>รายได้</strong></td>
                                                        <!--รายได้ประมาณการ-->
                                                        <td><?php echo number_format($intitialRevenue); ?></td> 
                                                        <!--รายได้ใช้จริง sum มาจาก payment-->
                                                        <td><?php echo number_format($sumCoastReal); ?></td>
                                                        <!--ผลต่างรายได้-->
                                                        <td><?php
                                                            $DifCoast = $intitialRevenue - $sumCoastReal;
                                                            echo number_format($DifCoast);
                                                            ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>ค่าแรง</strong></td>

                                                        <td><?php
                                                            $sumIntitialCoast = $sumIntialWageHour * $sumIntialWageMoney;
                                                            echo number_format($sumIntitialCoast);
                                                            ?></td>
                                                        <!--ค่าแรงใช้จริง-->
                                                        <td><?php echo  number_format($sumRealWage2);?></td>
                                                        <!--ผลต่างค่าแรง-->    
                                                        <td><?php $difInWage = $sumIntitialCoast - $sumRealWage2; echo number_format($difInWage);  ?></td>
                                                    </tr>
                                                    <tr>  
                                                        <!--ค่าใช้จ่ายสำนักงานตั้งต้น-->
                                                        <td><strong>ค่าใช้จ่ายสำนักงาน</strong></td>
                                                        <td><?php
                                                            $sumIntitialAsset = $sumIntialWageHour * $intitialCharge;
                                                            echo number_format($sumIntitialAsset);
                                                            ?> </td>
                                                        <!--ค่าใช้จ่ายสำนักงานใช้จริง เวลาจาก dr_rec ที่ผ่านการรวมกับนาทีแล้ว * กับค่าชาร์ตตั้งต้น-->
                                                        <td><?php
                                                            $AssetReal = $realDrHourHour * $intitialCharge;
                                                            echo number_format($AssetReal);
                                                            ?></td>
                                                        <!--ผลต่างค่าใช้จ่ายสำนักงาน-->
                                                        <td><?php
                                                            $difAsset = $sumIntitialAsset - $AssetReal;
                                                            echo number_format($difAsset);
                                                            ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>กำไรขาดทุน</strong></td>
                                                        <!--ประมาณการ-->
                                                        <td><?php
                                                            $Intprofit = $intitialRevenue - ($sumIntitialCoast + $sumIntitialAsset);
                                                            echo number_format($Intprofit);
                                                            ?></td>
                                                        <!--ใช้จริง-->
                                                        <td><?php $difInRealProfit = $sumCoastReal - ($sumRealWage2 + $AssetReal); echo number_format($difInRealProfit); ?></td>
                                                         <!--ผลต่าง-->
                                                         <td><?php $difInDifProfit =  $DifCoast - ($difInWage + $difAsset); echo number_format($difInDifProfit);?></td>
                                                    </tr>
                                                </table>

                                                <!--.TABLE-->
                                            </div><!--.table-responsive-->
                                            <center><a href="print_person_report_2.php?txtName=<?php echo $txtName; ?>&selStatus=<?php echo $selStatus; ?>&selYear=<?php echo $selYear; ?>" class="btn btn-info">พิมพ์</a></center>
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
                                                    <?php
                                                    /* ดูชั่วโมงการทำงานประมาณการจาก coastwork ทุกโครงการที่รับผิดชอบ */
                                                    $sqlSelAllProject = "SELECT SUM(coast_work_hour) AS sumHourAllproject,SUM(coast_work_bath) AS coastWorkBathEmUse FROM coast_work WHERE `fk_employee_worker_id` = '$emWorkId'";
                                                    $qrySelAllProject = $conn->query($sqlSelAllProject);
                                                    while ($arrSelAllProject = $qrySelAllProject->fetch_array()) {
                                                        $hourAllProject = $arrSelAllProject['sumHourAllproject'];
                                                        $coastWorkBathEmUse = $arrSelAllProject['coastWorkBathEmUse'];
                                                    }
                                                    /* ดูชั่วโมงที่ใช้ไปจากบันทึกประจำัน */
                                                    $sqlSelDayRecAll = "SELECT SUM(`dr_time_hour`) AS drTimeHr, SUM(`dr_time_minute`) AS drTimemit, SUM(dr_record) AS sumDrRecord FROM daily_record WHERE dr_em_id = '$emWorkId'";
                                                    $qrySelDayRecAll = $conn->query($sqlSelDayRecAll);
                                                    while ($arrSelDayRecAll = $qrySelDayRecAll->fetch_array()) {
                                                        $drTimeHr = $arrSelDayRecAll['drTimeHr'];
                                                        $drTimemit = $arrSelDayRecAll['drTimemit'];
                                                        $sumDrRecord = $arrSelDayRecAll['sumDrRecord'];
                                                    }
                                                    
                                                    /*คำนวณผลต่างชั่วโมง*/
                                                      $difTimeuseRealMinute =   ($sumIntialWageHour * 60) - ($realDrHourHour * 60);
                                                      $difTimeuseRealMinuteToHour = convMinToHourHour($difTimeuseRealMinute);
                                                    /*.คำนวณผลต่างชั่วโมง*/
                                                    ?>
                                                     
                                                   <tr>
                                                       <!--ชื่อ-นามสกุล--> 
                                                       <td><?php echo $resultEmployee['employee_name']; ?>&nbsp;<?php echo $resultEmployee['employee_lname']; ?></td>
                                                        <!--สถานะ--> 
                                                        <td>สถานะ</td>
                                                        <!--ประมาณการ--> 
                                                        <td><center><?php echo $sumIntialWageHour; ?></center></td>
                                                        <!--ใช้ไป--> 
                                                        <td><center><?php echo $realDrHourHour;?></center></td>
                                                        <!--ผลต่าง--> 
                                                        <td><center><?php echo number_format($difTimeuseRealMinuteToHour,2) ; ?></center></td>
                                                         <!--record--> 
                                                        <td>&nbsp;</td>
                                                         <!--ค่าแรงประมาณการ--> 
                                                        <td><?php echo number_format($sumIntitialCoast);?></td>
                                                         <!--ค่าแรงใช้จริง--> 
                                                        <td><?php echo number_format($sumRealWage2);?></td>
                                                        <!--ค่าแรงส่วนต่าง--> 
                                                        <td><?php echo number_format($difInWage); ?></td>
                                                    </tr> 
                                                </table>

                                                <!--.TABLE-->
                                            </div><!--.table-responsive-->
                                            <center><a href="print_person_report_3.php?txtName=<?php echo $txtName; ?>&selStatus=<?php echo $selStatus; ?>&selYear=<?php echo $selYear; ?>" class="btn btn-info">พิมพ์</a></center>
                                            <!--.BODY-->
                                        </div>
                                    </div>
                                </div>
                            </div><!--.รายงานผลการทำงาน-->

                            <a href="print_person_report_all.php?txtName=<?php echo $txtName; ?>&selStatus=<?php echo $selStatus; ?>&selYear=<?php echo $selYear; ?>"></a>
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
