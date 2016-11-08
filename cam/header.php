<div id="t3-header" class="t3-header container">
<div class="row">
<div class="span2 logo">
<div class="logo-image">
<h1>
<a href="<?php echo $mainurl; ?>" title="Disclose Without Fear">
<span>Disclose Without Fear</span>
</a>
</h1>
<small class="site-slogan hidden-phone"></small>
</div>
</div>
<nav id="t3-mainnav" class="t3-mainnav navbar-collapse-fixed-top span10">
<div class="head-position">     
<?php
if($sesscamid!=''){
$result = mysql_query("SELECT * FROM camdetails where cam_id=$sesscamid");
$row = mysql_fetch_assoc($result);
?>
<p>Hello, <strong><?php echo $row['name']; ?></strong><br />
<a href="logout.php" style="float:left; color:#fff;">Logout</a></p>
<?php } ?>
</div>
</nav>
</div>
</div>