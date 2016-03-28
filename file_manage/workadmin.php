<?php
  @session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: WorkAdmin Data ::.</title>
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

<!-- <script>
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
        xmlhttp.open("GET","autocompletesearch.php?cusnew="+str,true);
        xmlhttp.send();
    }
}
</script> -->

</head>
<body onLoad="return printDate()">
<?php
$time = date("d/m/Y");

	if(isset($_SESSION['user']) )
	{	
		if($_SESSION['status']=="ADMIN")
		{
		include_once('inc/config.php');
		include_once('inc/connect.php');
		
		if(@$_GET['view']==NULL)
		{
			$sql = ("SELECT * FROM customer_gen INNER JOIN customer ON customer_gen.fk_customer_tax_id=customer.customer_tax_id 
				ORDER BY customer_gen.n_customer_id DESC");
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
		}
		else
		{
			$sql = ("SELECT * FROM customer_gen INNER JOIN customer ON customer_gen.fk_customer_tax_id=customer.customer_tax_id 
				ORDER BY $_GET[view]");
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
                        <div class="page-title"><h4>ข้อมูลงานบัญชีและงานภาษี&nbsp;&nbsp;&nbsp;&nbsp;</h4></div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li class="active">
                        	<input type="button" style="float:right;" class="btn btn-success btn-sm" onclick="window.location='inwork_gen.php'" value="เพิ่มงานบัญชีและงานภาษี"/>
                        	<!--<div class="btn-group">
							  <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="false">
							    เรียงตาม... <span class="caret"></span>
							  </button>&nbsp;&nbsp;
							  <?php
							    	$cusd = ("customer_gen.n_customer_id DESC");
							    	$cusa = ("customer_gen.n_customer_id ASC");
							    	$namd = ("customer.customer_company DESC");
							    	$nama = ("customer.customer_company ASC");
							    	$close = ("customer_gen.check_close=1");
							    	$open = ("customer_gen.check_close=0");
							    ?>
							  <ul class="dropdown-menu" role="menu">
							    <li><a href="workadmin.php?view=<?php echo $cusd; ?>">รหัสงานบริษัท มากไปน้อย</a></li>
							    <li><a href="workadmin.php?view=<?php echo $cusa; ?>">รหัสงานบริษัท น้อยไปมาก</a></li>
							    <li><a href="workadmin.php?view=<?php echo $namd; ?>">ชื่อลูกค้า มากไปน้อย</a></li>
							    <li><a href="workadmin.php?view=<?php echo $nama; ?>">ชื่อลูกค้า น้อยไปมาก</a></li>
							    <li><a href="workadmin.php?view=<?php echo $open; ?>">ปิดโครงการ</a></li>
							    <li><a href="workadmin.php?view=<?php echo $close; ?>">เปิดโครงการ</a></li>
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
                                        <h1 class="panel-title"><span class="fa fa-bar-chart-o"></span> &nbsp;&nbsp; ข้อมูลงานบัญชีและงานภาษี </h1>
                                    </div>
									
									<div class="table-responsive" id="list">
										
								</div>
								<!-- /#panel panel-info -->	
							</div>
						</div>
						<!-- /.row -->
					</div>
					<!-- /.row mbl -->
				</div>
				<!-- content -->
			</div>
			<!-- /#page-wrapper -->
			<?php include_once('inc/footer.php'); ?>
		</div>
		<!-- /#wrapper -->
	</div>
	<?php
		}
		else
		{
			header("Location: workuser.php");
		}

	$conn->close(); ?>

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
    <script src="script/jquery.menu.js"></script>
    <script src="script/pace.min.js"></script>
    <script src="script/holder.js"></script>
    <script src="script/responsive-tabs.js"></script>
    <script src="script/index.js"></script>
    <!--CORE JAVASCRIPT-->
    <script src="script/main.js"></script>
    <script type="text/javascript" src="inc/bootstrap/js/scriptm.js"></script>
    <script src="script/jquery.min.js"></script>
	<script>
        $(document).ready(function(){
            $("#tag").autocomplete("autocompletesearch.php", {
            	selectFirst: true
            });
            //$( "#sub" ).
        });
    </script>

    <script type="text/javascript">
		function KeyCode(objId)
		{
			if (event.keyCode >= 48 && event.keyCode<=57) 

	//48-57(ตัวเลข) ,65-90(Eng ตัวพิมพ์ใหญ่ ) ,97-122(Eng ตัวพิมพ์เล็ก), 160-239(ภาษาไทย), 240-249(ตัวเลขไทย)

			{
				return true;
			}
			else
			{
				alert("กรอกได้เฉพาะ 0-9");
				return false;
			}
	    }
	</script>

	<script type="text/javascript">
		function KeyCodeTwo(objId)
		{
			if ((event.keyCode >= 48 && event.keyCode<=57) || (event.keyCode>=97 && event.keyCode<=122) || (event.keyCode>=65 && event.keyCode<=90)) 

	//48-57(ตัวเลข) ,65-90(Eng ตัวพิมพ์ใหญ่ ) ,97-122(Eng ตัวพิมพ์เล็ก), 160-239(ภาษาไทย), 240-249(ตัวเลขไทย)

			{
				return true;
			}
			else
			{
				alert("กรอกได้เฉพาะ 0-9 และ a-z และ A_Z เท่านั้น");
				return false;
			}
	    }
	</script>

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
    });
	</script>

	<script type="text/javascript">
	$("#list").load('search_workadmin.php',{ value : ""});  

	function search(){
	    $("#list").load('search_workadmin.php',{value : $("#search").val() }); 
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