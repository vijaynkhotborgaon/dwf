<?php
require_once('spoc-auth.php');
$year = $_POST['year'];
$month = $_POST['month'];
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
<td colspan="7"><h4 style="float:left;"><strong>Complaint List</strong></h4>
<span style="float:right"><form action="view-complaints" method="post" class="filter">
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
//$result = mysql_query("SELECT * FROM complaints where company_id=$companyid ORDER BY complaint_id DESC");
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
<td><a href="view-complaint-details/<?php echo $row['ticket']; ?>">View Full Details</a></td>
</tr>
<?php } ?>
</tbody>
</table>
<a href="<?php echo $mainurl; ?>spoc/pdf-full-details.php?companyurl=<?php echo $_GET['companyurl']; ?>&companyid=<?php echo $companyid; ?>&year=<?php echo $year; ?>&month=<?php echo $month; ?>" style="display:block; margin-bottom:20px; float:left">Download Report</a>
</article>
<!-- //Article -->
</div>
</div>
<!-- //MAIN CONTENT -->
</div>