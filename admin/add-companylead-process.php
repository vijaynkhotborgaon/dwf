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
$cname = clean($_POST['cname']);
$email = clean($_POST['email']);
$telephone = clean($_POST['telephone']);
$caddress = clean($_POST['caddress']);
$cperson = clean($_POST['cperson']);
$designation = clean($_POST['designation']);
$tsid = clean($_POST['tsid']);
$camid = clean($_POST['camid']);
$activefrom = clean($_POST['activefrom']);
$activetill = clean($_POST['activetill']);


if($cname == '') {
$errmsg_arr[] = 'Enter the Company Name';
$errflag = true;
}
if($email == '') {
$errmsg_arr[] = 'Enter Email ID';
$errflag = true;
}
if($telephone == '') {
$errmsg_arr[] = 'Enter Phone Number';
$errflag = true;
}
if($cperson == '') {
$errmsg_arr[] = 'Enter Contact person Name';
$errflag = true;
}
if($designation == '') {
$errmsg_arr[] = 'Enter contact person designation';
$errflag = true;
}
if($tsid == '') {
$errmsg_arr[] = 'Select TS';
$errflag = true;
}
if($activefrom == '') {
$errmsg_arr[] = 'Select Contract Start Date';
$errflag = true;
}
if($activetill == '') {
$errmsg_arr[] = 'Select Contract Till Date';
$errflag = true;
}
if($errflag) {
$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
session_write_close();
header("location: add-company-leads.php");
exit();
}


//Create INSERT query
$qry = "INSERT INTO company_lead(cname, caddress, cperson, cemail, cphone, cdesignation, ts_id, cam_id, status, modified_on, created_on) VALUES('$cname','$caddress','$cperson','$email','$telephone','$designation','$tsid','$camid','0',NOW(),NOW())";
$result = @mysql_query($qry);
$lead_id = mysql_insert_id();
$qry1 = "INSERT INTO company_contract(lead_id, fromdate, tilldate) VALUES('$lead_id','$activefrom','$activetill')";
$result1 = @mysql_query($qry1);
$result2 = mysql_query("SELECT * FROM camdetails where cam_id=".$camid);
$row2 = mysql_fetch_assoc($result2);
$result3 = mysql_query("SELECT * FROM tsdetails where ts_id=".$tsid);
$row3 = mysql_fetch_assoc($result3);


//Mail to Spoc
$mailspoc = '<p><b>Hi '.$cperson.'</b>,</p><p>Your Company is registered on <b>Disclose Without Fear!</b></p><p>Please add you company details and Other Spoc details using below link to create the company url</p><p><a href="'.$mainurl.'company/add-company-details.php?leadid='.$lead_id.'" target="_blank" style="color:#4E9258;">'.$mainurl.'company/add-company-details.php?leadid='.$lead_id.'</a></p><p><b>Contract Period:</b></p><p><b>Active From:</b> '.$activefrom.'<br><b>Till From:</b> '.$activetill.'</p><p><b>CAM Detail:</b></p><p><b>Name:</b> '.$row2["name"].'<br><b>Email:</b> '.$row2["email"].'<br><b>Telephone:</b> '.$row2["tel_no"].'</p><p><b>Support Detail:</b></p><p><b>Name:</b> '.$row3["name"].'<br><b>Email:</b> '.$row3["email"].'<br><b>Telephone:</b> '.$row3["tel_no"].'</p><p><br><br>Best Regards<br>Soumitra Das<br>Managing Partner</p>';
$to = $email;
$subject = "Company Registration Details From Disclose without Fear!";
$mail_body = '<html>
<body>' . $mailspoc . ' 
</body>
</html>';
$headers = "From: $mainemail \r\n";
$headers .= "Reply-To: $mainemail \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$sendmail= mail($to, $subject, $mail_body, $headers);


//Mail to CAM
$mailspoc = '<p><b>Hi '.$row2['name'].'</b>,</p><p>A new Company is registered on <b>Disclose Without Fear!</b> and assigned to you</p><p>Please Follow up with the company so that they fill the appropriate details and generate the unique company url</p><p><a href="'.$mainurl.'company/add-company-details.php?leadid='.$lead_id.'" target="_blank" style="color:#4E9258;">'.$mainurl.'company/add-company-details.php?leadid='.$lead_id.'</a></p><p><b>Contract Period:</b></p><p><b>Active From:</b> '.$activefrom.'<br><b>Till From:</b> '.$activetill.'</p><p><br><br>Best Regards<br>Soumitra Das<br>Managing Partner</p>';
$to = $row2['email'];
$subject = "Company Registration Details From Disclose without Fear!";
$mail_body = '<html>
<body>' . $mailspoc . ' 
</body>
</html>';
$headers = "From: $mainemail \r\n";
$headers .= "Reply-To: $mainemail \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$sendmail= mail($to, $subject, $mail_body, $headers);



//Mailto TS
$mailspoc = '<p><b>Hi '.$row3['name'].'</b>,</p><p>A new Company is registered on <b>Disclose Without Fear!</b> and assigned to you</p><p>Please Follow up with the company so that they fill the appropriate details and generate the unique company url</p><p><a href="'.$mainurl.'company/add-company-details.php?leadid='.$lead_id.'" target="_blank" style="color:#4E9258;">'.$mainurl.'company/add-company-details.php?leadid='.$lead_id.'</a></p><p><b>Contract Period:</b></p><p><b>Active From:</b> '.$activefrom.'<br><b>Till From:</b> '.$activetill.'</p><p><br><br>Best Regards<br>Soumitra Das<br>Managing Partner</p>';
$to = $row3['email'];
$subject = "Company Registration Details From Disclose without Fear!";
$mail_body = '<html>
<body>' . $mailspoc . ' 
</body>
</html>';
$headers = "From: $mainemail \r\n";
$headers .= "Reply-To: $mainemail \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$sendmail= mail($to, $subject, $mail_body, $headers);


if($result) {
$_SESSION['COMLEADMSG'] = 1;
session_write_close();
header("location: add-company-leads.php");
exit();
}else {
die("Query failed");
}
?>

