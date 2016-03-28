<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
include_once('inc/config.php');
include_once('inc/connect.php');
$cusnew = $_GET['cusnew'];

$sql=("SELECT * FROM customer_gen LEFT OUTER JOIN customer ON customer_gen.fk_customer_tax_id=customer.customer_tax_id WHERE customer_gen.n_customer_id = $_GET[cusnew]");
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<input name="txtCompany" class="form-control input-sm" value="<?php echo $row['customer_company']; ?>" readonly/>
<input type="hidden" name="txtCompany"/> 

<?php
$conn->close();
?>
</body>
</html>