<?php
	require_once('spoc-auth.php');
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

$result = mysql_query("SELECT * FROM company where company_id=".$companyid);

$row = mysql_fetch_assoc($result);

$result1 = mysql_query("SELECT * FROM company_lead where lead_id=".$row['lead_id']);

$row1 = mysql_fetch_assoc($result1);

$result3 = mysql_query("SELECT * FROM company_contract where lead_id=".$row['lead_id']);

$row3 = mysql_fetch_assoc($result3);

$result4 = mysql_query("SELECT * FROM company_industry where industry_id=".$row['industry_id']);

$row4 = mysql_fetch_assoc($result4);



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

<img src="<?php echo $mainurl; ?><?php echo $row['clogo']; ?>" alt="<?php echo $row['cname']; ?>" />

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

<strong><?php echo $row4['name']; ?></strong>

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



<?php







$result5 = mysql_query("SELECT * FROM camdetails where cam_id=".$row1['cam_id']);

$row5 = mysql_fetch_assoc($result5);







?>







<fieldset class="fBlock" id="Contarct_Period">

<legend>CAM Detail</legend>

<p>

<label>Name</label>

<strong><?php echo $row5['name']; ?></strong>

</p>

<p>

<label>Email</label>

<strong><?php echo $row5['email']; ?></strong>

</p>

<p>

<label>Telephone</label>

<strong><?php echo $row5['tel_no']; ?></strong>

</p>

<p>

<label>Alternate Number</label>

<strong><?php echo $row5['alternate_no']; ?></strong>

</p>

</fieldset>











<?php







$result5 = mysql_query("SELECT * FROM tsdetails where ts_id=".$row1['ts_id']);

$row5 = mysql_fetch_assoc($result5);







?>







<fieldset class="fBlock" id="Contarct_Period">

<legend>TS Detail</legend>

<p>

<label>Name</label>

<strong><?php echo $row5['name']; ?></strong>

</p>

<p>

<label>Email</label>

<strong><?php echo $row5['email']; ?></strong>

</p>

<p>

<label>Telephone</label>

<strong><?php echo $row5['tel_no']; ?></strong>

</p>

<p>

<label>Alternate Number</label>

<strong><?php echo $row5['alternate_no']; ?></strong>

</p>

</fieldset>

</div>

</article>

	<!-- //Article -->

</div>

</div>

    <!-- //MAIN CONTENT -->

</div>	