<?php








	require_once('../config.php');








	require_once('auth.php');








?>








<!DOCTYPE html>








<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">








  <title>Add New CAM</title>








  <link rel="stylesheet" href="../css/css-be258.css" type="text/css">








<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">








<script src="../js/jquery-1.8.3.js" type="text/javascript"></script>








<script src="../js/jquery.validate.js" type="text/javascript"></script>








<script src="../js/jquery.validation.functions.js" type="text/javascript"></script>








        <script type="text/javascript">








            /* <![CDATA[ */








            jQuery(function(){








                jQuery("#name").validate({








                    expression: "if (VAL) return true; else return false;",








                    message: "Please enter Your Name"








                });








                jQuery("#email").validate({








                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",








                    message: "Please enter a valid Email ID"








                });








                jQuery("#telephone").validate({








                    expression: "if (VAL) return true; else return false;",








                    message: "Please enter telephone number"








                });








                jQuery("#uname").validate({








                    expression: "if (VAL) return true; else return false;",








                    message: "Please enter the user name"








                });








                jQuery("#pword").validate({








                    expression: "if (VAL.length > 5 && VAL) return true; else return false;",








                    message: "Password length should be more than 5 digits"








                });








                jQuery("#vpword").validate({








                    expression: "if ((VAL == jQuery('#pword').val()) && VAL) return true; else return false;",








                    message: "Confirm password field doesn't match the password field"








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








	if(isset($_SESSION['CAMREGMESG']) && $_SESSION['CAMREGMESG']==1 ) {








?>








  <div id="system-message">








							<div class="alert alert-message">








<p>New CAM added successfully</p>








       									</div>








					</div>	








<?php








		unset($_SESSION['CAMREGMESG']);








	}








?>

















    <form action="add-cam-process.php" method="post">








<table border="1" width="100%">








<tbody>








<tr>








<td colspan="2"><h4><strong>Add New CAM</strong></h4></td>








</tr>








<tr style="text-align: center;">








<td width="150"><strong>Name</strong></td>








<td><input name="name" id="name" type="text"></td>








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








<td><strong>Alternate Number</strong></td>








<td><input name="phone" id="phone" type="text"></td>








</tr>








<tr>











<td><strong>Username</strong></td>








<td><input name="uname" id="uname" type="text"></td>








</tr>








<tr>








<td><strong>Password</strong></td>








<td><input name="pword" id="pword" type="password"></td>








</tr>








<tr>








<td><strong>Verify Password</strong></td>








<td><input name="vpword" id="vpword" type="password"></td>








</tr>








<tr>








<td>&nbsp;</td>








<td><input name="submit" type="submit" value="Submit"></td>








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