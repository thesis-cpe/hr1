<?php
@session_start();
include_once("../inc/config.php");  

if(isset($_SESSION['user']))
{
include_once("../inc/connect.php");
$sqlw = ("SELECT * FROM employee WHERE employee_worker_id=$_SESSION[login]");
$resultw = $conn->query($sqlw);
$roww = $resultw->fetch_assoc();
?>
<!--BEGIN TOPBAR-->
    <div id="header-topbar-option-demo" class="page-header-topbar">
        <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-fixed-top">
            <div class="navbar-header">
                <a id="logo" href="../indexv2.php" class="navbar-brand">ระบบควบคุมคุณภาพงานบัญชีและภาษี<span style="display: none" class="logo-text-icon">µ</span></a>
            </div>
            <div class="topbar-main">
                <a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-list-ul "></i></a>

                <div class="navbar-header">
                    <a id="logo" class="navbar-brand">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        บริษัท กาญจน์ บัญชีและภาษีอากร จำกัด<span style="display: none" class="logo-text-icon">µ</span></a>
                </div>
                                
                <ul class="nav navbar navbar-top-links navbar-right mbn">
                    <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle">
                        <img src="<?php echo "../$roww[employee_picture]"; ?>" alt="" class="img-responsive img-circle"/>&nbsp;<span class="hidden-xs"><?php echo "$roww[employee_name]"; ?> <?php echo "$roww[employee_lname]"; ?></span>&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-user pull-right">
                            <li><a href="../profile.php"><i class="fa fa-user"></i>My Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="../logout.php"><i class="fa fa-power-off "></i>Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
<!--END TOPBAR-->
<?php
}
else
{
?>
<!--BEGIN TOPBAR-->
    <div id="header-topbar-option-demo" class="page-header-topbar">
        <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-fixed-top">
            <div class="navbar-header">
                <a id="logo" href="../indexv2.php" class="navbar-brand">ระบบควบคุมคุณภาพงานบัญชีและภาษี<span style="display: none" class="logo-text-icon">µ</span></a>
            </div>
            <div class="topbar-main">
                <a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-list-ul "></i></a>
                <div class="navbar-header">
                    <a id="logo" class="navbar-brand">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        บริษัท กาญจน์ บัญชีและภาษีอากร จำกัด<span style="display: none" class="logo-text-icon">µ</span></a>
                </div>

                <ul class="nav navbar navbar-top-links navbar-right mbn">
                    <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle">
                        <img src="storage/images.jpg" alt="" class="img-responsive img-circle"/>&nbsp;<span class="hidden-xs">Anonymous</span>&nbsp;<span class="caret"></span></a>
                        
                        <ul class="dropdown-menu dropdown-user pull-right">
                            <li><a href="" data-toggle="modal" data-target="#pnlLogin" ><i class="fa fa-user"></i>Log In</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
<!--END TOPBAR-->
<?php
}
?>