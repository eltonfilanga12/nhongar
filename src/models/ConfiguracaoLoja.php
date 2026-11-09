<?php
// models/ConfiguracaoLoja.php
require_once __DIR__ . '/../config/database.php';

class ConfiguracaoLoja {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    // Buscar configuração da loja pelo usuário logado
    public function getByUsuarioId($usuarioId) {
        $sql = "SELECT * FROM configuracoes_loja WHERE usuario_id = :usuario_id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':usuario_id' => $usuarioId]);
        return $stmt->fetch();
    }
}
