<?php
require_once('../config.php');
require_once('auth.php');
function clean($str) {

		$str = @trim($str);

		if(get_magic_quotes_gpc()) {

			$str = stripslashes($str);

		}

		return mysql_real_escape_string($str);

	}

	

	//Sanitize the POST values

$leadid = clean($_GET['leadid']);




?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Contract Expiring Companies</title>
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
<td colspan="5"><h4 style="float:left;"><strong>Contract Expiring Companies</strong></h4></td>
</tr>
<tr style="text-align: center;">
<td style="text-align: center;"><strong>ID</strong></td>
<td><strong>Company</strong></td>
<td><strong>Expiring Date</strong></td>
<td><strong>Renewal</strong></td>
<td><strong>Send Mail</strong></td>
</tr>
<?php
$result = mysql_query("SELECT * FROM company_contract");
$i=1;
while($row = mysql_fetch_array($result))
{ 

if($leadid==$row['lead_id'])
{
	continue;
}
else
{


$date1=date('d-m-Y');
$date1=date_create($date1);
$date2=$row['tilldate'];
$date2=date_create($date2);
$diff=date_diff($date1,$date2);
$exp=0+$diff->format("%R%a");
if(($exp<30)&&($exp>=0)){
$result2 = mysql_query("SELECT * FROM company_lead WHERE lead_id=".$row['lead_id']);
$row2 = mysql_fetch_assoc($result2);
?>
<tr style="text-align: center;">
<td><?php echo $i; ?></td>
<td><?php echo $row2['cname']; ?></td>
<td><?php echo $row['tilldate']; ?></td>
<td><a href="extend-contract.php?leadid=<?php echo $row['lead_id']; ?>">Extend Contract</a></td>
<td><a href="send-mail-to-spoc.php?leadid=<?php echo $row['lead_id']; ?>">Send Mail</a></td>
</tr>
<?php   $i++; } } } ?>
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