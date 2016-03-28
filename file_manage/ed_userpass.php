<?php
  @session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: Edit Password ::.</title>
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
    <script language="javascript">
      function fncSubmit()
      {
        if(document.form1.txtUser.value == "")
        {
         	alert('กรุณากรอกชื่ผู้ใช้');
         	document.form1.txtUser.focus();
         	return false;
        }
        else if(document.form1.txtUser.value.length < 6)
        {
        	alert('กรุณากรอกชื่อผู้ใช้ไม่น้อยกว่า 6 ตัวอักษร');
         	document.form1.txtUser.focus();    
         	return false;
        }

        if(document.form1.txtPassword.value == "")
        {
         	alert('กรุณากรอกรหัสผ่าน');
        	document.form1.txtPassword.focus();    
        	return false;
        }
        else if(document.form1.txtPassword.value.length < 6)
        {
        	alert('กรุณากรอกรหัสผ่านไม่น้อยกว่า 6 ตัวอักษร');
         	document.form1.txtPassword.focus();    
         	return false;
        }

        if(document.form1.txtPassword.value != document.form1.txtConpassword.value)
        {
        	alert('กรุณากรอกรหัสผ่านไห้ตรงกัน');
         	return false;
        }
        document.form1.submit();
      }
    </script>
</head>
<body id="top">	
<?php
	if(isset($_SESSION['user']))
	{	
		include_once('inc/config.php');
		include_once('inc/connect.php');
		$sqli = ("SELECT * FROM employee INNER JOIN user ON employee.employee_worker_id=user.fkey_worker_id WHERE fkey_worker_id = '".$_SESSION['login']."'");
		$resulti = $conn->query($sqli);
		$rowi = $resulti->fetch_assoc();
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
								<form class="form-horizontal" name="form1" action='sc_updateuser.php' method="POST" onSubmit="JavaScript:return fncSubmit();">
								<div class="panel panel-red">
									<div class="panel-heading">
										<h3 class="panel-title"><span class="fa fa-edit"></span> &nbsp;&nbsp;แก้ไขรหัสผ่าน</h3>
									</div>
									<br></br>
									<?php //echo ($_SESSION['login']); ?>
									<!-- username -->
									<div class="row">	
										<div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label"><span style="color:red"> * </span>Username : </label> 
											         <div class="col-md-4">
        												<input type="text" id="txtUser" name="txtUser" class="form-control" value="<?php echo("$rowi[email]");?>" readonly/> 
        											</div>
                                            </div>
										</div>
									</div>

									<!-- password -->
									<div class="row">	
										<div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label"><span style="color:red"> * </span>Password : </label>
    											     <div class="col-md-4">
        												<input type="password" id="txtPassword" name="txtPassword" class="form-control" onKeyPress="return KeyCode(txtPassword)" required/><span style="color:red"> *Password ควรมีความยาวไม่น้อยกว่า 6 ตัวอักษร </span>
        											</div>
                                            </div>
										</div>
									</div>

									<!-- confirm password -->
									<div class="row">	
										<div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label"><span style="color:red"> * </span>Confirm Password : </label>
        											<div class="col-md-4">
        												<input type="password" id="txtConpassword" name="txtConpassword" class="form-control" onKeyPress="return KeyCode(txtConpassword)" required/>
        											</div>
                                            </div>
										</div>
									</div>
									
									<div class="modal-footer">
										<center>
											<input type="submit" class="btn btn-green" name="Submit" value="บันทึก"/>
											<input type="reset" class="btn btn-yellow" value="ล้างข้อมูล"/>
										</center>
									</div>
								</div><!-- /panel panel-info -->
								</form>

                            </div>
						</div><!-- /.row -->							
					</div>	
					<!-- row mbl -->										
				</div>
				<!-- content -->
	        <?php include_once('inc/footer.php');  ?>
			</div>
			<!-- /#page-wrapper -->
		</div>
		<!-- /#wrapper -->
	</div>

	<?php $conn->close(); ?>

    <script type="text/javascript">
    function KeyCode(objId)
    {
        if (event.keyCode >= 48 && event.keyCode<=57 || event.keyCode>=97 && event.keyCode<=122) //48-57(ตัวเลข) ,65-90(Eng ตัวพิมพ์ใหญ่ ) ,97-122(Eng ตัวพิมพ์เล็ก)
        {
            return true;
        }
        else
        {
            alert("กรอกได้เฉพาะ a-z และ A-Z และ 0-9");
            return false;
        }
    }
    </script>

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


<?php 
	} 
	else
	{
		header("Location: ../index.html");
	}
?>

</body>
</html>