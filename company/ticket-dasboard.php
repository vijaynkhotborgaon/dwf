<div id="t3-mainbody" class="container t3-mainbody ">
<div class="row">
<!-- MAIN CONTENT -->
<div id="t3-content" class="t3-content span12">
<?php    
session_start();
$sessempid=$_SESSION['SESS_EMP_ID'];	
//Check whether the session variable SESS_MEMBER_ID is present or not
if(!isset($_SESSION['SESS_EMP_ID']) || (trim($_SESSION['SESS_EMP_ID']) == '')) {
?>
<div class="login-wrap">
<div class="login ">
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
<form action="loginprocess" method="post" class="form-horizontal">
<div id="login-main">
<div class="login-top">
<strong>Employee</strong> Login
</div>
<div class="login-bottom">
Username<span class="star">&nbsp;*</span><br>
<input type="text" name="username" id="username" value="" class="username">  	<br><br>

Password<span class="star">&nbsp;*</span><br>
<input type="password" name="password" id="password" value="" class="password"> 	<br>
<br>
<button type="submit">Log in</button><a href="<?php echo $mainurl; ?>company/<?php echo $_GET['companyurl']; ?>"> <button class="cancel" type="button">Cancel</button></a>
</div>
</div>
</form>
<img src="<?php echo $mainurl; ?>images/login_logo.png" alt="Disclose without fear" style="float:right;" />
</div>
</div>
<?php
} else {
?>
<article style="min-height:500px;">
<table border="1" width="100%">
<tbody>
<tr>
<td colspan="7"><h4><strong>Compaint List</strong></h4></td>
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
$result = mysql_query("SELECT * FROM complaints where complaint_user_id=$sessempid ORDER BY complaint_id DESC");
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
<td><a href="ticket-dasboard/<?php echo $row['ticket']; ?>">View Full Details</a></td>
</tr>
<?php } ?>
</tbody>
</table>
</article>
<?php
}
?>
</div>
</div>





</div>