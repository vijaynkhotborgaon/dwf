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
$result1 = mysql_query("SELECT * FROM company_lead where lead_id=".$row["company_id"]);
$row1 = mysql_fetch_assoc($result1);
$result3 = mysql_query("SELECT * FROM company_contract where lead_id=".$row["lead_id"]);
$row3 = mysql_fetch_assoc($result3);

$html.='<div id="formWrapper"><fieldset style="padding: 10px 10px 0px 10px; border: 1px solid #347235; margin: 0px 0px 10px 0px; width: auto;"><legend style="padding: 5px; background: #347235; color: #fff; font-size: 120%; line-height: normal !important;">Corporate Details</legend><p style="padding: 5px; background: #eff5fa; border-radius:5px;"><label style="diplay:block; width: 300px; float:left;">Company Name</label><strong style="text-align:right;">'.$row1["cname"].'</strong></p><p style="padding: 5px; background: #eff5fa; border-radius:5px;"><label style="diplay:block; width: 300px; float:left;">Company Logo</label><img src="../'.$row["clogo"].'" alt="'.$row["cname"].'" /></p><p style="padding: 5px; background: #eff5fa; border-radius:5px;"><label style="diplay:block; width: 300px; float:left;">Name of CEO</label><strong>'.$row["cceo"].'</strong></p><p style="padding: 5px; background: #eff5fa; border-radius:5px;"><label style="diplay:block; width: 300px; float:left;">Address</label><strong>'.$row1["caddress"].'</strong></p><p style="padding: 5px; background: #eff5fa; border-radius:5px;"><label style="diplay:block; width: 300px; float:left;">Number of Employees</label><strong>'.$row["cemployees"].'</strong></p><p style="padding: 5px; background: #eff5fa; border-radius:5px;"><label style="diplay:block; width: 300px; float:left;">Industry</label>';

$resultindustry = mysql_query("SELECT * FROM company_industry WHERE industry_id=".$row["industry_id"]);
$rowindustry = mysql_fetch_assoc($resultindustry);

$html.='<strong>'.$rowindustry["name"].'</strong></p><p style="padding: 5px; background: #eff5fa; border-radius:5px;"><label style="diplay:block; width: 300px; float:left;">Corporate Description</label><strong>'.$row["cdescription"].'</strong></p></fieldset><h3>Complaints</h3><table border="1" width="100%"><tbody><tr><td colspan="6"><h4><strong>Complaint List</strong></h4></td></tr><tr style="text-align: center;"><td style="text-align: center;"><strong>Complaint ID</strong></td><td><strong>Complaint Category</strong></td><td><strong>Complaint Department</strong></td><td><strong>Status</strong></td><td><strong>Created Date</strong></td></tr>';


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