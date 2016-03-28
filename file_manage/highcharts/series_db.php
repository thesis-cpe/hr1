<?php  
header("Content-type:application/json; charset=UTF-8");             
header("Cache-Control: no-store, no-cache, must-revalidate");               
header("Cache-Control: post-check=0, pre-check=0", false);     
// เชื่อมต่อฐานข้อมูล  

include_once('../inc/config.php');
include_once('../inc/connect.php');  

$more_q="";
if(isset($_GET['em']) && $_GET['em']!="")
{
    //$more_q.="AND dr_em_id='".$_GET['em']."' AND fk_n_customer_id='".$_GET['cus']."' ORDER BY dr_id ASC";
    $more_q.="AND dr_em_id='".$_GET['em']."' AND fk_n_customer_id='".$_GET['cus']."' ORDER BY dr_id ASC";
}
/*else
{
    $more_q.="AND dr_em_id='".$_GET['em']."' ORDER BY dr_id ASC";
}*/
// การเรียงข้อมูลหรือ order by ควรใช้ id สินค้าค้าหรือชื่อสินค้า และ วันที่
$q="SELECT * FROM daily_record WHERE 1 $more_q";

echo $q;
echo $more_q;

$qr=$conn->query($q);
while($rs=$qr->fetch_array())
{
   // $json_data[]=intval($rs['dr_record']);  // ใช้ intval ฟังชั่นเพื่อกำหนดค่าเป็นตัวเลข
    //$json_date[]=$rs['dr_work_date'];
    $json_data[]=$rs['dr_record'];
}
// จัดรูปแบบข้อมูลก่อนแปลงเป็น json object
$json_series[]=array(
    "name"=>"Record",
    "data"=>$json_data,
    //"date"=>$json_date
);
$json= json_encode($json_series); // แปลงข้อมูล array เป็น ข้อความ json object นำไปใช้งาน  
// ทำให้ json ไฟล์รองรับ callback function สำหรับ cross domain
if(isset($_GET['callback']) && $_GET['callback']!=""){  
echo $_GET['callback']."(".$json.");";      
}else{  
echo $json;  
}  
exit;
?>  