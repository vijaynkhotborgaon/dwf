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

$name = clean($_POST['name']);

$email = clean($_POST['email']);

$telephone = clean($_POST['telephone']);

$phone = clean($_POST['phone']);

$tsid = clean($_POST['tsid']);


	if($name == '') {

		$errmsg_arr[] = 'Enter your Name';

		$errflag = true;

	}

	if($email == '') {

		$errmsg_arr[] = 'Enter your Email ID';

		$errflag = true;

	}


	if($telephone == '') {

		$errmsg_arr[] = 'Enter your Telephone Number';

		$errflag = true;

	}


	
		if($errflag) {

		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;

		session_write_close();

		header("location: tsdetail-update.php?tsid=$tsid");

		exit();

	}

	
	
	//Create INSERT query

	$qry = "UPDATE tsdetails SET name='$name', email='$email', tel_no='$telephone', alternate_no='$phone' WHERE ts_id=$tsid";

	$result = @mysql_query($qry);
	$qry2 = "UPDATE ts SET modified_on=NOW() WHERE ts_id=$tsid";

	$result2 = @mysql_query($qry2);




		if($result) {

			$_SESSION['TSUPDATE'] = 1;

			session_write_close();

			header("location: tsdetail-update.php?tsid=$tsid");

			exit();

		}else {

			die("Query failed");

		}

?>





