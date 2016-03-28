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
</nav>
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
                    <a href="workdata.php">
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
                <li>
                    <a href="index_new.php">
                        <i class="fa fa-building"></i>
                        <span class="menu-title">รายละเอียดบริษัท</span>
                    </a>
                </li>

                <li>
                    <a href="">
                        <i class="fa fa-file-o"></i>
                        <span class="menu-title">หมวดเอกสาร</span>
                    </a>
                </li>
        </ul>
    </div>
</nav>
<!--END SIDEBAR MENU-->
<?php
}
?>
