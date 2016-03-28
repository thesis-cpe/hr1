<?php
  @session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: Customer Data ::.</title>
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

    <script type="text/javascript" src="script/jquery.min.js"></script>
	<script type="text/javascript" src="script/arrow79.js"></script>

<!-- <script language="javascript">
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
</script> -->

</head>
<body>
<?php
	if(isset($_SESSION['user']) )
	{	
		include_once('inc/config.php');
		include_once('inc/connect.php');
		
		if(@$_GET['view']==NULL)
		{
			$sql = ("SELECT * FROM customer ORDER BY customer_tax_id ASC");
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
		}
		else
		{
			$sql = ("SELECT * FROM customer ORDER BY $_GET[view]");
			$result = $conn->query($sql);
			$row = $result->fetch_assoc(); 
		}
?>
	<div>
        <div id="wrapper">
            <?php include_once('inc/topbar.php'); ?>
            <?php include_once('inc/menu.php'); ?>
            <div id="page-wrapper">
            	<?php if($_SESSION['status']=="ADMIN")
            	{ ?>
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title"><h4>ข้อมูลกิจการลูกค้า&nbsp;&nbsp;</h4></div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li class="active">
                        	<input type="button" style="float:right;" class="btn btn-success btn-sm" onclick="window.location='customer.php'" value="เพิ่มกิจการลูกค้า"/>

	                    	<!--<div class="btn-group">
							  <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="false">
							    เรียงตาม... <span class="caret"></span>
							  </button>&nbsp;&nbsp;
							  <?php
							    	$taxd = ("customer_tax_id DESC");
							    	$taxa = ("customer_tax_id ASC");
							    	$comd = ("customer_company DESC");
							    	$coma = ("customer_company ASC");
							    ?>
							  <ul class="dropdown-menu" role="menu">
							    <li><a href="customerdata.php?view=<?php echo $taxd; ?>">เลขประจำตัวผู้เสียภาษีอากร มากไปน้อยv</a></li>
							    <li><a href="customerdata.php?view=<?php echo $taxa; ?>">เลขประจำตัวผู้เสียภาษีอากร น้อยไปมาก</a></li>
							    <li><a href="customerdata.php?view=<?php echo $comd; ?>">ชื่อกิจการ มากไปน้อย</a></li>
							    <li><a href="customerdata.php?view=<?php echo $coma; ?>">ชื่อกิจการ น้อยไปมาก</a></li>
							  </ul>
							</div>-->
						</li>
                    </ol>
                	
                    <div class="clearfix"></div>
                </div>
                <?php }include_once('inc/search.php'); ?>

                <div class="page-content">
                    <div id="sum_box" class="row mbl">
						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-red">
									<div class="panel-heading">
                                        <h1 class="panel-title"><span class="fa fa-building-o"></span> &nbsp;&nbsp;  ข้อมูลกิจการลูกค้า </h1><br>
                                    </div>
									
									<div class="table-responsive" id="list">
									<!--<div id="list"></div>-->

								</div><!-- END panel panel-info -->
							</div><!-- END col-lg-12 -->
						</div><!-- END row -->
					</div><!-- END row mbl -->
				</div><!-- END CONTENT -->
			</div><!-- END page-wrapper -->
			<?php include_once('inc/footer.php'); ?>
		</div><!-- END wrapper -->
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

    <script src="dist/js/sb-admin-2.js"></script>

	<script type="text/javascript">
	$("#list").load('search_customerdata.php',{ value : ""});  

	function search(){
	    $("#list").load('search_customerdata.php',{value : $("#search").val() }); 
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
