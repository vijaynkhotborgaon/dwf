<?php
require_once('../config.php');
require_once('auth.php');
//require_once('auth-slavecam.php');
$companyid = $_GET['companyid'];
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>View Full Details</title>
<link rel="stylesheet" href="../css/css-be258.css" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<script src="../js/jquery-1.8.3.js" type="text/javascript"></script>
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
<?php
$result = mysql_query("SELECT * FROM company where company_id=".$_GET['companyid']);
$row = mysql_fetch_assoc($result);
$result1 = mysql_query("SELECT * FROM company_lead where lead_id=".$row['company_id']);
$row1 = mysql_fetch_assoc($result1);
$result3 = mysql_query("SELECT * FROM company_contract where lead_id=".$row['lead_id']);
$row3 = mysql_fetch_assoc($result3);
?>
<article>
<div id="formWrapper">
<h3>Complaints</h3>
<table border="1" width="100%">
<tbody>
<tr>
<td colspan="7"><h4><strong>Complaint List</strong></h4></td>
</tr>
<tr style="text-align: center;">
<td style="text-align: center;"><strong>Complaint ID</strong></td>
<td><strong>Complaint Category</strong></td>
<td><strong>Complaint Department</strong></td>
<td><strong>Status</strong></td>
<td><strong>Created Date</strong></td>
<td><strong>More Details</strong></td>
</tr>
<?php
//echo "SELECT * FROM complaints where company_id=$companyid ORDER BY complaint_id DESC";
$result = mysql_query("SELECT * FROM complaints where company_id=$companyid ORDER BY complaint_id DESC");
while($row = mysql_fetch_array($result))
{ 
?>
<tr style="text-align: center;">
<td><?php echo $row['ticket']; ?></td>
<?php
$result2 = mysql_query("SELECT * FROM complaint_category where cat_id=".$row['cat_id']);
$row2 = mysql_fetch_assoc($result2);
?>
<td><?php echo $row2['category']; ?></td>
<?php
$result3 = mysql_query("SELECT * FROM complaint_department where dep_id=".$row['dep_id']);
$row3 = mysql_fetch_assoc($result3);
?>
<td><?php echo $row3['department']; ?></td>
<?php
if($row['status']==0){
$status="Opened";
} elseif($row['status']==1){
$status="More Details Required";
} elseif($row['status']==2){
$status="Closed";
}
?>
<td><?php echo $status; ?></td>
<td><?php echo $row['created_on']; ?></td>
<td><a href="view-complaint-details.php?id=<?php echo $row['complaint_id']; ?>">View Full Details</a></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</article>
<a href="complaint-list.php" style="display:block; margin-bottom:20px; float:right">View Full List</a>
</div>
</div>
<!-- //MAIN CONTENT -->
</div>	

<?php
include('footer.php');
?>
<!-- //FOOTER -->    
  </body></html>