<?php


	require_once('../config.php');


	require_once('auth.php');$leadid=$_GET['leadid'];


?>


<!DOCTYPE html>


<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


  <title>Add company detail</title>


  <link rel="stylesheet" href="../css/css-be258.css" type="text/css">


<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">


<script src="../js/jquery-1.8.3.js" type="text/javascript"></script><script type="text/javascript">//<![CDATA[ 








$(document).ready(function(){


		//when the Add Filed button is clicked


		$("#addSpoc").click(function (e) {


			//Append a new row of code to the "#items" div


			var i = $('#Spoc_Details fieldset').size() + 1;


			var n = $("#Spoc_Details fieldset").length;


if (n <=4) {


$("#Spoc_Details").append('<fieldset class="fBlockspoc" id="Spocs"><legend>Secondary Spocs</legend><p><label>Name</label><input type="text" name="spocname[]" id="spocname"></p><p><label>Email</label><input type="text" name="spocemail[]" id="spocemail"></p><p><label>Phone Number</label><input type="text" name="spocphone[]" id="spocphone"></p><p><label>Designation</label><input type="text" name="spocdesignation[]" id="spocdesignation"></p><p><label>User name</label><input type="text" name="spocuname[]" id="spocuname"></p><p><label>Password</label><input type="password" name="spocpword[]" id="spocpword"></p><p><label>Verify Password</label><input type="password" name="spocvpword[]" id="spocvpword"></p><a href="javascript:void(0)" id="remSpoc">Remove spoc</a></fieldset>');


 i++;


}


else{


	alert("Maximum five spocs are allowed!")


}


		});





		$("body").on("click", "#remSpoc", function (e) {


			$(this).parent("fieldset").remove();


		});


	});





/*$(window).load(function(){


$(function() {


        var scntDiv = $('#Spoc_Details');


        var i = $('#Spoc_Details fieldset').size() + 1;


        var n = $("#Spoc_Details fieldset").length;


		if (n <=5) {


        $('#addSpoc').live('click', function() {


                $('<fieldset class="fBlockspoc" id="Spocs"><legend>Spoc ' + i +'</legend><p><label>Name</label><input type="text" name="spocname' + i +'" id="spocname' + i +'" required></p><p><label>Email</label><input type="text" name="spocemail' + i +'" id="spocemail' + i +'" required></p><p><label>Phone Number</label><input type="text" name="spocphone' + i +'" id="spocphone' + i +'" required></p><p><label>Designation</label><input type="text" name="spocdesignation' + i +'" id="spocdesignation' + i +'" required></p><p><label>User name</label><input type="text" name="spocuname' + i +'" id="spocuname' + i +'" required></p><p><label>Password</label><input type="password" name="spocpword' + i +'" id="spocpword' + i +'" required></p><p><label>Verify Password</label><input type="password" name="spocvpword' + i +'" id="spocvpword' + i +'" required></p><a href="javascript:void(0)" id="remSpoc">Remove spoc</a></fieldset>').appendTo(scntDiv);


                i++;


        });


                }


        $('#remSpoc').live('click', function() { 


                if( i > 2 ) {


                        $(this).parents('.fBlockspoc').remove();


                        i--;


                }


                return false;


        });


});});//]]>  */





</script>


<script src="../js/jquery.validate.js" type="text/javascript"></script>


