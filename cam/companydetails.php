<?php





	require_once('../config.php');





	require_once('auth.php');





?>





<!DOCTYPE html>





<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">





  <title>Add New company</title>





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





    





    <!-- MAIN CONTENT -->





    <div id="t3-content" class="t3-content span3">     





  





<?php





include('topsection.php');





?>





</div>





    <div id="t3-content" class="t3-content span9">     











<?php





$result = mysql_query("SELECT * FROM company where company_id=".$_GET['companyid']);





$row = mysql_fetch_assoc($result);





$result1 = mysql_query("SELECT * FROM company_primary_contact where company_id=".$_GET['companyid']);





$row1 = mysql_fetch_assoc($result1);





$result2 = mysql_query("SELECT * FROM company_secondary_contact where company_id=".$_GET['companyid']);





$row2 = mysql_fetch_assoc($result2);





$result3 = mysql_query("SELECT * FROM company_contract where company_id=".$_GET['companyid']);





$row3 = mysql_fetch_assoc($result3);











?>





	<article>





<div id="formWrapper">





    <fieldset class="fBlock" id="Corporate_Details">





<legend>Corporate Details</legend>





<p>





<label>Company Name</label>





<strong><?php echo $row['cname']; ?></strong>





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





<strong><?php echo $row['caddress']; ?></strong>





</p>





<p>





<label>Locations</label>





<strong><?php echo $row['clocation']; ?></strong>





</p>





<p>





<label>Number of Employees</label>





<strong><?php echo $row['cemployees']; ?></strong>





</p>





<p>





<label>Industry</label>





<strong><?php echo $row['cindustry']; ?></strong>





</p>





<p>





<label>Corporate Description</label>





<strong><?php echo $row['cdescription']; ?></strong>





</p>





<p>





<label>TS Assigned</label>





<?php





$result4 = mysql_query("SELECT * FROM tsdetails WHERE ts_id=".$row['ts_id']);





$row4 = mysql_fetch_assoc($result4);





?>





<strong><?php echo $row4['name']; ?></strong>





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





<fieldset class="fBlock" id="Committee_Details">





<legend>Ethics/Compliance Committee Details</legend>





<?php





$result5 = mysql_query("SELECT * FROM company_spoc where company_id=".$_GET['companyid']);





  $i=1;





while($row5 = mysql_fetch_array($result5))





  { 











?>





<fieldset class="fBlock" id="Member<?php echo $i; ?>">





<legend>Member <?php echo $i; ?></legend>





<p>





<label>Name</label>





<strong><?php echo $row5['name']; ?></strong>





</p>





<p>





<label>Email</label>





<strong><?php echo $row5['email']; ?></strong>





</p>





<p>





<label>Phone Number</label>





<strong><?php echo $row5['phone']; ?></strong>





</p>





</fieldset>





<?php





}





?>





</fieldset>





<fieldset class="fBlock" id="Primary_Contact_Details">





<legend>Primary Contact Details</legend>





<p>





<label>Name</label>





<strong><?php echo $row1['name']; ?></strong>





</p>





<p>





<label>Email</label>





<strong><?php echo $row1['email']; ?></strong>





</p>





<p>





<label>Phone Number</label>





<strong><?php echo $row1['phone']; ?></strong>





</p>





<p>





<label>Designation</label>





<strong><?php echo $row1['designation']; ?></strong>





</p>





</fieldset>





<fieldset class="fBlock" id="Secondary_Contact_Details">





<legend>Secondary Contact Details</legend>





<p>





<label>Name</label>





<strong><?php echo $row2['name']; ?></strong>





</p>





<p>





<label>Email</label>





<strong><?php echo $row2['email']; ?></strong>





</p>





<p>





<label>Phone Number</label>





<strong><?php echo $row2['phone']; ?></strong>





</p>





<p>





<label>Designation</label>





<strong><?php echo $row2['designation']; ?></strong>





</p>





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