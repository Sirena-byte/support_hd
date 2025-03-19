<?php
//require_once("core/c_organization.php");
require_once("m_organization.php");

$count = getCountOrganizations(); // Получаем общее количество организаций

// Устанавливаем количество записей на странице
if (isset($_GET['rows'])) {
    $rowsPerPage = intval($_GET['rows']);//intval — Возвращает целочисленное значение переменной
} else {
    $rowsPerPage = $rowsPageFinish; // Используем значение по умолчанию
}

// Определяем начальную и конечную позиции
$rowsPageStart = 1;
$rowsPageFinish = min($count, $rowsPageStart + $rowsPerPage - 1);

// Генерируем массив страниц
$page = [];
for ($i = 1, $j = 1; $i <= $count; $i++) {
    if ($i === $rowsPageFinish || $i === 1) {
        $page[] = $j; // Добавляем номер страницы в массив
        $j++;
    }
}



/**
 * 
 * $countAllOrganization = getCountOrganizations();
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
 */