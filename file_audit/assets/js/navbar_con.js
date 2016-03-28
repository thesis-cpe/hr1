$('#btnHome').click();
			
			$('#btnHome').click(function(){
				$.get("home.php",function(data){
					$('div#content-body').html(data);
					})
			});
			
$('#btnMain').click();
			
			$('#btnMain').click(function(){
				$.get("create_main_folder.php",function(data){
					$('div#content-body').html(data);
					})
			});
			
$('#btnSub').click();
			
			$('#btnSub').click(function(){
				$.get("create_sub_folder.php",function(data){
					$('div#content-body').html(data);
					})
			});	
			
$('#btnSubSub').click();
			
			$('#btnSubSub').click(function(){
				$.get("sub_lv2.php",function(data){
					$('div#content-body').html(data);
					})
			});	
						
$('#btnListFile').click();
			
			$('#btnListFile').click(function(){
				$.get("list_file.php",function(data){
					$('div#content-body').html(data);
					})
			});	

$('#btnUpload').click();
			
			$('#btnUpload').click(function(){
				$.get("upload_form.php",function(data){
					$('div#content-body').html(data);
					})
			});								

$('#btnUpload2').click();
			
			$('#btnUpload2').click(function(){
				$.get("up_s_lv2.php",function(data){
					$('div#content-body').html(data);
					})
			});
			
			
		
		
		
			
		/*	$('#btnSigup').click(function(){
				$.get("assets/include/html/employee_sigup_form.php",function(data){
					$('div#content-body').html(data);
					})
			});
			
			
			$('#btnManage').click();
			$('#btnSearch').click(); */