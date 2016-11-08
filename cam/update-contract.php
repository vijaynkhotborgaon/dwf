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

$leadid = clean($_POST['leadid']);


$Active_Till = clean($_POST['activetill']);



	if($Active_Till == '') {

		$errmsg_arr[] = 'Enter  the contract till date';

		$errflag = true;

	}

	
	
		if($errflag) {

		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;

		session_write_close();

		header("location: extend-contract.php?leadid=$leadid");

		exit();

	}

 

	
	
	//Create INSERT query
	$qry ="UPDATE company_contract SET tilldate='".$Active_Till."' WHERE lead_id=".$leadid;
	$result = @mysql_query($qry);
$result2 = mysql_query("SELECT * FROM company_lead where lead_id=".$leadid);
$row2 = mysql_fetch_assoc($result2);
$result3 = mysql_query("SELECT * FROM company_contract where lead_id=".$leadid);
$row3 = mysql_fetch_assoc($result3);
	
	

$mailspoc= "<p><b>Hi ". $row2['cperson']."</b>,</p><p>Your Company Contract has been renewed till ".$Active_Till."</p><p><b>Contract Period:</b></p><p><b>Active From:</b>".$row3['fromdate']."<br><b>Till From:</b> ".$Active_Till."</p>";

$to = $row2['cemail'];
$subject = "Company Contract Renewed";


$mail_body = '<html>
<body>' . $mailspoc . ' 
</body>
</html>';


$headers = "From: info@dwf.com \r\n";
  $headers .= "Reply-To: info@dwf.com \r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$sendmail= mail($to, $subject, $mail_body, $headers);

		if($result) {

			$_SESSION['UPDATECONTRACT'] = 1;

			session_write_close();

			header("location: extend-contract.php?leadid=$leadid");

			exit();

		}else{

			die("Query failed");

		}

?>