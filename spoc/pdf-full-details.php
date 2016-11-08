<?php



	require_once('../config.php');
	require_once('auth.php');
require_once("dompdf/dompdf_config.inc.php");
	//require_once('auth-slavecam.php');
	$companyid = $_GET["companyid"];
$year = $_GET['year'];
$month = $_GET['month'];

$html ='<html><body> <div><div>';   

$result = mysql_query("SELECT * FROM company where company_id=".$_GET["companyid"]);
$row = mysql_fetch_assoc($result);
$result1 = mysql_query("SELECT * FROM company_lead where lead_id=".$row["lead_id"]);
$row1 = mysql_fetch_assoc($result1);
$result3 = mysql_query("SELECT * FROM company_contract where lead_id=".$row["lead_id"]);
$row3 = mysql_fetch_assoc($result3);

$html.='<div id="formWrapper"><table border="0" width="100%"><tbody><tr><td width="20%"><h2>'.$row1["cname"].'</h2></td><td width="60%">&nbsp;</td><td width="20%"><img src="../'.$row["clogo"].'" alt="'.$row1["cname"].'" /></td></tr></tbody></table><table border="1" width="100%"><tbody><tr><td colspan="6"><h4><strong>Complaint List</strong></h4></td></tr><tr style="text-align: center;"><td style="text-align: center;"><strong>Complaint ID</strong></td><td><strong>Complaint Category</strong></td><td><strong>Complaint Department</strong></td><td><strong>Status</strong></td><td><strong>Created Date</strong></td></tr>';


//echo "SELECT * FROM complaints where company_id=$companyid ORDER BY complaint_id DESC";

if(($year=='')&&($month=='')){
$result = mysql_query("SELECT * FROM complaints where company_id=$companyid ORDER BY complaint_id DESC");
} elseif(($year!='')&&($month=='')){

$start=$year."-01-01";
$end=$year."-12-31";

$result = mysql_query("SELECT * FROM complaints where company_id=$companyid AND created_on>='$start' AND created_on<='$end' ORDER BY complaint_id DESC");

}
 elseif(($year!='')&&($month!='')){

$start=$year."-".$month."-01";
$end=$year."-".$month."-31";

$result = mysql_query("SELECT * FROM complaints where company_id=$companyid AND created_on>='$start' AND created_on<='$end' ORDER BY complaint_id DESC");

}
 elseif(($year=='')&&($month!='')){

$start=date('Y')."-".$month."-01";
$end=date('Y')."-".$month."-31";

$result = mysql_query("SELECT * FROM complaints where company_id=$companyid AND created_on>='$start' AND created_on<='$end' ORDER BY complaint_id DESC");

}
while($row = mysql_fetch_array($result))
  { 

$html.='<tr style="text-align: center;"><td>'.$row["ticket"].'</td>';

$result2 = mysql_query("SELECT * FROM complaint_category where cat_id=".$row["cat_id"]);
$row2 = mysql_fetch_assoc($result2);

$html.='<td>'.$row2["category"].'</td>';

$result3 = mysql_query("SELECT * FROM complaint_department where dep_id=".$row["dep_id"]);
$row3 = mysql_fetch_assoc($result3);

$html.='<td>'.$row3["department"].'</td>';

if($row["status"]==0){
$status="Opened";
} elseif($row["status"]==1){
$status="On hold";
} elseif($row["status"]==2){
$status="More Details Required";
} elseif($row["status"]==3){
$status="Processing";
} elseif($row["status"]==4){
$status="Actioned";
}

$html.='<td>'.$status.'</td><td>'.$row["created_on"].'</td></tr>';

 } 
 $filename="Report_".date('d')."_".date('m')."_".date('y').".pdf";
 
$html.='</tbody></table></div></div></div></body></html>';
 //echo $html; 

$dompdf = new DOMPDF();

$dompdf->load_html($html);

$dompdf->render();

$dompdf->stream($filename);
  ?>