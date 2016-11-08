<?php
require_once('../config.php');
require_once('auth.php');
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" class="com_content view-article itemid-723 j33 no-touch"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
$result = mysql_query("SELECT * FROM company where unique_url='".$_GET['companyurl']."'");	
$row = mysql_fetch_assoc($result);
?>
<title><?php echo $row['cname']; ?> Dashboard</title>
<link rel="stylesheet" href="<?php echo $mainurl; ?>/css/css-be258.css" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<script src="<?php echo $mainurl; ?>/js/jquery-1.8.3.js" type="text/javascript"></script>
<script src="<?php echo $mainurl; ?>/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo $mainurl; ?>/js/jquery.validation.functions.js" type="text/javascript"></script>
</head>
<body>
<?php
include('header.php');

if($_GET['page']==''){
include('login.php');
} elseif($_GET['page']=='login') {
include('login.php');
} elseif($_GET['page']=='loginprocess') {
include('loginprocess.php');
} elseif($_GET['page']=='logout') {
include('logout.php');
} elseif($_GET['page']=='dashboard') {
include('dashboard.php');
} elseif($_GET['page']=='view-company-details') {
include('view-company-details.php');
} elseif($_GET['page']=='view-complaints') {
include('view-complaints.php');
} elseif($_GET['page']=='update-complaint-process') {
include('update-complaint-process.php');
} elseif($_GET['page']=='update-personal-detail') {
include('update-personal-detail.php');
} elseif($_GET['page']=='update-detail-process') {
include('update-detail-process.php');
} elseif($_GET['page']=='spoc-password-change') {
include('spoc-password-change.php');
} elseif(($_GET['id']!='') && ($_GET['page']=='view-complaint-details')) {
include('view-complaint-details.php');
}
?>
<?php
include('footer.php');
?>
<!-- //FOOTER -->    
</body></html>