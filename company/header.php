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
<nav id="t3-mainnav" class="t3-mainnav navbar-collapse-fixed-top span10">
<div class="head-position">     
<?php
$result = mysql_query("SELECT * FROM company where unique_url='".$_GET['companyurl']."'");	
$row = mysql_fetch_assoc($result);
?>
<img src="<?php echo $mainurl; ?>/<?php echo $row['clogo']; ?>" alt="<?php echo $row['cname']; ?>" />
<?php
if($sessuserid!=''){
?>
<p style="width:110px;"><a href="<?php echo $mainurl; ?>company/<?php echo $_GET['companyurl']; ?>/logout" style="float:left; color:#fff; width:110px;">Logout</a></p>
<?php } ?>
</div>
</nav>
</div>







</div>