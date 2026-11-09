<?php
// config/database.php

// Ativa exibição de erros para desenvolvimento (remova em produção)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Definir timezone
date_default_timezone_set('Africa/Maputo'); // Use uma timezone válida, ex: Africa/Maputo

class Database {
    private static $instance = null;  // Instância única da classe
    private $pdo;

    // Configurações do banco
    private $host = 'localhost';
    private $dbName = 'nhongar_db';
    private $username = 'root';
    private $password = '';

    // Construtor privado para impedir instanciação direta
    private function __construct() {
        try {
            $this->pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->dbName};charset=utf8mb4",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
            );
        } catch (PDOException $e) {
            die("Erro de conexão com o banco de dados: " . $e->getMessage());
        }
    }

    // Método estático para obter a instância única
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Método para obter o objeto PDO
    public function getConnection() {
        return $this->pdo;
    }

}