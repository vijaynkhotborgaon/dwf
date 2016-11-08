<?php





	//Start session





	require_once('auth.php');





	session_start();





	





	//Unset the variables stored in session





	unset($_SESSION['SESS_CAM_ID']);


	unset($_SESSION['SESS_CAM_PARENT']);





	header("location: index.php");





?>





