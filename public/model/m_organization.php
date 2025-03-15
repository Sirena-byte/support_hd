<?php
require_once("./core/c_organization.php");
require_once("./core/core.php");
//require_once("m_footer.php");
require_once("set_rows.php");

$organizations = getOrganizations($rowsPageStart,$rowsPageFinish);
$isError = false;

$organization = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if ($_POST['name'] === ''|| $_POST['addres'] === '') {
		$isError = true;
	} else {
		$isError = false;
		$organization = $_POST;
		handleRequest($isError,$organization);
	}
}
