<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: Tax Month ::.</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Loading bootstrap css-->
    <!-- Custom Fonts -->
    <link type="text/css" rel="stylesheet" href="../styles/font-awesome-4.1.0/css/font-awesome.min.css" >
    <link type="text/css" rel="stylesheet" href="../styles/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="../styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="../styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../styles/main.css">
    <link type="text/css" rel="stylesheet" href="../styles/style-responsive.css">
    <link type="text/css" rel="stylesheet" href="../styles/jquery.news-ticker.css">
    <link rel="stylesheet" type="text/css" href="../inc/bootstrap/css/jquery-ui.css">

    <script type="text/javascript" src="../script/jquery.min.js"></script>
    <script type="text/javascript" src="../script/arrow79.js"></script>
</head>
<?php
include_once('../inc/config.php');
include_once('../inc/connect.php');
$cusnew = $_GET['cusnew'];

$sql=("SELECT * FROM customer_gen LEFT OUTER JOIN customer ON customer_gen.fk_customer_tax_id=customer.customer_tax_id WHERE customer_gen.n_customer_id = $_GET[cusnew]");
$result = $conn->query($sql);
$row = $result->fetch_assoc();

/*ภงด 1 2 3 53*/ 
$selLimit = "SELECT condition_dat,condition_month FROM conditions WHERE condition_name = 'ยื่น ภงด. 1, 2, 3, 53' AND n_customer_id = '$cusnew' ";	
$querySqlLimit = $conn->query($selLimit);
$resultSqlLimit = $querySqlLimit->fetch_assoc(); 

/*ยื่น ภพ.30 ภธ.40*/ 
$selLimit2 = "SELECT condition_dat,condition_month FROM conditions WHERE condition_name = 'ยื่น ภพ.30 ภธ.40' AND n_customer_id = '$cusnew' ";	
$querySqlLimit2 = $conn->query($selLimit2);
$resultSqlLimit2 = $querySqlLimit2->fetch_assoc(); 


/*ประกันสังคม*/ 
$selLimit4 = "SELECT condition_dat,condition_month  FROM conditions WHERE condition_name = 'ยื่น ประกันสังคม' AND n_customer_id = '$cusnew' ";	
$querySqlLimit4 = $conn->query($selLimit4);
$resultSqlLimit4 = $querySqlLimit4->fetch_assoc();   

   
?>
<body>
<input name="txtCompany" class="form-control input-sm" value="<?php echo $row['customer_company']; ?>" readonly/>
<input type="hidden" name="txtCompany"/>  

