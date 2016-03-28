<?php

include('config.php');
$pdo = connect();
// deleting a member using PDO with try/catch to escape the exceptions
try 
{
	$sql = "DELETE FROM signatory_company WHERE signatory_company_id = :signatory_company_id";
	$query = $pdo->prepare($sql);
	$query->bindParam(':signatory_company_id', $_POST['signatory_company_id'], PDO::PARAM_INT);
	$query->execute();
} 
catch (PDOException $e) 
{
	echo 'PDOException : '.  $e->getMessage();
}

// list_members : this file displays the list of members in a table view
include('list_signatory_com.php');
?>