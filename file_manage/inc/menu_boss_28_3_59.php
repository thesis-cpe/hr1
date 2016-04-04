    <link rel="shortcut icon" href="images/icons/favicon.ico">
    <link rel="apple-touch-icon" href="images/icons/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icons/favicon-114x114.png">
  <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="styles/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="styles/all.css">
    <link type="text/css" rel="stylesheet" href="styles/main.css">
    <link type="text/css" rel="stylesheet" href="styles/style-responsive.css">
    <link type="text/css" rel="stylesheet" href="styles/zabuto_calendar.min.css">
    <link type="text/css" rel="stylesheet" href="styles/pace.css">
    <link type="text/css" rel="stylesheet" href="styles/jquery.news-ticker.css">
    <link type="text/css" rel="stylesheet" href="styles/animate.css">
<?php
  @session_start();
include_once("inc/config.php"); 
include_once("inc/connect.php");
$sqlq=("SELECT COUNT(*) AS total FROM coast_work INNER JOIN customer_gen 
    ON coast_work.fk_n_customer_id=customer_gen.n_customer_id WHERE coast_work.fk_employee_worker_id=$_SESSION[login] 
    AND customer_gen.check_close=0");
$resultq=$conn->query($sqlq);
$rowq=$resultq->fetch_assoc();

if(isset($_SESSION['user']))
{
    if($_SESSION['status'] == "ADMIN")
    {
?>

<!--BEGIN SIDEBAR MENU-->
<nav id="sidebar" role="navigation" data-step="2" data-position="right" class="navbar-default navbar-static-side">
    <div class="sidebar-collapse menu-scroll">
        <ul id="side-menu" class="nav">
            <div class="clearfix"></div>

            <li><a href="indexv2.php"><i class="fa fa-building-o">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">รายละเอียดบริษัท</span></a></li>

            <li><a href="profile.php"><i class="fa fa-user">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">ข้อมูลส่วนบุคคล</span></a></li>

            <li><a href="customerdata.php"><i class="fa fa-building-o">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">ข้อมูลกิจการลูกค้า</span></a></li>

            <li><a href="employeedata.php"><i class="fa fa-group">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">ข้อมูลพนักงาน</span></a></li>

            <li><a href="workdata.php"><i class="fa fa-bar-chart-o">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">ข้อมูลงานบัญชีและภาษี</span></a></li>

            <li><a href="workuser.php"><i class="fa fa-bar-chart-o">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">ข้อมูลงานที่รับผิดชอบ</span>
                <span class="badge"><?php echo "$rowq[total]"; ?></span></a></li>

            <li><a href="#"><i class="fa fa-pencil">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">จัดทำบัญชี</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="daily_work.php"><i class="fa fa-pencil"></i><span class="submenu-title">ประจำวัน</span></a></li>
                    <li><a href="audit_month.php"><i class="fa fa-pencil"></i><span class="submenu-title">ประจำเดือน</span></a></li>
                    <li><a href="audit_years.php"><i class="fa fa-pencil"></i><span class="submenu-title">ประจำปี</span></a></li>
                    <li><a href="audit_final.php"><i class="fa fa-pencil"></i><span class="submenu-title">ตรวจสอบแล้วเสร็จประจำปี</span></a></li>
                </ul>
            </li>

            <li><a href="#"><i class="fa fa-pencil">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">จัดทำภาษี</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="tax_month.php"><i class="fa fa-pencil"></i><span class="submenu-title">ประจำเดือน</span></a></li>
                    <li><a href="tax_year.php"><i class="fa fa-pencil"></i><span class="submenu-title">ประจำปี</span></a></li>
                </ul>
            </li>

            <li><a href="#"><i class="fa fa-file-text-o">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">รายงาน</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="report_employee.php"><i class="fa fa-file-text-o"></i><span class="submenu-title">รายงานส่วนบุคคล</span></a></li>
                    <li><a href="report_customer.php"><i class="fa fa-file-text-o"></i><span class="submenu-title">รายงานส่วนบริษัท</span></a></li>
                </ul>
            </li>

            <li><a href="courier.php"><i class="fa fa-clipboard">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">รับ - ส่งเอกสาร</span></a></li>

            <li><a href="../file_audit/index.php"><i class="fa fa-file-text">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">หมวดเอกสาร</span></a></li>

            <li><a href="ed_userpass.php"><i class="fa fa-wrench">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">เปลี่ยนรหัสผ่าน</span></a></li>

            <li><a href="logout.php"><i class="fa fa-sign-out">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">ออกจากระบบ</span></a></li>

        </ul>
    </div>
</nav>
<!--END SIDEBAR MENU-->


<!--BEGIN SIDEBAR MENU-->
<!--<nav id="sidebar" role="navigation" data-step="2" data-position="right" class="navbar-default navbar-static-side">
    <div class="sidebar-collapse menu-scroll">
        <ul id="side-menu" class="nav">
                    
            <div class="clearfix"></div>
                <li>
                    <a href="indexv2.php">
                        <i class="fa fa-building"></i>
                        <span class="menu-title">รายละเอียดบริษัท</span>
                    </a>
                </li>

                <li>
                    <a href="profile.php">
                        <i class="fa fa-user"></i>
                        <span class="menu-title">ข้อมูลส่วนบุคคล</span>
                    </a>
                </li>

                <li>
                    <a href="customerdata.php">
                        <i class="fa fa-building"></i>
                        <span class="menu-title">ข้อมูลกิจการลูกค้า</span>
                    </a>
                </li>

                <li>
                    <a href="employeedata.php">
                        <i class="fa fa-users"></i>
                        <span class="menu-title">ข้อมูลพนักงาน</span>
                    </a>
                </li>

                <li>
                    <a href="workdata.php">
                        <i class="fa fa-bar-chart-o"></i>
                        <span class="menu-title">ข้อมูลงานบัญชีและงานภาษี</span>
                    </a>
                </li>

                <li>
                    <a href="workuser.php">
                        <i class="fa fa-bar-chart-o"></i>
                        <span class="menu-title">ข้อมูลงานที่รับผิดชอบ</span>
                        <span class="badge"><?php echo "$rowq[total]"; ?></span>
                    </a>
                </li>

                <li>
                    <a href="daily_work.php">
                        <i class="fa fa-pencil"></i>
                        <span class="menu-title">จัดทำบัญชี - ประจำวัน</span>
                    </a>
                </li>

                <li>
                    <a href="audit_month.php">
                        <i class="fa fa-pencil"></i>
                        <span class="menu-title">จัดทำบัญชี - ประจำเดือน</span>
                    </a>
                </li>

                <li>
                    <a href="audit_years.php">
                        <i class="fa fa-pencil"></i>
                        <span class="menu-title">จัดทำบัญชี - ประจำปี</span>
                    </a>
                </li>

                <li>
                    <a href="audit_final.php">
                        <i class="fa fa-pencil"></i>
                        <span class="menu-title">จัดทำบัญชี - ตรวจสอบแล้วเสร็จประจำปี</span>
                    </a>
                </li>

                <li>
                    <a href="tax_month.php">
                        <i class="fa fa-pencil"></i>
                        <span class="menu-title">จัดทำภาษี - ประจำเดือน</span>
                    </a>
                </li>

                <li>
                    <a href="tax_year.php">
                        <i class="fa fa-pencil"></i>
                        <span class="menu-title">จัดทำภาษี - ประจำปี</span>
                    </a>
                </li>

                <li>
                    <a href="courier.php">
                        <i class="fa fa-file-text-o"></i>
                        <span class="menu-title">รับ - ส่งเอกสาร</span>
                    </a>
                </li>

                <li>
                    <a href="../file_audit/index.php">
                        <i class="fa fa-file-o"></i>
                        <span class="menu-title">หมวดเอกสาร</span>
                    </a>
                </li>

                <li>
                    <a href="ed_userpass.php">
                        <i class="fa fa-key"></i>
                        <span class="menu-title">เปลี่ยนรหัสผ่าน</span>
                    </a>
                </li>

                <li>
                    <a href="logout.php">
                        <i class="fa fa-power-off"></i>
                        <span class="menu-title">ออกจากระบบ</span>
                    </a>
                </li>
        </ul>
    </div>
</nav> -->
<!--END SIDEBAR MENU-->
<?php
    }
    else //user
    {
?>
<!--BEGIN SIDEBAR MENU-->
<nav id="sidebar" role="navigation" data-step="2" data-position="right" class="navbar-default navbar-static-side">
    <div class="sidebar-collapse menu-scroll">
        <ul id="side-menu" class="nav">
            <div class="clearfix"></div>

            <li><a href="indexv2.php"><i class="fa fa-building-o">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">รายละเอียดบริษัท</span></a></li>

            <li><a href="profile.php"><i class="fa fa-user">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">ข้อมูลส่วนบุคคล</span></a></li>

            <li><a href="customerdata.php"><i class="fa fa-building-o">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">ข้อมูลกิจการลูกค้า</span></a></li>

            <li><a href="workuser.php"><i class="fa fa-bar-chart-o">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">ข้อมูลงานที่รับผิดชอบ</span>
                <span class="badge"><?php echo "$rowq[total]"; ?></span></a></li>

            <li><a href="#"><i class="fa fa-pencil">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">จัดทำบัญชี</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="daily_work.php"><i class="fa fa-pencil"></i><span class="submenu-title">ประจำวัน</span></a></li>
                    <li><a href="audit_month.php"><i class="fa fa-pencil"></i><span class="submenu-title">ประจำเดือน</span></a></li>
                    <li><a href="audit_years.php"><i class="fa fa-pencil"></i><span class="submenu-title">ประจำปี</span></a></li>
                    <li><a href="audit_final.php"><i class="fa fa-pencil"></i><span class="submenu-title">ตรวจสอบแล้วเสร็จประจำปี</span></a></li>
                </ul>
            </li>

            <li><a href="#"><i class="fa fa-pencil">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">จัดทำภาษี</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="tax_month.php"><i class="fa fa-pencil"></i><span class="submenu-title">ประจำเดือน</span></a></li>
                    <li><a href="tax_year.php"><i class="fa fa-pencil"></i><span class="submenu-title">ประจำปี</span></a></li>
                </ul>
            </li>

            <li><a href="courier.php"><i class="fa fa-clipboard">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">รับ - ส่งเอกสาร</span></a></li>

            <li><a href="../file_audit/index.php"><i class="fa fa-file-text">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">หมวดเอกสาร</span></a></li>

            <li><a href="ed_userpass.php"><i class="fa fa-wrench">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">เปลี่ยนรหัสผ่าน</span></a></li>

            <li><a href="logout.php"><i class="fa fa-sign-out">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">ออกจากระบบ</span></a></li>

        </ul>
    </div>
</nav>
<!--END SIDEBAR MENU-->
<?php
    }
}
else
{
?>
<!--BEGIN SIDEBAR MENU-->
<nav id="sidebar" role="navigation" data-step="2" data-position="right" class="navbar-default navbar-static-side">
    <div class="sidebar-collapse menu-scroll">
        <ul id="side-menu" class="nav">
            <div class="clearfix"></div>

            <li><a href="indexv2.php"><i class="fa fa-building-o">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">รายละเอียดบริษัท</span></a></li>

            <li><a href="../file_audit/index.php"><i class="fa fa-file-text">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">หมวดเอกสาร</span></a></li>

        </ul>
    </div>
</nav>
<!--END SIDEBAR MENU-->
<?php
}
?>
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