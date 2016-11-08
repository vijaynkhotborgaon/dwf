<div id="t3-mainbody" class="container t3-mainbody ">
<div class="row">
<!-- MAIN CONTENT -->
<div id="t3-content" class="t3-content span12">
<?php    
session_start();
$sessempid=$_SESSION['SESS_EMP_ID'];	
//Check whether the session variable SESS_MEMBER_ID is present or not
if(!isset($_SESSION['SESS_EMP_ID']) || (trim($_SESSION['SESS_EMP_ID']) == '')) {
} else {
?>
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
$result = mysql_query("SELECT * FROM complaints where ticket='".$_GET['complaint-id']."'");
$row = mysql_fetch_assoc($result);
?>
<div id="formWrapper">
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
<label>Status</label>
<?php
if($row['status']==0){
$status="Opened";
} elseif($row['status']==1){
$status="More Details Required";
} elseif($row['status']==2){
$status="Closed";
}
?>
<strong><?php echo $status; ?></strong>
</p>
<p>
<label>Created Date</label>
<strong><?php echo $row['created_on']; ?></strong>
</p>
</fieldset>
<h3>Discussions</h3>
<?php
$result12 = mysql_query("SELECT * FROM complaints_reply where complaint_id=".$row['complaint_id']);
while($row12 = mysql_fetch_array($result12)){
if($row12['user_id']!=0){
$replay="You";
} elseif(($row12['cam_id']!=0)|| ($row12['ts_id']!=0) || ($row12['spoc_id']!=0)){
$replay="Company";
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
<p>
<label>Comments</label>
<?php if($row12['msg']==''){ ?>
<strong>No Comments</strong>
<?php } else { ?>
<strong><?php echo $row12['msg']; ?></strong>
<?php } ?>
</p>
<?php if($row12['attachment']!=''){ ?>
<p>
<label>Attachment</label>
<a href="<?php echo $mainurl; ?>/company/doc/<?php echo $row12['attachment']; ?>" target="_blank" style="width: 52%; word-wrap: break-word;display: block;float: left;"><?php echo $mainurl; ?>/company/doc/<?php echo $row12['attachment']; ?></a>
</p>
<?php } ?>
</fieldset>
<?php } 
if($row['status']!=2){ ?>
<form action="../complaint-replay-process" method="post" enctype="multipart/form-data">
<fieldset class="fBlock" id="Corporate_Details">
<textarea name="comments" cols="" rows="5" style="width:98%;"></textarea>
<p><label>Attachment</label><input name="attachment" type="file" /></p>
<input name="complaint_id" type="hidden" value="<?php echo $row['complaint_id']; ?>">
<input name="complaint_ticket" type="hidden" value="<?php echo $_GET['complaint-id']; ?>">
<input name="submit" type="submit" value="Reply" class="fSubmit" />
</fieldset>
</form>
<?php } ?>
</div>
</article>
<?php
}
?>
</div>
</div>







</div>