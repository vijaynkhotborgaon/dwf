<?php








	require_once('../config.php');








	require_once('auth.php');?>








<!DOCTYPE html>








<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">








  <title>TS List</title>








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








<td colspan="7"><h4><strong>TS Lists</strong></h4></td>








</tr>








<tr style="text-align: center;">








<td style="text-align: center;"><strong>ID</strong></td>








<td><strong>Name</strong></td>








<td><strong>Email</strong></td>








<td><strong>Telephone Number</strong></td>








<td><strong>Alternate Number</strong></td>








<td><strong>Update</strong></td>








</tr>








<?php








$result = mysql_query("SELECT * FROM tsdetails where cam_id=$sesscamid");








  $i=1;








while($row = mysql_fetch_array($result))








  { 








?>








<tr style="text-align: center;">








<td><?php echo $i; ?></td>








<td><?php echo $row['name']; ?></td>








<td><?php echo $row['email']; ?></td>








<td><?php echo $row['tel_no']; ?></td>








<td><?php echo $row['alternate_no']; ?></td>








<td><a href="tsdetail-update.php?tsid=<?php echo $row['ts_id']; ?>">Update Details</a></td>








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