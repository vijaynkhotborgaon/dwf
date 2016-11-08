<?php 

	//Include database connection details



	require_once('../config.php');

	require_once('auth.php');

	//Array to store validation errors



	$errmsg_arr = array();



	//Validation error flag



	$errflag = false;



	//Function to sanitize values received from the form. Prevents SQL injection



	function clean($str) {



		$str = @trim($str);



		if(get_magic_quotes_gpc()) {



			$str = stripslashes($str);



		}



		return mysql_real_escape_string($str);



	}



	



	//Sanitize the POST values



$Company_Name = clean($_POST['Company_Name']);



$Company_Logo = clean($_FILES['Company_Logo']['name']);



$Name_of_CEO = clean($_POST['Name_of_CEO']);



$Address = clean($_POST['Address']);



$Locations = clean($_POST['Locations']);



$Number_of_Employees = clean($_POST['Number_of_Employees']);



$Industry = clean($_POST['Industry']);



$Corporate_Description = clean($_POST['Corporate_Description']);



$tsid = clean($_POST['tsid']);



$Active_From = clean($_POST['Active_From']);



$Active_Till = clean($_POST['Active_Till']);



$Username = clean($_POST['Username']);



$Password = clean($_POST['Password']);



$Verify_Password = clean($_POST['Verify_Password']);



$Mem1_Name = clean($_POST['Mem1_Name']);



$Mem1_Email = clean($_POST['Mem1_Email']);



$Mem1_Phone = clean($_POST['Mem1_Phone']);



$Mem2_Name = clean($_POST['Mem2_Name']);



$Mem2_Email = clean($_POST['Mem2_Email']);



$Mem2_Phone = clean($_POST['Mem2_Phone']);



$Mem3_Name = clean($_POST['Mem3_Name']);



$Mem3_Email = clean($_POST['Mem3_Email']);



$Mem3_Phone = clean($_POST['Mem3_Phone']);



$Mem4_Name = clean($_POST['Mem4_Name']);



$Mem4_Email = clean($_POST['Mem4_Email']);



$Mem4_Phone = clean($_POST['Mem4_Phone']);



$Primary_Name = clean($_POST['Primary_Name']);



$Primary_Email = clean($_POST['Primary_Email']);



$Primary_Phone = clean($_POST['Primary_Phone']);



$Primary_Designation = clean($_POST['Primary_Designation']);



$Secondary_Name = clean($_POST['Secondary_Email']);



$Secondary_Email = clean($_POST['Secondary_Email']);



$Secondary_Phone = clean($_POST['Secondary_Phone']);



$Secondary_Designation = clean($_POST['Secondary_Designation']);



	if($Company_Name == '') {



		$errmsg_arr[] = 'Enter your the Company Name';



		$errflag = true;



	}



	if($Company_Logo == '') {



		$errmsg_arr[] = 'Select the company logo';



		$errflag = true;



	}



	if($Name_of_CEO == '') {



		$errmsg_arr[] = 'Enter the name of company CEO';



		$errflag = true;



	}



	if($Address == '') {



		$errmsg_arr[] = 'Enter Company address';



		$errflag = true;



	}



	/*if($Locations == '') {



		$errmsg_arr[] = 'Enter Company Location';



		$errflag = true;



	}*/

	

	if($Number_of_Employees == '') {



		$errmsg_arr[] = 'Enter No. of employees working in the company';



		$errflag = true;



	}



	if($Industry == '') {



		$errmsg_arr[] = 'Enter company Industry';



		$errflag = true;



	}



	if($Corporate_Description == '') {



		$errmsg_arr[] = 'Enter company description';



		$errflag = true;



	}



	if($Active_From == '') {



		$errmsg_arr[] = 'Enter  the contract start date';



		$errflag = true;



	}



	if($Active_Till == '') {



		$errmsg_arr[] = 'Enter  the contract till date';



		$errflag = true;



	}



	if($Username == '') {



		$errmsg_arr[] = 'Enter user name for company login';



		$errflag = true;



	}

	if($Password == '') {



		$errmsg_arr[] = 'Enter the password';



		$errflag = true;



	}



	if($Verify_Password == '') {



		$errmsg_arr[] = 'confirm the password';



		$errflag = true;



	}

	if($Mem1_Name == '') {



		$errmsg_arr[] = 'Enter the spoc name';



		$errflag = true;



	}



	if($Mem1_Email == '') {



		$errmsg_arr[] = 'Enter the spoc email ID';



		$errflag = true;



	}



	if($Mem1_Phone == '') {



		$errmsg_arr[] = 'Enter the spoc telephone number';



		$errflag = true;



	}



	if($Primary_Name == '') {



		$errmsg_arr[] = 'Enter the primary contact person name';



		$errflag = true;



	}



	if($Primary_Email == '') {



		$errmsg_arr[] = 'Enter the primary contact person email';



		$errflag = true;



	}



	if($Primary_Phone == '') {



		$errmsg_arr[] = 'Enter the primary contact person phone number';



		$errflag = true;



	}

	if($Primary_Designation == '') {



		$errmsg_arr[] = 'Enter the primary contact person designation';



		$errflag = true;



	}



	if( strcmp($Password, $Verify_Password) != 0 ) {



		$errmsg_arr[] = 'Passwords does not match';



		$errflag = true;



	}



	//Check for duplicate login ID



	if($Username != '') {



		$qry = "SELECT * FROM company_login WHERE uname='$Username'";



		$result = mysql_query($qry);



		if($result) {



			if(mysql_num_rows($result) > 0) {



				$errmsg_arr[] = 'Username already in use';



				$errflag = true;



			}



			@mysql_free_result($result);



		}



		else {



			die("Query failed");



		}



	}	

		if($errflag) {



		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;



		session_write_close();



		header("location: add-new-company.php");



		exit();



	}



