<?php

	//Check whether the session variable SESS_SPOC_ID is present or not
	
	if(!isset($_SESSION['SESS_SPOC_ID']) || (trim($_SESSION['SESS_SPOC_ID']) == '')) {
     header("location: ".$mainurl."spoc/".$_GET['companyurl']);
		exit();
	}
	$sessspocid = $_SESSION['SESS_SPOC_ID'];

	$companyid = $_SESSION['SESS_SPOC_COMPANY'];

?>
