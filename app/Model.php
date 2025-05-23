<?php
class Model {
    protected static $database;
    public function __construct() {
        if (!self::$database) {

            // call database.php from config folder
            $config = require __DIR__ . '/../config/database.php';

            $dsn = "mysql:host={$config['host']};dbname={$config['database_name']};charset={$config['charset']}";

            // Establishing connection with a database
            self::$database = new PDO($dsn, $config['user'], $config['password']);
            self::$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }
}