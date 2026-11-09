<?php
class Status {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT id, nome FROM status ORDER BY nome");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
