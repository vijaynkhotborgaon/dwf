<?php
require_once('../config.php');
require_once('auth.php');
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>New Company Registration List</title>
<link rel="stylesheet" href="../css/css-be258.css" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
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
<table border="1" width="100%">
<tbody>
<tr>
<td colspan="6"><h4><strong>New Company Registration List</strong></h4></td>
</tr>
<tr style="text-align: center;">
<td style="text-align: center;"><strong>ID</strong></td>
<td><strong>Company</strong></td>
<td><strong>Contact Person</strong></td>
<td><strong>Technical Support</strong></td>
<td><strong>Status</strong></td>
<td><strong>Details</strong></td>
</tr>
<?php
$result = mysql_query("SELECT * FROM company_lead where cam_id=$sesscamid AND status=0");
$i=1;
while($row = mysql_fetch_array($result))
{ 
if($row['status']==0){
$status="Pending";
} else { 
$status="Resolved";
}
?>
<tr style="text-align: center;">
<td><?php echo $i; ?></td>
<td><?php echo $row['cname']; ?></td>
<td><?php echo $row['cperson']; ?></td>
<?php
$result2 = mysql_query("SELECT * FROM tsdetails where ts_id=".$row['ts_id']);
$row2 = mysql_fetch_assoc($result2);
?>
<td><?php echo $row2['name']; ?></td>
<td><?php echo $status; ?></td>
<td><a href="leadcompany-detail.php?cid=<?php echo $row['lead_id']; ?>">View Details</a></td>
</tr>
<?php   $i++; } ?>
</tbody>
</table>
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