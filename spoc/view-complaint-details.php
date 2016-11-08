<?php
require_once('spoc-auth.php');

$id=$_GET['id'];
$result = mysql_query("SELECT * FROM complaints where ticket='".$id."'");
$row = mysql_fetch_assoc($result);
$result2 = mysql_query("SELECT * FROM company_spoc where spoc_id=".$sessspocid." AND company_id=".$row['company_id']);
$countauth = mysql_num_rows($result2);
if($countauth==''){
     header("location: ".$mainurl."spoc/".$_GET['companyurl']."/dashboard");
}
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
if(isset($_SESSION['COMRPLYMSG']) && $_SESSION['COMRPLYMSG']==1 ) {
?>
<div id="system-message">
<div class="alert alert-message">
<p>Complaint Updated Successfully</p>
</div>
</div>	
<?php
unset($_SESSION['COMRPLYMSG']);
}
?>
<?php
$result = mysql_query("SELECT * FROM complaints where ticket='".$id."'");
$row = mysql_fetch_assoc($result);
?>
<div id="formWrapper">
<form action="<?php echo $mainurl; ?>spoc/<?php echo $_GET['companyurl']; ?>/update-complaint-process" method="post" enctype="multipart/form-data">
<fieldset class="fBlock" id="Corporate_Details">
<legend><?php echo $row['ticket']; ?></legend>
<p>
<label>Complaint Category</label>
<?php
$result2 = mysql_query("SELECT * FROM complaint_category where cat_id=".$row['cat_id']);
$row2 = mysql_fetch_assoc($result2);
?>
<strong><?php echo $row2['category']; ?></strong>
</p>
<p>
<label>Complaint Department</label>
<?php
$result3 = mysql_query("SELECT * FROM complaint_department where dep_id=".$row['dep_id']);
$row3 = mysql_fetch_assoc($result3);
?>
<strong><?php echo $row3['department']; ?></strong>
</p>
<p>
<label>Complaint Detail</label>
<strong><?php echo $row['detail']; ?></strong>
</p>
<p>
<label>Attachment</label>
<?php if($row['upload']!=''){ ?>
<a href="<?php echo $mainurl; ?>/company/doc/<?php echo $row['upload']; ?>" target="_blank" style="width: 52%; word-wrap: break-word;display: block;float: left;"><?php echo $mainurl; ?>/company/doc/<?php echo $row['upload']; ?></a>
<?php } ?>
</p>
<p>
<label>Created Date</label>
<strong><?php echo $row['created_on']; ?></strong>
</p>
<?php if($row['status']==2){?>
<p>
<label>Status</label>
<strong>Closed</strong>
</p>
<?php } else { ?>
<p>
<label>Status</label>
<select name="status">
<option value="0"<?php if($row['status']==0){?> selected<?php } ?>>Opened</option>
<option value="1"<?php if($row['status']==1){?> selected<?php } ?>>More Details Required</option>
<option value="2"<?php if($row['status']==2){?> selected<?php } ?>>Closed</option>
</select>
</p>
<p>
<label>Comments</label>
<textarea name="comments" cols="" rows=""></textarea>
</p>
</fieldset>
<input name="complaint_id" type="hidden" value="<?php echo $row['complaint_id']; ?>">
<input name="complaint_ticket" type="hidden" value="<?php echo $_GET['id']; ?>">
<input name="Submit" type="submit" class="fSubmit">
<?php } ?>
</form>
<h3>Discussions</h3>
<?php
$result12 = mysql_query("SELECT * FROM complaints_reply where complaint_id=".$row['complaint_id']);
while($row12 = mysql_fetch_array($result12)){
if($row12['user_id']!=0){
$replay="Employee";
} elseif($row12['cam_id']!=0){
$resultcam = mysql_query("SELECT * FROM camdetails where cam_id=".$row12['cam_id']);
$rowcam = mysql_fetch_assoc($resultcam);
$replay=$rowcam['name']." (CAM)";
} elseif($row12['ts_id']!=0){
$resultts = mysql_query("SELECT * FROM tsdetails where ts_id=".$row12['ts_id']);
$rowts = mysql_fetch_assoc($resultts);
$replay=$rowts['name']." (TS)";
} elseif($row12['spoc_id']!=0){
$resultspoc = mysql_query("SELECT * FROM company_spoc where spoc_id=".$row12['spoc_id']);
$rowspoc = mysql_fetch_assoc($resultspoc);
$replay=$rowspoc['name']." (SPOC)";
}
?>
<fieldset class="fBlock" id="Corporate_Details">
<legend><?php echo $replay; ?></legend>
<p>
<label>Replay Date</label>
<strong><?php echo $row12['created_on']; ?></strong>
</p>
<?php if($row12['status']!=6){ ?>
<p>
<label>Status</label>
<?php
if($row12['status']==0){
$status="Opened";
} elseif($row12['status']==1){
$status="More Details Required";
} elseif($row12['status']==2){
$status="Closed";
}
?>
<strong><?php echo $status; ?></strong>
</p>
<?php } ?>
<?php if($row12['attachment']!=''){ ?>
<p>
<label>Attachment</label>
<a href="<?php echo $mainurl; ?>company/doc/<?php echo $row12['attachment']; ?>" target="_blank"><?php echo $mainurl; ?>company/doc/<?php echo $row12['attachment']; ?></a>
</p>
<?php } ?>
<p>
<label>Comments</label>
<?php if($row12['msg']==''){ ?>
<strong>No Comments</strong>
<?php } else { ?>
<strong><?php echo $row12['msg']; ?></strong>
<?php } ?>
</p>
</fieldset>
<?php } ?>
</div>
</article>
<!-- //Article -->
</div>
</div>
<!-- //MAIN CONTENT -->
</div>