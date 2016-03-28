<?php

include('config.php');
$pdo = connect();
// deleting a member using PDO with try/catch to escape the exceptions
try 
{
	$sql = "DELETE FROM signatory_customer WHERE signatory_id = :signatory_id";
	$query = $pdo->prepare($sql);
	$query->bindParam(':signatory_id', $_POST['signatory_id'], PDO::PARAM_INT);
	$query->execute();
} 
catch (PDOException $e) 
{
	echo 'PDOException : '.  $e->getMessage();
}

// list_members : this file displays the list of members in a table view
include('list_signatory.php');
?>