function getExtension($str) {



         $i = strrpos($str,".");



         if (!$i) { return ""; }



         $l = strlen($str) - $i;



         $ext = substr($str,$i+1,$l);



         return $ext;



 }$strip_Company_Logo=str_replace(' ', '', $Company_Logo);



$strip_Company_Name=str_replace(' ', '', $Company_Name);



$companylogo_name = $_FILES['Company_Logo']['name']."<br />";



$companylogo_type =  $_FILES["Company_Logo"]["type"]."<br />";



$companylogo_size =  $_FILES['Company_Logo']['size']."<br />";



$companylogo_tmppath = $_FILES["Company_Logo"]["tmp_name"]."<br />"; 



//exit();



if ($companylogo_name!='') 



 	{ 		$filename = stripslashes($_FILES['Company_Logo']['name']);



 	



  		$extension = getExtension($filename);



 		$extension = strtolower($extension);



		



		



 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 



 		{



		



 			$change='<div class="msgdiv">Unknown Image extension </div> ';



 			$errors=1;



 		}



 		else



 		{ $size=filesize($_FILES['Company_Logo']['tmp_name']);



if ($size > 500000)



{



	$change='<div class="msgdiv">You have exceeded the size limit!</div> ';



	$errors=1;

}if($extension=="jpg" || $extension=="jpeg" )



{



$uploadedfile = $_FILES['Company_Logo']['tmp_name'];;



$src = imagecreatefromjpeg($uploadedfile);}



else if($extension=="png")



{



$uploadedfile = $_FILES['Company_Logo']['tmp_name'];



$src = imagecreatefrompng($uploadedfile);}



else 



{



$src = imagecreatefromgif($uploadedfile);



}



list($width,$height)=getimagesize($_FILES["Company_Logo"]["tmp_name"]);$newwidth=400;



$newheight=($height/$width)*$newwidth;



$tmp=imagecreatetruecolor($newwidth,$newheight);$newwidth1=110;



$newheight1=($height/$width)*$newwidth1;



$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);$filename = "../images/company/big/".$strip_Company_Name."_". $strip_Company_Logo;

$filename1 = "../images/company/small/".$strip_Company_Name."_". $strip_Company_Logo;

$imgfilename = "images/company/big/".$strip_Company_Name."_". $strip_Company_Logo;

$imgfilename1 = "images/company/small/".$strip_Company_Name."_". $strip_Company_Logo;

imagejpeg($tmp,$filename,100);

imagejpeg($tmp1,$filename1,100);




imagedestroy($src);



imagedestroy($tmp);



imagedestroy($tmp1);

}



	}

	//Create INSERT query



	$qry = "INSERT INTO company(cname, clogo, clogo_big, cceo, caddress, clocation, cemployees, cindustry, cdescription, cam_id, ts_id, modidied_on, created_on) VALUES('$Company_Name','$imgfilename1','$imgfilename','$Name_of_CEO','$Address','$Locations','$Number_of_Employees','$Industry','$Corporate_Description','$sesscamid','$tsid',NOW(),NOW())";

	$result = @mysql_query($qry);

	

	$company_id = mysql_insert_id();

	

	$mainurl=$company_id.$Company_Name.$Name_of_CEO;

	$unique_url=md5($mainurl);

	

	$qry9 ="UPDATE company SET unique_url='".$unique_url."' WHERE company_id=".$company_id;

	$result9 = @mysql_query($qry9);

	

	$qry1 = "INSERT INTO company_contract(company_id, fromdate, tilldate) VALUES('$company_id','$Active_From','$Active_Till')";

	$result1 = @mysql_query($qry1);$Password=md5($Password);



	$qry2 = "INSERT INTO company_login(company_id, uname, pword) VALUES('$company_id','$Username','$Password')";

	$result2 = @mysql_query($qry2);



	$qry3 = "INSERT INTO company_spoc(company_id, name, email, phone) VALUES('$company_id','$Mem1_Name','$Mem1_Email','$Mem1_Phone')";

	$result3 = @mysql_query($qry3);



	$qry4 = "INSERT INTO company_primary_contact(company_id, name, email, phone, designation) VALUES('$company_id','$Primary_Name','$Primary_Email','$Primary_Phone','$Primary_Designation')";

	$result4 = @mysql_query($qry4);

	

if($Secondary_Name!=''){

	$qry5 = "INSERT INTO company_secondary_contact(company_id, name, email, phone, designation) VALUES('$company_id','$Secondary_Name','$Secondary_Email','$Secondary_Phone','$Secondary_Designation')";

	$result5 = @mysql_query($qry5);

}

if($Mem2_Name !=''){

	$qry6 = "INSERT INTO company_spoc(company_id, name, email, phone) VALUES('$company_id','$Mem2_Name','$Mem2_Email','$Mem2_Phone')";

	$result6 = @mysql_query($qry6);

}

if($Mem3_Name!=''){

	$qry7 = "INSERT INTO company_spoc(company_id, name, email, phone) VALUES('$company_id','$Mem3_Name','$Mem3_Email','$Mem3_Phone')";

	$result7 = @mysql_query($qry7);

}

if($Mem4_Name!=''){

	$qry8 = "INSERT INTO company_spoc(company_id, name, email, phone) VALUES('$company_id','$Mem4_Name','$Mem4_Email','$Mem4_Phone')";

	$result8 = @mysql_query($qry8);

}



		if($result2) {



			$_SESSION['COMREGMESG'] = 1;



			session_write_close();



			header("location: add-new-company.php");



			exit();



		}else {



			die("Query failed");



		}



?>





























