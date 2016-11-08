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








	


		if($errflag) {





		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;





		session_write_close();





		header("location: camdetail-update.php?camid=$camid");





		exit();





	}





	


	


	//Create INSERT query





	$qry = "UPDATE camdetails SET name='$name', email='$email', tel_no='$telephone', alternate_no='$phone' WHERE cam_id=$camid";





	$result = @mysql_query($qry);


	$qry2 = "UPDATE cams SET modified_on=NOW() WHERE cam_id=$camid";





	$result2 = @mysql_query($qry2);














		if($result) {





			$_SESSION['CAMUPDATE'] = 1;





			session_write_close();





			header("location: camdetail-update.php?camid=$camid");





			exit();





		}else {





			die("Query failed");





		}





?>

















