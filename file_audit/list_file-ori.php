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

<title>LIST FILE V2+EDIT+DEL</title>
</head>

<body>

	<!--NAVBAR-->
    <nav class="navbar navbar-default">
<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">file audit</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     
     
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown"> <!--จัดการหมวด-->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">จัดการรายการ <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="create_main_folder.php">สร้างหมวด</a></li>
            <li><a href="create_sub_folder.php">สร้างหัวข้อหลัก</a></li>
            <li><a href="sub_lv2.php">สร้างหัวข้อย่อย</a></li>
            <!--<li class="divider"></li>
            <li><a href="#">Separated link</a></li>  -->
          </ul>
        </li>
         <li class="dropdown"> <!--อัพโหลดไฟล์-->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">อัพโหลดไฟล์ <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="upload_form.php">อัพโหลดไฟล์ลงหัวข้อหลัก</a></li>
            <li><a href="up_s_lv2.php">อัพโหลดไฟล์ลงหัวข้อย่อย</a></li>
            
            <!--<li class="divider"></li>
            <li><a href="#">Separated link</a></li>  -->
          </ul>
        </li>
        <li  class="active"><a href="list_file.php">รายการไฟล์</a></li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  
  <!--.NAVBAR-->

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
					    <td width="5%"><center><label>ลำดับ</label></center></td>
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
				$sqlMain = "SELECT * FROM main_folder ORDER BY idx ASC";
				$qryMain = mysqli_query($objConn,$sqlMain);
				/*วน While MAIN */
				while ($arrMain = mysqli_fetch_array($qryMain)) 
				{ ?>
					<tr> <!--ส่วน Main-->
						<th>
							<center>
								<a class="btn btn-info btn-xs" data-toggle="modal" data-target="#btnEditIdx<?php echo $arrMain['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
								<?php echo $arrMain['idx']; ?>
								
							</center>
						</th>
						<!--MODAL IDX-->
					<form action="sc_listfile/sc_edit_idx.php" method="POST">

								<div class="modal fade" id="btnEditIdx<?php echo $arrMain['id']; ?>">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title">แก้ไขลำดับ</h4>
						      </div>
						      <div class="modal-body">
						      	 <div class="row">
							        <div class="col-md-3"><label>ลำดับเดิม</label></div>
							        <div class="col-md-6"><label><?php echo $arrMain['idx'];?></label></div>
							        <input type="hidden" name="hdfID" value="<?php echo $arrMain['id']; ?>"/>
							    </div>
							    <div class="row">
							        <br><div class="col-md-3"><label>ลำดับใหม่</label></div>
							        <div class="col-md-4"><input class="form-control input-sm" type="number" placeholder=ตัวเลข name="txtIdx"/></div>
							    </div>
						             
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        <button type="submit" class="btn btn-primary">เปลี่ยนลำดับ</button>
						      </div>
						    </div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->
						</div><!-- /.modal --> 
					</form>
						<!--.MODAL IDX-->
						<th colspan="6"><?php echo $arrMain['name']; ?></th>
						<?php $idFromMain = $arrMain['id']; ?>
						<!--EDiT MAIN-->
							<td>
									<center>
										<!--RENAME-->
										<a href="JavaScript:if(confirm('Confirm Rename?')==true){window.location='sc_edit_listfile/edit_main.php?idFromMain=<?php echo $idFromMain;?>';}">
										<button type="button" class="btn btn-info btn-xs">
											<span class="glyphicon glyphicon-pencil"></span>
										</button>
										</a>
										<!--.RENAME-->

										<!--DELETE-->
										  <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='sc_listfile/del_file_main_alert.php?idFromMain=<?php echo $idFromMain; ?>';}">
											<button type="button" class="btn btn-info btn-xs">
										<span class="glyphicon glyphicon-trash"></span></button>
											</a>
									</center>
							</td>
						<!--.EDiT MAIN-->

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
									

									<a href="JavaScript:if(confirm('Confirm Rename?')==true){window.location='sc_edit_listfile/edit_sub_name.php?SubID=<?php echo $subID; ?>';}">
									<button type="button" class="btn btn-warning btn-xs">
									<span class="glyphicon glyphicon-pencil"></span></button>
									</a>




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
									<a href="JavaScript:if(confirm('Confirm Rename?')==true){window.location='sc_edit_listfile/edit_sub2name.php?Sub2ID=<?php echo $sub2IdFromSub2; ?>';}">
									<button type="button" class="btn btn-danger btn-xs">
									<span class="glyphicon glyphicon-pencil"></span></button>
									</a>
						
								
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
