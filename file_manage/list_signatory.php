
<div class="table-responsive">
<table class="table table-hover-color">
    <thead>
    <tr class="danger">
        <th>ผู้มีอำนาจลงนาม</th>
        <th>สถานะ</th>
        <th>ลบ</th>
    </tr>
    </thead>
    <?php
		// display the list of all members in table view
        $sql = "SELECT * FROM signatory_customer WHERE customer_tax_id=:txtNumtex ";
        $query = $pdo->prepare($sql);
        $query->bindParam(':txtNumtex', $_GET['cus_tax_id'], PDO::PARAM_STR);
        $query->execute();
        $list = $query->fetchALL();

//print_r($list);
//echo ($_GET['cus_tax_id']);
        foreach ($list as $rs) {
            ?>
            <tbody>
            <tr class="active">
                <td><?php echo ($rs['signatory_name']); ?></td>
                <td><?php echo ($rs['signatory_status']); ?></td>
                <td><a href="#" class="delete_m" onclick="delete_signatory(<?php echo ($rs['signatory_id']); ?>)"><img src="inc/remove.png"></a></td>
            </tr>
            </tbody>
            <?php
        }
        @header("Refresh: $_SERVER[PHP_SELF]");
    ?>
</table>
</div>