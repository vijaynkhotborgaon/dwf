<?php 
 $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
 $end = end(explode('/', $actual_link));
 $current=explode('.php', $end);
 $current= $current[0];

?>
<nav id="nav">
<a href="cam-list.php" class="well<?php if(($current=='cam-list')||($current=='add-new-cam')||($current=='camdetail-update')){?> active<?php } ?>">CAM List</a>
<a href="ts-list.php" class="well<?php if(($current=='ts-list')||($current=='add-new-ts')||($current=='tsdetail-update')){?> active<?php } ?>">Technical Support List</a>
<a href="company-leads.php" class="well<?php if(($current=='company-leads')||($current=='leadcompany-detail')||($current=='add-company-leads')||($current=='edit-company-leads')){?> active<?php } ?>">New Registrations</a>
<a href="registered-company.php" class="well<?php if(($current=='registered-company')||($current=='view-company-details')||($current=='edit-company-details')){?> active<?php } ?>">Registered Companies</a>
<a href="contract-expiring-companies.php" class="well<?php if(($current=='contract-expiring-companies')||($current=='extend-contract')||($current=='send-mail-to-spoc')){?> active<?php } ?>">Expiring Contracts</a>
<a href="contract-expired-companies.php" class="well<?php if(($current=='contract-expired-companies')||($current=='send-mail-to-spoc-expired')){?> active<?php } ?>">Expired Contracts</a>
<a href="complaint-list.php" class="well<?php if(($current=='complaint-list')||($current=='complaint-full-details')||($current=='view-complaint-details')){?> active<?php } ?>">View Complaints</a>
<a href="reports-per-company.php" class="well<?php if(($current=='reports-per-company')||($current=='view-full-details')){?> active<?php } ?>">Generate Reports</a>
<a href="update-personal-details.php" class="well<?php if($current=='update-personal-details'){?> active<?php } ?>">Update Personal Details</a>
</nav>