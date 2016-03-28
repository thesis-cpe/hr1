<?php
	@session_start();
	if($_SESSION["login"] == "")
	{
		echo("<script>alert('กรุณาเข้าสู่ระบบ');</script>");
		echo "<meta http-equiv='refresh' content='2;URL=../index.html' />";
		exit();
	}
?>