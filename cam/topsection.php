<?php 
$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$end = end(explode('/', $actual_link));
$current=explode('.php', $end);
$current= $current[0];

?>
<div id="nav">
<a href="company-leads.php" class="well<?php if(($current=='company-leads')||($current=='leadcompany-detail')||($current=='send-mail-to-company')){?> active<?php } ?>">New Registrations</a>
<a href="company-list.php" class="well<?php if(($current=='company-list')||($current=='view-company-details')){?> active<?php } ?>">Registered Companies</a>
<a href="contract-expiring-companies.php" class="well<?php if(($current=='contract-expiring-companies')){?> active<?php } ?>">Expiring Contracts</a>
<a href="contract-expired-companies.php" class="well<?php if(($current=='contract-expired-companies')){?> active<?php } ?>">Expired Contracts</a>
<a href="complaint-list.php" class="well<?php if(($current=='complaint-list')||($current=='complaint-full-details')){?> active<?php } ?>">View Complaints</a>
<a href="reports-per-company.php" class="well<?php if(($current=='reports-per-company')||($current=='view-full-details')){?> active<?php } ?>">Generate Reports</a>
<a href="camdetail-update.php" class="well<?php if($current=='camdetail-update'){?> active<?php } ?>">Update Personal Details</a>
</div>


