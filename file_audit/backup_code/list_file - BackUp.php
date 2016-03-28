<?php require_once("connect_ new.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="assets/bootstrap-3.3.1/css/bootstrap.min.css">

<title>LIST FILE</title>
</head>

<body>


<div class="container">
    <div class="row">
        <div class="col-sm-12"><br><img src="assets/img/Logo.png"></div>
    </div>
     <div class="row">
       	<div class="col-sm-12"><hr></div>
    </div>
    <div class="row">
        <div class="col-sm-12"><h4><center>บริษัท.....จำกัด</center></h4></div>
    </div>
      <div class="row">
        <div class="col-sm-12"><h4><center>สำหรับปี </center></h4></div>
    </div>
    <div class="row">
        <div class="col-sm-12">
     		<br><table width="200" border="1" class="table table-hover">
  <tr>
    <td width="5%">&nbsp;</td>
    <td width="8%"><center><label>รหัส</label></center></td>
    <td width="5%">&nbsp;</td>
    <td width="33%"><center><label>ชื่อกระดาษทำการ</label></center></td>
    <td colspan="2"><center><label>THAI</label></center></td>
    <td colspan="2"><center><label>ENG</label></center></td>
    <td><center><label>SAMPLE</label></center></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="8%"><center>PDF</center></td>
    <td width="8%"><center>Office</center></td>
    <td width="8%"><center>PDF</center></td>
    <td width="8%"><center>Office</center></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td colspan="9">ทดสอบ</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
            </table> 

        
        </div>
        
        <div class="row"><!--ทดสอบ foreach-->
        	<div class="col-sm-12">
				<?php 
                	$objConn = mysqli_connect($host,$user,$pass,$database);
					mysqli_set_charset($objConn,"utf8");
					
					/*SQL SELECT*/
					$sql_main = "SELECT * FROM main_folder";
					$sql_sub = "SELECT * FROM main_folder INNER JOIN sub_folder ON main_folder.id = sub_folder.main_id where sub_folder.main_id = 1";  //sub_folder.main_id ต้อง = main_id
					/*$sql_sub2 = "SELECT * FROM sub_lv2 INNER JOIN sub_folder ON sub_lv2.sub_id = sub_folder.sub_id WHERE sub_lv2.sub_id = 1"; //sub_lv2.sub_id = sub_id  */
					
					/*$sql_sub = "SELECT * FROM sub_folder INNER JOIN main_folder ON main_folder.id = sub_folder.main_id ORDER BY sub_folder.main_id ASC";  */
					$sql_sub2 = "SELECT * FROM sub_lv2";  
					$sql_file = "SELECT * FROM file LEFT JOIN main_folder ON file.main_id = main_folder.id LEFT JOIN sub_folder ON 
file.sub_id = sub_folder.sub_id LEFT JOIN sub_lv2 ON file.sub2_id = sub_lv2.sub2_id ORDER BY `file`.`file_id` ASC"; 
					
					/*$sql_sub = "SELECT * FROM sub_folder ORDER BY main_id ASC";  
					$sql_sub2 = "SELECT * FROM sub_lv2 ORDER BY sub_id ASC"; 
					$sql_file = "SELECT * FROM file"; */
					
					/*query*/
					$query_main = mysqli_query($objConn,$sql_main);
					$query_sub = mysqli_query($objConn,$sql_sub);
					$query_sub2 = mysqli_query($objConn,$sql_sub2);
					$query_file = mysqli_query($objConn,$sql_file);
					/*ทดสอบ*/
					
					/*วนเก็บค่า id main*/
					$main = array();//กำหนดตัวแปร arr
					$idxMain=0; //วน name ของ main
					$mainID = array();
					$idxMainID=0;
					$sub = array();
					$idxSub=0;
					$sub2 = array();
					$idxSub2=0;
					$path = array();
					$idxPath = 0;
					$idxFile = array();
					$idxID=0;
					$sub_id = array();
					$idxSubID=0;
					$mainIDFsub = array();
					$idxmainIDFsub=0;
					$sub2_id = array();
					$idxSub2id=0;
					while($arr_file =  mysqli_fetch_array($query_file))
						{
							$main[$idxMain] = $arr_file['name']; //ได้ชื่อแฟ้มหลัก
								$idxMain++;
							$mainID[$idxMainID] = $arr_file['id']; // id หลัก
								$idxMainID++;
							
							$sub[$idxSub] = $arr_file['sub_name']; //ได้ชื่อแฟ้มรอง
								$idxSub++;
							$sub_id[$idxSubID] = $arr_file['sub_id']; //sub id
								$idxSubID++;
							$mainIDFsub[$idxmainIDFsub] = $arr_file['main_id']; //ได้ main_id ใน tb sub
								$idxmainIDFsub++;
						
							$sub2[$idxSub2] = $arr_file['sub2_name']; //ได้ชื่อแฟ้มรอง2
								$idxSub2++;
							$sub2_id[$idxSub2id] = $arr_file['sub2_id'];
								$idxSub2id++;
							
							$path[$idxPath] = $arr_file['path_file']; //ได้ path
								$idxPath++;
							
							$idxFile[$idxID] = $arr_file['file_id']; //ได้ id file
								$idxID++;
							
							
						}
						$TbSub2SubId =array();
						$idxTbSub2SubId=0;
						while($arr_sub2 = mysqli_fetch_array($query_sub2))
						{
							$TbSub2SubId[$idxTbSub2SubId] = $arr_sub2['sub_id']; //ได้ sub id ที่ tb sublv2
							$idxTbSub2SubId++;
						}
						
						
						
						/*ส่วน output*/
						
						$mainName = 0; //กำหนดค่าให้ mainName
						$subName = 0 ;
						$sub2Name = 0;
						
						/*Loop1 MainName*/
						//for($index_main = 0;$index_main < count($main);$index_main++)
						for($index_main = 0;$index_main < 1;$index_main++)
						{
							
							if(strcmp($mainName,$main[$index_main])!=0)/* กำหนดว่าหากMainNameซ้ำเดิมให้Print ครั้งเดียว*/
							{
									echo $main[$index_main]."<br>";
									$mainName = $main[$index_main];
							}/*ปิด if(strcmp*/
							    /*Loop2 SubName*/
								//for($indexSubName=0;$indexSubName< count($sub);$indexSubName++)
								for($indexSubName=0;$indexSubName< 1;$indexSubName++)
								{
									if($mainID[$index_main] == $mainIDFsub[$indexSubName]) /*เทียบค่า main_id กับ id*/
									{
									
										if(strcmp($subName,$sub[$indexSubName])!=0)/* กำหนดว่าหากSubNameซ้ำเดิมให้Print ครั้งเดียว*/
											{
												echo "->".$sub[$indexSubName]."<br>";
												$subName = $sub[$indexSubName];
										
									 		}/*ปิด if(strcmp*/
											
											/*for echo file ที่มี sub_id ตรงกัน*/
											for($fileID=0;$fileID<count($idxFile);$fileID++) // Loop3 echo path sub
											
												{
														/*กรณีไม่มี sub2 sub=0*/
														if((($sub_id[$fileID]==$sub_id[$indexSubName]) && ($sub2_id[$fileID] ==0)))
														{
															
															echo $path[$fileID]."<br>";
														
														}
														
														
														/*กรณีมี sub2 sub2=!0*/
														else//if((($sub_id[$fileID]==$sub_id[$indexSubName])&&($sub2_id[$fileID]>0)))
														{ /*for loop4 วนหาsub2*/
															if(strcmp($sub2Name,$sub2[$fileID])!=0){
																echo "--->".$sub2[$fileID];
																$sub2Name = $sub2[$fileID];
															}
															for($indexSubID2=0;$indexSubID2<1;$indexSubID2++)
															{
																
																if($sub2_id[$fileID] == $TbSub2SubId[$indexSubID2])
																{
																  //$path[$fileID]."<br>";
																  
																  echo "<a href = ".$path[$fileID]."> view </a>";
																}/*ปิด if*/
															
															}/* ปิด for loop4 วนหาsub2*/	
														} /*ปิดกรณีมี sub2 sub2=!0*/
												}/*ปิด loop for 3 echo path*/
											
									}else
									{ continue;}//เพื่อให้ Loop2 วิ่ง arr ตัวถัดไป
								
									
								}/*ปิดLoop2*/

						}/*ปิด Loop1*/   
						
						
			 ?>
            </div>
        </div>   
        
    </div>  
    
    
</div>
<?php mysqli_close($objConn);?>
<script src="assets/jquery.min.js"></script>
<script src="assets/bootstrap-3.3.1/js/bootstrap.min.js"></script>
</body>
</html>


