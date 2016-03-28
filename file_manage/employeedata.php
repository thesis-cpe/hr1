<?php
  @session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: Employee Data ::.</title>
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

<!--<script language="javascript">
var then,now=new Date();
function stopclk()
{
    then=new Date();
    alert('หน้านี้ใช้เวลาในการ LOAD ทั้งสิ้น '+((then-now)/1000)+' วินาที');
}

window.onload=function()
{
    stopclk();
}
</script>-->

</head>
<body>
<?php
	if(isset($_SESSION['user']) )
	{	
		if($_SESSION['status']=="ADMIN")
		{
		include_once('inc/config.php');
		include_once('inc/connect.php');
				
		if(@$_GET['view']==NULL)
		{
			$sql = ("SELECT * FROM employee ORDER BY employee_worker_id ASC");
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
		}
		else
		{
			$sql = ("SELECT * FROM employee ORDER BY $_GET[view]");
			$result = $conn->query($sql);
			$row = $result->fetch_assoc(); 
		}
?>
	<div>
        <div id="wrapper">
            <?php include_once('inc/topbar.php'); ?>
            <?php include_once('inc/menu.php'); ?>
            <div id="page-wrapper">
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title"><h4>ข้อมูลพนักงาน&nbsp;&nbsp;</h4></div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li class="active">
                        	<input type="button" style="float:right;" class="btn btn-success btn-sm" onclick="window.location='employee.php'" value="เพิ่มพนักงาน"/>
                        	<!--<div class="btn-group">
								  <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown">
								    เรียงตาม... <span class="caret"></span>
								  </button>&nbsp;&nbsp;
								  <?php
									    $emd = ("employee_worker_id DESC");
									    $ema = ("employee_worker_id ASC");
									    $nad = ("employee_name DESC");
									    $naa = ("employee_name ASC");
									?>
								  <ul class="dropdown-menu" role="menu">

								    <li><a href="employeedata.php?view=<?php echo $emd; ?>">รหัสพนักงาน มากไปน้อยv</a></li>
								    <li><a href="employeedata.php?view=<?php echo $ema; ?>">รหัสพนักงาน น้อยไปมาก</a></li>
								    <li><a href="employeedata.php?view=<?php echo $nad; ?>">ชื่อ-นามสกุล มากไปน้อย</a></li>
								    <li><a href="employeedata.php?view=<?php echo $naa; ?>">ชื่อ-นามสกุล น้อยไปมาก</a></li>
								  </ul>
							</div>-->
                        </li>
                    </ol><br>

                    <div class="clearfix"></div>
                </div>
                <?php include_once('inc/search.php'); ?>

                <div class="page-content">
                    <div id="sum_box" class="row mbl">
						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-red">
									<div class="panel-heading">
                                        <h1 class="panel-title"><span class="fa fa-users"></span> &nbsp;&nbsp;  ข้อมูลพนักงาน </h1>
                                    </div>

                                    <div class="table-responsive" id="list">

								</div>
								<!-- /#panel panel-info -->	
							</div>
						</div>
						<!-- /.row -->
					</div>
				</div>
			</div><!-- /#page-wrapper -->
			<?php include_once('inc/footer.php'); ?>
		</div><!-- /#wrapper -->
	</div>
	<?php
		}
		else
		{
			header("Location: profile.php");
		}

	$conn->close();?>

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

   	<script type="text/javascript">
	$("#list").load('search_employeedata.php',{ value : ""});  

	function search(){
	    $("#list").load('search_employeedata.php',{value : $("#search").val() }); 
	}
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
