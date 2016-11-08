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

$leadid = clean($_POST['leadid']);

$Active_From = clean($_POST['activefrom']);

$Active_Till = clean($_POST['activetill']);


	if($Active_From == '') {

		$errmsg_arr[] = 'Enter  the contract start date';

		$errflag = true;

	}

	if($Active_Till == '') {

		$errmsg_arr[] = 'Enter  the contract till date';

		$errflag = true;

	}

	
	
		if($errflag) {

		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;

		session_write_close();

		header("location: leadcompany-detail.php?cid=$leadid");

		exit();

	}

 

	
	
	//Create INSERT query
	$qry ="UPDATE company_contract SET fromdate='".$Active_From."', tilldate='".$Active_Till."' WHERE lead_id=".$leadid;
	$result = @mysql_query($qry);
	


		if($result) {

			$_SESSION['UPDATECONTRACT'] = 1;

			session_write_close();

			header("location: leadcompany-detail.php?cid=$leadid");

			exit();

		}else{

			die("Query failed");

		}

?>