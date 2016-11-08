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
$Complaint_Category = clean($_POST['Complaint_Category']);
$Upload_Document = clean($_FILES['Upload_Document']['name']);
$Upload_Document_Size = clean($_FILES['Upload_Document']['size']);
$Complaint_Department = clean($_POST['Complaint_Department']);
$Detailed_Complaint = clean($_POST['Detailed_Complaint']);
$Username = clean($_POST['Username']);
$Password = clean($_POST['Password']);
$Verify_Password = clean($_POST['Verify_Password']);
if($Username == '') {
$errmsg_arr[] = 'Enter user name for company login';
$errflag = true;
}
if($Detailed_Complaint == '') {
$errmsg_arr[] = 'Enter the complaint';
$errflag = true;
}
if($Password == '') {
$errmsg_arr[] = 'Enter the password';
$errflag = true;
}
if($Verify_Password == '') {
$errmsg_arr[] = 'confirm the password';
$errflag = true;
}
if($Upload_Document_Size > '2000000') {
$errmsg_arr[] = 'Upload file size must be less than 2MB';
$errflag = true;
}
if( strcmp($Password, $Verify_Password) != 0 ) {
$errmsg_arr[] = 'Passwords does not match';
$errflag = true;
}
//Check for duplicate login ID
if($Username != '') {
$qry = "SELECT * FROM complaint_user WHERE username='$Username'";
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
header('Location: log-report-form');
//header("Location: ".$mainurl."company/".$_GET['companyurl']."/log-report-form");
exit();
}
function getExtension($str) {
$i = strrpos($str,".");
if (!$i) { return ""; }
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}
$strip_Company_Logo=str_replace(' ', '', $Company_Logo);
$strip_Company_Name=str_replace(' ', '', $Company_Name);
$companylogo_name = $_FILES['Company_Logo']['name']."<br />";
$companylogo_type =  $_FILES["Company_Logo"]["type"]."<br />";
$companylogo_size =  $_FILES['Company_Logo']['size']."<br />";
$companylogo_tmppath = $_FILES["Company_Logo"]["tmp_name"]."<br />"; 
$result = mysql_query("SELECT * FROM company WHERE unique_url='".$_GET['companyurl']."'");
$row = mysql_fetch_assoc($result);
$camid=$row['cam_id'];
$companyid=$row['company_id'];
$result12 = mysql_query("SELECT * FROM company_lead WHERE lead_id=".$row['lead_id']);
$row12 = mysql_fetch_assoc($result12);
$tsid=$row12['ts_id'];
//Create INSERT query
$md5Password=md5($Password);
$qry = "INSERT INTO complaint_user(username, pword, status, modified_on, created_on) VALUES('$Username','$md5Password','1',NOW(),NOW())";
$result = @mysql_query($qry);
$user_id = mysql_insert_id();
$result123 = mysql_query("SELECT * FROM complaints WHERE company_id=".$companyid);
$countcomplaint = mysql_num_rows($result123);
$countcomplaint=$countcomplaint+1;
$countcomplaint=str_pad( $countcomplaint, 5, "0", STR_PAD_LEFT );
$ticket="TKT".$companyid."_".$countcomplaint;
$qry1 = "INSERT INTO complaints(company_id, ticket, cam_id, ts_id, complaint_user_id, cat_id, dep_id, detail, status, created_on) VALUES('$companyid','$ticket','$camid','$tsid','$user_id','$Complaint_Category','$Complaint_Department','$Detailed_Complaint','0',NOW())";
$result1 = @mysql_query($qry1);
$complaint_id = mysql_insert_id();
$docname=$complaint_id."_".$_FILES["Upload_Document"]["name"];
if ($Upload_Document!='') 
{
move_uploaded_file($_FILES["Upload_Document"]["tmp_name"], "doc/" . $docname);
$qry2 ="UPDATE complaints SET upload='".$docname."' WHERE complaint_id=".$complaint_id;
$result2 = @mysql_query($qry2);
}
if($result1) {
?>
<div id="t3-mainbody" class="container t3-mainbody ">
<div class="row">
<!-- MAIN CONTENT -->
<article>
<div id="formWrapper">
<fieldset class="fBlock" id="Login_Detail">
<legend>Thank you</legend>
<div id="formText">
<p>Thank you for Disclosing Without Fear!!</p>
<p>An account will be created for you based on the username and password provided. Please allow us 24 hours for creating your account. Once your account is created, you may login to your account at: <a href="<?php echo $mainurl; ?>company/<?php echo $_GET['companyurl']; ?>/ticket-dasboard"><?php echo $mainurl; ?>company/<?php echo $_GET['companyurl']; ?>/ticket-dasboard</a> to check the status of your complaint and for further communication with us. If we need more information about your complaint, we will send our message to your account and you may check the same and reply back by logging into your Dashboard.</p>
<p><strong>Your Login Detail</strong></p>
<p>Username: <?php echo $Username; ?><br />
Password: <?php echo $Password; ?></p>
</div>
</fieldset>
</div>
</article></div>


</div>
<?php
exit();
}else {
die("Query failed");
}
?>

