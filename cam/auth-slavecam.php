<?php


	//Start session


	$mainurl3= "index.php";

	
	//Check whether the session variable SESS_MEMBER_ID is present or not


	if($_SESSION['SESS_CAM_PARENT']==1){


		header("location: ".$mainurl3);


		exit();


	}


?>