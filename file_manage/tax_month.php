<?php
  @session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: Tax Month ::.</title>
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

<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","getcustomer.php?cusnew="+str,true);
        xmlhttp.send();
    }
}

function showEmployee(str2) {
    if (str2 == "") {
        document.getElementById("txtHintEmployee").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHintEmployee").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","sc_hide_user/get_txt_user.php?pass_audit="+str2,true);
        xmlhttp.send();
    }
}
</script>
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
                                <div class="panel panel-red">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><span class="fa fa-pencil"></span> &nbsp;&nbsp;บันทึกการจัดทำภาษีประจำเดือน </h3>
                                    </div>
                                    
                                    <div class="panel-body">
                                        <form action='sc_registertax_month.php' method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="list-inline">
                                                    <div class="col-md-2">
                                                        <label><span style="color:red"> * </span>วันที่นำเข้าข้อมูล : </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" id="datepicker-th" name="txtDateimp" class="form-control input-sm" required/> 
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label><span style="color:red"> * </span>ผู้นำเข้าข้อมูล : </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" id="" name="txtEm" class="form-control input-sm" placeholder="รหัสพนักงาน" value="<?php echo "$_SESSION[login]"; ?>" readonly/> 
                                                    </div>
                                                </div>
                                            </div><br>

                                            <div class="row">
                                                <div class="list-inline">
                                                    <div class="col-md-2">
                                                        <label><span style="color:red"> * </span>รหัสงานบริษัท : </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                     
													<?php @$getCustomerId = $_GET['customer_id'];?>
													   <select  class="form-control input-sm" onchange="location = this.options[this.selectedIndex].value;" >
                                                            
															<option><?php if($getCustomerId != "")
																	{
																		echo $getCustomerId;
																	}
																	elseif($getCustomerId == "")
																	{
																		echo "เลือกรหัสงานบริษัท";
																	}
																	?>
															</option>";
                                                            
                                                        <?php   //$sql="SELECT fk_n_customer_id FROM coast_work WHERE fk_employee_worker_id=$_SESSION[login]"; // Query to collect data from table 
                                                           $sql="SELECT * FROM coast_work INNER JOIN customer_gen ON coast_work.fk_n_customer_id=customer_gen.n_customer_id
                                                            WHERE coast_work.fk_employee_worker_id=$_SESSION[login] AND customer_gen.check_close=0 GROUP BY coast_work.fk_n_customer_id";

                                                            foreach ($conn->query($sql) as $row) { 
																if($row['fk_n_customer_id'] != $getCustomerId)
																{?>
                                                                <option value="tax_month.php?customer_id=<?php echo $row['fk_n_customer_id']; ?>"><?php echo $row['fk_n_customer_id']; ?></option>  
														<?php }
                                                            }
                                                        ?>
                                                        </select>
														<input type="hidden" value="<?php echo $getCustomerId;?>" name="txtCusgen">
														
                                                    </div>
                                                    <div class="col-md-2">
                                                            <select class="form-control input-sm" name="txtMonth">
                                                            <?php $mounth = array("เดือนภาษี", "เดือน มกราคม", "เดือน กุมภาพันธ์", "เดือน มีนาคม", "เดือน เมษายน", "เดือน พฤษภาคม", "เดือน มิถุนายน", "เดือน กรกฎาคม", "เดือน สิงหาคม", "เดือน กันยายน", "เดือน ตุลาคม", "เดือน พฤศจิกายน", "เดือน ธันวาคม");
                                                                foreach ($mounth as $value) { ?>
                                                                    
																	<option value=" <?php echo "$value" ?>"> <?php echo "$value" ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <select name="txtYear" class="form-control input-sm">
                                                                <option>ปีภาษี</option>
                                                                <?php for($i=2557;$i<=2600;$i++){ ?>
                                                                        <option value=" <?php echo "$i" ?>"> <?php echo "$i" ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--<div class="row">
                                                    <div class="list-inline">
                                                        <div class="col-md-2">
                                                             <label></label>
                                                        </div>
                                                        <div id="txtHint" class="col-md-2"></div>
                                                    </div>
                                                </div>-->  
											<br>
											<?php
												/*SELECT LIMIT*/
													/*SELECT ชื่อ บริษัท  */
													$sqlSelEmployeeName=("SELECT * FROM customer_gen LEFT OUTER JOIN customer ON customer_gen.fk_customer_tax_id=customer.customer_tax_id WHERE customer_gen.n_customer_id = '$getCustomerId'");
													$querySelEmployeeName = $conn->query($sqlSelEmployeeName);
													$resultSelEmployeeName = $querySelEmployeeName->fetch_assoc();
													//แสดงชื่อบริษัท พร้อมรหัสงาน
													echo "<font color='blue'>บริษัท : ".$resultSelEmployeeName['customer_company']." รหัสงานบริษัท  : ".$getCustomerId."</font>";
												/*.SELECT ชื่อ บริษัท  */
												
													/*ภงด 1 2 3 53*/ 
														$selLimit = "SELECT condition_dat,condition_month FROM conditions WHERE condition_name = 'ยื่น ภงด. 1, 2, 3, 53' AND n_customer_id = '$getCustomerId' ";	
														$querySqlLimit = $conn->query($selLimit);
														$resultSqlLimit = $querySqlLimit->fetch_assoc(); 

														/*ยื่น ภพ.30 ภธ.40*/ 
														$selLimit2 = "SELECT condition_dat,condition_month FROM conditions WHERE condition_name = 'ยื่น ภพ.30 ภธ.40' AND n_customer_id = '$getCustomerId' ";	
														$querySqlLimit2 = $conn->query($selLimit2);
														$resultSqlLimit2 = $querySqlLimit2->fetch_assoc(); 


														/*ประกันสังคม*/ 
														$selLimit4 = "SELECT condition_dat,condition_month  FROM conditions WHERE condition_name = 'ยื่น ประกันสังคม' AND n_customer_id = '$getCustomerId' ";	
														$querySqlLimit4 = $conn->query($selLimit4);
														$resultSqlLimit4 = $querySqlLimit4->fetch_assoc();  
											
												/*.SELECT LIMIT*/
											?>
                                            <div class="table-responsive">
                                                <table class="table table-hover-color">
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
                                                            <td><input type="text" class="form-control input-sm" name="" value="<?php echo $resultSqlLimit['condition_dat'].$resultSqlLimit['condition_month'];?>" readonly/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th1"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" placeholder="บาท" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกเฉพาะตัวเลข'); this.value='';}"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th2"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><!--<input type="file" class="form-control input-sm" name="filIn[]"/>-->
                                                                <div style="position:relative;">
                                                                  <a class='btn btn-primary' href='javascript:;'> Choose File...
                                                                  <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);
                                                                  -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;
                                                                  color:transparent;' name="filIn[]" size="50"  onchange='$("#upload-file1").html($(this).val());'>
                                                                  </a> &nbsp; <br><span class='label label-info' id="upload-file1"></span></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" name="chb[]" id="chb1" value="1"/>
                                                                <input type="hidden" name="hid[]" value="ภงด.2"/>
                                                            </td>
                                                            <td><label for="chb1">ภงด.2</label></td>
                                                            <td><input type="text" class="form-control input-sm" name="" value="<?php echo $resultSqlLimit['condition_dat'].$resultSqlLimit['condition_month'];?>" readonly/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th3"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" placeholder="บาท" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกเฉพาะตัวเลข'); this.value='';}"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th4"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><!--<input type="file" class="form-control input-sm" name="filIn[]"/>-->
                                                                <div style="position:relative;">
                                                                  <a class='btn btn-primary' href='javascript:;'> Choose File...
                                                                  <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);
                                                                  -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;
                                                                  color:transparent;' name="filIn[]" size="50"  onchange='$("#upload-file2").html($(this).val());'>
                                                                  </a> &nbsp; <br><span class='label label-info' id="upload-file2"></span></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" name="chb[]" id="chb2" value="2"/>
                                                                <input type="hidden" name="hid[]" value="ภงด.3"/>
                                                            </td>
                                                            <td><label for="chb2">ภงด.3</label></td>
                                                            <td><input type="text" class="form-control input-sm" name="" value="<?php echo $resultSqlLimit['condition_dat'].$resultSqlLimit['condition_month'];?>" readonly/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th5"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" placeholder="บาท" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกเฉพาะตัวเลข'); this.value='';}"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th6"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><!--<input type="file" class="form-control input-sm" name="filIn[]"/>-->
                                                                <div style="position:relative;">
                                                                  <a class='btn btn-primary' href='javascript:;'> Choose File...
                                                                  <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);
                                                                  -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;
                                                                  color:transparent;' name="filIn[]" size="50"  onchange='$("#upload-file3").html($(this).val());'>
                                                                  </a> &nbsp; <br><span class='label label-info' id="upload-file3"></span></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" name="chb[]" id="chb3" value="3"/>
                                                                <input type="hidden" name="hid[]" value="ภงด.53"/>
                                                            </td>
                                                            <td><label for="chb3">ภงด.53</label></td>
                                                            <td><input type="text" class="form-control input-sm" name="" value="<?php echo $resultSqlLimit['condition_dat'].$resultSqlLimit['condition_month'];?>" readonly/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th7"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" placeholder="บาท" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกเฉพาะตัวเลข'); this.value='';}"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th8"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><!--<input type="file" class="form-control input-sm" name="filIn[]"/>-->
                                                                <div style="position:relative;">
                                                                  <a class='btn btn-primary' href='javascript:;'> Choose File...
                                                                  <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);
                                                                  -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;
                                                                  color:transparent;' name="filIn[]" size="50"  onchange='$("#upload-file4").html($(this).val());'>
                                                                  </a> &nbsp; <br><span class='label label-info' id="upload-file4"></span></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" name="chb[]" id="chb4" value="4"/>
                                                                <input type="hidden" name="hid[]" value="ภพ.30"/>
                                                            </td>
                                                            <td><label for="chb4">ภพ.30</label></td>
                                                            <td><input type="text" class="form-control input-sm" name="" value="<?php echo $resultSqlLimit2['condition_dat'].$resultSqlLimit2['condition_month'];?>" readonly/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th9"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" placeholder="บาท" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกเฉพาะตัวเลข'); this.value='';}"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th10"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><!--<input type="file" class="form-control input-sm" name="filIn[]"/>-->
                                                                <div style="position:relative;">
                                                                  <a class='btn btn-primary' href='javascript:;'> Choose File...
                                                                  <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);
                                                                  -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;
                                                                  color:transparent;' name="filIn[]" size="50"  onchange='$("#upload-file5").html($(this).val());'>
                                                                  </a> &nbsp; <br><span class='label label-info' id="upload-file5"></span></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" name="chb[]" id="chb5" value="5"/>
                                                                <input type="hidden" name="hid[]" value="ภธ.40"/>
                                                            </td>
                                                            <td><label for="chb5">ภธ.40</label></td>
                                                            <td><input type="text" class="form-control input-sm" name="" value="<?php echo $resultSqlLimit2['condition_dat'].$resultSqlLimit2['condition_month'];?>" readonly/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th11"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" placeholder="บาท" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกเฉพาะตัวเลข'); this.value='';}"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th12"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><!--<input type="file" class="form-control input-sm" name="filIn[]"/>-->
                                                                <div style="position:relative;">
                                                                  <a class='btn btn-primary' href='javascript:;'> Choose File...
                                                                  <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);
                                                                  -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;
                                                                  color:transparent;' name="filIn[]" size="50"  onchange='$("#upload-file6").html($(this).val());'>
                                                                  </a> &nbsp; <br><span class='label label-info' id="upload-file6"></span></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" name="chb[]" id="chb6" value="6"/>
                                                                <input type="hidden" name="hid[]" value="ประกันสังคม"/>
                                                            </td>
                                                            <td><label for="chb6">ประกันสังคม</label></td>
                                                            <td><input type="text" class="form-control input-sm" name="" value="<?php echo $resultSqlLimit4['condition_dat'].$resultSqlLimit4['condition_month'];?>" readonly/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th13"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" placeholder="บาท" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกเฉพาะตัวเลข'); this.value='';}"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th14"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><!--<input type="file" class="form-control input-sm" name="filIn[]"/>-->
                                                                <div style="position:relative;">
                                                                  <a class='btn btn-primary' href='javascript:;'> Choose File...
                                                                  <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);
                                                                  -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;
                                                                  color:transparent;' name="filIn[]" size="50"  onchange='$("#upload-file7").html($(this).val());'>
                                                                  </a> &nbsp; <br><span class='label label-info' id="upload-file7"></span></div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" name="chb[]" id="chb7" value="7"/></td>
                                                            <td><input type="text" name="hid[]" class="form-control input-sm"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="" readonly/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th15"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" placeholder="บาท" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกเฉพาะตัวเลข'); this.value='';}"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th16"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><!--<input type="file" class="form-control input-sm" name="filIn[]"/>-->
                                                                <div style="position:relative;">
                                                                  <a class='btn btn-primary' href='javascript:;'> Choose File...
                                                                  <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);
                                                                  -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;
                                                                  color:transparent;' name="filIn[]" size="50"  onchange='$("#upload-file8").html($(this).val());'>
                                                                  </a> &nbsp; <br><span class='label label-info' id="upload-file8"></span></div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="modal-footer">
                                                <center>
                                                    <span style="color:red"> * โปรดตรวจสอบความถูกต้อง ก่อนกดบันทึก </span><br>
                                                    <input type="submit" class="btn btn-success " value="บันทึก" />
                                                    <input type="reset" class="btn btn-warning " value="ล้างข้อมูล" />
                                                </center>
                                            </div>
                                            <!-- /form group -->
                                        </form>
                                    </div>
                                    <!-- /#panel body -->
                                </div>
                                <!-- /#panel panel-info --> 
                                
                                <div class="panel panel-violet">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><span class="fa fa-search"></span> &nbsp;&nbsp;  เรียกดูข้อมูลการจัดทำภาษีประจำเดือน </h3>
                                    </div>
                                    
                                    <div class="panel-body"><br>
                                        <form action="sc_browse_data/browse_tax_month.php" method="GET">
                                            <div class="from-group">
                                                <div class="row">
                                                    <div class="list-inline">
                                                        <div class="col-md-offset-1 col-md-2">
                                                            <label><span style="color:red"> * </span>เลือกตาม : </label>
                                                        </div>
                                                        <div class="col-md-3">
                                                           <!-- <input type="text" id="txtComId" name="txtComId" class="form-control input-sm" placeholder="รหัสงานบริษัท"/>
                                                            <br> -->
                                                            <!--แบงค์ เพิ่ม-->
                                                            <?php
															 if($_SESSION['status'] == "ADMIN")
															 {
																 echo(' <select name="selCustomerId" class="form-control input-sm" onchange="showEmployee(this.value)">
                                                                <option></option>');
															 }
															 elseif($_SESSION['status'] == "USER")
															 {
																 echo ('<select name="selCustomerId" class="form-control input-sm" onchange="showEmployee(this.value)"');
															 }
															?>
                                                                <?php
                                                                         $fknEmployeeID = $_SESSION['login'];
                                                                         
                                                                        $sqlCoastWork = "SELECT fk_n_customer_id FROM coast_work WHERE fk_employee_worker_id = '$fknEmployeeID'";
                                                                        $querySqlCoastWork =  $conn->query($sqlCoastWork);
                                                                        while ($arrCoastWork = $querySqlCoastWork->fetch_array()) 
                                                                        {  $custmerID =   $arrCoastWork['fk_n_customer_id'];

                                                                            ?>
                                                                            <!--HTML-->
                                                                            <option value="<?php echo $custmerID; ?>"><?php echo $custmerID; ?></option>
                                                                            <!--.HTML-->

                                                                       <?php } 
                                                                ?>
                                                            </select> 
                                                            <!--แบงค์ เพิ่ม-->
                                                        </div>
                                                    </div>
                                                </div><br>

                                                <div class="row">
                                                    <div class="list-inline">
                                                        <div class="col-md-offset-1 col-md-2">
                                                            <label></label>
                                                        </div>
                                                        <div class="col-md-3" id="txtHintEmployee">
                                                            <input class="form-control input-sm" id="txtEmId" name="txtEmId" placeholder="รหัสพนักงาน" value="<?php echo("$_SESSION[login]"); ?>" readonly/>
                                                        </div>
                                                    </div>
                                                </div><br>

                                                <div class="row">
                                                    <div class="list-inline">
                                                        <div class="col-md-offset-1 col-md-2">
                                                            <label></label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <select class="form-control input-sm" name="selMonthTax">
                                                            <!--แก้ส่วนนี้ BANK-->
                                                           
                                                                    <option></option>
                                                                    <option value="เดือน มกราคม">เดือน มกราคม</option>
                                                                    <option value="เดือน กุมภาพันธ์">เดือน กุมภาพันธ์</option>
                                                                    <option value="เดือน มีนาคม">เดือน มีนาคม</option>
                                                                    <option value="เดือน เมษายน">เดือน เมษายน</option>
                                                                    <option value="เดือน พฤษภาคม">เดือน พฤษภาคม</option>
                                                                    <option value="เดือน มิถุนายน">เดือน มิถุนายน</option>
                                                                    <option value="เดือน กรกฎาคม">เดือน กรกฎาคม</option>
                                                                    <option value="เดือน สิงหาคม">เดือน สิงหาคม</option>
                                                                    <option value="เดือน กันยายน">เดือน กันยายน</option>
                                                                    <option value="เดือน ตุลาคม">เดือน ตุลาคม</option>
                                                                    <option value="เดือน พฤศจิกายน">เดือน พฤศจิกายน</option>
                                                                    <option value="เดือน ธันวาคม">เดือน ธันวาคม</option>

                                                            <!--.แก้ส่วนนี้ BANK--> 
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><br>

                                                <div class="row">
                                                    <div class="list-inline">
                                                        <div class="col-md-offset-1 col-md-2">
                                                            <label></label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" id="txtYearAudit" name="txtYearAudit" class="form-control input-sm" placeholder="ปีบัญชี"/>
                                                        </div>
                                                    </div>
                                                </div><br>

                                                <div class="row">
                                                    <div class="list-inline">
                                                        <div class="col-md-offset-1 col-md-2">
                                                            <label></label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <select class="form-control input-sm" name="selAuditWork">
                                                                <option value=""></option>
                                                                <option value="ภงด.1">ภงด.1</option>
                                                                <option value="ภงด.2">ภงด.2</option>
                                                                <option value="ภงด.3">ภงด.3</option>
                                                                <option value="ภงด.53">ภงด.53</option>
                                                                <option value="ภพ.30">ภพ.30</option>
                                                                <option value="ภธ.40">ภธ.40</option>
																<option value="ประกันสังคม">ประกันสังคม</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><br>

                                                <div class="row">
                                                    <div class="col-md-offset-5 col-md-2">
                                                        <button class="btn btn-success form-control input-sm" type="submit" >เรียกดู</button>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /form group -->
                                        </form>
                                    </div>
                                    <!-- /#panel body -->
                                </div>
                                <!-- /#panel panel-success -->
                                
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

    <script type="text/javascript">
    $(function () {
        var d = new Date();
        var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);

        $("#datepicker-th").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});
        
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

<?php 
    } 
    else
    {
        header("Location: ../index.html");
    }
?>
    
</body>
</html>