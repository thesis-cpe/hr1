<?php

include('config.php');
$pdo = connect();
// deleting a member using PDO with try/catch to escape the exceptions
try 
{
	$sql = "DELETE FROM company_audit WHERE employee_work_id = :employee_work_id";
	$query = $pdo->prepare($sql);
	$query->bindParam(':employee_work_id', $_POST['employee_work_id'], PDO::PARAM_INT);
	$query->execute();
} 
catch (PDOException $e) 
{
	echo 'PDOException : '.  $e->getMessage();
}

// list_members : this file displays the list of members in a table view
include('list_audit_com.php');
?>