<script src="../js/jquery.validation.functions.js" type="text/javascript"></script>


        <script type="text/javascript">


            /* <![CDATA[ */


            jQuery(function(){


                jQuery("#Company_Logo").validate({


                    expression: "if (VAL) return true; else return false;",


                    message: "Please select the company Logo"


                });


                jQuery("#Name_of_CEO").validate({


                    expression: "if (VAL) return true; else return false;",


                    message: "Please enter the name of CEO"


                });


                jQuery("#Number_of_Employees").validate({


                    expression: "if (VAL) return true; else return false;",


                    message: "Please enter Number of Employees working in the Company"


                });


                jQuery("#Industry").validate({


                    expression: "if (VAL) return true; else return false;",


                    message: "Please enter the Company Industry"


                });


                jQuery("#Corporate_Description").validate({


                    expression: "if (VAL) return true; else return false;",


                    message: "Please enter the Company Description"


                });


                jQuery("#Active_From").validate({


                    expression: "if (VAL) return true; else return false;",


                    message: "Please select the start date to be active"


                });


                jQuery("#Active_Till").validate({


                    expression: "if (VAL) return true; else return false;",


                    message: "Please select the till date to be active"


                });


                jQuery("#spocuname1").validate({


                    expression: "if (VAL) return true; else return false;",


                    message: "Please enter the user name"


                });


                jQuery("#spocpword1").validate({


                    expression: "if (VAL.length > 5 && VAL) return true; else return false;",


                    message: "Please enter the password"


                });


                jQuery("#spocvpword1").validate({


                    expression: "if ((VAL == jQuery('#spocpword1').val()) && VAL) return true; else return false;",


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


	if(isset($_SESSION['COMREGMESG']) && $_SESSION['COMREGMESG']==1 ) {


?>


  <div id="system-message">


							<div class="alert alert-message">


<p>Updated the Company Details successfully</p>


       									</div>


					</div>	


<?php


		unset($_SESSION['COMREGMESG']);


	}$result = mysql_query("SELECT * FROM company_lead where lead_id=$leadid");


$row = mysql_fetch_assoc($result);


?>


<div id="formWrapper">


    <form action="add-company-process.php" method="post" enctype="multipart/form-data">


    <fieldset class="fBlock" id="Corporate_Details">


<legend>Corporate Details</legend>


<p>


<label>Company Name</label>


<?php echo $row['cname']; ?>


<input name="Company_Name" type="hidden" value="<?php echo $row['cname']; ?>"></p>


<p>


<label>Company Logo</label>


<input type="file" name="Company_Logo" id="Company_Logo">


</p>


<p>


<label>Name of CEO</label>


<input type="text" name="Name_of_CEO" id="Name_of_CEO">


</p>


<p>


<label>Address</label>


<?php echo $row['caddress']; ?>


</p>


<p>


<label>Number of Employees</label>


<input type="text" name="Number_of_Employees" id="Number_of_Employees">


</p>


<p>


<label>Industry</label>


<select name="Industry" id="Industry">


<option value="">Select Industry</option>


<?php


$resultindustry = mysql_query("SELECT * FROM company_industry");


while($rowindustry = mysql_fetch_array($resultindustry)){


?>


<option value="<?php echo $rowindustry['industry_id']; ?>"><?php echo $rowindustry['name']; ?></option>


<?php


} ?>


</select>


</p>


<p>


<label>Corporate Description</label>


<textarea cols="20" rows="5" name="Corporate_Description" id="Corporate_Description"></textarea>


</p>


</fieldset>


<fieldset class="fBlock" id="Contarct_Period">


<legend>Contract Period</legend>


<p>


<label>Active From</label>


<input type="text" name="Active_From" id="Active_From">


</p>


<p>


<label>Active Till</label>


<input type="text" name="Active_Till" id="Active_Till">


</p>


</fieldset>


<fieldset class="fBlock" id="Spoc_Details">


<legend>Spocs Details</legend><fieldset class="fBlock" id="Primary_Contact_Details">


<legend>Primary Spoc</legend>


<p>


<label>Name</label>


<?php echo $row['cperson']; ?>


</p>


<p>


<label>Email</label>


<?php echo $row['cemail']; ?>


</p>


<p>


<label>Phone Number</label>


<?php echo $row['cphone']; ?>


</p>


<p>


<label>Designation</label>


<?php echo $row['cdesignation']; ?></p><p>


<label>User name</label>


<input type="text" name="spocuname1" id="spocuname1">


</p>


<p>


<label>Password</label>


<input type="password" name="spocpword1" id="spocpword1">


</p>


<p>


<label>Verify Password</label>


<input type="password" name="spocvpword1" id="spocvpword1">


</p></fieldset>


<a href="javascript:void(0)" id="addSpoc">Add New Spoc</a>


</fieldset>


<input name="leadid" type="hidden" value="<?php echo $leadid; ?>"><input name="Submit" type="submit" class="fSubmit">


</form>


</div>


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