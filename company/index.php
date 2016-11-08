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
include('main.php');
} elseif($_GET['page']=='log-report-userguideline') {
include('log-report-userguideline.php');
} elseif($_GET['page']=='log-report-form') {
include('log-report-form.php');
} elseif($_GET['page']=='thank-you-msg') {
include('thank-you-msg.php');
} elseif($_GET['page']=='reg_complaint_process') {
include('reg_complaint_process.php');
} elseif($_GET['page']=='loginprocess') {
include('loginprocess.php');
} elseif($_GET['page']=='logout') {
include('logout.php');
} elseif($_GET['page']=='complaint-replay-process') {
include('complaint-replay-process.php');
} elseif($_GET['page']=='what-is-disclose-without-fear') {
include('what-is-disclose-without-fear.php');
} elseif($_GET['page']=='what-can-i-report-here') {
include('what-can-i-report-here.php');
} elseif($_GET['page']=='what-does-it-work') {
include('what-does-it-work.php');
} elseif($_GET['page']=='how-is-my-confidentiality-maintained') {
include('how-is-my-confidentiality-maintained.php');
} elseif($_GET['page']=='what-happens-to-the-information') {
include('what-happens-to-the-information.php');
} elseif($_GET['page']=='what-is-responsible-reporting') {
include('what-is-responsible-reporting.php');
} elseif(($_GET['complaint-id']=='') && ($_GET['page']=='ticket-dasboard')) {
include('ticket-dasboard.php');
}elseif(($_GET['complaint-id']!='') && ($_GET['page']=='ticket-dasboard')) {
include('view-complaint-details.php');
}
?>

<?php
include('footer.php');
?>
<!-- //FOOTER -->    
</body></html>