<?php
require_once('../config.php');
require_once('auth.php');
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Registered Companies</title>
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
<?php
if(isset($_SESSION['MAILTOSPOC']) && $_SESSION['MAILTOSPOC']==1 ) {
?>
<div id="system-message">
<div class="alert alert-message">
<p>Mail Send successfully</p>
</div>
</div>	
<?php
unset($_SESSION['MAILTOSPOC']);
}
?>
<table border="1" width="100%">
<tbody>
<tr>
<td colspan="5"><h4><strong>Registered Companies</strong></h4></td>
</tr>
<tr style="text-align: center;">
<td style="text-align: center;"><strong>ID</strong></td>
<td><strong>Company Name</strong></td>
<td><strong>CAM</strong></td>
<td><strong>URL</strong></td>
<td><strong>Details</strong></td>
</tr>
<?php
$result = mysql_query("SELECT * FROM company_lead where ts_id=$sesstsid AND status=1");
$i=1;
while($row = mysql_fetch_array($result))
{ 
$result4 = mysql_query("SELECT * FROM company where lead_id=".$row['lead_id']);
$row4 = mysql_fetch_assoc($result4);
?>
<tr style="text-align: center;">
<td><?php echo $i; ?></td>
<td><?php echo $row['cname']; ?></td>
<?php
$result3 = mysql_query("SELECT * FROM camdetails where cam_id=".$row['cam_id']);
$row3 = mysql_fetch_assoc($result3);
?>
<td><?php echo $row3['name']; ?></td>
<td><a href="<?php echo $mainurl; ?>company/<?php echo $row4['unique_url']; ?>" target="_blank" style="word-wrap: break-word; width:220px; display:block;"><?php echo $mainurl; ?>company/<?php echo $row4['unique_url']; ?></a></td>
<td><a href="view-company-details.php?leadid=<?php echo $row4['lead_id']; ?>"><img src="../images/View-detail.png" alt="View Details" /></a></td>
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