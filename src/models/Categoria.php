<?php
require_once __DIR__ . '/../config/database.php';

class Categoria {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT id, nome FROM categorias ORDER BY nome");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
