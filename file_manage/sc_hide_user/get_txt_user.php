<?php
  @session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
include_once('../inc/config.php');
include_once('../inc/connect.php');
@$pass_audit = $_GET['pass_audit'];
@$user = $_SESSION['login'];
//echo $pass_audit;

	 
	$sql = "SELECT * FROM coast_work WHERE fk_employee_worker_id = '$user' AND 	fk_n_customer_id = '$pass_audit'";
	$querSql = $conn->query($sql);
		 while($arrSql = $querSql->fetch_array())
		 {
			 $role = $arrSql['coast_work_role'];
		 }
	if($role == 0)
		 { ?>
			<input class="form-control input-sm" name="txtEmId" value="<?php echo $user;?>"/>
 <?php 	}
		elseif($role == 1)
		{   ?>
			<input class="form-control input-sm" name="txtEmId" value="<?php echo $user;?>" readonly/>
<?php 	}

$conn->close();
?>
</body>
</html>