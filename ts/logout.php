<?php



	//Start session



	require_once('auth.php');



	session_start();



	



	//Unset the variables stored in session



	unset($_SESSION['SESS_TS_ID']);




	header("location: index.php");



?>



