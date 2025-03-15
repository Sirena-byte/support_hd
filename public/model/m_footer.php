<?php
require_once("core/c_organization.php");
require_once("set_rows.php");
$count = getCountOrganizations();
$page = [];
for($i = 1, $j = 1;$i<$count;$i++){
if($i=== ($rowsPageFinish) || $i === 1)
{
    $page[] = $j;
    $j++;
}
}
?>