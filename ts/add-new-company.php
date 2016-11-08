<?php


	require_once('../config.php');


	require_once('auth.php');


?>


<!DOCTYPE html>


<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


  <title>Add New company</title>


  <link rel="stylesheet" href="../css/css-be258.css" type="text/css">


<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">


<script src="../js/jquery-1.8.3.js" type="text/javascript"></script>


<script src="../js/jquery.validate.js" type="text/javascript"></script>


<script src="../js/jquery.validation.functions.js" type="text/javascript"></script>


        <script type="text/javascript">


            /* <![CDATA[ */


            jQuery(function(){


                jQuery("#Company_Name").validate({


                    expression: "if (VAL) return true; else return false;",


                    message: "Please enter Company Name"


                });


                jQuery("#Company_Logo").validate({


                    expression: "if (VAL) return true; else return false;",


                    message: "Please select the company Logo"


                });


                jQuery("#Name_of_CEO").validate({


                    expression: "if (VAL) return true; else return false;",


                    message: "Please enter the name of CEO"


                });


                jQuery("#Address").validate({


                    expression: "if (VAL) return true; else return false;",


                    message: "Please enter the Company Address"


                });


                /* jQuery("#Locations").validate({


                    expression: "if (VAL) return true; else return false;",


                    message: "Please enter the Company Locations"


                }); */


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


                jQuery("#Username").validate({


                    expression: "if (VAL) return true; else return false;",


                    message: "Please enter the user name"


                });


                jQuery("#Password").validate({


                    expression: "if (VAL.length > 5 && VAL) return true; else return false;",


                    message: "Please enter the password"


                });


                jQuery("#Verify_Password").validate({


                    expression: "if ((VAL == jQuery('#Password').val()) && VAL) return true; else return false;",


                    message: "Confirm password field doesn't match the password field"


                });


                jQuery("#Mem1_Name").validate({


                    expression: "if (VAL) return true; else return false;",


                    message: "Please enter the spoc name"


                });


                jQuery("#Mem1_Phone").validate({


                    expression: "if (VAL) return true; else return false;",


                    message: "Please enter the spoc telephone number"


                });


                jQuery("#Mem1_Email").validate({


                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",


                    message: "Please enter a valid Email ID"


                });


                jQuery("#Primary_Name").validate({


                    expression: "if (VAL) return true; else return false;",


                    message: "Please enter the Primary Contact person Name"


                });


                jQuery("#Primary_Phone").validate({


                    expression: "if (VAL) return true; else return false;",


                    message: "Please enter the Primary contact person telephone number"


                });


                jQuery("#Primary_Designation").validate({


                    expression: "if (VAL) return true; else return false;",


                    message: "Please enter the Primary contact person designation"


                });


                jQuery("#Primary_Email").validate({


                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",


                    message: "Please enter the Primary contact person valid Email ID"


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


<p>New Company added successfully</p>


       									</div>


					</div>	


<?php


		unset($_SESSION['COMREGMESG']);


	}


?>


<div id="formWrapper">


    <form action="add-company-process.php" method="post" enctype="multipart/form-data">


    <fieldset class="fBlock" id="Corporate_Details">


<legend>Corporate Details</legend>


<p>


<label>Company Name</label>


<input type="text" name="Company_Name" id="Company_Name">


</p>


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


<textarea cols="20" rows="5" name="Address" id="Address"></textarea>


</p>


<p>


<label>Locations</label>


<textarea cols="20" rows="5" name="Locations" id="Locations"></textarea>


</p>


<p>


<label>Number of Employees</label>


<input type="text" name="Number_of_Employees" id="Number_of_Employees">


</p>


<p>


<label>Industry</label>


<input type="text" name="Industry" id="Industry">


</p>


<p>


<label>Corporate Description</label>


<textarea cols="20" rows="5" name="Corporate_Description" id="Corporate_Description"></textarea>


</p>


<p>


<label>TS Assigned</label>


<select name="tsid" id="tsid">


<?php


$result = mysql_query("SELECT * FROM tsdetails WHERE cam_id=".$sesscamid);


while($row = mysql_fetch_array($result))


  { ?>


<option value="<?php echo $row['ts_id']; ?>"><?php echo $row['name']; ?></option>


<?php


}


?>


  </select>


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


<fieldset class="fBlock" id="Login_Detail">


<legend>Login Detail</legend>


<p>


<label>User name</label>


<input type="text" name="Username" id="Username">


</p>


<p>


<label>Password</label>


<input type="password" name="Password" id="Password">


</p>


<p>


<label>Verify Password</label>


<input type="password" name="Verify_Password" id="Verify_Password">


</p>


</fieldset>


<fieldset class="fBlock" id="Committee_Details">


<legend>Ethics/Compliance Committee Details</legend>


<fieldset class="fBlock" id="Member1">


<legend>Member 1</legend>


<p>


<label>Name</label>


<input type="text" name="Mem1_Name" id="Mem1_Name">


</p>


<p>


<label>Email</label>


<input type="text" name="Mem1_Email" id="Mem1_Email">


</p>


<p>


<label>Phone Number</label>


<input type="text" name="Mem1_Phone" id="Mem1_Phone">


</p>


</fieldset>


<fieldset class="fBlock" id="Member2">


<legend>Member 2</legend>


<p>


<label>Name</label>


<input type="text" name="Mem2_Name" id="Mem2_Name">


</p>


<p>


<label>Email</label>


<input type="text" name="Mem2_Email" id="Mem2_Email">


</p>


<p>


<label>Phone Number</label>


<input type="text" name="Mem2_Phone" id="Mem2_Phone">


</p>


</fieldset>


<fieldset class="fBlock" id="Member3">


<legend>Member 3</legend>


<p>


<label>Name</label>


<input type="text" name="Mem3_Name" id="Mem3_Name">


</p>


<p>


<label>Email</label>


<input type="text" name="Mem3_Email" id="Mem3_Email">


</p>


<p>


<label>Phone Number</label>


<input type="text" name="Mem3_Phone" id="Mem3_Phone">


</p>


</fieldset>


<fieldset class="fBlock" id="Member4">


<legend>Member 4</legend>


<p>


<label>Name</label>


<input type="text" name="Mem4_Name" id="Mem4_Name">


</p>


<p>


<label>Email</label>


<input type="text" name="Mem4_Email" id="Mem4_Email">


</p>


<p>


<label>Phone Number</label>


<input type="text" name="Mem4_Phone" id="Mem4_Phone">


</p>


</fieldset>


</fieldset>


<fieldset class="fBlock" id="Primary_Contact_Details">


<legend>Primary Contact Details</legend>


<p>


<label>Name</label>


<input type="text" name="Primary_Name" id="Primary_Name">


</p>


<p>


<label>Email</label>


<input type="text" name="Primary_Email" id="Primary_Email">


</p>


<p>


<label>Phone Number</label>


<input type="text" name="Primary_Phone" id="Primary_Phone">


</p>


<p>


<label>Designation</label>


<input type="text" name="Primary_Designation" id="Primary_Designation">


</p>


</fieldset>


<fieldset class="fBlock" id="Secondary_Contact_Details">


<legend>Secondary Contact Details</legend>


<p>


<label>Name</label>


<input type="text" name="Secondary_Name" id="Secondary_Name">


</p>


<p>


<label>Email</label>


<input type="text" name="Secondary_Email" id="Secondary_Email">


</p>


<p>


<label>Phone Number</label>


<input type="text" name="Secondary_Phone" id="Secondary_Phone">


</p>


<p>


<label>Designation</label>


<input type="text" name="Secondary_Designation" id="Secondary_Designation">


</p>


</fieldset>


<input name="Submit" type="submit" class="fSubmit">


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