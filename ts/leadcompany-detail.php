<?php
require_once('../config.php');
require_once('auth.php');
$cid=$_GET['cid'];
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Add Company Leads</title>
<link rel="stylesheet" href="../css/css-be258.css" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
$(function() {
$( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
});
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
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
foreach($_SESSION['ERRMSG_ARR'] as $msg) { ?>
<div id="system-message">
<div class="alert alert-message">
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
<p>Company Assigned to the CAM successfully</p>
</div>
</div>	
<?php
unset($_SESSION['COMLEADMSG']);
}
?>
<?php
if(isset($_SESSION['ADDCONTRACT']) && $_SESSION['ADDCONTRACT']==1 ) {
?>
<div id="system-message">
<div class="alert alert-message">
<p>Add Contract Details successfully</p>
</div>
</div>	
<?php
unset($_SESSION['ADDCONTRACT']);
}
?>
<?php
if(isset($_SESSION['UPDATECONTRACT']) && $_SESSION['UPDATECONTRACT']==1 ) {
?>
<div id="system-message">
<div class="alert alert-message">
<p>Update Contract Details successfully</p>
</div>
</div>	
<?php
unset($_SESSION['UPDATECONTRACT']);
}
?>
<?php
$result = mysql_query("SELECT * FROM company_lead where lead_id=$cid AND status=0");
$row = mysql_fetch_assoc($result);
?>
<?php
if($row['status']==0){
$status="Pending";
} else { 
$status="Resolved";
}
?>
<table border="1" width="100%">
<tbody>
<tr>
<td colspan="2"><h4 style="float:left;"><strong>Lead Company Details</strong></h4>
<?php
$resultmail = mysql_query("SELECT * FROM company_lead_mail where lead_id=$cid");
$rowmail = mysql_num_rows($resultmail);
?><span style="float:right;"><a href="send-mail-to-company.php?cid=<?php echo $cid; ?>">Send Mail </a> (<?php echo $rowmail; ?> times send)</td>
</tr>
<tr style="text-align: center;">
<td width="150"><strong>Company Name</strong></td>
<td><?php echo $row['cname']; ?></td>
</tr>
<tr style="text-align: center;">
<td width="150"><strong>Company Address</strong></td>
<td><?php echo $row['caddress']; ?></td>
</tr>
<tr style="text-align: center;">
<td width="150"><strong>Contact Person</strong></td>
<td><?php echo $row['cperson']; ?></td>
</tr>
<tr>
<td><strong>Email</strong></td>
<td><?php echo $row['cemail']; ?></td>
</tr>
<tr>
<td><strong>Telephone</strong></td>
<td><?php echo $row['cphone']; ?></td>
</tr>
<tr>
<td><strong>Designation</strong></td>
<td><?php echo $row['cdesignation']; ?></td>
</tr>
<?php
$result2 = mysql_query("SELECT * FROM tsdetails where ts_id=".$row['ts_id']);
$row2 = mysql_fetch_assoc($result2);
?>
<tr>
<td><strong>Assigned TS</strong></td>
<td><?php echo $row2['name']; ?></td>
</tr>
<tr>
<td><strong>Assigned CAM</strong></td>
<?php
$result3 = mysql_query("SELECT * FROM camdetails where cam_id=".$row['cam_id']);
$row3 = mysql_fetch_assoc($result3);
?>
<td><?php echo $row3['name']; ?></td>
</tr>
<tr>
<td><strong>Status</strong></td>
<td><?php echo $status; ?></td>
</tr>
</tbody>
</table>
<?php
$resultcontract = mysql_query("SELECT * FROM company_contract where lead_id=".$cid);
$rowcontract = mysql_fetch_assoc($resultcontract);?>
<table border="1" width="100%">
<tbody>
<tr>
<td colspan="2"><h4 style="float:left;"><strong>Contract Period</strong></h4></td>
</tr>
<tr>
<td width="150"><strong>Active From</strong></td>
<td><?php echo $rowcontract['fromdate']; ?></td>
</tr>
<tr>
<td width="150"><strong>Active Till</strong></td>
<td><?php echo $rowcontract['tilldate']; ?></td>
</tr>
</tbody>
</table>
<a href="<?php echo $mainurl ?>company/add-company-details.php?leadid=<?php echo $cid; ?>" target="_blank"><img src="../images/addmore.jpg" alt="Add More Detail" /></a>
</article>
</div>
</div>
</div>	

<?php
include('footer.php');
?>
<!-- //FOOTER -->    
</body></html>