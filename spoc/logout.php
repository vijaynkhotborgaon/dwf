<?php





	//Start session





	require_once('auth.php');





	session_start();





	





	//Unset the variables stored in session





	unset($_SESSION['SESS_SPOC_ID']);


	unset($_SESSION['SESS_SPOC_COMPANY']);





     header("location: ".$mainurl."spoc/".$_GET['companyurl']);





?>





