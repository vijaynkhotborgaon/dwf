<div id="t3-mainbody" class="container t3-mainbody ">
<div class="row">
<article>
<?php	if(isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) { ?> 
<div id="system-message">
<div class="alert alert-message">
<?php
foreach($_SESSION['ERRMSG_ARR'] as $msg) { 
echo '<p>'.$msg.'</p>'; 
}		
?>  
</div>
</div>
<?php
unset($_SESSION['ERRMSG_ARR']);	
}
?>
<div id="formWrapper"> 
<form action="reg_complaint_process" method="post" enctype="multipart/form-data">
<fieldset class="fBlock" id="Corporate_Details">
<legend>Register a Complaint</legend>
<p><label>Complaint Category</label>
<select name="Complaint_Category" id="Complaint_Category">
<?php 
$result = mysql_query("SELECT * FROM complaint_category");
while($row = mysql_fetch_array($result))  {
?>
<option value="<?php echo $row['cat_id']; ?>"><?php echo $row['category']; ?></option>
<?php 
} 
?>
</select>
</p>
<p> <label>Complaint Department</label>
<select name="Complaint_Department" id="Complaint_Department">
<?php $result = mysql_query("SELECT * FROM complaint_department");
while($row = mysql_fetch_array($result))  { 
?>
<option value="<?php echo $row['dep_id']; ?>">
<?php echo $row['department']; ?>
</option>
<?php } ?>  </select></p>
<p><label>Detailed Complaint</label>
<textarea cols="20" rows="5" name="Detailed_Complaint" id="Detailed_Complaint"></textarea></p>
<p><label>Upload a Document</label>
<input type="file" name="Upload_Document" id="Upload_Document"></p>
</fieldset>
<fieldset class="fBlock" id="Login_Detail">
<legend>Account Details</legend>
<div id="formText">
<p>Based on the report submitted by you, the organization may require additional information from you to carry out its investigations and further actions.&nbsp;By creating an anonymous Username and Password of your choice below, you will be able to:</p>
<ol>
<li>Track the progress of your report; and</li>
<li>Provide additional information to the organization.</li>
</ol>
<p>The Track Report page will allow you to respond to the organizational queries confidentially and also to check the status of your reports.&nbsp;To maintain your anonymity, we will not be sending the login details to your email id, so please make sure that you keep the Username and Password safe and do not share it with anyone.</p>
<p>Please allow us 24 hours to create a tracking account with the username and password provided by you. Once your account is created, you may track your report by logging in at&nbsp;<a href="<?php echo $mainurl; ?>company/<?php echo $_GET['companyurl']; ?>/ticket-dasboard"><?php echo $mainurl; ?>company/<?php echo $_GET['companyurl']; ?>/ticket-dasboard</a>. The "Track Report" page can also be accessed from the opening page of the DWF portal.</p>
<p>We request you to access the above page regularly and update any information requirement that is required. Please remember not to update any information that may compromise your confidentiality.</p>
</div>
<?php
function passGen($length,$nums){
		$lowLet = "abcdefghijklmnopqrstuvwxyz";
		$highLet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$numbers = "123456789";
		$pass = "";
		$i = 1;
		While ($i <= $length){
			$type = rand(0,1);
			if ($type == 0){
				if (($length-$i+1) > $nums){
					$type2 = rand(0,1);
					if ($type2 == 0){
						$ran = rand(0,25);
						$pass .= $lowLet[$ran];
					}else{
						$ran = rand(0,25);
						$pass .= $highLet[$ran];
					}
				}else{
					$ran = rand(0,8);
					$pass .= $numbers[$ran];
					$nums--;
				}
			}else{
				if ($nums > 0){
					$ran = rand(0,8);
					$pass .= $numbers[$ran];
					$nums--;
				}else{
					$type2 = rand(0,1);
					if ($type2 == 0){
						$ran = rand(0,25);
						$pass .= $lowLet[$ran];
					}else{
						$ran = rand(0,25);
						$pass .= $highLet[$ran];
					}
				}
			}
			$i++;
		}
		return $pass;
}
?>
<p><label>Username </label><input type="text" name="Username" id="Username" value="<?php echo passGen(8,3); ?>" readonly="readonly"></p>
<p><label>Password of your choice </label><input type="password" name="Password" id="Password"></p>
<p><label>Verify Password </label><input type="password" name="Verify_Password" id="Verify_Password"></p>
</fieldset>
<input name="Submit" type="submit" class="fSubmit" value="Submit">
</form>
</div>
</article>
</div>





</div>