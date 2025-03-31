<?php
require_once("./core/db.php");
require_once("./core/core.php");
// Инициализация массива данных о сотруднике с пустыми значениями
$employee = [];
$err = '';

function getAllOrganizations()
{
    $sql = "SELECT id_organization, name FROM `organizations`";
    $query = dbQuery($sql);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getDepartmentByOrganization($organizationId): array
{
    $sql = "SELECT id_department, name FROM `departments` WHERE id_organization = :organizationId";
    $query = dbQuery($sql, [':organizationId' => $organizationId]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
//для ЦО
function getPositionsByDepartment($departmentId): array
{
    $sql = "SELECT id_position, name FROM `positions` WHERE id_dep = :departmentId";
    $query = dbQuery($sql, [':departmentId' => $departmentId]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
//для ТО
function getPositionsByOrganization($organizationId): array
{
    $sql = "SELECT id_position, name FROM `positions` WHERE id_organization = :organizationId";
    $query = dbQuery($sql, [':organizationId' => $organizationId]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function handleRequest($err, $employee)
{
    ob_start();
    // Проверяем, был ли запрос методом POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Получаем и обрабатываем данные из формы
        $employee = extractFields($_POST, ['surname', 'firstname', 'lastname', 'organization', 'department', 'position', 'login', 'pass']);

        // Валидация данных перед добавлением
        if (!$err) {
            // Если валидация прошла успешно, добавляем сотрудника
            addEmployee($employee); // Вызываем метод для добавления сотрудника
            // Перенаправление на главную страницу (закомментировано для тестирования)
            header('Location: ?page=employees');
            ob_end_flush(); // Отправляем содержимое буфера
            exit; // Завершаем выполнение скрипта
        }
    }
    ob_end_flush();
}


// Метод для добавления сотрудника в базу данных
function addEmployee($employee)
{
    // SQL-запрос для добавления нового сотрудника
    $sql = "INSERT INTO employees (surname, firstname, lastname, id_organization, id_dep, id_pozition, login, password)
                VALUES (:surname, :firstname, :lastname, :organization, :department, :position, :login, :pass)";

    // Выполняем запрос к базе данных
    $employee = dbQuery($sql, $employee); // Теперь передаем данные о сотруднике в функцию dbQuery

    // Можно вернуть true или оставить метод пустым, так как успех будет виден через редирект
    return true;
}



function getEmployeeAll(): array
{
    $sql = "SELECT e.id_employee, e.surname, e.firstname,e.lastname, o.name AS organization_name, d.name AS department_name, p.name AS positions, e.login, e.password 
FROM `employees` e
JOIN `organizations` o ON e.id_organization = o.id_organization
JOIN `departments` d ON e.id_dep = d.id_department
JOIN `positions` p ON e.id_pozition = p.id_position";
    $query = dbQuery($sql);
    return $query->fetchAll();
}
