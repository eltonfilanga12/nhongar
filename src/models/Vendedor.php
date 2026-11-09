<?php
require_once __DIR__ . '/../config/database.php';

class Vendedor
{
    public static function buscarPorId($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM vendedores WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
