<?php
require_once('../config.php');
require_once('auth.php');
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Add Company Leads</title>
<link rel="stylesheet" href="../css/css-be258.css" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<script src="../js/jquery-1.8.3.js" type="text/javascript"></script>
<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script src="../js/jquery.validation.functions.js" type="text/javascript"></script>
<script type="text/javascript">
/* <![CDATA[ */
jQuery(function(){
jQuery("#cname").validate({
expression: "if (VAL) return true; else return false;",
message: "Please enter the Company Name"
});
jQuery("#email").validate({
expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
message: "Please enter a valid Email ID"
});
jQuery("#telephone").validate({
expression: "if (VAL) return true; else return false;",
message: "Please enter telephone number"
});
jQuery("#caddress").validate({
expression: "if (VAL) return true; else return false;",
message: "Please enter the Company Address"
});
jQuery("#cperson").validate({
expression: "if (VAL) return true; else return false;",
message: "Please enter the Contact Person Name"
});
jQuery("#designation").validate({
expression: "if (VAL) return true; else return false;",
message: "Please enter the Contact Person Designation"
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
if(isset($_SESSION['COMLEADMSG']) && $_SESSION['COMLEADMSG']==1 ) {
?>
<div id="system-message">
<div class="alert alert-message">
<p>New Company Lead added successfully</p>
</div>
</div>	
<?php
unset($_SESSION['COMLEADMSG']);
}
?>
<form action="add-companylead-process.php" method="post">
<table border="1" width="100%">
<tbody>
<tr>
<td colspan="2"><h4><strong>Add New Company Lead</strong></h4></td>
</tr>
<tr style="text-align: center;">
<td width="150"><strong>Company Name</strong></td>
<td><input name="cname" id="cname" type="text"></td>
</tr>
<tr style="text-align: center;">
<td width="150"><strong>Company Address</strong></td>
<td><textarea name="caddress" cols="" rows="" id="caddress"></textarea></td>
</tr>
<tr style="text-align: center;">
<td width="150"><strong>Contact Person</strong></td>
<td><input name="cperson" id="cperson" type="text"></td>
</tr>
<tr>
<td><strong>Email</strong></td>
<td><input name="email" id="email" type="text"></td>
</tr>
<tr>
<td><strong>Telephone</strong></td>
<td><input name="telephone" id="telephone" type="text"></td>
</tr>
<tr>
<td><strong>Designation</strong></td>
<td><input name="designation" id="designation" type="text"></td>
</tr>
<tr>
<tr>
<td><strong>Assigned TS</strong></td>
<td>
<select name="tsid" id="tsid">
<?php
$result = mysql_query("SELECT * FROM tsdetails WHERE cam_id=".$sesscamid);
while($row = mysql_fetch_array($result))
{ ?>
<option value="<?php echo $row['ts_id']; ?>"><?php echo $row['name']; ?></option>
<?php
}
?>
</select>
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input name="submit" type="submit"></td>
</tr>
</tbody>
</table>
</form>
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