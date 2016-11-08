<?php 
	//Include database connection details

	require_once('../config.php');
	require_once('auth.php');
	//Array to store validation errors

	$errmsg_arr = array();

	//Validation error flag

	$errflag = false;

	//Function to sanitize values received from the form. Prevents SQL injection

	function clean($str) {

		$str = @trim($str);

		if(get_magic_quotes_gpc()) {

			$str = stripslashes($str);

		}

		return mysql_real_escape_string($str);

	}

	

	//Sanitize the POST values

$tsid = clean($_GET['tsid']);

	
	
	//Create INSERT query

	$qry = "DELETE FROM ts WHERE ts_id=$tsid";

	$result = @mysql_query($qry);
	
	$qry2 = "DELETE FROM tsdetails WHERE ts_id=$tsid";

	$result2 = @mysql_query($qry2);




		if($result2) {

			$_SESSION['TSDELMESG'] = 1;

			session_write_close();

			header("location: ts-list.php");

			exit();

		}else {

			die("Query failed");

		}

?>





