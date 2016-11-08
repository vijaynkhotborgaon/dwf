<?php 
$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$end = end(explode('/', $actual_link));
$current=explode('.php', $end);
$current= $current[0];

?>
<div id="nav">
<a href="company-leads.php" class="well<?php if(($current=='company-leads')||($current=='leadcompany-detail')||($current=='send-mail-to-company')){?> active<?php } ?>">New Company Registration List</a>
<a href="company-list.php" class="well<?php if(($current=='company-list')||($current=='view-company-details')){?> active<?php } ?>">Registered Companies</a>

<a href="view-update-complaints.php" class="well<?php if(($current=='view-update-complaints')){?> active<?php } ?>">View/Update Complaints</a>

<a href="tsdetail-update.php" class="well<?php if(($current=='tsdetail-update')){?> active<?php } ?>">Update Personal details</a>
</div>


