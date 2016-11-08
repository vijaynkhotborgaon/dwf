<?php








	require_once('../config.php');








	require_once('auth.php');








?>








<!DOCTYPE html>








<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">








  <title>Technical Support Lists</title>








  <link rel="stylesheet" href="../css/css-be258.css" type="text/css">








<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">





<script type="text/javascript">





 function tsdelete(str)





{





	if(confirm("You want to delete the selected Technical Support?"))





	{





  location.href='delete_ts.php?tsid='+str;





}





}








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








<table border="1" width="100%">








<tbody>








<tr>








<td colspan="6"><h4 style="float:left;"><strong>Technical Support Lists</strong></h4><span style="float:right;"><a href="add-new-ts.php"><img src="../images/user_add.png" alt="Add New Technical Support" /></a></span></td>








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








$result = mysql_query("SELECT * FROM tsdetails");








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








<td><a href="tsdetail-update.php?tsid=<?php echo $row['ts_id']; ?>"><img src="../images/edit.png" alt="Edit CAM Detail" /></a>


<?php 


$resultcam = mysql_query("SELECT * FROM company_lead WHERE ts_id=".$row['ts_id']);


$companycam = mysql_num_rows($resultcam);


if($companycam!=0){ ?>





<a href="javascript:void(0);" onClick="alert('This CAM is Assigned to a Company')"><img src="../images/Delete.png" style="margin-left:5px;" alt="Delete CAM" /></a>


<?php


} else {


?>





<a href="javascript:void(0);" onClick="tsdelete('<?php echo $row['ts_id']; ?>')"><img src="../images/Delete.png" style="margin-left:5px;" alt="Delete CAM" /></a>





<?php } ?></td>








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