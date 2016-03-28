<?php require_once("connect_ new.php"); 
/*เชื่อมต่อและ select จาก db*/
 $objConnect = mysql_connect("$host","$user","$pass") or die(mysql_errno());
				 mysql_select_db("audit_file");
				 mysql_query("set NAMES utf8");
				$sql_sub ="SELECT * FROM sub_folder";
				 $objQuery = mysql_query($sql_sub);
				$sql_main ="SELECT * FROM main_folder"; 
				$objQMain = mysql_query($sql_main);
				 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="assets/bootstrap-3.3.1/css/bootstrap.min.css">

<title>UPLOAD</title>
</head>

<body>
<form method="post" enctype="multipart/form-data" action="sc_upload_file.php">
<div class="container">
				<div class="row">
                 <div class="col-sm-12"><h3>เลือกแฟ้มหลัก</h3><hr></div>
                </div>
                
                
                <div class="row">
                         <div class="col-xs-2"><label>แฟ้มหลัก</label></div>
                        <div class="col-xs-6">
                        	<select name="selMainfolder" class="form-control">
             			<option>--เลือกแฟ้มหลัก--</option>
							 <?php
                                while($objResult2 = mysql_fetch_array($objQMain))
                            { ?>
                          <option value="<?php echo $objResult2["id"];?>"> <?php echo $objResult2["name"]; ?> </option>
                      <?php }
                         ?>
                      </select>
         			 </div>
                     <div class="col-xs-4"><button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-retweet"></span></button></div>
                </div><br>
				
			<div class="row">
        		<div class="col-xs-2"><label>แฟ้มย่อย</label></div>
        		<div class="col-xs-6">
                	<select name="selSubfolder" class="form-control">
             			<option>--เลือกแฟ้มย่อย--</option>
					 <?php
				 		while($objResult = mysql_fetch_array($objQuery))
				 	{ ?>
                  <option value="<?php echo $objResult["sub_id"];?>"> <?php echo $objResult["sub_name"]; ?> </option>
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
                    <div class="col-sm-6"><input class="form-control" name="fileEnPdf" id="fileEnPdf" type="file"/> </div>
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
<script src="assets/jquery.min.js"></script>
<script src="assets/bootstrap-3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
