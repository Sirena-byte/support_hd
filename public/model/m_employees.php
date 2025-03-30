<?php

require_once("core/c_employees.php");
$organizations = getAllOrganizations();
$departments = [];
$positions = [];
$employee = [];

$surname = $_POST['surname'] ?? '';
$firstname = $_POST['firstname'] ?? '';
$lastname = $_POST['lastname'] ?? '';
$login = $_POST['login'] ?? '';
$pass = $_POST['pass'] ?? '';

$selectedOrganizationId = $_POST['organization'] ?? '';
$selectedDepartmentId = $_POST['department'] ?? '';
$selectedPositionId = $_POST['position'] ?? '';

if (!empty($selectedOrganizationId)) {
	$departments = getDepartmentByOrganization($selectedOrganizationId);
}

if (!empty($selectedDepartmentId) && !empty($selectedOrganizationId)) {
	if ($selectedOrganizationId === '1') {
		$positions = getPositionsByOrganization($selectedOrganizationId);
	} else {
		$positions = getPositionsByDepartment($selectedDepartmentId);
		
	}
}

// Проверяем, была ли форма отправлена через метод POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Проверяем, заполнены ли обязательные поля 'name' и 'addres'
	if ($surname === '' || $firstname === '' || $lastname === '' || $selectedOrganizationId === '' || $selectedDepartmentId === '' || $login === '' || $pass === '') {
		// Если одно из полей пустое, устанавливаем переменную $isError в true
		$isError = true;
	} else {
		// Если оба поля заполнены, сбрасываем флаг ошибки
		$isError = false;

		// Заполняем массив $organization данными из POST
		$employee = $_POST;
		handleRequest($isError, $employee);
	}
}
