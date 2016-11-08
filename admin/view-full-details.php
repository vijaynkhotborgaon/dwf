<?php
require_once('../config.php');
require_once('auth.php');

$companyid = $_GET['companyid'];
$year = $_GET['year'];
$month = $_GET['month'];
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>View Full Details</title>
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
$result1 = mysql_query("SELECT * FROM company_lead where lead_id=".$row['lead_id']);
$row1 = mysql_fetch_assoc($result1);
?>
<article>
<div id="formWrapper">
<div style="margin-bottom:15px; float:left; width:100%"><h2 style="float:left;"><?php echo $row1['cname']; ?></h2><img style="float:right;" src="../<?php echo $row['clogo']; ?>" alt="<?php echo $row['cname']; ?>" /></div>
<table border="1" width="100%">
<tbody>
<tr>
<td colspan="7"><h4 style="float:left;"><strong>Complaint List</strong></h4>
<span style="float:right">
<form action="view-full-details.php" method="get" class="filter">
<input name="companyid" type="hidden" value="<?php echo $companyid; ?>">
<select name="year">
<option value="">Select the Year</option>
<?php for($i=2014;$i<=date('Y');$i++) { ?>
<option value="<?php echo $i; ?>"<?php if($year==$i){ ?> selected<?php } ?>><?php echo $i; ?></option>
<?php } ?>
</select>
<select name="month">
<option value="">Select the Month</option>
<option value="01"<?php if($month=='01'){ ?> selected<?php } ?>>January</option>
<option value="02"<?php if($month=='02'){ ?> selected<?php } ?>>February</option>
<option value="03"<?php if($month=='03'){ ?> selected<?php } ?>>March</option>
<option value="04"<?php if($month=='04'){ ?> selected<?php } ?>>April</option>
<option value="05"<?php if($month=='05'){ ?> selected<?php } ?>>May</option>
<option value="06"<?php if($month=='06'){ ?> selected<?php } ?>>June</option>
<option value="07"<?php if($month=='07'){ ?> selected<?php } ?>>July</option>
<option value="08"<?php if($month=='08'){ ?> selected<?php } ?>>Augest</option>
<option value="09"<?php if($month=='09'){ ?> selected<?php } ?>>Septemper</option>
<option value="10"<?php if($month=='10'){ ?> selected<?php } ?>>October</option>
<option value="11"<?php if($month=='11'){ ?> selected<?php } ?>>November</option>
<option value="12"<?php if($month=='12'){ ?> selected<?php } ?>>December</option>
</select>
<input name="filter" type="submit" value="Filter" style="margin-top:-7px;">
</form></span></td>
</tr>
<tr style="text-align: center;">
<td style="text-align: center;"><strong>Complaint ID</strong></td>
<td><strong>Complaint Category</strong></td>
<td><strong>Complaint Department</strong></td>
<td><strong>Status</strong></td>
<td><strong>Created Date</strong></td>
<td><strong>More Details</strong></td>
</tr>
<?php
//echo "SELECT * FROM complaints where company_id=$companyid ORDER BY complaint_id DESC";
if(($year=='')&&($month=='')){
$result = mysql_query("SELECT * FROM complaints where company_id=$companyid ORDER BY complaint_id DESC");
} elseif(($year!='')&&($month=='')){

$start=$year."-01-01";
$end=$year."-12-31";

$result = mysql_query("SELECT * FROM complaints where company_id=$companyid AND created_on>='$start' AND created_on<='$end' ORDER BY complaint_id DESC");

}
 elseif(($year!='')&&($month!='')){

$start=$year."-".$month."-01";
$end=$year."-".$month."-31";

$result = mysql_query("SELECT * FROM complaints where company_id=$companyid AND created_on>='$start' AND created_on<='$end' ORDER BY complaint_id DESC");

}
 elseif(($year=='')&&($month!='')){

$start=date('Y')."-".$month."-01";
$end=date('Y')."-".$month."-31";

$result = mysql_query("SELECT * FROM complaints where company_id=$companyid AND created_on>='$start' AND created_on<='$end' ORDER BY complaint_id DESC");

}
while($row = mysql_fetch_array($result))
{ 
?>
<tr style="text-align: center;">
<td><?php echo $row['ticket']; ?></td>
<?php
$result2 = mysql_query("SELECT * FROM complaint_category where cat_id=".$row['cat_id']);
$row2 = mysql_fetch_assoc($result2);
?>
<td><?php echo $row2['category']; ?></td>
<?php
$result3 = mysql_query("SELECT * FROM complaint_department where dep_id=".$row['dep_id']);
$row3 = mysql_fetch_assoc($result3);
?>
<td><?php echo $row3['department']; ?></td>
<?php
if($row['status']==0){
$status="Opened";
} elseif($row['status']==1){
$status="More Details Required";
} elseif($row['status']==2){
$status="Closed";
}
?>
<td><?php echo $status; ?></td>
<td><?php echo $row['created_on']; ?></td>
<td><a href="view-complaint-details.php?id=<?php echo $row['complaint_id']; ?>">View Full Details</a></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</article>
<a href="pdf-full-details.php?companyid=<?php echo $companyid; ?>&year=<?php echo $year; ?>&month=<?php echo $month; ?>" style="display:block; margin-bottom:20px; float:left">Download Report</a>
<a href="reports-per-company.php" style="display:block; margin-bottom:20px; float:right">View Full List</a>
</div>
</div>
<!-- //MAIN CONTENT -->
</div>	

<?php
include('footer.php');
?>
<!-- //FOOTER -->    
 </body></html>