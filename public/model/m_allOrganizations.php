<?php
require_once("core/c_organization.php");

$countPage = [10, 20, 30, 60];
//$organizations = getOrganizations(1, 25);
$start = 1;
$finish = 25;
$count = $_POST['recordsCount'] ?? 25;
$organizations = getOrganizations(1, 25);
$countAllOrganization = getCountOrganizations();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['recordsCount'])) {
		if ((int)$_POST['recordsCount'] > (int)$countAllOrganization) {
			$count = $countAllOrganization;
		} else {
			switch ($_POST['recordsCount']) {
				case "$countPage[0]":
					$finish = 10 ?? $countAllOrganization;
					break;
				case "20":
					$finish = 20 ?? $countAllOrganization;
					break;
				case "30":
					$finish = 30 ?? $countAllOrganization;
					break;
				case "60":
					$finish = 60 ?? $countAllOrganization;
					break;
			}
		}
	}
	$organizations = getOrganizations($start, $finish);
}
