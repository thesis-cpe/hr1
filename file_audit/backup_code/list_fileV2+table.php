<?php require_once("connect_ new.php"); ?>
<!-- Connect Db -->
<?php
	$objConn = mysqli_connect($host,$user,$pass,$database);
			   mysqli_set_charset($objConn,"utf8");

			   $arrTypeSub = array();
			   $idxTypeSub = 0;
			   $arrTypeSub2 = array();
			   $idxTypeSub2 = 0;
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="assets/bootstrap-3.3.1/css/bootstrap.min.css">

<title>LIST FILE V2+TABLE</title>
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
			?>		
					<br><table width="200" border="1" class="table table-hover table-bordered">
					<tr>
					    <td width="5%">&nbsp;</td>
					    <td width="5%"><center><label>รหัส</label></center></td>
					    
					    <td width="41%"><center><label>ชื่อกระดาษทำการ</label></center></td>
					    <td colspan="2"><center><label>THAI</label></center></td>
					    <td colspan="2"><center><label>ENG</label></center></td>
					    <td><center><label>NOTE</label></center></td>
					 </tr>
					 <tr>
						    <td>&nbsp;</td>
						    <td>&nbsp;</td>
						    <td>&nbsp;</td>
						    
						    <td width="8%"><center>PDF</center></td>
						    <td width="8%"><center>Office</center></td>
						    <td width="8%"><center>PDF</center></td>
						    <td width="8%"><center>Office</center></td>
						    <td>&nbsp;</td>
					</tr>
				<?php   //php 2		    
				$sqlMain = "SELECT * FROM main_folder";
				$qryMain = mysqli_query($objConn,$sqlMain);
				/*วน While MAIN */
				while ($arrMain = mysqli_fetch_array($qryMain)) 
				{ ?>
					<tr> <!--ส่วน Main-->
						<td>&nbsp;</td>
						<th colspan="6"><?php echo $arrMain['name']; ?></th>
						<td><center>EDIT<?php echo $arrMain['id']; ?></center></td>

					</tr>
				<?php 
					$mainID = $arrMain['id'];
					/*ส่วน SUB_FOLDER*/
					$sqlSub = "SELECT * FROM sub_folder WHERE main_id = $mainID";
					$qrySub = mysqli_query($objConn,$sqlSub);
					/*วน While SUB*/
					while ($arrSub = mysqli_fetch_array($qrySub)) 
					{ ?>
					<tr> <!--Sub-->
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><?php echo "--->".$arrSub['sub_name']; ?></td>

					<?php	
						$subID = $arrSub['sub_id'];

						$sqlFileSub = "SELECT * FROM file WHERE sub_id = $subID  AND sub2_id = 0 ORDER BY type_file";
						$qryFileSub = mysqli_query($objConn,$sqlFileSub);
						//$fileSubRow = mysqli_num_rows($qryFileSub);
						
						while ($arrFileSub = mysqli_fetch_array($qryFileSub)) /*echo path file sub*/
						{
								$arrTypeSub[$idxTypeSub] = $arrFileSub['type_file']; 
								$idxTypeSub++;
							
						}/*.echo path file sub*/ 
						 
						 /*TYPE FILE SUB 1*/
						 if(in_array(1, $arrTypeSub)==1)
						 {
						 	$sqlTypeFileSub1 = "SELECT * FROM `file` WHERE sub_id = $subID  AND `sub2_id` = 0 AND `type_file` =1 ORDER BY `file_id`";
						 	$qrysqlTypeFileSub1 = mysqli_query($objConn,$sqlTypeFileSub1);
						 	while ($arrTypeFileSub1 = mysqli_fetch_array($qrysqlTypeFileSub1))
						 	{
						 			$typeFileSub1 = $arrTypeFileSub1['path_file'];
						 			
						 	}
						 }elseif (in_array(1, $arrTypeSub)!=1) { //กรณีไม่มี type file 1
						 	$typeFileSub1 = NULL;
						 }

						  /*TYPE FILE SUB 2*/
						 if(in_array(2, $arrTypeSub)==1)
						 {
						 	$sqlTypeFileSub2 = "SELECT * FROM `file` WHERE sub_id = $subID  AND `sub2_id` = 0 AND `type_file` =2 ORDER BY `file_id`";
						 	$qrysqlTypeFileSub2 = mysqli_query($objConn,$sqlTypeFileSub2);
						 	while ($arrTypeFileSub2 = mysqli_fetch_array($qrysqlTypeFileSub2))
						 	{
						 			$typeFileSub2 = $arrTypeFileSub2['path_file'];
						 			
						 	}
						 }elseif (in_array(2, $arrTypeSub)!=1) { //กรณีไม่มี type file 2
						 	$typeFileSub2 = NULL;
						 }

						  /*TYPE FILE SUB 3*/
						 if(in_array(3, $arrTypeSub)==1)
						 {
						 	$sqlTypeFileSub3 = "SELECT * FROM `file` WHERE sub_id = $subID  AND `sub2_id` = 0 AND `type_file` =3 ORDER BY `file_id`";
						 	$qrysqlTypeFileSub3 = mysqli_query($objConn,$sqlTypeFileSub3);
						 	while ($arrTypeFileSub3 = mysqli_fetch_array($qrysqlTypeFileSub3))
						 	{
						 			$typeFileSub3 = $arrTypeFileSub3['path_file'];
						 			
						 	}
						 }elseif (in_array(3, $arrTypeSub)!=1) { //กรณีไม่มี type file 3
						 	$typeFileSub3 = NULL;
						 }

						  /*TYPE FILE SUB 4*/
						 if(in_array(4, $arrTypeSub)==1)
						 {
						 	$sqlTypeFileSub4 = "SELECT * FROM `file` WHERE sub_id = $subID  AND `sub2_id` = 0 AND `type_file` =4 ORDER BY `file_id`";
						 	$qrysqlTypeFileSub4 = mysqli_query($objConn,$sqlTypeFileSub4);
						 	while ($arrTypeFileSub4 = mysqli_fetch_array($qrysqlTypeFileSub4))
						 	{
						 			$typeFileSub4 = $arrTypeFileSub4['path_file'];
						 			
						 	}
						 }elseif (in_array(4, $arrTypeSub)==NULL) { //กรณีไม่มี type file 3
						 	$typeFileSub4 = NULL;
						 	
						}
				//.php ?> 
						<!-- PRINT FILE TYPE1-->
						<?php
						if(isset($typeFileSub1))
						{
						?>
						<td>
							<center><a href="<?php echo $typeFileSub1; ?>">	P-T</a></center>
					    </td>
						<?php
					    }elseif($typeFileSub1==NULL){
						?>
						<td>
							<center>-</center>
					    </td>

				  <?php }?>

				 		 <!-- PRINT FILE TYPE2-->
						<?php
						if(isset($typeFileSub2))
						{
						?>
						<td>
							<center><a href="<?php echo $typeFileSub2; ?>">O-T</a></center>
						</td>	
						<?php
					    }elseif($typeFileSub2==NULL){
						?>
						<td>
							<center>-</center>
						</td>

				  <?php }?>
						
						 <!-- PRINT FILE TYPE3-->
						<?php
						if(isset($typeFileSub3))
						{
						?>
						<td>
						<center><a href="<?php echo $typeFileSub3; ?>">P-E</a></center>
					    </td>
						<?php
					    }elseif($typeFileSub3==NULL){
						?>
						<td>
						<center>-</center>
					    </td>

				  <?php }?>

				  		 <!-- PRINT FILE TYPE4-->
						<?php
						if(isset($typeFileSub4))
						{
						?>
						<td>
						<center><a href="<?php echo $typeFileSub4; ?>">	O-E</a></center>
						</td>
						<?php
					    }elseif($typeFileSub4==NULL){
						?>
						<td>
						<center>-</center>
						</td>
				 <?php }
				  		
				  		$typeFileSub1=NULL;
						$typeFileSub2=NULL;	
						$typeFileSub3=NULL;
						$typeFileSub4=NULL;
					?>
					<!--EDIT DELETE SUB-->
							<td>
								<center>
									<!--EDIT-->
									<button type="button" class="btn btn-warning btn-xs">
									<span class="glyphicon glyphicon-pencil"></span></button>
									<!--DELETE-->
									<a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='sc_listfile/del_file_sub_alert.php?SubID=<?php echo $subID; ?>';}">
									<button type="button" class="btn btn-warning btn-xs">
									<span class="glyphicon glyphicon-trash"></span></button>
									</a>
								</center>
							</td>

					

					<!--.EDIT DELETE SUB-->

					<!--.Sub-->
				</tr> <!--.tr SUB-->
	<?php  // php4
						/*ส่วน SUB2*/
						$sqlSub2 = "SELECT * FROM sub_lv2 WHERE sub_id = $subID";
						$qrySub2 = mysqli_query($objConn,$sqlSub2);
						while ($arrSub2 = mysqli_fetch_array($qrySub2)) /*วน while SUB2*/
						{

						?>
						 <tr>
						 	<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td><?php echo "-------->".$arrSub2['sub2_name']; ?></td> <!--SUB 2 NAME-->
	<?php

							$sub2IdFromSub2 = $arrSub2['sub2_id'];

							$sqlFileSub2 ="SELECT * FROM file WHERE sub2_id = $sub2IdFromSub2  ORDER BY file.type_file ASC";
							$qrysqlFileSub2 = mysqli_query($objConn,$sqlFileSub2);
							while($arrFileSub2 = mysqli_fetch_array($qrysqlFileSub2))
							{
								$arrTypeSub2[$idxTypeSub2] = $arrFileSub2['type_file']; 
								$idxTypeSub2++;

							}//.while($arrFileSub2

							/*TYPE FILE SUB 21*/
						if(in_array(1, $arrTypeSub2)==1)
						 {
						 	$sqlTypeFileSub21 = "SELECT * FROM `file` WHERE sub2_id = $sub2IdFromSub2 AND `type_file` =1 ORDER BY `file_id`";
						 	$qrysqlTypeFileSub21 = mysqli_query($objConn,$sqlTypeFileSub21);
						 	while ($arrTypeFileSub21 = mysqli_fetch_array($qrysqlTypeFileSub21))
						 	{
						 			$typeFileSub21 = $arrTypeFileSub21['path_file'];
						 			
						 	}
						 }
						 elseif (in_array(1, $arrTypeSub2)!=1) { //กรณีไม่มี type file 1
						 	$typeFileSub21 = NULL;
						 }
							 /*TYPE FILE SUB 22*/
						if(in_array(2, $arrTypeSub2)==1)
						 {
						 	$sqlTypeFileSub22 = "SELECT * FROM `file` WHERE sub2_id = $sub2IdFromSub2 AND `type_file` =2 ORDER BY `file_id`";
						 	$qrysqlTypeFileSub22 = mysqli_query($objConn,$sqlTypeFileSub22);
						 	while ($arrTypeFileSub22 = mysqli_fetch_array($qrysqlTypeFileSub22))
						 	{
						 			$typeFileSub22 = $arrTypeFileSub22['path_file'];
						 			
						 	}
						 }
						 elseif (in_array(2, $arrTypeSub2)!=1) { //กรณีไม่มี type file 1
						 	$typeFileSub22 = NULL;
						 }

						 /*TYPE FILE SUB 23*/
						if(in_array(3, $arrTypeSub2)==1)
						 {
						 	$sqlTypeFileSub23 = "SELECT * FROM `file` WHERE sub2_id = $sub2IdFromSub2 AND `type_file` =3 ORDER BY `file_id`";
						 	$qrysqlTypeFileSub23 = mysqli_query($objConn,$sqlTypeFileSub23);
						 	while ($arrTypeFileSub23 = mysqli_fetch_array($qrysqlTypeFileSub23))
						 	{
						 			$typeFileSub23 = $arrTypeFileSub23['path_file'];
						 			
						 	}
						 }
						 elseif (in_array(3, $arrTypeSub2)!=1) { //กรณีไม่มี type file 1
						 	$typeFileSub23 = NULL;
						 }
						 /*TYPE FILE SUB 24*/
						if(in_array(4, $arrTypeSub2)==1)
						 {
						 	$sqlTypeFileSub24 = "SELECT * FROM `file` WHERE sub2_id = $sub2IdFromSub2 AND `type_file` =4 ORDER BY `file_id`";
						 	$qrysqlTypeFileSub24 = mysqli_query($objConn,$sqlTypeFileSub24);
						 	while ($arrTypeFileSub24 = mysqli_fetch_array($qrysqlTypeFileSub24))
						 	{
						 			$typeFileSub24 = $arrTypeFileSub24['path_file'];
						 			
						 	}
						 }
						elseif (in_array(4, $arrTypeSub2)!=1) { //กรณีไม่มี type file 1
						 	$typeFileSub24 = NULL;
						} ?>

						<!-- PRINT FILE TYPE21-->
						<?php
						if(isset($typeFileSub21))
						{
						?>
						<td>
							<center><a href="<?php echo $typeFileSub21; ?>">P-T</a></center>
					   </td>
						<?php
					    }elseif($typeFileSub21==NULL){
						?>
						<td>
							<center>-</center>
						</td>
				
				  <?php }?>
				  <!-- PRINT FILE TYPE22-->
						<?php
						if(isset($typeFileSub22))
						{
						?>
						<td>
							<center><a href="<?php echo $typeFileSub22; ?>">O-T</a></center>
						</td>	
						<?php
					    }elseif($typeFileSub22==NULL){
						?>
						<td>
							<center>-</center>
						</td>
				
				  <?php }?>
					<!-- PRINT FILE TYPE23-->
						<?php
						if(isset($typeFileSub23))
						{
						?>
						<td>
							<center><a href="<?php echo $typeFileSub23; ?>">P-E</a></center>
						</td>	
						<?php
					    }elseif($typeFileSub23==NULL){
						?>
						<td>
							<center>-</center>
						</td>
				
				  <?php }?>

				  <!-- PRINT FILE TYPE24-->
						<?php
						if(isset($typeFileSub24))
						{
						?>
						<td>
							<center><a href="<?php echo $typeFileSub24; ?>">O-E</a></center>
						</td>
						<?php
					    }elseif($typeFileSub24==NULL){
						?>
						<td>
							<center>-</center>
						</td>
				
				  <?php }?>

				   <?php 
				  		
				  		$typeFileSub21=NULL;
						$typeFileSub22=NULL;	
						$typeFileSub23=NULL;
						$typeFileSub24=NULL;
					?>
					<!--EDIT DELETE SUB2-->
							<td>
								<center>
									<!--EDIT-->
									<button type="button" class="btn btn-danger btn-xs">
									<span class="glyphicon glyphicon-pencil"></span></button>

									<a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='sc_listfile/del_file_sub2_alert.php?Sub2ID=<?php echo $sub2IdFromSub2; ?>';}">
									<button type="button" class="btn btn-danger btn-xs">
									<span class="glyphicon glyphicon-trash"></span></button>
									</a>
								</center>
							</td>

					<!--.EDIT DELETE SUB2-->

                   </tr>  <!--.tr sub2-->


					<?php }/*.วน while SUB2*/
						

						

						/*.ส่วน SUB2*/

					}/*.วน While SUB*/

					/*.ส่วน SUB_FOLDER*/


				}/*.while MAIN*/
 			

				// .php4?>
			</table>
			</div><!-- .div class="col-md-12" -->
		</div><!-- .row -->
   
    
	</div><!-- .div containner -->
<?php mysqli_close($objConn);?>
<script src="assets/jquery.min.js"></script>
<script src="assets/bootstrap-3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
