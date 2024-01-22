<?php

class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        try {
            require_once "../dataBase/date.php";
            global $host, $dbname, $user, $pass;

            $this->connection = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

            // Установка режим ошибок для PDO на исключение
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Чтобы PDO не выводил подробные ошибки
            $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    // создаем экземпляр класса, хранящий подключение к БД
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

     
    // экземпляр подключения к БД
    public function getConnection() {
        return $this->connection;
    }

    // запрещаем клонирование
    protected function __clone(){}

    // запрещаем десериализацию
    public function __wakeup(){ 
        throw new \Exception("Unable to deserialize database connection");
    }

    // Метод подготовки запроса
    public static function prepare($sql) {
        $instance = self::getInstance();
        return self::$instance->getConnection()->prepare($sql);
    }

     

}