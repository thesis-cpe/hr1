<!DOCTYPE html>
<html lang="en">
<head><title>รายงานส่วนบริษัท</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/icons/favicon.ico">
    <link rel="apple-touch-icon" href="images/icons/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icons/favicon-114x114.png">
     <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="styles/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="styles/font-awesome-4.1.0/css/font-awesome.min.css" >
    <link type="text/css" rel="stylesheet" href="styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="styles/all.css">
    <link type="text/css" rel="stylesheet" href="styles/main.css">
    <link type="text/css" rel="stylesheet" href="styles/style-responsive.css">
    <link type="text/css" rel="stylesheet" href="styles/pace.css">
    <link type="text/css" rel="stylesheet" href="styles/jquery.news-ticker.css">
    <link type="text/css" rel="stylesheet" href="styles/jquery-ui.min.css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="script/auto-complete.js"></script>

    <script type="text/javascript" src="script/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="script/jquery-ui.min.js"></script>

    <script type="text/javascript" src="script/jquery.min.js"></script>
    <script type="text/javascript" src="script/arrow79.js"></script>

<script>
    $(function(){
        $('#customernumber').autocomplete({source:'autocomplete.php'});
    })
</script>

<style>
#keyword {
    width: auto;
    font-size: 1em;
}

#results {
  display: none;
    width: auto;
    display: absolute;
    border: 1px solid #c0c0c0;
}

#results .item {
    padding: 3px;
    font-family: Helvetica;
    border-bottom: 1px solid #c0c0c0;
}

#results .item:last-child {
    border-bottom: 0px;
}

#results .item:hover {
    background-color: #f2f2f2;
    cursor: pointer;
}
</style>
</head>
<body>
<div>
    <div id="wrapper">
        <?php include_once('inc/topbar.php'); ?>
        <?php include_once('inc/menu.php'); ?>
        <div id="page-wrapper">
            <div class="page-content">
                <div id="sum_box" class="row mbl">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><span class="fa fa-user"></span> &nbsp;&nbsp; รายงานส่วนบริษัท</h3>
                                </div>
                                
                                <form action="sc_list_report/customer_report.php" method="POST">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label"><b>รหัสงานบริษัท : </b></label>
                                                        <div class="col-md-8"><input class="input form-control input-sm" name="txtCus" id="customernumber"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label"><b>ชื่อบริษัท : </b></label>
                                                        <div class="col-md-8"><input class="input form-control input-sm" name="txtName" id="keyword" list="datalist">
                                                        <div id="results">
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label"><b>ปี : </b></label>
                                                        <div class="col-md-8">
                                                            <select class="form-control input-sm" name="txtYear">
                                                                <option></option>
                                                                <?php for($i=2557;$i<=2600;$i++){ ?>
                                                                        <option value=" <?php echo "$i" ?>"> <?php echo "$i" ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr />
                                            </div>
                                        </div>
                                    </div>
                                    <center>
                                        <input type="submit" class="btn btn-green" value="ค้นหา">
                                        <input type="reset" class="btn btn-warning" value="ล้างข้อมูล">
                                    </center><br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--BEGIN FOOTER-->
            <?php include_once('inc/footer.php');  ?>
            <!--END FOOTER-->
        </div>
    </div>
</div>
<script src="script/jquery-1.10.2.min.js"></script>
<script src="script/jquery-migrate-1.2.1.min.js"></script>
<script src="script/jquery-ui.js"></script>
<!--loading bootstrap js-->
<script src="script/bootstrap.min.js"></script>
<script src="script/bootstrap-hover-dropdown.js"></script>
<script src="script/html5shiv.js"></script>
<script src="script/respond.min.js"></script>
<script src="script/jquery.metisMenu.js"></script>
<script src="script/jquery.slimscroll.js"></script>
<script src="script/jquery.cookie.js"></script>
<script src="script/icheck.min.js"></script>
<script src="script/custom.min.js"></script>
<script src="script/jquery.news-ticker.js"></script>
<script src="script/jquery.menu.js"></script>
<script src="script/pace.min.js"></script>
<script src="script/holder.js"></script>
<script src="script/responsive-tabs.js"></script>
<!--LOADING SCRIPTS FOR PAGE--><!--CORE JAVASCRIPT-->
<script src="script/main.js"></script>
<script>(function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function () {
        (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
ga('create', 'UA-145464-12', 'auto');
ga('send', 'pageview');


</script>
</body>
</html>