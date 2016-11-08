<?php





	require_once('../config.php');





	require_once('auth.php');





?>





<!DOCTYPE html>





<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">





  <title>Complaint List</title>





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





<table border="1" width="100%">





<tbody>





<tr>





<td colspan="6"><h4><strong>Company List</strong></h4></td>





</tr>





<tr style="text-align: center;">





<td style="text-align: center;"><strong>ID</strong></td>





<td><strong>Company Name</strong></td>





<td><strong>Category</strong></td>





<td><strong>Department</strong></td>





<td><strong>Detailed Complaint</strong></td>





<td><strong>More Details</strong></td>





</tr>





<?php





$result = mysql_query("SELECT * FROM complaints where cam_id=$sesscamid ORDER BY complaint_id DESC");





  $i=1;





while($row = mysql_fetch_array($result))





  { 





?>





<tr style="text-align: center;">


<td><?php echo $i; ?></td>


<?php


$result1 = mysql_query("SELECT * FROM company where company_id=".$row['company_id']);


$row1 = mysql_fetch_assoc($result1);


?>


<td><?php echo $row1['cname']; ?></td>


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





<td><?php echo $row['detail']; ?></td>





<td><a href="#">View Full Details</a></td>





</tr>





<?php   $i++; } ?>





</tbody>





</table>

















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