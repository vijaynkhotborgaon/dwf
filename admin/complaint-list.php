<?php
require_once('../config.php');
require_once('auth.php');
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Complaint List</title>
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
<td colspan="8"><h4><strong>Complaint List</strong></h4></td>
</tr>
<tr style="text-align: center;">
<td style="text-align: center;"><strong>ID</strong></td>
<td><strong>Company</strong></td>
<td><strong>Technical Support</strong></td>
<td><strong>CAM</strong></td>
<td><strong>Total Tickets</strong></td>
<td><strong>Resolved Tickets</strong></td>
<td><strong>Pending Tickets</strong></td>
<td><strong>Full Details</strong></td>
</tr>
<?php
$result = mysql_query("SELECT * FROM company");
$i=1;
while($row = mysql_fetch_array($result))
{ 
$result2 = mysql_query("SELECT * FROM company_lead WHERE lead_id=".$row['lead_id']);
$row2 = mysql_fetch_assoc($result2);
$result3 = mysql_query("SELECT * FROM complaints WHERE company_id=".$row['company_id']);
$totaltickets = mysql_num_rows($result3);
$result4 = mysql_query("SELECT * FROM complaints WHERE company_id=".$row['company_id']." AND status=2");
$resolvedtickets = mysql_num_rows($result4);
$result5 = mysql_query("SELECT * FROM complaints WHERE company_id=".$row['company_id']." AND status<>2");
$pendingtickets = mysql_num_rows($result5);
$result6 = mysql_query("SELECT * FROM tsdetails WHERE ts_id=".$row2['ts_id']);
$row6 = mysql_fetch_assoc($result6);
$result7 = mysql_query("SELECT * FROM camdetails WHERE cam_id=".$row2['cam_id']);
$row7 = mysql_fetch_assoc($result7);
?>
<tr style="text-align: center;">
<td><?php echo $i; ?></td>
<td><?php echo $row2['cname']; ?></td>
<td><?php echo $row6['name']; ?></td>
<td><?php echo $row7['name']; ?></td>
<td><?php echo $totaltickets; ?></td>
<td><?php echo $resolvedtickets; ?></td>
<td><?php echo $pendingtickets; ?></td>
<td><a href="complaint-full-details.php?companyid=<?php echo $row['company_id']; ?>">View Full Details</a></td>
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