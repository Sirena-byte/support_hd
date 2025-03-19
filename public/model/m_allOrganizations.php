<?php
require_once("core/c_organization.php");

$countPage = [10, 20, 30, 60];
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
					$finish = $countPage[0] ?? $countAllOrganization;
					break;
				case "$countPage[1]":
					$finish = $countPage[1] ?? $countAllOrganization;
					break;
				case "$countPage[2]":
					$finish = $countPage[2] ?? $countAllOrganization;
					break;
				case "$countPage[3]":
					$finish = $countPage[3] ?? $countAllOrganization;
					break;
			}
		}
	}
	$organizations = getOrganizations($start, $finish);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['pageGroup']) || isset($_POST['recordsCount'])) {
		$temp = $count;
		$numberPage = (int)$_POST['pageGroup'] ?? 1; //получаем номер нажатой страницы
		if ($numberPage > 1) {

			$finish *= $numberPage;
			$start = $temp;
			$organizations = 	getOrganizations($start, $finish);
		}
	} 
	echo "start = " . $start . ", finish = " . $finish . ", temp = " . $temp . ", numberPage = " . $numberPage;
}
