<?php
header("Content-type: text/html; charset=utf-8");
header("Cache-Control: no-cache, must-revalidate");
// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=audit', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();

if(isset($_POST['keyword']))
{
	$keyword = '%'.$_POST['keyword'].'%';
	$sql = "SELECT * FROM customer WHERE customer_company LIKE (:keyword) ORDER BY customer_id ASC LIMIT 0, 10";
	$query = $pdo->prepare($sql);
	$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();
	foreach ($list as $rs) {
		// put in bold the written text
		$customer_company = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['customer_company']);
		// add new option
	    echo '<li onclick="set_item1(\''.str_replace("'", "\'", $rs['customer_company']).'\')">'.$customer_company.'</li>';
	}
}

if(isset($_GET['name']))
{
	$name = '%'.$_GET['name'].'%';
	//$name = $_GET['name'];
	$sqli = ("SELECT * FROM customer WHERE customer_company LIKE (:name)");
	$query = $pdo->prepare($sqli);
	$query->bindParam(':name', $name, PDO::PARAM_STR);
	$query->execute();
	$listt = $query->fetchALL();
	foreach ($listt as $ra) {
		echo $ra['customer_tax_id'];
	}
	
}

if(isset($_POST['num']))
{
	$num = '%'.$_POST['num'].'%';
	$sql = "SELECT * FROM employee WHERE employee_worker_id LIKE (:num) ORDER BY employee_worker_id ASC LIMIT 0, 10";
	$query = $pdo->prepare($sql);
	$query->bindParam(':num', $num, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();
	foreach ($list as $rs) {
		// put in bold the written text
		$employee_worker_id = str_replace($_POST['num'], '<b>'.$_POST['num'].'</b>', $rs['employee_worker_id']);
		// add new option
	    echo '<li onclick="set_item2(\''.str_replace("'", "\'", $rs['employee_worker_id']).'\')">'.$employee_worker_id.'</li>';
	}
}

if(isset($_POST['employee']))
{
	$employee = '%'.$_POST['employee'].'%';
	$sql = "SELECT * FROM employee WHERE employee_name LIKE (:employee) ORDER BY employee_worker_id ASC LIMIT 0, 10";
	$query = $pdo->prepare($sql);
	$query->bindParam(':employee', $employee, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();
	foreach ($list as $rs) {
		// put in bold the written text
		$employee_name = str_replace($_POST['employee'], '<b>'.$_POST['employee'].'</b>', $rs['employee_name']);
		// add new option
	    echo '<li onclick="set_item3(\''.str_replace("'", "\'", $rs['employee_name']), $rs['employee_lname'].'\')">'.$employee_name.'</li>';
	}
}




?>