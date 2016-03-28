<?php require_once("connect_ new.php"); ?>
<!-- Connect Db -->
<?php
	$objConn = mysqli_connect($host,$user,$pass,$database);
			   mysqli_set_charset($objConn,"utf8");
			   $sub2Name = 0;
			   $num = 0;
			   $num2 = 0;
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="assets/bootstrap-3.3.1/css/bootstrap.min.css">

<title>LIST FILE+TABLE</title>
</head>

<body>
	<div class="container">
		<div class="row">
        <div class="col-xs-12"><br><img src="assets/img/Logo.png"></div>
		</div>
		<div class="row">
		       	<div class="col-xs-12"><hr></div>
		</div>

		<div class="row">
			<div class="col-xs-12">
			<?php
					$sqlMainName = "SELECT * FROM main_folder";
					$queryMainName = mysqli_query($objConn,$sqlMainName);
					echo '<br><table width="200" border="1" class="table table-hover table-bordered">';
					echo '<tr>
					    <td width="5%">&nbsp;</td>
					    <td width="5%"><center><label>รหัส</label></center></td>
					    
					    <td width="41%"><center><label>ชื่อกระดาษทำการ</label></center></td>
					    <td colspan="2"><center><label>THAI</label></center></td>
					    <td colspan="2"><center><label>ENG</label></center></td>
					    <td><center><label>NOTE</label></center></td>
					 </tr>';
					 echo '<tr>
						    <td>&nbsp;</td>
						    <td>&nbsp;</td>
						    <td>&nbsp;</td>
						    
						    <td width="8%"><center>PDF</center></td>
						    <td width="8%"><center>Office</center></td>
						    <td width="8%"><center>PDF</center></td>
						    <td width="8%"><center>Office</center></td>
						    <td>&nbsp;</td>
						    </tr>';
					while ($arrMainName =  mysqli_fetch_array($queryMainName)) 
					{
						echo '<tr>';
						echo '<td>&nbsp;</td>';
   									echo  '<th colspan="7">';
   									echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';echo $arrMainName['name'];
   									 echo '</th>';   //ภึงตรงนี้
    					echo '</tr>';

						$mainId = $arrMainName['id'];
						$sqlSubName = "SELECT * FROM sub_folder WHERE main_id = $mainId";
						$querySubName =  mysqli_query($objConn,$sqlSubName);
						
						while ($arrSubName =  mysqli_fetch_array($querySubName)) 
						{
							echo '<tr>';
								echo '<td>&nbsp;</td>
								<td>&nbsp;</td>';
								echo '<td>'; echo  $arrSubName['sub_name']; echo '</td>';

							$subId = $arrSubName['sub_id'];
							$sqlFile = "SELECT * FROM file WHERE sub_id = $subId ORDER BY file.sub2_id ASC"; 
							$queryFile = mysqli_query($objConn,$sqlFile);
							while ($arrFile = mysqli_fetch_array($queryFile)) 
							{
								if($arrFile['sub2_id'] == 0)
								{
									
									echo '<td>';echo'<center>'; echo "<a href = ".$arrFile['path_file']."> view </a>"; echo'</center>';  echo '</td>';
									$num++;
									if($num>3)
										{
											echo '<td><center>
												<button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>
												<button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button>
								                </center></td>';
											$num = 0;
										} 
								}   

								elseif ($arrFile['sub2_id'] > 0) 
								{  
									$sqlSub2Name = "SELECT * FROM sub_lv2 WHERE sub_id = $subId";
									$querySub2Name = mysqli_query($objConn,$sqlSub2Name);
									
									while ($arrSub2Name = mysqli_fetch_array($querySub2Name )) 
									{ 
 
										 
										if(strcmp($sub2Name,$arrSub2Name['sub2_name'])!=0)
										{
										echo '<tr>	
												<td>&nbsp;</td>
												<td>&nbsp;</td>';

										 echo '<td>'; echo '--->'.$arrSub2Name['sub2_name']; echo '</td>';
										 

										 $sub2Name =  $arrSub2Name['sub2_name'];										
										}
											echo'<td>';echo'<center>'; echo "<a  href = ".$arrFile['path_file']."> view </a>";echo'</center>'; echo'</td>';

											$num2++;
											//new position
											if($num2>3)
											{
												//echo'<td>&nbsp;ทดสอบที่วางปุ่ม2</td>'; 
												echo'<td><center>
												<button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>
												<button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button>
								                </center></td>';
												
												$num2 = 0;
											} 

									}
									
								}   

   
							}   //echo'<td>&nbsp;ทดสอบที่วางปุ่ม2</td>';
								echo   '</tr>';
						 	

                         echo '</tr>';

						}
					}
					echo "</table>";
			?>
			</div><!-- .div class="col-md-12" -->
		</div><!-- .row -->
   
    
	</div><!-- .div containner -->
<?php mysqli_close($objConn);?>
<script src="assets/jquery.min.js"></script>
<script src="assets/bootstrap-3.3.1/js/bootstrap.min.js"></script>

<!-- เหลือการเเรียงลำดับไฟล์  และ หากไม่มีไฟล์ทำอย่างไรให้แสดงผลออกมาได้-->


<!--Modal Delete Main-->
<!--End Modal Delete Main-->

<!--Modal Delete Sub-->
<!--End Modal Delete Sub-->

<!--Modal Delete Sub2-->
<!--End Modal Delete Sub2-->
</body>
</html>


