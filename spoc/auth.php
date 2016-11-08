<?php
	//Start session
session_start();
$result = mysql_query("SELECT * FROM company where unique_url='".$_GET['companyurl']."'");	
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_assoc($result);
//Check whether the session variable SESS_MEMBER_ID is present or not
if($num_rows=='0'){
header("location: ".$mainurl);
exit();
} else {
$result1 = mysql_query("SELECT * FROM company_contract where lead_id=".$row['lead_id']);	
$row1 = mysql_fetch_assoc($result1);
$date1=date('d-m-Y');
$date1=date_create($date1);
$date2=$row1['tilldate'];
$date2=date_create($date2);
$diff=date_diff($date1,$date2);
$exp=0+$diff->format("%R%a");
if($exp<0){
header("location: ".$mainurl);
exit();
}
}


	//Check whether the session variable SESS_SPOC_ID is present or not
	

?>
