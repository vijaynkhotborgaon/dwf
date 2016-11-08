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

$uname = clean($_POST['uname']);

$pword = clean($_POST['pword']);

$vpword = clean($_POST['vpword']);

	if($name == '') {

		$errmsg_arr[] = 'Enter your Name';

		$errflag = true;

	}

	if($email == '') {

		$errmsg_arr[] = 'Enter your Email ID';

		$errflag = true;

	}

	if($pword == '') {

		$errmsg_arr[] = 'Enter your Password';

		$errflag = true;

	}

	if($vpword == '') {

		$errmsg_arr[] = 'Confirm password missing';

		$errflag = true;

	}

	if($telephone == '') {

		$errmsg_arr[] = 'Enter your Telephone Number';

		$errflag = true;

	}
	if($uname == '') {

		$errmsg_arr[] = 'Enter your Username';

		$errflag = true;

	}

	if( strcmp($pword, $vpword) != 0 ) {

		$errmsg_arr[] = 'Passwords do not match';

		$errflag = true;

	}

	//Check for duplicate login ID

	if($uname != '') {

		$qry = "SELECT * FROM cams WHERE cam_name='$uname'";

		$result = mysql_query($qry);

		if($result) {

			if(mysql_num_rows($result) > 0) {

				$errmsg_arr[] = 'Username already in use';

				$errflag = true;

			}

			@mysql_free_result($result);

		}

		else {

			die("Query failed");

		}

	}	
		if($errflag) {

		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;

		session_write_close();

		header("location: add-new-cam.php");

		exit();

	}

	
	
	//Create INSERT query

	$qry = "INSERT INTO cams(cam_name, cam_pword, cam_published, modified_on, created_on) VALUES('$uname','".md5($pword)."','1',NOW(),NOW())";

	$result = @mysql_query($qry);
	
	$qry2 = "INSERT INTO camdetails(name, email, tel_no, alternate_no) VALUES('$name','$email','$telephone','$phone')";

	$result2 = @mysql_query($qry2);
	
	
	
	
	
	
	
	
	
	echo $mailspoc= "<p><b>Hi ".$name."</b>,</p><p> You are successfully registered on DWF as a CAM. </p><p><b>Your Credentials are: <b></p><p>Username : ".$uname."</p><p>Password : ".$pword."</p>";

echo $to = $email;
$subject = "CAM Registered";


$mail_body = '<html>
<body>' . $mailspoc . ' 
</body>
</html>';

$admin_mail = mysql_query("SELECT * FROM userdetails");
$row5=  mysql_fetch_assoc($admin_mail);


$headers = "From: ".$row5['email']." \r\n";
  $headers .= "Reply-To: ".$row5['email']." \r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$sendmail= mail($to, $subject, $mail_body, $headers);



if($result2) {

			$_SESSION['CAMREGMESG'] = 1;

			session_write_close();

			header("location: add-new-cam.php");

			exit();

		}else {

			die("Query failed");

		}


		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
?>





