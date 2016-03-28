
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
        $sql = "SELECT * FROM company_audit INNER JOIN employee ON company_audit.employee_work_id=employee.employee_worker_id WHERE company_audit.company_tax_id=:txtTax ";
        $query = $pdo->prepare($sql);
        $query->bindParam(':txtTax', $_GET['com_tax_id'], PDO::PARAM_STR);
        $query->execute();
        $list = $query->fetchALL();

//print_r($list);
//echo ($_GET['cus_tax_id']);
        foreach ($list as $rs) {
            ?>
            <tbody>
            <tr class="active">
                <td><?php echo ($rs['employee_work_id']); ?></td>
                <td><?php echo ($rs['employee_name']); ?>&nbsp;<?php echo ($rs['employee_lname']); ?></td>
                <td><a href="#" class="delete_m" onclick="delete_audit_com(<?php echo ($rs['employee_work_id']); ?>)"><img src="inc/remove.png"></a></td>
            </tr>
            </tbody>
            <?php
        }
        
    ?>
</table>