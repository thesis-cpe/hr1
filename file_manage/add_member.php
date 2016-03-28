<?php

include('config.php');
$pdo = connect();
// adding new member using PDO with try/catch to escape the exceptions
try 
{
	$sql = ("INSERT INTO coast_work (coast_work_role, coast_work_hour, coast_work_bath, fk_employee_worker_id, 
		fk_n_customer_id, fk_customer_tax_id) VALUES (:list2, :txtHour, :txtMoney, :txtNumaudit,
		 :txtNewcus, :txtOldcus)");

	$query = $pdo->prepare($sql);
	$query->bindParam(':txtNewcus', $_POST['txtNewcus'], PDO::PARAM_STR);
	$query->bindParam(':txtOldcus', $_POST['txtOldcus'], PDO::PARAM_STR);
	$query->bindParam(':list2', $_POST['list2'], PDO::PARAM_STR);
	$query->bindParam(':txtNumaudit', $_POST['txtNumaudit'], PDO::PARAM_STR);
	$query->bindParam(':txtHour', $_POST['txtHour'], PDO::PARAM_STR);
	$query->bindParam(':txtMoney', $_POST['txtMoney'], PDO::PARAM_STR);
	
	$query->execute();
} 
catch (PDOException $e) 
{
	echo 'PDOException : '.  $e->getMessage();
}

// list_members : this file displays the list of members in a table view
include('list_members.php');
?>