<?php
require_once('../config.php');
require_once('auth.php');
$result = mysql_query("SELECT * FROM company where lead_id=".$_GET['cid']." AND cam_id=".$sesscamid);
if(mysql_num_rows($result) == '0')
{
header("location: main.php");
}
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>View Company Details</title>
<link rel="stylesheet" href="../css/css-be258.css" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link type="text/css" rel="stylesheet" href="../css/jquery-te-1.4.0.css">
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script>
<script type="text/javascript" src="../js/jquery-te-1.4.0.js" charset="utf-8"></script>
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
$result = mysql_query("SELECT * FROM company where lead_id=".$_GET['cid']);
$row = mysql_fetch_assoc($result);
$result1 = mysql_query("SELECT * FROM company_contract where company_id=".$row['company_id']);
$row1 = mysql_fetch_assoc($result1);
$result2 = mysql_query("SELECT * FROM camdetails where cam_id=".$sesscamid);
$row2 = mysql_fetch_assoc($result2);
$result4 = mysql_query("SELECT * FROM company_lead where lead_id=".$_GET['cid']);
$row4 = mysql_fetch_assoc($result4);
?>
<article>
<?php
$result3 = mysql_query("SELECT * FROM company_spoc where company_id=".$row['company_id']);
while($row3 = mysql_fetch_array($result3)){
?>
<form action="mail-to-spoc-process.php" method="post">
<strong>To:</strong> <?php echo $row3['name']; ?><br>
<strong>Email:</strong> <?php echo $row3['email']; ?><br>
<strong>Company:</strong> <?php echo $row4['cname']; ?>
<textarea name="mailspoc" class="jqte-test"><p><b>Hi <?php echo $row3['name']; ?></b>,</p><p>Your Company is successfully registered on <b>Disclose Without Fear!</b></p>
<p>Below is the url for submit <b>complaint for the employers</b></p><p><a href="<?php echo $mainurl; ?>/company/<?php echo $row['unique_url']; ?>" target="_blank" style="color:#4E9258;"><?php echo $mainurl; ?>/company/<?php echo $row['unique_url']; ?></a></p><p>Below is the <b>url and login details</b> for View and Update the Complaints</p><p>URL: <a href="<?php echo $mainurl; ?>/spoc" target="_blank" style="color:#4E9258;"><?php echo $mainurl; ?>/spoc</a><br>Username: <?php echo $row3['uname']; ?><br>Password: <?php echo $row3['fpword']; ?></p>
<p><b>Contract Period:</b></p>
<p><b>Active From:</b> <?php echo $row1['fromdate']; ?><br>
<b>Till From:</b> <?php echo $row1['tilldate']; ?></p></textarea>
<input name="tomail" type="hidden" value="<?php echo $row3['email']; ?>">
<input name="frommail" type="hidden" value="<?php echo $row2['email']; ?>">
<input name="cid" type="hidden" value="<?php echo $_GET['cid']; ?>">
<input name="submit" type="submit" value="Send Mail">
</form>
<?php
}
?>
<script>
$('.jqte-test').jqte();
</script>
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