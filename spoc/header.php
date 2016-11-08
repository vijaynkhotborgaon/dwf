<div id="t3-header" class="t3-header container">
<div class="row">
<div class="span2 logo">
<div class="logo-image">
<h1>
<a href="<?php echo $mainurl; ?>company/<?php echo $_GET['companyurl']; ?>" title="Disclose Without Fear">
<span>Disclose Without Fear</span>
</a>
</h1>
</div>
</div>
<nav id="t3-mainnav">
<div class="head-position">     
<?php
$result = mysql_query("SELECT * FROM company where unique_url='".$_GET['companyurl']."'");	
$row = mysql_fetch_assoc($result);
?>
<img src="<?php echo $mainurl; ?>/<?php echo $row['clogo']; ?>" alt="<?php echo $row['cname']; ?>" style="width:150px; margin-bottom:10px;" />
<?php
if($_SESSION['SESS_SPOC_ID']!=''){
$result = mysql_query("SELECT * FROM company_spoc where spoc_id=".$_SESSION['SESS_SPOC_ID']);
$row = mysql_fetch_assoc($result);
?>
<p>Hello <strong><?php echo $row['name']; ?></strong><br />
<a href="<?php echo $mainurl; ?>spoc/<?php echo $_GET['companyurl']; ?>/logout" style="float:left; color:#fff;">Logout</a></p>
<?php } ?>
</div>
</nav>
</div>







</div>