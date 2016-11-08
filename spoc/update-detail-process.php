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



$name = clean($_POST['name']);



$email = clean($_POST['email']);



$telephone = clean($_POST['telephone']);



$designation = clean($_POST['designation']);



$camid = clean($_POST['camid']);





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



	if($designation == '') {



		$errmsg_arr[] = 'Enter your Designation';



		$errflag = true;



	}





	

		if($errflag) {



		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;



		session_write_close();



		header("location: update-personal-detail");



		exit();



	}



	

	

	//Create INSERT query



	$qry = "UPDATE company_spoc SET name='$name', email='$email', phone='$telephone', designation='$designation' WHERE spoc_id=$sessspocid";



	$result = @mysql_query($qry);



		if($result) {



			$_SESSION['SPOCUPDATE'] = 1;



			session_write_close();



			header("location: update-personal-detail");



			exit();



		}else {



			die("Query failed");



		}



?>











