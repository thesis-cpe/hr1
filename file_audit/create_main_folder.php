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
$sqlMaxIdx = "SELECT MAX(idx) AS lastidx FROM main_folder";
$objQuery4 = mysqli_query($objConn,$sqlMaxIdx);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="assets/bootstrap-3.3.1/css/bootstrap.min.css">

<title>สร้างหมวดหัวข้อ</title>
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
            <li class="active"><a href="create_main_folder.php">สร้างหมวด</a></li>
            <li><a href="create_sub_folder.php">สร้างหัวข้อหลัก</a></li>
            <li><a href="sub_lv2.php">สร้างหัวข้อย่อย</a></li>
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
    
    <!-- ส่วนสร้างแฟ้มหลัก -->
    <form action="sc_main_folder.php" method="post">
    <div class="row">
        <div class="col-xs-12"><h3>ส่วนจัดการหมวดหัวข้อ</h3><hr></div>
    </div>
    
 <div class="row">
      <div class="col-md-2"><label>ชื่อหมวดหัวข้อ</label></div>
        <div class="col-md-7"><input class="form-control" type="text" name="txtMFolder" id="txtMFoler" /></div>
  <!--เรีกยดูMAx IDX-->
       <?php
          while($arrMaxIdx = mysqli_fetch_array($objQuery4))
          {
            $maxIdx = $arrMaxIdx['lastidx'];
          }
          
       ?>
       <input type="hidden" name="hdfMaxIdx" value="<?php echo $maxIdx;?>">
  <!--.เรีกยดูMAx IDX-->     

  </div>
  
       

 
  <div class="row"><br>
    <div class="col-md-offset-2 col-md-3"><button class="btn btn-default" name="btnMFolder" id="btnMFolder" type="submit">สร้าง</button></div>
   </div> 
    
    <div class="row"><br>
        <div class="col-xs-2"><label>หมวดหัวข้อที่มีอยู่</label></div>
        <div class="col-xs-10">
              
                <ul>
                    <!-- แสดง รายการแฟ้มหลักที่มีอยู่ จาก main-->
                     <?php
				 while($objResult2 = mysqli_fetch_array($objQuery2))
				 	{ ?>
                    <li>
                      <?php echo $objResult2["name"];?>
                    </li>
              <?php }
                 ?>
        		</ul>
            
        </div>
    </div>   
    </form>
   
   
    
</div><!-- div ปิด container -->

<script src="assets/jquery.min.js"></script>
<script src="assets/bootstrap-3.3.1/js/bootstrap.min.js"></script>
<?php
mysqli_close($objConn);
?>
</body>
</html>
