
<div class="table-responsive" >
<table class="table table-hover-color">
<thead>
    <tr class="danger">
        <th>สถานะ</th>
        <th>รหัสพนักงาน</th>
        <th>ชื่อ - นามสกุล</th>
        <th>จำนวนชั่วโมง</th>
        <th>บาท/ชั่วโมง</th>
        <th>ลบ</th>
    </tr>
</thead>
    <?php
		// display the list of all members in table view
        $sql = "SELECT * FROM coast_work INNER JOIN employee ON coast_work.fk_employee_worker_id=employee.employee_worker_id WHERE coast_work.fk_n_customer_id=:cusnew";
        //'.$_GET[cusnew].'
        $query = $pdo->prepare($sql);
        $query->bindParam(':cusnew', $_GET['cusnew'], PDO::PARAM_STR);
        $query->execute();
        $list = $query->fetchAll();
        //print_r($list);
        //echo ("$_GET[cusnew]");
         
        foreach ($list as $rs) {
            ?><tbody>
            <tr class="active">
                <td><?php if($rs['coast_work_role']==0) {echo ("ผู้ทำบัญชี");}else{echo ("ผู้ปฏิบัติงาน");} ?></td>
                <td><?php echo $rs['fk_employee_worker_id']; ?></td>
                <td><?php echo $rs['employee_name'];?>   <?php echo $rs['employee_lname'];?></td>
                <td><?php echo $rs['coast_work_hour']; ?></td>
                <td><?php echo $rs['coast_work_bath']; ?></td>
                <td><a href="#" onclick="delete_member(<?php echo $rs['fk_employee_worker_id']; ?>,<?php echo $rs['fk_n_customer_id']; ?>);"><img src="inc/remove.png"></a></td>
                
            </tr>
        </tbody>
            <?php
        }
    ?>
    
</table>
</div>

