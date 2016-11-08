<?php
require_once('../config.php');
require_once('auth.php');?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>View Company Details</title>
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
<div id="t3-content" class="t3-content span3">     
<?php
include('topsection.php');
?>
</div>
<div id="t3-content" class="t3-content span9">     
<?php
$result = mysql_query("SELECT * FROM company where lead_id=".$_GET['leadid']);
$row = mysql_fetch_assoc($result);
$result1 = mysql_query("SELECT * FROM company_lead where lead_id=".$_GET['leadid']);
$row1 = mysql_fetch_assoc($result1);
$result3 = mysql_query("SELECT * FROM company_contract where lead_id=".$_GET['leadid']);
$row3 = mysql_fetch_assoc($result3);
?>
<article>
<div id="formWrapper">
<fieldset class="fBlock" id="Corporate_Details">
<legend>Corporate Details</legend>
<p>
<label>Company Name</label>
<strong><?php echo $row1['cname']; ?></strong>
</p>
<p>
<label>Company Logo</label>
<img src="../<?php echo $row['clogo']; ?>" alt="<?php echo $row['cname']; ?>" />
</p>
<p>
<label>Name of CEO</label>
<strong><?php echo $row['cceo']; ?></strong>
</p>
<p>
<label>Address</label>
<strong><?php echo $row1['caddress']; ?></strong>
</p>
<p>
<label>Number of Employees</label>
<strong><?php echo $row['cemployees']; ?></strong>
</p>
<p>
<label>Industry</label>
<?php
$resultindustry = mysql_query("SELECT * FROM company_industry WHERE industry_id=".$row['industry_id']);
$rowindustry = mysql_fetch_assoc($resultindustry);
?>
<strong><?php echo $rowindustry['name']; ?></strong>
</p>
<p>
<label>Corporate Description</label>
<strong><?php echo $row['cdescription']; ?></strong>
</p>
</fieldset>
<fieldset class="fBlock" id="Contarct_Period">
<legend>Contract Period</legend>
<p>
<label>Active From</label>
<strong><?php echo $row3['fromdate']; ?></strong>
</p>
<p>
<label>Active Till</label>
<strong><?php echo $row3['tilldate']; ?></strong>
</p>
</fieldset>
<fieldset class="fBlock" id="Primary_Contact_Details">
<legend>Spocs</legend>
<?php
$result5 = mysql_query("SELECT * FROM company_spoc where company_id=".$row['company_id']);
$i=1;
while($row5 = mysql_fetch_array($result5)){
?>
<fieldset class="fBlock" id="Primary_Contact_Details">
<legend>Spoc <?php echo $i; ?></legend>
<p>
<label>Name</label>
<?php echo $row5['name']; ?>
</p>
<p>
<label>Email</label>
<?php echo $row5['email']; ?>
</p>
<p>
<label>Phone Number</label>
<?php echo $row5['phone']; ?>
</p>
<p>
<label>Designation</label>
<?php echo $row5['designation']; ?></p>
</fieldset>
<?php
$i++;
}
?>
</fieldset>
</div>
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