<?php
	//Start session
	session_start();

	//Check whether the session variable SESS_MEMBER_ID is present or not

	if(!isset($_SESSION['SESS_USER_ID']) || (trim($_SESSION['SESS_USER_ID']) == '') || (trim($_SESSION['SESS_USER_PRIORITY']) != '1')) {

		header("location: index.php");

		exit();
	}
	$uid = $_SESSION['SESS_USER_ID'];
	
$result = mysql_query("SELECT * FROM userdetails where user_id=".$uid);
$row = mysql_fetch_assoc($result);
$mainemail=$row['email'];
?>