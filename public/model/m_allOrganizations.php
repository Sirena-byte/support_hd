<?php
require_once("core/c_organization.php");
//$organizations = getOrganizations(1, 25);
$count = 25;
$start = 1;
$finish = 25;
$organizations = getOrganizations(1, 25);
$countAllOrganization = getCountOrganizations();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['myButton'])) {
		switch ($_POST['myButton']) {
			case "10":
				$finish = 10;
				break;
			case "20":
				$finish = 20;
				break;
			case "30":
				$finish = 30;
				break;
			case "40":
				$finish = 40;
				break;
		}
	}
	$organizations = getOrganizations($start,$finish);
}
$count = $_POST['myButton'];
