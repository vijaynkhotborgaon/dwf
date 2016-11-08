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

$Company_Name = clean($_FILES['Company_Name']['name']);

$Company_Logo = clean($_FILES['Company_Logo']['name']);



$Name_of_CEO = clean($_POST['Name_of_CEO']);$Number_of_Employees = clean($_POST['Number_of_Employees']);



$Industry = clean($_POST['Industry']);



$Corporate_Description = clean($_POST['Corporate_Description']);



$leadid = clean($_POST['leadid']);



$Active_From = clean($_POST['Active_From']);



$Active_Till = clean($_POST['Active_Till']);



$spocuname1 = clean($_POST['spocuname1']);



$spocpword1 = clean($_POST['spocpword1']);



$spocvpword1 = clean($_POST['spocvpword1']);



$spocname2= $_POST['spocname'][0];

$spocemail2= $_POST['spocemail'][0];

$spocphone2= clean($_POST['spocphone'][0]);

$spocdesignation2= clean($_POST['spocdesignation'][0]);

$spocuname2= clean($_POST['spocuname'][0]);

$spocpword2= clean($_POST['spocpword'][0]);

$spocvpword2= clean($_POST['spocvpword'][0]);



$spocname3= $_POST['spocname'][1];

$spocemail3= $_POST['spocemail'][1];

$spocphone3= clean($_POST['spocphone'][1]);

$spocdesignation3= clean($_POST['spocdesignation'][1]);

$spocuname3= clean($_POST['spocuname'][1]);

$spocpword3= clean($_POST['spocpword'][1]);

$spocvpword3= clean($_POST['spocvpword'][1]);



$spocname4= $_POST['spocname'][2];

$spocemail4= $_POST['spocemail'][2];

$spocphone4= clean($_POST['spocphone'][2]);

$spocdesignation4= clean($_POST['spocdesignation'][2]);

$spocuname4= clean($_POST['spocuname'][2]);

$spocpword4= clean($_POST['spocpword'][2]);

$spocvpword4= clean($_POST['spocvpword'][2]);



$spocname5= $_POST['spocname'][3];

$spocemail5= $_POST['spocemail'][3];

$spocphone5= clean($_POST['spocphone'][3]);

$spocdesignation5= clean($_POST['spocdesignation'][3]);

$spocuname5= clean($_POST['spocuname'][3]);

$spocpword5= clean($_POST['spocpword'][3]);

