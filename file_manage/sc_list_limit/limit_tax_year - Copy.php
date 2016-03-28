<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="../inc/bootstrap/css/jquery-ui.css">
</head>
<body>
<?php
include_once('../inc/config.php');
include_once('../inc/connect.php');
$cusnew = $_GET['cusnew'];

$sql=("SELECT * FROM customer_gen LEFT OUTER JOIN customer ON customer_gen.fk_customer_tax_id=customer.customer_tax_id WHERE customer_gen.n_customer_id = $_GET[cusnew]");
$result = $conn->query($sql);
$row = $result->fetch_assoc();

/*ภงด 1 2 3 53*/ 
$selLimit = "SELECT * FROM conditions WHERE condition_name = 'ยื่น ภงด. 1, 2, 3, 53' AND n_customer_id = '$cusnew' ";	
$querySqlLimit = $conn->query($selLimit);
$resultSqlLimit = $querySqlLimit->fetch_assoc();
/*.ภงด 1 2 3 53*/ 
?>

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
                                                                <input type="hidden" name="hid[]" value="ภงด.1ก"/>
                                                            </td>
                                                            <td><label for="chb0">ภงด.1ก</label></td>
															
                                                            <td>
																<input type="text" class="form-control input-sm" value="<?php echo $resultSqlLimit['condition_dat'].$resultSqlLimit['condition_month'];  ?>" readonly/>
															</td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th1"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" /></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th2"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><input type="file" class="form-control input-sm" name="filIn[]"/></td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" name="chb[]" id="chb1" value="1"/>
                                                                <input type="hidden" name="hid[]" value="ภงด.2ก"/>
                                                            </td>
                                                            <td><label for="chb1">ภงด.2ก</label></td>
                                                            <td><input type="text" class="form-control input-sm" value="<?php echo $resultSqlLimit['condition_dat'].$resultSqlLimit['condition_month'];  ?>"  readonly/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th3"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" /></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th4"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><input type="file" class="form-control input-sm" name="filIn[]"/></td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" name="chb[]" id="chb2" value="2"/>
                                                                <input type="hidden" name="hid[]" value="ภงด.3ก"/>
                                                            </td>
                                                            <td><label for="chb2">ภงด.3ก</label></td>
                                                            <td><input type="text" class="form-control input-sm" name="" value="<?php echo $resultSqlLimit['condition_dat'].$resultSqlLimit['condition_month'];  ?>"  readonly/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th5"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" /></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th6"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><input type="file" class="form-control input-sm" name="filIn[]"/></td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" name="chb[]" id="chb3" value="3"/>
                                                                <input type="hidden" name="hid[]" value="ภงด.51"/>
                                                            </td>
                                                            <td><label for="chb3">ภงด.51</label></td>
                                                            <td><input type="text" class="form-control input-sm" name="" readonly/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th7"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" /></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th8"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><input type="file" class="form-control input-sm" name="filIn[]"/></td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" name="chb[]" id="chb4" value="4"/>
                                                                <input type="hidden" name="hid[]" value="ภงด.50"/>
                                                            </td>
                                                            <td><label for="chb4">ภงด.50</label></td>
                                                            <td><input type="text" class="form-control input-sm" name="" readonly/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th9"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" /></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th10"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><input type="file" class="form-control input-sm" name="filIn[]"/></td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" name="chb[]" id="chb5" value="5"/>
                                                                <input type="hidden" name="hid[]" value="ภงด.94"/>
                                                            </td>
                                                            <td><label for="chb5">ภงด.94</label></td>
                                                            <td><input type="text" class="form-control input-sm" name="" readonly/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th11"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" /></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th12"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><input type="file" class="form-control input-sm" name="filIn[]"/></td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" name="chb[]" id="chb6" value="6"/>
                                                                <input type="hidden" name="hid[]" value="ภงด.90"/>
                                                            </td>
                                                            <td><label for="chb6">ภงด.90</label></td>
                                                            <td><input type="text" class="form-control input-sm" name="" readonly/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th13"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" /></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th14"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><input type="file" class="form-control input-sm" name="filIn[]"/></td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" name="chb[]" id="chb7" value="7"/>
                                                                <input type="hidden" name="hid[]" value="ภงด.91"/>
                                                            </td>
                                                            <td><label for="chb7">ภงด.91</label></td>
                                                            <td><input type="text" class="form-control input-sm" name="" readonly/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th15"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" /></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th16"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><input type="file" class="form-control input-sm" name="filIn[]"/></td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" name="chb[]" id="chb8" value="8"/>
                                                                <input type="hidden" name="hid[]" value="ประกันสังคม"/>
                                                            </td>
                                                            <td><label for="chb8">ประกันสังคม</label></td>
                                                            <td><input type="text" class="form-control input-sm" name="" readonly/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th17"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" /></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th18"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><input type="file" class="form-control input-sm" name="filIn[]"/></td>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="checkbox" name="chb[]" id="chb9" value="9"/></td>
                                                            <td><input type="text" name="hid[]" class="form-control input-sm"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="" readonly/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatein[]" id="datepicker-th19"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtPrice[]" /></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtDatepay[]" id="datepicker-th20"/></td>
                                                            <td><input type="text" class="form-control input-sm" name="txtBill[]" /></td>
                                                            <td><input type="file" class="form-control input-sm" name="filIn[]"/></td>
                                                        </tr>
                                                    </tbody>
                                                </table>



<!--.TABLE-->

<?php
$conn->close();
?>
    <!-- Datepicker JavaScript -->
    <script type="text/javascript" src="../inc/bootstrap/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="../inc/bootstrap/js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
</body>
</html>