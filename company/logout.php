<?php
//Start session
require_once('auth.php');
session_start();
//Unset the variables stored in session
unset($_SESSION['SESS_EMP_ID']);
header("location: ".$mainurl."company/".$_GET['companyurl']);
?>