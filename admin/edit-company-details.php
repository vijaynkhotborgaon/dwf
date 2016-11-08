<?php
require_once('../config.php');
require_once('auth.php');
$leadid=$_GET['leadid'];
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Add company detail</title>
<link rel="stylesheet" href="../css/css-be258.css" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<script src="../js/jquery-1.8.3.js" type="text/javascript"></script>
<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script src="../js/jquery.validation.functions.js" type="text/javascript"></script>
<script type="text/javascript">
/* <![CDATA[ */
jQuery(function(){
jQuery("#Company_Name").validate({
expression: "if (VAL) return true; else return false;",
message: "Please Enter the company name"
});
jQuery("#Name_of_CEO").validate({
expression: "if (VAL) return true; else return false;",
message: "Please enter the name of CEO"
});
jQuery("#caddress").validate({
expression: "if (VAL) return true; else return false;",
message: "Enter the Company address"
});
jQuery("#Number_of_Employees").validate({
expression: "if (VAL) return true; else return false;",
message: "Please enter Number of Employees working in the Company"
});
jQuery("#Industry").validate({
expression: "if (VAL) return true; else return false;",
message: "Please enter the Company Industry"
});
jQuery("#Corporate_Description").validate({
expression: "if (VAL) return true; else return false;",
message: "Please enter the Company Description"
});
});
/* ]]> */
</script>
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
<article>
<?php
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
foreach($_SESSION['ERRMSG_ARR'] as $msg) { ?>
<div id="system-message">
<div class="alert alert-message">
<?php
echo '<p>',$msg,'</p>'; 
}
?>
</div>
</div>	
<?php
unset($_SESSION['ERRMSG_ARR']);
}
?>
<?php
if(isset($_SESSION['COMREGMESG']) && $_SESSION['COMREGMESG']==1 ) {
?>
<div id="system-message">
<div class="alert alert-message">
<p>Updated the Company Details successfully</p>
</div>
</div>	
<?php
unset($_SESSION['COMREGMESG']);
}$result = mysql_query("SELECT * FROM company_lead where lead_id=$leadid");
$row = mysql_fetch_assoc($result);
$result2 = mysql_query("SELECT * FROM company where lead_id=$leadid");
$row2 = mysql_fetch_assoc($result2);
?>
<div id="formWrapper">
<form action="edit-company-process.php" method="post" enctype="multipart/form-data">
<fieldset class="fBlock" id="Corporate_Details">
<legend>Corporate Details</legend>
<p>
<label>Company Name</label>
<input name="Company_Name" type="text" value="<?php echo $row['cname']; ?>"></p>
<p>
<label>Company Logo</label>
<img src="../<?php echo $row2['clogo']; ?>" alt="<?php echo $row['cname']; ?>" />
<input type="file" name="Company_Logo" id="Company_Logo">
</p>
<p>
<label>Name of CEO</label>
<input type="text" name="Name_of_CEO" id="Name_of_CEO" value="<?php echo $row2['cceo']; ?>">
</p>
<p>
<label>Address</label>
<textarea name="caddress" cols="" rows="" id="caddress"><?php echo $row['caddress']; ?></textarea>
</p>
<p>
<label>Number of Employees</label>
<input type="text" name="Number_of_Employees" id="Number_of_Employees" value="<?php echo $row2['cemployees']; ?>">
</p>
<p>
<label>Industry</label>
<select name="Industry" id="Industry">
<option value="">Select Industry</option>
<?php
$resultindustry = mysql_query("SELECT * FROM company_industry");
while($rowindustry = mysql_fetch_array($resultindustry)){
?>
<option value="<?php echo $rowindustry['industry_id']; ?>"<?php if($rowindustry['industry_id']==$row2['industry_id']){ ?> selected<?php } ?>><?php echo $rowindustry['name']; ?></option>
<?php
} ?>
</select>
</p>
<p>
<label>Corporate Description</label>
<textarea cols="20" rows="5" name="Corporate_Description" id="Corporate_Description"><?php echo $row2['cdescription']; ?></textarea>
</p>
<p>
<label>Assigned Technical Support</label>
<select name="tsid" id="tsid">
<?php
$result3 = mysql_query("SELECT * FROM tsdetails");
while($row3 = mysql_fetch_array($result3))
{ ?>
<option value="<?php echo $row3['ts_id']; ?>"<?php if($row3['ts_id']==$row['ts_id']){?> selected<?php } ?>><?php echo $row3['name']; ?></option>
<?php
}
?>
</select>
</p>
<p>
<label>Assigned CAM</label>
<select name="camid" id="camid">
<?php
$result4 = mysql_query("SELECT * FROM camdetails");
while($row4 = mysql_fetch_array($result4))
{ ?>
<option value="<?php echo $row4['cam_id']; ?>"<?php if($row4['cam_id']==$row['cam_id']){?> selected<?php } ?>><?php echo $row4['name']; ?></option>
<?php
}
?>
</select>
</p>
</fieldset>
<input name="leadid" type="hidden" value="<?php echo $leadid; ?>"><a href="registered-company.php"><img style="float:left;" src="../images/list.png" alt="Registered Company" /></a><input name="Submit" type="submit" class="fSubmit" value="Submit">
</form>
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