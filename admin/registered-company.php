<?php
require_once('../config.php');
require_once('auth.php');
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch">

<script type="text/javascript">





 function camdelete(str)





{





	if(confirm("You want to delete the selected Company?"))





	{





  location.href='delete_company.php?campid='+str;





}





}








</script>









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



<?php








	if(isset($_SESSION['CAMDELMESG']) && $_SESSION['CAMDELMESG']==1 ) {








?>








  <div id="system-message">








							<div class="alert alert-message">








<p>Deleted Company successfully</p>








       									</div>








					</div>	








<?php








		unset($_SESSION['CAMDELMESG']);








	}








?>   


































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
<td colspan="6"><h4><strong>Registered Companies</strong></h4></td>
</tr>
<tr style="text-align: center;">
<td style="text-align: center;"><strong>ID</strong></td>
<td><strong>Company Name</strong></td>
<td><strong>TS Assigned</strong></td>
<td><strong>CAM</strong></td>
<td><strong>URL</strong></td>
<td><strong>Details</strong></td>
</tr>
<?php
$result = mysql_query("SELECT * FROM company_lead where status=1");
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
$result2 = mysql_query("SELECT * FROM tsdetails where ts_id=".$row['ts_id']);
$row2 = mysql_fetch_assoc($result2);
?>
<td><?php echo $row2['name']; ?></td>
<?php
$result3 = mysql_query("SELECT * FROM camdetails where cam_id=".$row['cam_id']);
$row3 = mysql_fetch_assoc($result3);
?>
<td><?php echo $row3['name']; ?></td>
<td><a href="<?php echo $mainurl; ?>company/<?php echo $row4['unique_url']; ?>" target="_blank" style="word-wrap: break-word; width:220px; display:block;"><?php echo $mainurl; ?>company/<?php echo $row4['unique_url']; ?></a></td>
<td><a href="view-company-details.php?leadid=<?php echo $row4['lead_id']; ?>"><img src="../images/View-detail.png" alt="View Details" /></a><a href="edit-company-details.php?leadid=<?php echo $row4['lead_id']; ?>"><img src="../images/edit.png" alt="Edit Company Details"></a><a href="javascript:void(0);" onClick="camdelete('<?php echo $row4['lead_id']; ?>')"><img src="../images/Delete.png" style="margin-left:5px;" alt="Delete Company" /></a> </td>
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