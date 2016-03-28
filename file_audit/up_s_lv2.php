<?php require_once("connect_ new.php"); 
/*เชื่อมต่อและ select จาก db*/
 $objConnect = mysqli_connect($host,$user,$pass,$database) ;
				mysqli_set_charset($objConnect ,"utf8");
				$sql_sub = "SELECT * FROM sub_folder";
				$objQuery = mysqli_query($objConnect,$sql_sub);
				$sql_main = "SELECT * FROM main_folder"; 
				$objQMain = mysqli_query($objConnect,$sql_main);
				 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="assets/bootstrap-3.3.1/css/bootstrap.min.css">

<title>UPLOAD SUB2</title>
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
            <li><a href="sub_lv2.php">สร้างหัวข้อย่อย</a></li>
            <!--<li class="divider"></li>
            <li><a href="#">Separated link</a></li>  -->
          </ul>
        </li>
         <li class="dropdown"> <!--อัพโหลดไฟล์-->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">อัพโหลดไฟล์ <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="upload_form.php">อัพโหลดไฟล์ลงหัวข้อหลัก</a></li>
            <li class="active"><a href="up_s_lv2.php">อัพโหลดไฟล์ลงหัวข้อย่อย</a></li>
            
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
  
<form method="post" enctype="multipart/form-data" action="up_s_lv2_2.php">
<div class="container">
				<div class="row">
                 <div class="col-sm-12"><h3>อัพโหลดไฟล์ลงหัวข้อย่อย</h3><hr></div>
                </div>
                
                
                <div class="row">
                         <div class="col-xs-2"><label>หมวดหัวข้อ</label></div>
                        <div class="col-xs-6">
                        	<select name="selMainfolder" class="form-control">
             			<option>--เลือกหมวดหัวข้อ--</option>
							 <?php
                                while($objResult2 = mysqli_fetch_array($objQMain))
                            { ?>
                          <option value="<?php echo $objResult2["id"];?>"> <?php echo $objResult2["name"]; ?> </option>
                      <?php }
                         ?>
                      </select>
         			 </div>
                     <div class="col-xs-4"><button type="submit" class="btn btn-default">เลือก</button></div>
                </div><br>
							
</div>
</form>

<?php mysqli_close($objConnect)?>
<script src="assets/jquery.min.js"></script>
<script src="assets/bootstrap-3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
