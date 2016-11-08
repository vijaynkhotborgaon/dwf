<?php
require_once('../config.php');
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if(isset($_SESSION['SESS_USER_ID']) || (trim($_SESSION['SESS_USER_ID']) != '') || (trim($_SESSION['SESS_USER_PRIORITY']) == '1')) {
header("location: main.php");
exit();
}
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Admin Dashboard</title>
<link rel="stylesheet" href="../css/css-be258.css" type="text/css">
<script src="../js/jquery-1.8.3.js" type="text/javascript"></script>
<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script src="../js/jquery.validation.functions.js" type="text/javascript"></script>






<script type="text/javascript">


jQuery(function(){
jQuery("#username").validate({
expression: "if (VAL) return true; else return false;",
message: "Please enter Your Username"
});
jQuery("#password").validate({
expression: "if (VAL) return true; else return false;",
message: "Please enter your password"
});
});
</script>
</head>
<body>
<?php
include('header.php');
?>
<div id="t3-mainbody" class="container t3-mainbody ">
<div class="row">
<!-- MAIN CONTENT -->
<div id="t3-content" class="t3-content span12">     
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
<form action="loginprocess.php" method="post" class="form-horizontal">
<div id="login-main">
<div class="login-top">
<strong>ADMIN</strong> Login
</div>
<div class="login-bottom">
Username<span class="star">&nbsp;*</span><br>
<input type="text" name="username" id="username" value="" class="username">  	<br><br>

Password<span class="star">&nbsp;*</span><br>
<input type="password" name="password" id="password" value="" class="password"> 	<br>
<br>
<button type="submit">Log in</button><a href="<?php echo $mainurl; ?>"> <button class="cancel" type="button" style="float:right;">Cancel</button></a>
</div>
</div>
</form>
<img src="../images/login_logo.png" alt="Disclose without fear" style="float:right;" />
</div>

</div>
</div>
<!-- //MAIN CONTENT -->
</div>
</div>	

<?php
include('footer.php');
?>
<!-- //FOOTER -->    
<div id="off-canvas-nav"><div class="t3-mainnav"><div class="nav-collapse collapse">
</div></div></div></body></html>