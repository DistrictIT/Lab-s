<?php

function getJobTitles() {
    $pdo = Database::getInstance()->getConnection();

    $sql = "SELECT id, name FROM jobtitle";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function filterEmployees($postData) {
    $pdo = Database::getInstance()->getConnection();

    if (isset($postData['resetFilter'])) {
        $_POST = array(); // Очистите все данные POST
        $where = '';
    } else {
        $whereClauses = [];
        $params = [];

        if (!empty($postData['fio'])) {
            $whereClauses[] = "FIO LIKE :fio";
            $params[':fio'] = '%' . $postData['fio'] . '%';
        }

        if (!empty($postData['yearBirth'])) {
            $whereClauses[] = "yearBirth = :yearBirth";
            $params[':yearBirth'] = intval($postData['yearBirth']);
        }

        if (!empty($postData['jobTitle'])) {
            $whereClauses[] = "id_jobTitle = :jobTitleId";
            $params[':jobTitleId'] = intval($postData['jobTitle']);
        }

        $where = empty($whereClauses) ? '' : ' WHERE ' . implode(' AND ', $whereClauses);
    }

    $sql = "SELECT employees.id, employees.photo, employees.FIO, jobtitle.name AS jobTitleName, employees.characteristic, employees.yearBirth 
            FROM employees 
            INNER JOIN jobtitle ON employees.id_jobTitle = jobtitle.id" . $where;

    $stmt = $pdo->prepare($sql);
    
    if (!empty($params)) {
        $stmt->execute($params);
    } else {
        $stmt->execute();
    }

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>