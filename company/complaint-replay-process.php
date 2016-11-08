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



$complaint_ticket = clean($_POST['complaint_ticket']);




$comments = clean($_POST['comments']);

$attachment = clean($_FILES['attachment']['name']);
$attachment_size = clean($_FILES['attachment']['size']);


$complaint_id = clean($_POST['complaint_id']);


	if($comments == '') {



		$errmsg_arr[] = 'Please enter the Comments';



		$errflag = true;



	}
	if($attachment_size > '2000000') {



		$errmsg_arr[] = 'Upload file size must be less than 2MB';



		$errflag = true;



	}

		if($errflag) {


		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;



		session_write_close();

         header('Location: ticket-dasboard/'.$complaint_ticket);




		exit();



	}

if ($_FILES["attachment"]["name"]!='') 
 	{
	$attachment=$complaint_id."_".$_FILES["attachment"]["name"];
   move_uploaded_file($_FILES["attachment"]["tmp_name"], "doc/" . $attachment);
}else {
	$attachment='';
}


	$qry = "INSERT INTO complaints_reply(complaint_id, user_id, status, msg, attachment, created_on) VALUES('$complaint_id','$sessuserid','6','$comments','$attachment',NOW())";

	$result = @mysql_query($qry);

	
		if($result) {


            $_SESSION['COMRPLYMSG'] = 1;



			session_write_close();


			header('Location: ticket-dasboard/'.$complaint_ticket);



			exit();



		}else {



			die("Query failed");



		}



?>











