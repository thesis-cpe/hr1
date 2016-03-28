<?php
  @session_start(); 
include_once('../inc/config.php');
include_once('../inc/connect.php');

@$company_name = $_GET['company_name'];
@$cus_tax_id = $_GET['cus_tax_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: รายการเอกสาร ::.</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../sb-admin/startbootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../sb-admin/startbootstrap/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
	
	

</head>
<body>
<?php
    if(isset($_SESSION['user']))
    {
        include_once('../inc/config.php');
        include_once('../inc/connect.php');
		$session_login = $_SESSION['login'];
?>
    <div> 
        <div id="wrapper">
            <?php include_once('../sc_browse_data/inc/topbar.php'); ?>
            <?php include_once('../sc_browse_data/inc/menu.php'); ?>
            <div id="page-wrapper">
                <div class="page-content">
                    <div id="sum_box" class="row">
                        <div class="col-lg-12">
							<div class="panel panel-violet">
								<div class="panel-heading">
									<h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;รายการไฟล์เอกสารของรหัสลูกค้า <?php echo $cus_tax_id;  echo "&nbsp".$company_name;?></h3>
								</div>
								
								<div class="panel-body">
								<!--CODE-->
									<div class="table-responsive">
										<table class="table table-hover-color">
											<tr class="danger">
												<th>วันที่นำเข้า</th>
												<th>ผู้นำเข้า</th>
												<th>ชื่อเอกสาร</th>
												<th>ดาวโหลด</th>
												<th>ลบไฟล์</th>
												
											</tr>
									<?php
										$sqlSelDocCus = "SELECT * FROM file_customer WHERE customer = '$cus_tax_id'";
										$querySqlSelDocCus = $conn->query($sqlSelDocCus);
										while($arrSqlSelDoc = $querySqlSelDocCus->fetch_array())
										{
										?>			
											<tr>
												<td><?php echo $arrSqlSelDoc['date'];?></td>
												<td><?php echo $arrSqlSelDoc['upload_who'];?></td>
												<td><?php echo $arrSqlSelDoc['name'];?></td>
												<td>
													<a href="<?php echo "../".$arrSqlSelDoc['path'];?>" title="ดาวโหลดเอกสาร" target="_blank"><button class="btn btn-sm btn-success"><span class="glyphicon glyphicon-download-alt"></span></button></a>
												</td>
												<td>
													<a title="ลบไฟล์เอกสาร" class="btn btn-sm btn-red" data-toggle="modal" data-target="#delFile<?php echo $arrSqlSelDoc['id'];?>"><span class="fa fa-trash-o"></span></a>
												</td>
											
												<!--MODAL DELETE-->
												<form action="del_file_doc.php" method="post">
													<div class="modal fade" id="delFile<?php echo $arrSqlSelDoc['id']; ?>">
													  	<div class="modal-dialog">
													  		<div class="panel panel-violet">
																<div class="modal-content">
														  			<div class="modal-header">
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																		<h3 class="modal-title">ลบไฟล์</h3>
														  			</div>
														  
														  			<div class="modal-body">
																		<font color="red">ต้องการลบไฟล์? : <?php echo $arrSqlSelDoc['name']; ?></font>
																		<input type="hidden" name="hdfFileId" value="<?php echo $arrSqlSelDoc['id']; ?>"/>
																		<input type="hidden" name="hdfFilePath" value="<?php echo "../".$arrSqlSelDoc['path']; ?>"/>
																		<input type="hidden" name="hdfCusId" value="<?php echo $cus_tax_id;  ?>"/>
																		<input type="hidden" name="hdfComName" value="<?php echo $company_name;  ?>"/>
														  			</div>
														  
														  			<div class="modal-footer">
																		<button type="button" class="btn btn-green" data-dismiss="modal">ปิด</button>
																		<button type="submit" class="btn btn-red">ลบ</button>
														  			</div>
																</div><!-- /.modal-content -->
															</div>
													  	</div><!-- /.modal-dialog -->
													</div><!-- /.modal -->
												</form>
												<!--.MODAL DELETE-->
											</tr>
								  <?php }?>	
										</table>
									</div>
								<!--.CODE-->
									<hr>
									<center><a href="../customerdata.php"><button class="btn btn-md btn-green">กลับไปก่อนหน้า</button></a></center>
								</div>
							</div>
						</div>
                    </div>
                    <!-- row mbl -->
                </div>
                <!-- /.content -->
                <?php include_once('../sc_browse_data/inc/footer.php'); ?>
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
    </div>
<?php $conn->close(); ?>

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

<?php 
    } 
    else
    {
        header("Location: ../index.html");
    }
?>
    
</body>
</html>