<?php
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if(isset($_SESSION['SESS_SPOC_ID']) || (trim($_SESSION['SESS_SPOC_ID']) != '')) {
     header("location: ".$mainurl."spoc/".$_GET['companyurl']."/dashboard");
exit();
}
?>
<div id="t3-mainbody" class="container t3-mainbody ">
<div class="row">
<!-- MAIN CONTENT -->
<div id="t3-content" class="t3-content span12">     
<div class="login-wrap">
<div class="login ">
<?php
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
?>
<div id="system-message">
<div class="alert alert-message">
<?php
foreach($_SESSION['ERRMSG_ARR'] as $msg) { 
echo '<p>',$msg,'</p>'; 
}
?>
</div>
</div>	
<?php
unset($_SESSION['ERRMSG_ARR']);
}
?>
<form action="<?php echo $mainurl; ?>spoc/<?php echo $_GET['companyurl']; ?>/loginprocess" method="post" class="form-horizontal">
<div id="login-main">
<div class="login-top">
<strong>SPOC</strong> Login
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
</div>
<!-- //MAIN CONTENT -->
</div>
</div>	
