<?php



	//Start session



	session_start();

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



	$username = clean($_POST['username']);



	$password = clean($_POST['password']);



	



	//Input Validations



	if($username == '') {



		$errmsg_arr[] = 'User name is missing';



		$errflag = true;



	}



	if($password == '') {



		$errmsg_arr[] = 'Password is missing';



		$errflag = true;



	}



	



	//If there are input validations, redirect back to the login form



	if($errflag) {



		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;



		session_write_close();



		header("location: login");



		exit();



	}



	



	//Create query



	$qry="SELECT * FROM company_spoc WHERE uname='$username' AND pword='".md5($password)."'";



	$result=mysql_query($qry);
$row=mysql_fetch_assoc($result);

	$result2=mysql_query("SELECT * FROM company WHERE unique_url='".$_GET['companyurl']."'");
$row2=mysql_fetch_assoc($result2);

	//Check whether the query was successful or not


	if($result) {



		if((mysql_num_rows($result) == 1)&&($row['company_id']==$row2['company_id'])) {


			//Login Successful



			session_regenerate_id();






			$_SESSION['SESS_SPOC_ID'] = $row['spoc_id'];

			$_SESSION['SESS_SPOC_COMPANY'] = $row2['company_id'];



			session_write_close();



			header("location: dashboard");



			exit();



		}else {



			$errmsg_arr[] = 'Login Failed';



		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;



		session_write_close();



		header("location: login");



			exit();



		}



	}else {



		die("Query failed");



	}



?>