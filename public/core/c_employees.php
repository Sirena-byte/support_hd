<?php

require_once("./core/arr.php");
        // Инициализация массива данных о сотруднике с пустыми значениями
        $employee = [
            'surname' => '',
            'firstname' => '',
            'lastname' => '',
            'id_organization' => '',
            'id_dep' => '',
            'id_pos' => '',
            'login' => '',
            'pass' => ''
        ];
        $err = '';

    function handleRequest($err, ) {
        // Проверяем, был ли запрос методом POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Получаем и обрабатываем данные из формы
            $employee = extractFields($_POST,['surname','firstname','lastname','id_organization','id_dep','id_pos','login','pass']);

            // Валидация данных перед добавлением
            if ($err === '') {
                // Если валидация прошла успешно, добавляем сотрудника
                $employee = addEmployee(); // Вызываем метод для добавления сотрудника
                // Перенаправление на главную страницу (закомментировано для тестирования)
                // header('Location: ../index.php');
                exit; // Завершаем выполнение скрипта
            }
        }
    }


    // Метод для добавления сотрудника в базу данных
   function addEmployee($employee) {
        // SQL-запрос для добавления нового сотрудника
        $sql = "INSERT INTO employees (surname, firstname, lastname, id_organization, id_dep, id_position, login, password)
                VALUES (:surname, :firstname, :lastname, :id_organization, :id_dep, :id_pos, :login, :pass)";
        
        // Выполняем запрос к базе данных
        $employee = dbQuery($sql, $employee); // Теперь передаем данные о сотруднике в функцию dbQuery

        // Можно вернуть true или оставить метод пустым, так как успех будет виден через редирект
        return true;
    }

  

    function employeeAll() : array{
        $sql = "SELECT * FROM employees";
            $query = dbQuery($sql);
            return $query->fetchAll();
    }

?>