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



$status = clean($_POST['status']);




$comments = clean($_POST['comments']);



$complaint_id = clean($_POST['complaint_id']);




		if($errflag) {


		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;



		session_write_close();

         header('Location: view-complaint-details.php?id='.$complaint_id);




		exit();



	}




	$qry = "INSERT INTO complaints_reply(complaint_id, spoc_id, status, msg, created_on) VALUES('$complaint_id','$sessspocid','$status','$comments',NOW())";

	$result = @mysql_query($qry);

	

		$qry2 ="UPDATE complaints SET status='".$status."' WHERE complaint_id=".$complaint_id;

	    $result2 = @mysql_query($qry2);


		if($result) {


            $_SESSION['COMRPLYMSG'] = 1;



			session_write_close();


			header('Location: view-complaint-details.php?id='.$complaint_id);



			exit();



		}else {



			die("Query failed");



		}



?>











