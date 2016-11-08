<?php








	require_once('../config.php');








	require_once('auth.php');








?>








<!DOCTYPE html>








<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">








  <title>CAM List</title>








  <link rel="stylesheet" href="../css/css-be258.css" type="text/css">








<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<script src="<?php echo $mainurl; ?>/js/jquery-1.8.3.js" type="text/javascript"></script>



<script type="text/javascript">





 function camdelete(str)





{





	if(confirm("You want to delete the selected CAM?"))





	{





  location.href='delete_cam.php?camid='+str;





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





<?php








	if(isset($_SESSION['CAMDELMESG']) && $_SESSION['CAMDELMESG']==1 ) {








?>








  <div id="system-message">








							<div class="alert alert-message">








<p>Delete CAM successfully</p>








       									</div>








					</div>	








<?php








		unset($_SESSION['CAMDELMESG']);








	}








?>


	<article>








<table border="1" width="100%">








<tbody>








<tr>








<td colspan="6"><h4 style="float:left;"><strong>CAM Lists</strong></h4><span style="float:right;"><a href="add-new-cam.php"><img src="../images/user_add.png" alt="Add New CAM" /></a></span></td>








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








$result = mysql_query("SELECT * FROM camdetails");








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





<td><a href="camdetail-update.php?camid=<?php echo $row['cam_id']; ?>"><img src="../images/edit.png" alt="Edit CAM Detail" /></a>


<?php 


$resultcam = mysql_query("SELECT * FROM company_lead WHERE cam_id=".$row['cam_id']);


$companycam = mysql_num_rows($resultcam);


if($companycam!=0){ ?>





<a href="javascript:void(0);" onClick="alert('This CAM is Assigned to a Company')"><img src="../images/Delete.png" style="margin-left:5px;" alt="Delete CAM" /></a>


<?php


} else {


?>





<a href="javascript:void(0);" onClick="camdelete('<?php echo $row['cam_id']; ?>')"><img src="../images/Delete.png" style="margin-left:5px;" alt="Delete CAM" /></a> 





<?php } ?>


</td>


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