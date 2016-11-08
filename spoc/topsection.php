<?php 
$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$end = end(explode('/', $actual_link));
$current=explode('.php', $end);
$current= $current[0];

?>
<div id="nav">
<a href="<?php echo $mainurl; ?>spoc/<?php echo $_GET['companyurl']; ?>/view-company-details" class="well<?php if(($end=='view-company-details')){?> active<?php } ?>">View Company Details</a>


<a href="<?php echo $mainurl; ?>spoc/<?php echo $_GET['companyurl']; ?>/view-complaints" class="well<?php if(($end=='view-complaints')){?> active<?php } ?>">View Compaints</a>


<a href="<?php echo $mainurl; ?>spoc/<?php echo $_GET['companyurl']; ?>/update-personal-detail" class="well<?php if(($end=='update-personal-detail')){?> active<?php } ?>">Update Personal details</a>
</div>
