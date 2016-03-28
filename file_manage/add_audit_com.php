<?php

include('config.php');
$pdo = connect();
// adding new member using PDO with try/catch to escape the exceptions
try 
{
	$sql = "INSERT INTO company_audit (employee_work_id, company_tax_id) VALUES (:txtAudit, :txtTax)";
	$query = $pdo->prepare($sql);
	//$query->bindParam(':txtPer', $_POST['txtPer'], PDO::PARAM_STR);
	$query->bindParam(':txtAudit', $_POST['txtAudit'], PDO::PARAM_STR);
	$query->bindParam(':txtTax', $_POST['txtTax'], PDO::PARAM_STR);
	
	$query->execute();
} 
catch (PDOException $e) 
{
	echo 'PDOException : '.  $e->getMessage();
}

// list_members : this file displays the list of members in a table view
include('list_audit_com.php');
?>