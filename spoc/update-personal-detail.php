<?php
	require_once('spoc-auth.php');
?>
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


                jQuery("#designation").validate({





                    expression: "if (VAL) return true; else return false;",





                    message: "Please enter your Designation"





                });





            });





            /* ]]> */





        </script>
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





		 ?>





  <div id="system-message">





							<div class="alert alert-message">





<?php

foreach($_SESSION['ERRMSG_ARR'] as $msg) {



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





	if(isset($_SESSION['SPOCUPDATE']) && $_SESSION['SPOCUPDATE']==1 ) {





?>





  <div id="system-message">





							<div class="alert alert-message">





<p>Update Personal Detail successfully</p>





       									</div>





					</div>	





<?php





		unset($_SESSION['SPOCUPDATE']);





	}





?>


<?php





	if(isset($_SESSION['SPOCPASSCNG']) && $_SESSION['SPOCPASSCNG']==1 ) {





?>





  <div id="system-message">





							<div class="alert alert-message">





<p>Password Change successfully</p>





       									</div>





					</div>	





<?php





		unset($_SESSION['SPOCPASSCNG']);





	}





?>





<?php





$result = mysql_query("SELECT * FROM company_spoc WHERE spoc_id=".$sessspocid);





$row = mysql_fetch_assoc($result);








?>





    <form action="update-detail-process" method="post">





    <input name="camid" type="hidden" value="<?php echo $sesscamid; ?>">





<table border="1" width="100%">





<tbody>





<tr>





<td colspan="2"><h4><strong>Update Personal Detail</strong></h4></td>





</tr>





<tr style="text-align: center;">





<td width="150"><strong>Name</strong></td>





<td><input name="name" id="name" type="text" value="<?php echo $row['name']; ?>"></td>





</tr>





<tr>





<td><strong>Email</strong></td>





<td><input name="email" id="email" type="text" value="<?php echo $row['email']; ?>"></td>





</tr>





<tr>





<td><strong>Telephone</strong></td>





<td><input name="telephone" id="telephone" type="text" value="<?php echo $row['phone']; ?>"></td>





</tr>





<tr>





<td><strong>Designation</strong></td>





<td><input name="designation" id="designation" type="text" value="<?php echo $row['designation']; ?>"></td>





</tr>





<tr>





<td><strong>Username</strong></td>





<td><?php echo $row['uname']; ?></td>





</tr>





<tr>





<td>&nbsp;</td>





<td><input name="submit" type="submit" value="Update details"></td>





</tr>





</tbody>





</table>





</form>





<form action="spoc-password-change" method="post">











<table border="1" width="100%">








<tbody>








<tr>








<td colspan="2"><h4><strong>Change Password</strong></h4></td>








</tr>








<tr style="text-align: center;">








<td width="150"><strong>New Password</strong></td>








<td><input name="pword" id="pword" type="password"></td>








</tr>








<tr>








<td><strong>Verify New Password</strong></td>








<td><input name="vpword" id="vpword" type="password"></td>








</tr>








<tr>








<td>&nbsp;</td>





<td><input name="submit" type="submit" value="Change Password"></td>








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