<?php
require_once("core/c_organization.php");
global $prew;
$pageGroup = $_POST['pageGroup'] ?? 0;//+
$countPage = [10, 20, 30, 60];
$recordsCount = $_POST['recordsCount'] ?? 'test';
$start = 0;
$finish = 25;
$count = $_POST['recordsCount'] ?? 25;
$organizations = getOrganizations(0, 25);
$countAllOrganization = getCountOrganizations();
$id = $_POST['id_organization'] ?? '';
//$prew = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['recordsCount'])) {
		if ((int)$_POST['recordsCount'] > (int)$countAllOrganization) {
			$count = $countAllOrganization;
			$finish = $countAllOrganization;
		} else {
			switch ($_POST['recordsCount']) {
				case "$countPage[0]":
					$finish = $countPage[0] ?? $countAllOrganization;
					$prew = $finish;
					//echo " зашел countPage[0] finish = " . $finish . " , ";
					break;
				case "$countPage[1]":
					$finish = $countPage[1] ?? $countAllOrganization;
					$prew = $finish;
					break;
				case "$countPage[2]":
					$finish = $countPage[2] ?? $countAllOrganization;
					$prew = $finish;
					break;
				case "$countPage[3]":
					$finish =  $countPage[3] ?? $countAllOrganization;
					$prew = $finish;
					//echo " зашел countPage[3] finish = " . $finish . ", countPage = " . $countPage[3] . ", countAll = " . $countAllOrganization;
					break;
			}
		}
	}
	$organizations = getOrganizations($start, $finish);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['pageGroup']) || isset($_POST['recordsCount'])) {
		echo "зашел во второй if<br>";
		$temp = $finish;
		 //получаем номер нажатой страницы
		if ($pageGroup > 1) {
			echo "<br>сработало условие страница > 1";
			$start = $temp;
			$finish =$count * $pageGroup;
		
			$organizations = 	getOrganizations($start, $finish);
		}
	} 
	//echo "<br>start = " . $start . ", finish = " . $finish . ", temp = " . $temp . ", pageGroup = " . $pageGroup . ", count = " . $count . ", countAllOrganization =  " . $countAllOrganization . ", countPage[3] = " . $countPage[3] . ", prew = " . $prew . ", recordsCount = " . $recordsCount;
	//echo "<br>POST['recordsCount'] = ";
	//var_dump($_POST['recordsCount']);
	//echo "<br>POST['pageGroup'] = ";
	//var_dump($_POST['pageGroup']); 
}
