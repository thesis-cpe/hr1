<?php require_once("connect_ new.php"); 
$mian_folder = $_POST['selMainfolder'];

/*เชื่อมต่อและ select จาก db*/
 $objConnect = mysqli_connect($host,$user,$pass,$database);
				 
				 mysqli_set_charset($objConnect,"utf8");
				$sql ="SELECT * FROM main_folder INNER JOIN sub_folder ON main_folder.id = sub_folder.main_id where sub_folder.main_id = $mian_folder";
				$objQMain = mysqli_query($objConnect,$sql);
				$obj_sub = mysqli_query($objConnect,$sql);
				
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="assets/bootstrap-3.3.1/css/bootstrap.min.css">

<title>UPLOAD</title>
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
            <li class="active"><a href="upload_form.php">อัพโหลดไฟล์ลงหัวข้อหลัก</a></li>
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

<form method="post" enctype="multipart/form-data" action="sc_upload_file.php">

<input type="hidden" name="hdMainFolder" value="<?php echo $mian_folder?>"/><!--ส่งค่า id main folder -->

<div class="container">
				<div class="row">
                 <div class="col-sm-12"><h3>เลือกหัวข้อหลัก</h3><hr></div>
                </div>
                
                
                <div class="row">
                         <div class="col-xs-2"><label>หมวดที่ถูกเลือก</label></div>
                        <div class="col-xs-6">
                        	    <ul class="list-inline">
                    <!-- แสดง รายการแฟ้มหลักที่เลือก จาก main-->
                     <?php
				 while($objResult = mysqli_fetch_array($objQMain))
				 	{ $name_main = $objResult["name"];}
			         ?>
               <li><?php echo $name_main;?></li>
        		</ul>
         			 </div>
                     
                </div><br>
				
			<div class="row">
        		<div class="col-xs-2"><label>หัวข้อหลัก</label></div>
        		<div class="col-xs-6">
                	<select name="selSubfolder" class="form-control">
             			<option>--เลือกหัวข้อหลัก--</option>
					 <?php
				 		while($objResult2 = mysqli_fetch_array($obj_sub))
				 	{ ?>
                  <option value="<?php echo $objResult2["sub_id"];?>"> <?php echo $objResult2["sub_name"]; ?> </option>
			  <?php }
                 ?>
              </select>
      		  </div>
    </div><br>


                <div class="row">
                   
                    <div class="col-sm-2"><label>THAI PDF</label></div>
                    <div class="col-sm-6"><input class="form-control" name="fileThPDF" id="fileThPDF" type="file"/> </div>
                    
                </div><br>
                
                <div class="row">
                <div class="col-sm-2"><label>THAI OFFICE</label></div>
                    <div class="col-sm-6"><input class="form-control" name="fileThOff" id="fileThOff" type="file"/> </div>
				</div><br>
                
                <div class="row">
                <div class="col-sm-2"><label>ENGLISH PDF</label></div>
                    <div class="col-sm-6"><input class="form-control" name="fileEnPDF" id="fileEnPDF" type="file"/> </div>
				</div><br>
                
                <div class="row">
                <div class="col-sm-2"><label>ENGLISH OFFICE</label></div>
                    <div class="col-sm-6"><input class="form-control" name="fileEnOff" id="fileEnOff" type="file"/> </div>
				</div><br>
                
                
                <div class="row">
        			<div class="col-md-offset-2 col-md-3">
                    <button type="submit" name="btnUpfile" id="btnUpfile" class="btn btn-primary">UPLOAD</button></div>
    			</div>
 </div>
</form>
<?php mysqli_close($objConnect) ?>
<script src="assets/jquery.min.js"></script>
<script src="assets/bootstrap-3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
