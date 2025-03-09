<?php
require_once("./core/db.php");
require_once("./core/core.php");
$organizationName = '';
$organization = [];
$err = '';

function getOrganizations(): array
{
	$sql = "SELECT `name`, `addres`, `isActive` FROM `organizations`";
	$query = dbQuery($sql);
	return $query->fetchAll();
}
//замена симола статуса на строковое значение при печати
function replaceStatus($status): string
{
	if ($status === '1') {
		$status = "Активен";
	} else {
		$status = "Не активен";
	}
	return $status;
}

function handleRequest($error, $organization)
{
    // Проверяем, был ли запрос методом POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Получаем и обрабатываем данные из формы
        $organization = extractFields($_POST, ['name', 'addres']); // Исправлено 'addres' на 'address'

        // Валидация данных перед добавлением
        if (!$error) {
            // Если валидация прошла успешно, добавляем организацию
            organizationAdd($organization); 
            exit();
        }
    }
}
function organizationAdd(array $organization): bool
{
	$sql = "INSERT organizations (name, addres) VALUES (:name, :addres)";
	dbQuery($sql, $organization);
	return true;
}

function genericForm(){
		echo "<div class=\"succsess\">";
		echo "<h1>Данные успешно добавлены</h1>";
		echo "<a href=\"pages/organization.php\">test</a>";
		echo "</div>";
}