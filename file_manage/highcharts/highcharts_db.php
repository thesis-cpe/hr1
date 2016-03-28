<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Highcharts</title>
    <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>
    
<div style="width:80%;margin:auto;">  
    <div id="hc_container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div>  

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>  
<script src="http://code.highcharts.com/highcharts.js"></script>  
<script src="http://code.highcharts.com/modules/exporting.js"></script>  
<script src="chartoptions.js"></script>  
<script type="text/javascript">  

<?php
    $em = $_GET['em'];
    $cus = $_GET['cus'];
?>

$(function () {  

    // ดึงข้อมูลจากฐานข้อมูลสร้างตัวแปร object series ข้อมูลสำหรับใช้งาน  
    $.getJSON( "series_db.php",{   
        //year:'2015' // ส่งค่าตัวแปร ไปถ้ามี ในที่นี้ ส่งปีไป เพราะจะดูข้อมูลรายเดือนของปีที่ก่ำหนด  
        //em:'<?php echo $em; ?>'
        //cus:'<?php echo $cus; ?>'
        em:'55022778'
        cus:'551234567890'
    },function(data) {   
            var dataSeries=data; // รับค่าข้อมูลตัวแปร object series
            //var datadate=date;
        
            $('#hc_container').highcharts(
                $.extend(chartOptions,{
                    series:dataSeries
                })
                /*$.extend(chartOptions,{
                    xAxis: {  
                        categories: datadate 
                    }
                })*/
            );

    });          
    
});  

</script>  
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>        
    
</body>
</html>