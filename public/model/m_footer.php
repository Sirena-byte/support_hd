<?php
require_once("core/c_organization.php");
require_once("m_organization.php");

$count = getCountOrganizations(); // Получаем общее количество организаций

// Устанавливаем количество записей на странице
if (isset($_GET['rows'])) {
    $rowsPerPage = intval($_GET['rows']);
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