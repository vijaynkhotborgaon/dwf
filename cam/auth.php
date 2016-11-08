<?php

	//Start session
	session_start();

	//Check whether the session variable SESS_CAM_ID is present or not


	if(!isset($_SESSION['SESS_CAM_ID']) || (trim($_SESSION['SESS_CAM_ID']) == '')) {

		header("location: index.php");
		exit();

	}
	$sesscamid = $_SESSION['SESS_CAM_ID'];

?>