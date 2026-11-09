<?php
require_once __DIR__ . '/../config/database.php';

class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function cadastrar($nome, $email, $senha, $tipo_id = 1)
    {
        $sql = "INSERT INTO usuarios (nome, email, senha, tipo_id, status_id, login_social, provider, provider_id)
                VALUES (?, ?, ?, ?, 1, 0, NULL, NULL)";
        $stmt = $this->db->prepare($sql);
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        return $stmt->execute([$nome, $email, $senhaHash, $tipo_id]);
    }

    public function emailExiste($email)
    {
        $sql = "SELECT id FROM usuarios WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->rowCount() > 0;
    }

    public function login($email, $senha)
    {
        $sql = "SELECT * FROM usuarios WHERE email = ? AND status_id = 1 LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }

        return false;
    }
}
