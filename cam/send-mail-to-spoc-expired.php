<?php











	require_once('../config.php');











	require_once('auth.php');?>











<!DOCTYPE html>











<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">











  <title>View Company Details</title>











  <link rel="stylesheet" href="../css/css-be258.css" type="text/css">











<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">











<link type="text/css" rel="stylesheet" href="../css/jquery-te-1.4.0.css">





<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script>


<script type="text/javascript" src="../js/jquery-te-1.4.0.js" charset="utf-8"></script>








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











$result = mysql_query("SELECT * FROM company_lead where lead_id=".$_GET['leadid']);





$row = mysql_fetch_assoc($result);





$result1 = mysql_query("SELECT * FROM company_contract where lead_id=".$_GET['leadid']);





$row1 = mysql_fetch_assoc($result1);











?>











	<article>


<form action="mail-to-spoc-process.php" method="post">


<strong>To:</strong> <?php echo $row['cperson']; ?><br>


<strong>Email:</strong> <?php echo $row['cemail']; ?><br>


<strong>Company:</strong> <?php echo $row['cname']; ?>





<textarea name="mailspoc" class="jqte-test"><p><b>Hi <?php echo $row['cperson']; ?></b>,</p><p>Your Company Contract with <b>Disclose Without Fear!</b> is expired on <?php echo $row1['tilldate']; ?>, please contact us to extend your contract period</p>





<p><b>Contract Period:</b></p>


<p><b>Active From:</b> <?php echo $row1['fromdate']; ?><br>


<b>Till From:</b> <?php echo $row1['tilldate']; ?></p></textarea>


<input name="tomail" type="hidden" value="<?php echo $row['cemail']; ?>">


<input name="frommail" type="hidden" value="info@dwf.com">


<input name="cid" type="hidden" value="<?php echo $_GET['leadid']; ?>">


<input name="submit" type="submit" value="Send Mail">


</form>


<script>


	$('.jqte-test').jqte();


</script>


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