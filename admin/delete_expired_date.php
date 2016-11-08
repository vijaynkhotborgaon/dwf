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

$leadid = clean($_GET['leadid']);

	
	
	//Create INSERT query

	
	
	$qry = "DELETE FROM company_lead WHERE lead_id=$leadid";

	$result = @mysql_query($qry);
	
	$qry2 = "DELETE FROM company WHERE lead_id=$leadid";

	$result2 = @mysql_query($qry2);
	
	$qry3 = "DELETE FROM company_contract WHERE lead_id=$leadid";

	$result3 = @mysql_query($qry3);
	
	
	
	
	
	
	
	
	
	
	
	
	




		if($result3) {

			$_SESSION['CAMDELMESG'] = 1;
			
			

			session_write_close();

			header("location: contract-expired-companies.php");

			exit();

		}else {

			die("Query failed");

		}
		
		
		/*if($result3) {

			$_SESSION['CAMDELMESG'] = 1;

			session_write_close();

			header("location: contract-expired-companies.php?leadid=$campid");

			exit();

		}else {

			die("Query failed");

		}
		
		
		if($result3) {

			$_SESSION['CAMDELMESG'] = 1;

			session_write_close();

			header("location: contract-expiring-companies.php?leadid=$campid");

			exit();

		}else {

			die("Query failed");

		} */
		
		

		
		
		
		
		
		
		


?>