$spocvpword5= clean($_POST['spocvpword'][3]);



	if($Company_Logo == '') {



		$errmsg_arr[] = 'Select the company logo';



		$errflag = true;



	}



	if($Name_of_CEO == '') {



		$errmsg_arr[] = 'Enter the name of company CEO';



		$errflag = true;



	}	

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



	if($spocuname1 == '') {



		$errmsg_arr[] = 'Enter user name for company login';



		$errflag = true;



	}

	if($spocpword1 == '') {



		$errmsg_arr[] = 'Enter the password';



		$errflag = true;



	}



	if($spocvpword1 == '') {



		$errmsg_arr[] = 'confirm the password';



		$errflag = true;



	}



	if( strcmp($spocpword1, $spocvpword1) != 0 ) {



		$errmsg_arr[] = 'Passwords does not match';



		$errflag = true;



	}



	//Check for duplicate login ID



	if($spocuname1 != '') {



		$qry = "SELECT * FROM company_spoc WHERE uname='$spocuname1'";



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

		if($spocname2 != '' || $spocemail2 != '' || $spocuname2 != '' || $spocdesignation2 != '' || $spocpword2 != '' || $spocvpword2 != '') {



	if( strcmp($spocpword2, $spocvpword2) != 0 ) {



		$errmsg_arr[] = 'Passwords does not match';



		$errflag = true;



	}

	if($spocuname2 != '') {



		$qry = "SELECT * FROM company_spoc WHERE uname='$spocuname2'";



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

	

	}

	

	

	if($spocname3 != '' || $spocemail3 != '' || $spocuname3 != '' || $spocdesignation3 != '' || $spocpword3 != '' || $spocvpword3 != '') {



	if( strcmp($spocpword3, $spocvpword3) != 0 ) {



		$errmsg_arr[] = 'Passwords does not match';



		$errflag = true;



	}

	if($spocuname3 != '') {



		$qry = "SELECT * FROM company_spoc WHERE uname='$spocuname3'";



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

	

	}

	

	

	

	

	

	if($spocname4 != '' || $spocemail4 != '' || $spocuname4 != '' || $spocdesignation4 != '' || $spocpword4 != '' || $spocvpword4 != '') {



	if( strcmp($spocpword4, $spocvpword4) != 0 ) {



		$errmsg_arr[] = 'Passwords does not match';



		$errflag = true;



	}

	if($spocuname4 != '') {



		$qry = "SELECT * FROM company_spoc WHERE uname='$spocuname4'";



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

	

	}

	

	

	

	

	

	if($spocname5 != '' || $spocemail5 != '' || $spocuname5 != '' || $spocdesignation5 != '' || $spocpword5 != '' || $spocvpword5 != '') {



	if( strcmp($spocpword5, $spocvpword5) != 0 ) {



		$errmsg_arr[] = 'Passwords does not match';



		$errflag = true;



	}

	if($spocuname5 != '') {



		$qry = "SELECT * FROM company_spoc WHERE uname='$spocuname5'";



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

	

	}

	

	

		if($errflag) {



		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;



		session_write_close();



		header("location: add-company-details.php?leadid=$leadid");



		exit();



	}



function getExtension($str) {



         $i = strrpos($str,".");



         if (!$i) { return ""; }



         $l = strlen($str) - $i;



         $ext = substr($str,$i+1,$l);



         return $ext;



 }

 

  	$result123 = mysql_query("SELECT * FROM company_lead where lead_id=$leadid");

$row123 = mysql_fetch_assoc($result123);



$spocname1=$row123['cperson'];

$spocemail1=$row123['cemail'];

$spocphone1=$row123['cphone'];

$spocdesignation1=$row123['cdesignation'];

$Company_Name=$row123['cname'];



 

 $strip_Company_Logo=str_replace(' ', '', $Company_Logo);



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



	$qry = "INSERT INTO company(lead_id, clogo, clogo_big, cceo, cemployees, cindustry, cdescription, modidied_on, created_on) VALUES('$leadid','$imgfilename1','$imgfilename','$Name_of_CEO','$Number_of_Employees','$Industry','$Corporate_Description',NOW(),NOW())";

	$result = @mysql_query($qry);

	

	$company_id = mysql_insert_id();

	

	$mainurl=$company_id.$Company_Name.$Name_of_CEO;

	$unique_url=md5($mainurl);

	

	$qry9 ="UPDATE company SET unique_url='".$unique_url."' WHERE company_id=".$company_id;

	$result9 = @mysql_query($qry9);	$qry3 ="UPDATE company_lead SET status='1' WHERE lead_id=".$leadid;

	$result3 = @mysql_query($qry3);

	

	$qry1 = "INSERT INTO company_contract(company_id, fromdate, tilldate) VALUES('$company_id','$Active_From','$Active_Till')";

	$result1 = @mysql_query($qry1);

	

	$md5spocpword1=md5($spocpword1);



	$qry6 = "INSERT INTO company_spoc(company_id, name, email, phone, designation, uname, pword, fpword) VALUES('$company_id','$spocname1','$spocemail1','$spocphone1','$spocdesignation1','$spocuname1','$md5spocpword1','$spocpword1')";

	$result6 = @mysql_query($qry6);





		if($spocname2 != '' || $spocemail2 != '' || $spocuname2 != '' || $spocdesignation2 != '' || $spocpword2 != '' || $spocvpword2 != '') {

		

	$md5spocpword2=md5($spocpword2);

	$qry6 = "INSERT INTO company_spoc(company_id, name, email, phone, designation, uname, pword, fpword) VALUES('$company_id','$spocname2','$spocemail2','$spocphone2','$spocdesignation2','$spocuname2','$md5spocpword2','$spocpword2')";

	$result6 = @mysql_query($qry6);

	

}



		if($spocname3 != '' || $spocemail3 != '' || $spocuname3 != '' || $spocdesignation3 != '' || $spocpword3 != '' || $spocvpword3 != '') {

		

	$md5spocpword3=md5($spocpword3);

	$qry6 = "INSERT INTO company_spoc(company_id, name, email, phone, designation, uname, pword, fpword) VALUES('$company_id','$spocname3','$spocemail3','$spocphone3','$spocdesignation3','$spocuname3','$md5spocpword3','$spocpword3')";

	$result6 = @mysql_query($qry6);

	

}



		if($spocname4 != '' || $spocemail4 != '' || $spocuname4 != '' || $spocdesignation4 != '' || $spocpword4 != '' || $spocvpword4 != '') {

		

	$md5spocpword4=md5($spocpword4);

	$qry6 = "INSERT INTO company_spoc(company_id, name, email, phone, designation, uname, pword, fpword) VALUES('$company_id','$spocname4','$spocemail4','$spocphone4','$spocdesignation4','$spocuname4','$md5spocpword4','$spocpword4')";

	$result6 = @mysql_query($qry6);

	

}



		if($spocname5 != '' || $spocemail5 != '' || $spocuname5 != '' || $spocdesignation5 != '' || $spocpword5 != '' || $spocvpword5 != '') {

		

	$md5spocpword5=md5($spocpword5);

	$qry6 = "INSERT INTO company_spoc(company_id, name, email, phone, designation, uname, pword, fpword) VALUES('$company_id','$spocname5','$spocemail5','$spocphone5','$spocdesignation5','$spocuname5','$md5spocpword5','$spocpword5')";

	$result6 = @mysql_query($qry6);

	

}





		if($result1) {



			$_SESSION['COMREGMESG'] = 1;



			session_write_close();



			header("location: leadcompany-detail.php?cid=$leadid");



			exit();



		}else {



			die("Query failed");



		}



?>