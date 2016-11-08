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




$mailspoc = $_POST['mailspoc'];








$tomail = $_POST['tomail'];







$frommail = $_POST['frommail'];







$cid = $_POST['cid'];






	if($mailspoc == '') {







		$errmsg_arr[] = 'Enter the Message';







		$errflag = true;







	}


	



	if($tomail == '') {







		$errmsg_arr[] = 'Enter To Email Address';







		$errflag = true;







	}







	if($frommail == '') {







		$errmsg_arr[] = 'Enter From Email Address';







		$errflag = true;







	}






		if($errflag) {







		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;







		session_write_close();







		header("location: send-mail-to-company.php?cid=$cid");







		exit();







	}


$to = $tomail;


$subject = "Company Registration Details From Disclose without Fear!";


$mail_body = '<html>
<body>' . $mailspoc . ' 
</body>
</html>';


$headers = "From: " . strip_tags($frommail) . "\r\n";
  $headers .= "Reply-To: ". strip_tags($frommail) . "\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$sendmail= mail($to, $subject, $mail_body, $headers);


	$qry = "INSERT INTO company_lead_mail(lead_id, senddate) VALUES('$cid',NOW())";



	$result = @mysql_query($qry);







		if($result) {







			$_SESSION['MAILTOSPOC'] = 1;







			session_write_close();







			header("location: send-mail-to-company.php?cid=$cid");







			exit();







		}else {







			die("Query failed");







		}







?>























