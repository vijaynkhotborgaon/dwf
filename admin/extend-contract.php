<?php








	require_once('../config.php');








	require_once('auth.php');


$cid=$_GET['leadid'];


?>








<!DOCTYPE html>








<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">








  <title>Extend Contract Period</title>








  <link rel="stylesheet" href="../css/css-be258.css" type="text/css">








<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">











<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">


  <script src="//code.jquery.com/jquery-1.10.2.js"></script>


  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>


<script>


  $(function() {


    $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });


  });


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








	if(isset($_SESSION['UPDATECONTRACT']) && $_SESSION['UPDATECONTRACT']==1 ) {








?>








  <div id="system-message">








							<div class="alert alert-message">








<p>Update Contract Details successfully</p>








       									</div>








					</div>	








<?php








		unset($_SESSION['UPDATECONTRACT']);








	}








?>





<?php


$resultcontract = mysql_query("SELECT * FROM company_contract where lead_id=".$cid);


$rowcontract = mysql_fetch_assoc($resultcontract);?>


<form action="update-contract.php" method="post">





<table border="1" width="100%">








<tbody>








<tr>








<td colspan="2"><h4 style="float:left;"><strong>Extend Contract Period</strong></h4></td>








</tr>








<tr>








<td width="150"><strong>Active From</strong></td>








<td><?php echo $rowcontract['fromdate']; ?></td>








</tr>








<tr>








<td width="150"><strong>Active Till</strong></td>








<td><input name="activetill" type="text" class="datepicker" value="<?php echo $rowcontract['tilldate']; ?>" readonly></td>








</tr>





<tr>








<td width="150">&nbsp;</td>


<input name="leadid" type="hidden" value="<?php echo $cid; ?>">





<td><input name="submit" type="submit" value="Update Contract"></td>








</tr>





</tbody>








</table>





</form>


</article>








</div>








</div>








</div>	








    

















<?php








include('footer.php');








?>








<!-- //FOOTER -->    








  </body></html>