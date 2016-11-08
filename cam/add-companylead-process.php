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



$cname = clean($_POST['cname']);



$email = clean($_POST['email']);



$telephone = clean($_POST['telephone']);



$caddress = clean($_POST['caddress']);



$cperson = clean($_POST['cperson']);



$designation = clean($_POST['designation']);



$tsid = clean($_POST['tsid']);



	if($cname == '') {



		$errmsg_arr[] = 'Enter the Company Name';



		$errflag = true;



	}



	if($email == '') {



		$errmsg_arr[] = 'Enter Email ID';



		$errflag = true;



	}



	if($telephone == '') {



		$errmsg_arr[] = 'Enter Phone Number';



		$errflag = true;



	}



	if($caddress == '') {



		$errmsg_arr[] = 'Enter Company address';



		$errflag = true;



	}



	if($cperson == '') {



		$errmsg_arr[] = 'Enter Contact person Name';



		$errflag = true;



	}

	if($designation == '') {



		$errmsg_arr[] = 'Enter contact person designation';



		$errflag = true;



	}



	if($tsid == '') {



		$errmsg_arr[] = 'Select TS';



		$errflag = true;



	}





		if($errflag) {



		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;



		session_write_close();



		header("location: add-company-leads.php");



		exit();



	}



	

	

	//Create INSERT query



	$qry = "INSERT INTO company_lead(cname, caddress, cperson, cemail, cphone, cdesignation, ts_id, cam_id, status, modified_on, created_on) VALUES('$cname','$caddress','$cperson','$email','$telephone','$designation','$tsid','$sesscamid','0',NOW(),NOW())";



	$result = @mysql_query($qry);

	



		if($result) {



			$_SESSION['COMLEADMSG'] = 1;



			session_write_close();



			header("location: add-company-leads.php");



			exit();



		}else {



			die("Query failed");



		}



?>











