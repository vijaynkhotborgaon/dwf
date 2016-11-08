<?php
require_once('../config.php');
require_once('auth.php');
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
$result = mysql_query("SELECT * FROM company_lead where lead_id=".$_GET['cid']);
$row = mysql_fetch_assoc($result);
$result1 = mysql_query("SELECT * FROM company_contract where lead_id=".$_GET['cid']);
$row1 = mysql_fetch_assoc($result1);
$result2 = mysql_query("SELECT * FROM tsdetails where ts_id=".$row['ts_id']);
$row2 = mysql_fetch_assoc($result2);
?>
<article>
<?php
	if(isset($_SESSION['MAILTOSPOC']) && $_SESSION['MAILTOSPOC']==1 ) {?>
  <div id="system-message">
							<div class="alert alert-message">
<p>Mail Send to Company Person Successfully</p>

       									</div>

					</div>	

<?php

		unset($_SESSION['MAILTOSPOC']);


	}

?>
<form action="mail-to-company-process.php" method="post">
<strong>To:</strong> <?php echo $row['cperson']; ?><br>
<strong>Email:</strong> <?php echo $row['cemail']; ?><br>
<strong>Company:</strong> <?php echo $row['cname']; ?>
<textarea name="mailspoc" class="jqte-test"><p><b>Hi <?php echo $row['cperson']; ?></b>,</p><p>Your Company is registered on <b>Disclose Without Fear!</b></p><p>Please add you company details and Spoc details using below link for create the company url</p><p><a href="<?php echo $mainurl; ?>/company/add-company-details.php?leadid=<?php echo $_GET['cid']; ?>" target="_blank" style="color:#4E9258;"><?php echo $mainurl; ?>/company/add-company-details.php?leadid=<?php echo $_GET['cid']; ?></a></p><p><b>Contract Period:</b></p><p><b>Active From:</b> <?php echo $row1['fromdate']; ?><br><b>Till From:</b> <?php echo $row1['tilldate']; ?> </p>
</textarea>
<input name="tomail" type="hidden" value="<?php echo $row['cemail']; ?>">
<input name="frommail" type="hidden" value="<?php echo $row2['email']; ?>">
<input name="cid" type="hidden" value="<?php echo $_GET['cid']; ?>">
<input name="submit" type="submit" value="Send Mail">
</form>
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