<?php require_once("connect_ new.php"); 
@$selMain = $_POST['selMainfolder']; //รับตัวแปรจาก sub_lv2.php

/*เชื่อมต่อฐานข้อมูล*/				 
$objConn =  mysqli_connect($host,$user,$pass,$database);
/*ตรวจสอบการเชื่อต่อ*/
if($objConn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
/*กำหนดการแสดงผล utf8*/
mysqli_set_charset($objConn,"utf8");	
/*คิวรี่*/	
$sql ="SELECT * FROM main_folder INNER JOIN sub_folder ON main_folder.id = sub_folder.main_id where sub_folder.main_id = $selMain";
$objQuery = mysqli_query($objConn,$sql);
$obj_sub = mysqli_query($objConn,$sql);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="assets/bootstrap-3.3.1/css/bootstrap.min.css">

<title>manage sub lv2s2</title>
</head>

<body>
<!--NAVBAR-->
    <nav class="navbar navbar-default">
<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">file audit</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     
     
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown"> <!--จัดการหมวด-->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">จัดการรายการ <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li ><a href="create_main_folder.php">สร้างหมวด</a></li>
            <li><a href="create_sub_folder.php">สร้างหัวข้อหลัก</a></li>
            <li class="active"><a href="sub_lv2.php">สร้างหัวข้อย่อย</a></li>
            <!--<li class="divider"></li>
            <li><a href="#">Separated link</a></li>  -->
          </ul>
        </li>
         <li class="dropdown"> <!--อัพโหลดไฟล์-->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">อัพโหลดไฟล์ <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="upload_form.php">อัพโหลดไฟล์ลงหัวข้อหลัก</a></li>
            <li><a href="up_s_lv2.php">อัพโหลดไฟล์ลงหัวข้อย่อย</a></li>
            
            <!--<li class="divider"></li>
            <li><a href="#">Separated link</a></li>  -->
          </ul>
        </li>
        <li><a href="list_file.php">รายการไฟล์</a></li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  
  <!--.NAVBAR-->      
        
<form action="sc_subLv2.php" method="post">
<div class="container">
<div id="content-body">
          <div class="row">
                <div class="col-xs-12"><br><h3>จัดการหัวข้อย่อย</h3><hr></div>
            </div>
            
           <div class="row">
                <div class="col-xs-2"><label>หมวดหลักที่ถูกเลือก</label></div>
             <div class="col-xs-7">
                        	    <ul class="list-inline">
                    <!-- แสดง รายการแฟ้มหลักที่เลือก จาก main-->
                     <?php
				 while($objResult = mysqli_fetch_array($objQuery))
				 	{ $name_main = $objResult["name"];}
			         ?>
          <li><?php 
                if(isset($name_main)){
                echo $name_main;
                }
                else{
                  echo "คุณไม่ได้สร้างหัวข้อหลัก";
                }
                ?>

          </li>
        		</ul>
         			 </div>
            
           </div> 
    <div class="row">
        		<div class="col-xs-2"><label>หัวข้อหลัก</label></div>
        		<div class="col-xs-7">
                	<select name="selSubfolder" class="form-control">
             			<option>--เลือกหัวข้อหลัก--</option>
					 <?php
				 		while($objResult2 = mysqli_fetch_array($obj_sub))
				 	{   $subID = $objResult2["sub_id"];

           ?>
                  <option value="<?php echo $objResult2["sub_id"];?>"> <?php echo $objResult2["sub_name"]; ?> </option>
			  <?php }
                 ?>
              </select>
      		  </div>
    </div><br>
    
    <div class="row">
    	<div class="col-xs-2"><label>ชื่อหัวข้อย่อย</label></div>
        <div class="col-xs-7"><input name="txtSub2" id="txtSub2" class="form-control"/></div>
    </div><br>
   <div class="row">
        			<div class="col-md-offset-2 col-md-3">
                    <button type="submit" name="btnSub1" id="btnSub1" class="btn btn-primary">สร้าง</button></div>
    </div>
    
</div>  <!-- div ปิด content-body -->      
</div><!-- div ปิด container -->
  
</form>
<script src="assets/jquery.min.js"></script>
<script src="assets/bootstrap-3.3.1/js/bootstrap.min.js"></script>
<!-- Navbr Script-->
        <script src="assets/js/navbar_con.js"></script>
<?php
	mysqli_close($objConn);
?>
</body>
</html>

