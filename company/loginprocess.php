<?php
//Start session
session_start();
//Include database connection details
require_once('../config.php');
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
header('Location: ticket-dasboard');
exit();
}
//Create query
$qry="SELECT * FROM complaint_user WHERE username='$username' AND pword='".md5($password)."'";
$result=mysql_query($qry);
//Check whether the query was successful or not
if($result) {
if(mysql_num_rows($result) == 1) {
//Login Successful
session_regenerate_id();
$user = mysql_fetch_assoc($result);
$_SESSION['SESS_EMP_ID'] = $user['complaint_user_id'];
session_write_close();
header("location: ticket-dasboard");
exit();
}else {
$errmsg_arr[] = 'Login Failed';
$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
session_write_close();
header("location: ticket-dasboard");
exit();
}
}else {
die("Query failed");





	}





?>