<?php

class DatabaseConnection
{
    protected static $instance;

    private static $dsn = 'mysql:host=localhost;dbname=bookmundi';

    private static $username = 'root';

    private static $password = 'root';

    private function __construct() {
        try {
            self::$instance = new PDO(self::$dsn, self::$username, self::$password);
        } catch (PDOException $e) {
            echo "MySql Connection Error: " . $e->getMessage();
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            new Connection();
        }

        return self::$instance;
    }
}