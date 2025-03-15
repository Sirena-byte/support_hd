<?php
//require_once("core/c_organozation.php");
$rowsPageStart = 1; // Начальное значение
$rowsPageFinish = 25; // Значение по умолчанию

if (isset($_GET['rows'])) {
    $rowsPerPage = intval($_GET['rows']);
} else {
    $rowsPerPage = $rowsPageFinish; // Используем значение по умолчанию
}

$rowsPageFinish = $rowsPageStart + $rowsPerPage - 1; // Конечное значение
// Возвращаем успешный ответ
echo json_encode(['status' => 'success', 'finish' => $rowsPageFinish]);
?>