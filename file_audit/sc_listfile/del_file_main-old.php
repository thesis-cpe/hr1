<?php
require_once("../connect_ new.php");
$objConn = mysqli_connect($host,$user,$pass,$database);
			mysqli_set_charset($objConn,"utf8");
$ID = $_GET["IDal"];


?>

<html>
<head>
<title>DELETE FILE SUB </title> <!--ลบแค่ file ใน sub-->
<link rel="stylesheet" href="../assets/bootstrap-3.3.1/css/bootstrap.min.css">
</head>
<body>

<?php
     

     $sqlMain = "SELECT * FROM main_folder WHERE id = $ID";
     $qrysqlMain = mysqli_query($objConn,$sqlMain);
     $sqlSub = "SELECT * FROM sub_folder WHERE main_id = $ID";
     $qrysqlSub = mysqli_query($objConn,$sqlSub);
     if(isset($ID))
 	{ 
     while($arrMain = mysqli_fetch_array($qrysqlMain))
     {  
 		$subId = $arrSub['sub_id']; 
 		$sqlSub2 = "SELECT * FROM sub_lv2 WHERE sub_id = $subId";
 		$qrysqlSub2 = mysqli_query($objConn,$sqlSub2);
 		
 		if(mysqli_num_rows($qrysqlSub2) > 0)/*ถ้ามี sub2 ให้ลบ sub 2 ออกจาก db*/
 		{
 			$sqlDelSub2 = "DELETE FROM sub_lv2 WHERE sub_id = $subId";
 			$qrysqlDelSub2 = mysqli_query($objConn,$sqlDelSub2);
 		}
 		
 		/*ลบใน table file*/
 			
 				/*ตรวจว่ามีไฟล์*/
 				$sqlCheckFile = "SELECT * FROM file WHERE main_id = $ID";
 				$qrysqlCheckFile = mysqli_query($objConn,$sqlCheckFile);
 				if(mysqli_num_rows($qrysqlCheckFile) > 0)
 				{		
 					$sqlDelFile = "DELETE FROM file WHERE main_id = $ID";
 					$qrysqlDelFile = mysqli_query($objConn,$sqlDelFile);
 					
 					/*DELETE ใน DIRECTORY*/	
 					while ($arrFile = mysqli_fetch_array($qrysqlDelFile))
 					{
 						$file = "../".$arrFile['path_file'];
						unlink($file);	
 					}
 					
				}
				/*.ตรวจว่ามีไฟล์*/

				$sqlDelSub = "DELETE FROM sub_folder WHERE main_id = $ID";
 				$qryDelSub = mysqli_query($objConn,$sqlDelSub);

 				$sqlDelMain = "DELETE FROM main_folder WHERE id = $ID";
 				$qryDelMain = mysqli_query($objConn,$sqlDelMain);
 				

 			}
 			
		/*.ลบใน table file*/


	} 



 


?>
<script src="../assets/jquery.min.js"></script>
<script src="../assets/bootstrap-3.3.1/js/bootstrap.min.js"></script>
</body>
</html>

<?php mysqli_close($objConn); ?>
