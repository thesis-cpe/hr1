<?php

include('config.php');
$pdo = connect();
// adding new member using PDO with try/catch to escape the exceptions
try 
{
	$sql = "INSERT INTO signatory_company (signatory_company_name, signatory_company_status, signatory_company_tax_id) VALUES (:txtPerson, :list2, :txtTax)";
	$query = $pdo->prepare($sql);
	$query->bindParam(':txtPerson', $_POST['txtPerson'], PDO::PARAM_STR);
	$query->bindParam(':list2', $_POST['list2'], PDO::PARAM_STR);
	$query->bindParam(':txtTax', $_POST['txtTax'], PDO::PARAM_STR);
	
	$query->execute();
} 
catch (PDOException $e) 
{
	echo 'PDOException : '.  $e->getMessage();
}

// list_members : this file displays the list of members in a table view
include('list_signatory_com.php');
?>