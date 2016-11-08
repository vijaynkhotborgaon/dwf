<?php
require_once('../config.php');
	session_start();
$leadid=$_GET['leadid'];
$resultlead = mysql_query("SELECT * FROM company_lead where lead_id=$leadid");
$rowlead = mysql_fetch_assoc($resultlead);
if($rowlead['status']==1){
header('Location: '.$mainurl.'company');
}
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Add company detail</title>
<link rel="stylesheet" href="../css/css-be258.css" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<script src="../js/jquery-1.8.3.js" type="text/javascript"></script><script type="text/javascript">//<![CDATA[ 
$(document).ready(function(){
//when the Add Filed button is clicked
$("#addSpoc").click(function (e) {
//Append a new row of code to the "#items" div
var i = $('#Spoc_Details fieldset').size() + 1;
var n = $("#Spoc_Details fieldset").length;
if (n <=4) {
$("#Spoc_Details").append('<fieldset class="fBlockspoc" id="Spocs"><legend>Secondary Spocs</legend><p><label>Name</label><input type="text" name="spocname[]" id="spocname"></p><p><label>Email</label><input type="text" name="spocemail[]" id="spocemail"></p><p><label>Phone Number</label><input type="text" name="spocphone[]" id="spocphone"></p><p><label>Designation</label><input type="text" name="spocdesignation[]" id="spocdesignation"></p><p><label>User name</label><input type="text" name="spocuname[]" id="spocuname"></p><p><label>Password</label><input type="password" name="spocpword[]" id="spocpword"></p><p><label>Verify Password</label><input type="password" name="spocvpword[]" id="spocvpword"></p><a href="javascript:void(0)" id="remSpoc">Remove spoc</a></fieldset>');
i++;
}
else{
alert("Maximum five spocs are allowed!")
}
});
$("body").on("click", "#remSpoc", function (e) {
$(this).parent("fieldset").remove();
});
});
</script>
<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script src="../js/jquery.validation.functions.js" type="text/javascript"></script>
<script type="text/javascript">
/* <![CDATA[ */
jQuery(function(){
jQuery("#Company_Logo").validate({
expression: "if (VAL) return true; else return false;",
message: "Please select the company Logo"
});
jQuery("#Name_of_CEO").validate({
expression: "if (VAL) return true; else return false;",
message: "Please enter the name of CEO"
});
jQuery("#caddress").validate({
expression: "if (VAL) return true; else return false;",
message: "Enter the Company address"
});
jQuery("#Number_of_Employees").validate({
expression: "if (VAL) return true; else return false;",
message: "Please enter Number of Employees working in the Company"
});
jQuery("#Industry").validate({
expression: "if (VAL) return true; else return false;",
message: "Please enter the Company Industry"
});
jQuery("#Corporate_Description").validate({
expression: "if (VAL) return true; else return false;",
message: "Please enter the Company Description"
});
jQuery("#Active_From").validate({
expression: "if (VAL) return true; else return false;",
message: "Please select the start date to be active"
});
jQuery("#Active_Till").validate({
expression: "if (VAL) return true; else return false;",
message: "Please select the till date to be active"
});
jQuery("#spocuname1").validate({
expression: "if (VAL) return true; else return false;",
message: "Please enter the user name"
});
jQuery("#spocpword1").validate({
expression: "if (VAL.length > 5 && VAL) return true; else return false;",
message: "Please enter the password"
});
jQuery("#spocvpword1").validate({
expression: "if ((VAL == jQuery('#spocpword1').val()) && VAL) return true; else return false;",
message: "Confirm password field doesn't match the password field"
});
});
/* ]]> */
</script>
</head>
<body>
<?php
include('header.php');
?>
<div id="t3-mainbody" class="container t3-mainbody minHeight">
<div class="row">
<!-- MAIN CONTENT -->
<div id="t3-content" class="t3-content span12">     
<article>
<?php
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {?>
<div id="system-message">
<div class="alert alert-message">
<?php foreach($_SESSION['ERRMSG_ARR'] as $msg) { ?>
<?php
echo '<p>',$msg,'</p>'; 
}
?>
</div>
</div>	
<?php
unset($_SESSION['ERRMSG_ARR']);
}
?>
<?php
if(isset($_SESSION['COMREGMESG']) && $_SESSION['COMREGMESG']==1 ) {
?>
<div id="system-message">
<div class="alert alert-message">
<p>Updated the Company Details successfully</p>
</div>
</div>	
<?php
unset($_SESSION['COMREGMESG']);
}$result = mysql_query("SELECT * FROM company_lead where lead_id=$leadid");
$row = mysql_fetch_assoc($result);
$result2 = mysql_query("SELECT * FROM company_contract where lead_id=$leadid");
$row2 = mysql_fetch_assoc($result2);
?>
<div id="formWrapper">
<form onsubmit="return confirm('Please click Ok to Confirm or Cancel to edit again');" action="add-company-process.php" method="post" enctype="multipart/form-data">
<fieldset class="fBlock" id="Corporate_Details">
<legend>Corporate Details</legend>
<p>
<label>Company Name</label>
<?php echo $row['cname']; ?>
<input name="Company_Name" type="hidden" value="<?php echo $row['cname']; ?>"></p>
<p>
<label>Company Logo</label>
<input type="file" name="Company_Logo" id="Company_Logo">
</p>
<p>
<label>Name of CEO</label>
<input type="text" name="Name_of_CEO" id="Name_of_CEO">
</p>
<p>
<label>Address</label>
<textarea name="caddress" cols="" rows="" id="caddress"><?php echo $row['caddress']; ?></textarea>
</p>
<p>
<label>Number of Employees</label>
<input type="text" name="Number_of_Employees" id="Number_of_Employees">
</p>
<p>
<label>Industry</label>
<select name="Industry" id="Industry">
<option value="">Select Industry</option>
<?php
$resultindustry = mysql_query("SELECT * FROM company_industry");
while($rowindustry = mysql_fetch_array($resultindustry)){
?>
<option value="<?php echo $rowindustry['industry_id']; ?>"><?php echo $rowindustry['name']; ?></option>
<?php
} ?>
</select>
</p>
<p>
<label>Corporate Description</label>
<textarea cols="20" rows="5" name="Corporate_Description" id="Corporate_Description"></textarea>
</p>
</fieldset>
<fieldset class="fBlock" id="Contarct_Period">
<legend>Contract Period</legend>
<p>
<label>Active From</label>
<strong><?php echo $row2['fromdate']; ?></strong>
</p>
<p>
<label>Active Till</label>
<strong><?php echo $row2['tilldate']; ?></strong>
</p>
</fieldset>
<fieldset class="fBlock" id="Spoc_Details">
<legend>Spocs Details</legend><fieldset class="fBlock" id="Primary_Contact_Details">
<legend>Primary Spoc</legend>
<p>
<label>Name</label>
<?php echo $row['cperson']; ?>
</p>
<p>
<label>Email</label>
<?php echo $row['cemail']; ?>
</p>
<p>
<label>Phone Number</label>
<?php echo $row['cphone']; ?>
</p>
<p>
<label>Designation</label>
<?php echo $row['cdesignation']; ?></p><p>
<label>User name</label>
<input type="text" name="spocuname1" id="spocuname1">
</p>
<p>
<label>Password</label>
<input type="password" name="spocpword1" id="spocpword1">
</p>
<p>
<label>Verify Password</label>
<input type="password" name="spocvpword1" id="spocvpword1">
</p></fieldset>
</fieldset>
<a href="javascript:void(0)" id="addSpoc">Add New Spoc</a>
<input name="leadid" type="hidden" value="<?php echo $leadid; ?>"><input name="Submit" type="submit" class="fSubmit" value="Submit">
</form>
</div>
</article>
<!-- //Article -->
</div>
</div>
<!-- //MAIN CONTENT -->
</div>	

<?php
include('footer.php');
?>
<!-- //FOOTER -->    



  </body></html>