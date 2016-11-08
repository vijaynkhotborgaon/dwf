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
$leadid= clean($_POST['leadid']);


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
header("location: edit-company-leads.php?leadid=$leadid");
exit();
}


//Create INSERT query
$qry = "UPDATE company_lead SET cname='$cname', caddress='$caddress', cperson='$cperson', cemail='$email', cphone='$telephone', cdesignation='$designation', ts_id='$tsid', cam_id='$camid', modified_on=NOW() WHERE lead_id=".$leadid;
$result = @mysql_query($qry);
$qry1 = "UPDATE company_contract SET fromdate='$activefrom', tilldate='$activetill' WHERE lead_id=".$leadid;
$result1 = @mysql_query($qry1);




if($result) {
$_SESSION['COMLEADMSG'] = 1;
session_write_close();
header("location: edit-company-leads.php?leadid=$leadid");
exit();
}else {
die("Query failed");
}
?>

