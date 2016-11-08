<?php
require_once('../config.php');
$leadid=$_GET['leadid'];
$resultlead = mysql_query("SELECT * FROM company where lead_id=$leadid");
$rowurl = mysql_fetch_assoc($resultlead);
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Add company detail</title>
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
<div id="t3-content" class="t3-content span12">     
<article>
<h2>Company Details updated successfully</h2>
<p>You company details has been added successfully and the access details has been mailed to the respective spoc members</p>
<p>Please provide this below url to your employees to register their complaint's without fear !!! </p>
<p><a href="<?php echo $mainurl; ?>company/<?php echo $rowurl['unique_url']; ?>" target="_blank"><?php echo $mainurl; ?>company/<?php echo $rowurl['unique_url']; ?></a>
</p>											
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