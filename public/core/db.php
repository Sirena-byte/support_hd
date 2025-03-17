<?php
function dbInstance(): PDO {
    static $db;
    if ($db === null) {
        $db = new PDO('mysql:host=MySQL-5.7;dbname=HelpDesk_DB', 'root', '', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        $db->exec('SET NAMES UTF8');
    }
    return $db;
}

function dbQuery(string $sql, array $params = []): PDOStatement {
    $db = dbInstance();
    $query = $db->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
    return $query;
}

function dbCheckError(PDOStatement $query): bool {
    // Получаем информацию об ошибке из PDOStatement
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE) {
        // Формируем сообщение об ошибке с временной меткой
        $errorMessage = date('Y-m-d H:i:s') . " - Error: " . $errInfo[2] . PHP_EOL;
        // Записываем сообщение в файл журнала ошибок
        // 'error_log.txt' - имя файла, в который будут записываться ошибки
        // FILE_APPEND - указывает, что новое сообщение будет добавлено в конец файла
        file_put_contents('error_log.txt', $errorMessage, FILE_APPEND);
        // Выводим общее сообщение для пользователя, чтобы не раскрывать детали ошибки
        echo "<p class=\"errorDB\">\"Произошла ошибка. Пожалуйста, проверьте журнал ошибок.\"</p>";
        exit();
    }
    return true;
}




// foreach($parems as $key=>$value){
// 	$query->bindParam(":$key",$value);
// } выше код работает по такому алгоритму

// $surname = 'Воронцова'; //$_POST['surname']
// $firstname = 'Виктория';
// $lastname = 'Викторовна';
// $id_organization = '1';
// $id_dep = '1';
// $id_pos = '1';
// $login = 'www';
// $pas = 'www';

// $query->bindParam(':surname',$surname);
// $query->bindParam(':firstname',$firstname);
// $query->bindParam(':lastname',$lastname);
// $query->bindParam(':organization',$id_organization);
// $query->bindParam(':id_dep',$id_dep);
// $query->bindParam(':id_pos',$id_pos);
// $query->bindParam(':login',$login);
// $query->bindParam(':pas',$pas);
// $query->execute();