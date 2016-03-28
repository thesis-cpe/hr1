<?php
	@session_start();
	include_once('inc/config.php');
	include_once('inc/connect.php');
	//include('session.php');

    @$value=$_POST["value"];

    if($value=="")
    {
        //echo "NULL";
        $sql = "SELECT * FROM employee ORDER BY employee_name ASC";
    }
    else
    {
        //echo "NOT NULL";
        $sql = "SELECT * FROM employee WHERE employee_name LIKE '%".$value."%'";
    }

        $result = $conn->query($sql);

        while($row = $result->fetch_array())
        {
?>
        <tr>
            <td><?php echo $row['employee_name']; ?>&nbsp;<?php echo $row['employee_lname']; ?></td>
            <td align="center"><?php echo $row['employee_worker_id']; ?></td>
        </tr>
<?php
        }
?>
	</div>    