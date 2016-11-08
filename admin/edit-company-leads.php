<?php
require_once('../config.php');
require_once('auth.php');
$leadid=$_GET['leadid'];
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Add New Company</title>
<link rel="stylesheet" href="../css/css-be258.css" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="../js/jquery-1.8.3.js" type="text/javascript"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
$(function() {
$( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
});
</script>
<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script src="../js/jquery.validation.functions.js" type="text/javascript"></script>
<script type="text/javascript">
/* <![CDATA[ */
jQuery(function(){
jQuery("#cname").validate({
expression: "if (VAL) return true; else return false;",
message: "Please enter the Company Name"
});
jQuery("#email").validate({
expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
message: "Please enter a valid Email ID"
});
jQuery("#telephone").validate({
expression: "if (VAL) return true; else return false;",
message: "Please enter telephone number"
});
jQuery("#cperson").validate({
expression: "if (VAL) return true; else return false;",
message: "Please enter the Contact Person Name"
});
jQuery("#designation").validate({
expression: "if (VAL) return true; else return false;",
message: "Please enter the Contact Person Designation"
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
<div id="t3-content" class="t3-content span3">     
<?php
include('topsection.php');
?>
</div>
<div id="t3-content" class="t3-content span9">     
<article>
<?php
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) { ?>
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
if(isset($_SESSION['COMLEADMSG']) && $_SESSION['COMLEADMSG']==1 ) {
?>
<div id="system-message">
<div class="alert alert-message">
<p>Update Company Registered successfully</p>
</div>
</div>	
<?php
unset($_SESSION['COMLEADMSG']);
}
?>
<?php
$result = mysql_query("SELECT * FROM company_lead where lead_id=$leadid AND status=0");
$row = mysql_fetch_assoc($result);
?>
<?php
if($row['status']==0){
$status="Pending";
} else { 
$status="Resolved";
}
?>

<form action="edit-companylead-process.php" method="post">
<input name="leadid" type="hidden" value="<?php echo $leadid; ?>">
<table border="1" width="100%">
<tbody>
<tr>
<td colspan="2"><h4><strong>Add New Company</strong></h4></td>
</tr>
<tr style="text-align: center;">
<td width="150"><strong>Company Name</strong></td>
<td><input name="cname" id="cname" type="text" value="<?php echo $row['cname']; ?>"></td>
</tr>
<tr style="text-align: center;">
<td width="150"><strong>Company Address</strong></td>
<td><textarea name="caddress" cols="" rows="" id="caddress"><?php echo $row['caddress']; ?></textarea></td>
</tr>
<tr style="text-align: center;">
<td width="150"><strong>Contact Person</strong></td>
<td><input name="cperson" id="cperson" type="text" value="<?php echo $row['cperson']; ?>"></td>
</tr>
<tr>
<td><strong>Email</strong></td>
<td><input name="email" id="email" type="text" value="<?php echo $row['cemail']; ?>"></td>
</tr>
<tr>
<td><strong>Telephone</strong></td>
<td><input name="telephone" id="telephone" type="text" value="<?php echo $row['cphone']; ?>"></td>
</tr>
<tr>
<td><strong>Designation</strong></td>
<td><input name="designation" id="designation" type="text" value="<?php echo $row['cdesignation']; ?>"></td>
</tr>
<tr>
<tr>
<td><strong>Assigned Technical Support</strong></td>
<td>
<select name="tsid" id="tsid">
<?php
$result1 = mysql_query("SELECT * FROM tsdetails");
while($row1 = mysql_fetch_array($result1))
{ ?>
<option value="<?php echo $row1['ts_id']; ?>"<?php if($row1['ts_id']==$row['ts_id']){?> selected<?php } ?>><?php echo $row1['name']; ?></option>
<?php
}
?>
</select>
</td>
</tr>
<tr>
<td><strong>Assigned CAM</strong></td>
<td>
<select name="camid" id="camid">
<?php
$result2 = mysql_query("SELECT * FROM camdetails");
while($row2 = mysql_fetch_array($result2))
{ ?>
<option value="<?php echo $row2['cam_id']; ?>"<?php if($row2['cam_id']==$row['cam_id']){?> selected<?php } ?>><?php echo $row2['name']; ?></option>
<?php
}
?>
</select>
</td>
</tr>
<tr>
<td colspan="2"><h4 style="float:left;"><strong>Contract Period</strong></h4></td>
</tr>
<?php
$resultcontract = mysql_query("SELECT * FROM company_contract where lead_id=".$leadid);
$rowcontract = mysql_fetch_assoc($resultcontract);?>
<tr>
<td width="150"><strong>Active From</strong></td>
<td><input name="activefrom" id="activefrom" class="datepicker" type="text" value="<?php echo $rowcontract['fromdate']; ?>" readonly></td>
</tr>
<tr>
<td width="150"><strong>Active Till</strong></td>
<td><input name="activetill" id="activetill" class="datepicker" type="text" value="<?php echo $rowcontract['tilldate']; ?>" readonly></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input name="submit" type="submit" value="Edit Company"></td>
</tr>
</tbody>
</table>
</form>
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