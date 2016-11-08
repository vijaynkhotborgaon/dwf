<?php 


	//Include database connection details


	require_once('spoc-auth.php');


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





$pword = clean($_POST['pword']);


$vpword = clean($_POST['vpword']);









	if($pword == '') {





		$errmsg_arr[] = 'Enter the new password';





		$errflag = true;





	}





	if($vpword == '') {





		$errmsg_arr[] = 'verify new password';





		$errflag = true;





	}

	if( strcmp($pword, $vpword) != 0 ) {

		$errmsg_arr[] = 'Passwords do not match';

		$errflag = true;

	}







	


		if($errflag) {





		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;





		session_write_close();





		header("location: update-personal-detail");





		exit();





	}





	


	


	//Create INSERT query






	$qry = "UPDATE company_spoc SET pword='".md5($pword)."' WHERE spoc_id=$sessspocid";





	$result = @mysql_query($qry);














		if($result) {





			$_SESSION['SPOCPASSCNG'] = 1;





			session_write_close();





			header("location: update-personal-detail");





			exit();





		}else {





			die("Query failed");





		}





?>

















