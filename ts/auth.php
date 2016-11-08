<?php
//Start session
session_start();
//Check whether the session variable SESS_TS_ID is present or not
if(!isset($_SESSION['SESS_TS_ID']) || (trim($_SESSION['SESS_TS_ID']) == '')) {
header("location: index.php");
exit();
}
$sesstsid = $_SESSION['SESS_TS_ID'];

?>