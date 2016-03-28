
<?php
include_once('../inc/config.php');
include_once('../inc/connect.php');
$cusnew = $_GET['cusnew'];
		/* SQL limit tax year*/
$sql=("SELECT * FROM customer_gen LEFT OUTER JOIN customer ON customer_gen.fk_customer_tax_id=customer.customer_tax_id WHERE customer_gen.n_customer_id = $_GET[cusnew]");
$result = $conn->query($sql);
$row = $result->fetch_assoc();

/*ภงด 1 2 3 53*/ 
$selLimit = "SELECT condition_dat,condition_month FROM conditions WHERE condition_name = 'ยื่น ภงด. 1, 2, 3, 53' AND n_customer_id = '$cusnew' ";	
$querySqlLimit = $conn->query($selLimit);
$resultSqlLimit = $querySqlLimit->fetch_assoc(); 


/*ภงด.51*/ 
$selLimit2 = "SELECT condition_dat,condition_month  FROM conditions WHERE condition_name = 'ปิดงบรายครึ่งปี ยื่น ภงด.51 รายงานทางการเงินที่สำคัญ' AND n_customer_id = '$cusnew' ";	
$querySqlLimit2 = $conn->query($selLimit2);
$resultSqlLimit2 = $querySqlLimit2->fetch_assoc(); 

/*ภงด.50*/ 
$selLimit3 = "SELECT condition_dat,condition_month  FROM conditions WHERE condition_name = 'ปิดงบรายปี ยื่น ภงด.50 รายงานทางการเงินที่สำคัญ' AND n_customer_id = '$cusnew' ";	
$querySqlLimit3 = $conn->query($selLimit3);
$resultSqlLimit3 = $querySqlLimit3->fetch_assoc(); 

/*ประกันสังคม*/ 
$selLimit4 = "SELECT condition_dat,condition_month  FROM conditions WHERE condition_name = 'ยื่น ประกันสังคม' AND n_customer_id = '$cusnew' ";	
$querySqlLimit4 = $conn->query($selLimit4);
$resultSqlLimit4 = $querySqlLimit4->fetch_assoc(); 

 /* .SQL limit tax year*/  
?>

<input name="txtCompany" class="form-control input-sm" value="<?php echo $row['customer_company']; ?>" readonly/>
<input type="hidden" name="txtCompany"/>  

<!--TABLE-->
	<div class="table-responsive">
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
                                                            <td><input type="text" class="form-control input-sm" name="" value="<?php echo $resultSqlLimit2['condition_dat'].$resultSqlLimit2['condition_month'];  ?>" readonly/></td>
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
                                                            <td>
																<input type="text" class="form-control input-sm" name="" value="<?php echo $resultSqlLimit3['condition_dat'].$resultSqlLimit3['condition_month']; ?>" readonly/>
																<!--<center><span style="color:blue"><?php echo $resultSqlLimit3['condition_dat'].$resultSqlLimit3['condition_month']; ?></span></center> -->
															</td>
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
                                                            <td><input type="text" class="form-control input-sm" name="" value="<?php echo $resultSqlLimit2['condition_dat'].$resultSqlLimit2['condition_month']; ?>" readonly/></td>
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
                                                            <td><input type="text" class="form-control input-sm" name="" value="<?php echo $resultSqlLimit3['condition_dat'].$resultSqlLimit3['condition_month']; ?>" readonly/></td>
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
                                                            <td><input type="text" class="form-control input-sm" name="" value="<?php echo $resultSqlLimit3['condition_dat'].$resultSqlLimit3['condition_month']; ?>" readonly/></td>
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
                                                            <td><input type="text" class="form-control input-sm" name="" value="<?php echo $resultSqlLimit4['condition_dat'].$resultSqlLimit4['condition_month'];  ?>"  readonly/></td>
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
	</div>



<!--.TABLE-->

<?php
$conn->close();
?>
   