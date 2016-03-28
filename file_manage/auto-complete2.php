<?php
include('inc/constant.php');
include('database2.php');

if (!isset($_GET['keyword'])) {
	die("");
}

$keyword = $_GET['keyword'];
$data = serachForKeyword2($keyword);
echo json_encode($data, JSON_HEX_APOS);