<?php








	require_once('../config.php');








	require_once('auth.php');








?>








<!DOCTYPE html>








<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">








  <title>Reports Per Company</title>








  <link rel="stylesheet" href="../css/css-be258.css" type="text/css">








<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">








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


<h4><strong>Reports Per Company</strong></h4>











<?php





$result = mysql_query("SELECT * FROM company");


while($row = mysql_fetch_array($result))


  { 


  $result2 = mysql_query("SELECT * FROM company_lead WHERE lead_id=".$row['lead_id']);


$row2 = mysql_fetch_assoc($result2);


if($row2['cam_id']==$sesscamid){





?>


<p style="float:left; text-align:center; width:110px; margin:8px;"><a href="view-full-details.php?companyid=<?php echo $row['company_id']; ?>"><img class="clogo" src="../<?php echo $row['clogo']; ?>" alt="<?php echo $row['clogo']; ?>" /></a>
<br /><?php echo $row2['cname']; ?></p>











<?php  }  } ?>











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