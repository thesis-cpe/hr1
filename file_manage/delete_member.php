<?php

include('config.php');
$pdo = connect();
// deleting a member using PDO with try/catch to escape the exceptions
try 
{
	$sql = "DELETE FROM coast_work WHERE fk_n_customer_id=:fk_n_customer_id AND fk_employee_worker_id=:fk_employee_worker_id";
	$query = $pdo->prepare($sql);
	$query->bindParam(':fk_employee_worker_id', $_POST['fk_employee_worker_id'], PDO::PARAM_STR);
	$query->bindParam(':fk_n_customer_id', $_POST['fk_n_customer_id'], PDO::PARAM_STR);
	$query->execute();
} 
catch (PDOException $e) 
{
	echo 'PDOException : '.  $e->getMessage();
}

// list_members : this file displays the list of members in a table view
include('list_members.php');

?>