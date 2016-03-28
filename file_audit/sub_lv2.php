<?php require_once("connect_ new.php"); 
/*เชื่อมต่อฐานข้อมูล*/				 
$objConn =  mysqli_connect($host,$user,$pass,$database);
/*ตรวจสอบการเชื่อต่อ*/
if($objConn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
/*กำหนดการแสดงผล utf8*/
mysqli_set_charset($objConn,"utf8");	
/*คิวรี่*/	
$sql ="SELECT * FROM main_folder";
$objQuery = mysqli_query($objConn,$sql);
$objQuery2 = mysqli_query($objConn,$sql);
$sql_sub = "SELECT * FROM sub_folder";
$objQuery3 = mysqli_query($objConn,$sql_sub);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="assets/bootstrap-3.3.1/css/bootstrap.min.css">

<title>จัดการหัวข้อย่อย</title>
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
            <li><a href="create_main_folder.php">สร้างหมวด</a></li>
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

<div class="container">

    <!-- ส่วนสร้างแฟ้มย่อย -->
    <form action="sub_lv2_s2.php" method="post">
    <div class="row">
        <div class="col-xs-12"><br><h3>สร้างหัวข้อย่อย</h3><hr></div>
    </div>
  
    <!-- ส่วน select แฟ้มหลัก-->
		<div class="row">
        <div class="col-md-2"><label>เลือกหมวดหัวข้อหลัก</label></div>
            <div class="col-md-7">
             <select name="selMainfolder" class="form-control">
             <option>--เลือกหมวดหัวข้อหลักที่มีอยู่--</option>
				 <?php
				 while($objResult = mysqli_fetch_array($objQuery))
				 	{ ?>
                  <option value="<?php echo $objResult["id"];?>"> <?php echo $objResult["name"]; ?> </option>
			  <?php }
                 ?>
              </select>
   			 </div>
             
             <div class="col-md-3">
             <button type="submit" class="btn btn-default" name="btnSelM">เลือก</button>
             
             </div>
            
        </div><br>
       </form>
       
</div><!-- div ปิด container -->

<script src="assets/jquery.min.js"></script>
<script src="assets/bootstrap-3.3.1/js/bootstrap.min.js"></script>
<?php
mysqli_close($objConn);
?>
</body>
</html>