<!--TABLE-->
	
	<table class="table table-hover"> 
											   
                                                    <thead>
                                                        <tr class="danger">
                                                            <th></th>
                                                            <th>เลือกช่องภาษี</th>
                                                            <th>วันสุดท้ายของระบบ</th>
                                                            <th>วันที่ยื่น</th>
                                                            <th>ยอดชำระ</th>
                                                            <th>วันที่ชำระ</th>
                                                            <th>เลขที่ใบเสร็จ</th>
                                                            <th>แนบไฟล์</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><input type="checkbox" name="chb[]" id="chb0" value="0"/>
                                                                <input type="hidden" name="hid[]" value="ภงด.1"/>
                                                            </td>
                                                            <td><label for="chb0">ภงด.1</label></td>
                                                            <td><input type="text" class="form-control input-sm" name=""  value="<?php echo $resultSqlLimit['condition_dat'].$resultSqlLimit['condition_month'];  ?>" readonly/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th1"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" /></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th2"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><input type="file" class="form-control input-sm" name="filIn[]"/></td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" name="chb[]" id="chb1" value="1"/>
                                                                <input type="hidden" name="hid[]" value="ภงด.2"/>
                                                            </td>
                                                            <td><label for="chb1">ภงด.2</label></td>
                                                            <td><input type="text" class="form-control input-sm" name="" value="<?php echo $resultSqlLimit['condition_dat'].$resultSqlLimit['condition_month'];  ?>" readonly/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th3"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" /></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th4"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><input type="file" class="form-control input-sm" name="filIn[]"/></td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" name="chb[]" id="chb2" value="2"/>
                                                                <input type="hidden" name="hid[]" value="ภงด.3"/>
                                                            </td>
                                                            <td><label for="chb2">ภงด.3</label></td>
                                                            <td><input type="text" class="form-control input-sm" name="" value="<?php echo $resultSqlLimit['condition_dat'].$resultSqlLimit['condition_month'];  ?>" readonly/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th5"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" /></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th6"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><input type="file" class="form-control input-sm" name="filIn[]"/></td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" name="chb[]" id="chb3" value="3"/>
                                                                <input type="hidden" name="hid[]" value="ภงด.53"/>
                                                            </td>
                                                            <td><label for="chb3">ภงด.53</label></td>
                                                            <td><input type="text" class="form-control input-sm" name="" value="<?php echo $resultSqlLimit['condition_dat'].$resultSqlLimit['condition_month'];  ?>" readonly/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th7"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" /></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th8"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><input type="file" class="form-control input-sm" name="filIn[]"/></td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" name="chb[]" id="chb4" value="4"/>
                                                                <input type="hidden" name="hid[]" value="ภพ.30"/>
                                                            </td>
                                                            <td><label for="chb4">ภพ.30</label></td>
                                                            <td><input type="text" class="form-control input-sm" name="" value="<?php echo $resultSqlLimit2['condition_dat'].$resultSqlLimit2['condition_month'];  ?>" readonly/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th9"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" /></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th10"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><input type="file" class="form-control input-sm" name="filIn[]"/></td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" name="chb[]" id="chb5" value="5"/>
                                                                <input type="hidden" name="hid[]" value="ภธ.40"/>
                                                            </td>
                                                            <td><label for="chb5">ภธ.40</label></td>
                                                            <td><input type="text" class="form-control input-sm" name="" value="<?php echo $resultSqlLimit2['condition_dat'].$resultSqlLimit2['condition_month'];  ?>" readonly/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th11"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" /></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th12"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><input type="file" class="form-control input-sm" name="filIn[]"/></td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" name="chb[]" id="chb6" value="6"/>
                                                                <input type="hidden" name="hid[]" value="ประกันสังคม"/>
                                                            </td>
                                                            <td><label for="chb6">ประกันสังคม</label></td>
                                                            <td><input type="text" class="form-control input-sm" name="" value="<?php echo $resultSqlLimit4['condition_dat'].$resultSqlLimit4['condition_month'];  ?>" readonly/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th13"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" /></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th14"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><input type="file" class="form-control input-sm" name="filIn[]"/></td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" name="chb[]" id="chb7" value="7"/></td>
                                                            <td><input type="text" name="hid[]" class="form-control input-sm"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="" readonly/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th15"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" /></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th16"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><input type="file" class="form-control input-sm" name="filIn[]"/></td>
                                                        </tr>
                                                    </tbody>
                                                </table>



<!--.TABLE-->


<script src="../script/jquery-1.10.2.min.js"></script>
    <script src="../script/jquery-migrate-1.2.1.min.js"></script>
    <script src="../script/jquery-ui.js"></script>
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
    <script src="../script/index.js"></script>
    <!--CORE JAVASCRIPT-->
    <script src="../script/main.js"></script>
    <script type="text/javascript" src="../inc/bootstrap/js/scriptm.js"></script>

    <!-- Datepicker JavaScript -->
    <script type="text/javascript" src="../inc/bootstrap/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="../inc/bootstrap/js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
	  
	  
	 <!-- Datepicker  -->
	
	<script type="text/javascript">
    $(function () {
        var d = new Date();
        var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);

      
        
        $("#datepicker-th1").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

        $("#datepicker-th2").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

        $("#datepicker-th3").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

        $("#datepicker-th4").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

        $("#datepicker-th5").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

        $("#datepicker-th6").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

        $("#datepicker-th7").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

        $("#datepicker-th8").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

        $("#datepicker-th9").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

        $("#datepicker-th10").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

        $("#datepicker-th11").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

        $("#datepicker-th12").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

        $("#datepicker-th13").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

        $("#datepicker-th14").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

        $("#datepicker-th15").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

        $("#datepicker-th16").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

    });
</script>
</body>	
</html>
<?php
$conn->close();
?>
   