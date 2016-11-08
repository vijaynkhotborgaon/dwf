<?php
require_once('../config.php');
require_once('auth.php');








?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Contract Expired Companies</title>
<script type="text/javascript">





 function camdelete(str)





{





	if(confirm("You want to delete the selected expired company?"))





	{





  location.href='delete_expired_date.php?leadid='+str;





}





}








</script>

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








<p>Deleted Expired Company successfully</p>








       									</div>








					</div>	








<?php








		unset($_SESSION['CAMDELMESG']);








	}








?>   





















    
<article>
<table border="1" width="100%">
<tbody>
<tr>
<td colspan="6"><h4 style="float:left;"><strong>Contract Expired Companies</strong></h4></td>
</tr>
<tr style="text-align: center;">
<td style="text-align: center;"><strong>ID</strong></td>
<td><strong>Company</strong></td>
<td><strong>Expired on</strong></td>
<td><strong>Renewal</strong></td>
<td><strong>Send Mail</strong></td>
<td><strong>Update</strong></td>

</tr>
<?php
$result = mysql_query("SELECT * FROM company_contract");
$i=1;
while($row = mysql_fetch_array($result))
{ 


$date1=date('d-m-Y');
$date1=date_create($date1);
$date2=$row['tilldate'];
$date2=date_create($date2);
$diff=date_diff($date1,$date2);
$exp=0+$diff->format("%R%a");
if($exp<0){
$result2 = mysql_query("SELECT * FROM company_contract WHERE lead_id=".$row['lead_id']);
$row2 = mysql_fetch_assoc($result2);
?>
<tr style="text-align: center;">
<td><?php echo $i; ?></td>
<td><?php echo $row2['cname']; ?></td>
<td><?php echo $row['tilldate']; ?></td>
<td><a href="extend-contract.php?leadid=<?php echo $row['lead_id']; ?>">Extend Contract</a></td>
<td><a href="send-mail-to-spoc-expired.php?leadid=<?php echo $row['lead_id']; ?>">Send Mail</a></td>
<td><a href="javascript:void(0);" onClick="camdelete('<?php echo $row['lead_id']; ?>')"><img src="../images/Delete.png" style="margin-left:5px;" alt="Delete Company" /></a></td>

</tr>
<?php   $i++; }  }?>
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