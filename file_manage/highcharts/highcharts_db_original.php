<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Highcharts</title>
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
$(function () {  

    // ดึงข้อมูลจากฐานข้อมูลสร้างตัวแปร object series ข้อมูลสำหรับใช้งาน  
    $.getJSON( "series_db_original.php",{   
        year:'2015' // ส่งค่าตัวแปร ไปถ้ามี ในที่นี้ ส่งปีไป เพราะจะดูข้อมูลรายเดือนของปีที่ก่ำหนด  
    },function(data) {   
            var dataSeries=data; // รับค่าข้อมูลตัวแปร object series
        
            $('#hc_container').highcharts(
                $.extend(chartOptions,{
                    series:dataSeries
                })
            );

    });          
    
});  
</script>          
    
</body>
</html>