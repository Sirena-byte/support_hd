<?php
require_once("./core/c_organization.php");
require_once("./core/core.php");

$organizations = getOrganizations();
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
