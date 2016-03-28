<?php
require_once("../connect_ new.php");
$objConn = mysqli_connect($host,$user,$pass,$database);
			mysqli_set_charset($objConn,"utf8");
$ID = $_GET["IDal"];


?>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DELETE FILE MAIN </title> <!--ลบแค่ file ใน sub-->
<link rel="stylesheet" href="../assets/bootstrap-3.3.1/css/bootstrap.min.css">
</head>
<body>

<?php
    
    if (isset($ID)) {
    	/*DELETE MAIN*/ 
    	$sqlMain = "DELETE FROM main_folder WHERE id = $ID";
    	$qrysqlMain = mysqli_query($objConn,$sqlMain);
		/*.DELETE MAIN*/

		/*DELETE SUB*/
		$sqlSub = "SELECT * FROM sub_folder WHERE main_id = $ID";
		$qrysqlSub  = mysqli_query($objConn,$sqlSub);
		$countSub = mysqli_num_rows($qrysqlSub);
		//echo "MAIN";
		if($countSub > 0)
		{  //echo "SUB";
			while ($arrSub = mysqli_fetch_array($qrysqlSub)) {
				$subId = $arrSub['sub_id'];

			/*DELETE SUB2*/
				$sqlSub2 = "SELECT * FROM sub_lv2 WHERE sub_id = $subId";
				$qrysqlSub2 = mysqli_query($objConn,$sqlSub2);
				$countSub2 = mysqli_num_rows($qrysqlSub2);
				if($countSub2>0)
				{
					$sqlDelSub2 = "DELETE FROM sub_lv2 WHERE sub_id = $subId";
					$qrysqlDelSub2 = mysqli_query($objConn,$sqlDelSub2);
				}
				$sqlDelSub = "DELETE FROM sub_folder WHERE main_id = $ID";
				$qrysqlDelSub = mysqli_query($objConn,$sqlDelSub);

				//echo "SUB2";
			/*.DELETE SUB2*/

			}
			


			
		}
		/*.DELETE SUB*/
			/*DLETE FILE*/
			$sqlFile = "SELECT * FROM file WHERE main_id = $ID";
			$qrysqlFile = mysqli_query($objConn,$sqlFile);
			$countFile = mysqli_num_rows($qrysqlFile);
			if($countFile>1)
			{
				$sqlDelFile = "DELETE FROM file WHERE main_id = $ID";
		 		$qrysqlDelFile = mysqli_query($objConn,$sqlDelFile);
			 	while ($arrFile = mysqli_fetch_array($qrysqlDelFile))
		 					{
		 						$file = "../".$arrFile['path_file'];
								unlink($file);	
		 					}
			}
			/*.DLETE FILE*/		


    }
    
	header("Location: ../list_file.php");
	die();
     

 


?>
<script src="../assets/jquery.min.js"></script>
<script src="../assets/bootstrap-3.3.1/js/bootstrap.min.js"></script>
</body>
</html>

<?php mysqli_close($objConn); ?>
