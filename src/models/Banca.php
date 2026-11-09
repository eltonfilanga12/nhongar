<?php
// models/Banca.php

require_once __DIR__ . '/../config/database.php';

class Banca
{
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    /**
     * Retorna a configuração da loja de um vendedor
     */
    public function getByVendedorId($vendedorId) {
        $stmt = $this->pdo->prepare("SELECT * FROM configuracoes_loja WHERE vendedor_id = ? LIMIT 1");
        $stmt->execute([$vendedorId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Retorna todos os produtos ativos de um vendedor
     */
    public function getProdutos($vendedorId) {
        $stmt = $this->pdo->prepare("
            SELECT * FROM produtos 
            WHERE vendedor_id = ? AND status_id = 1 
            ORDER BY destaque DESC, id DESC
        ");
        $stmt->execute([$vendedorId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retorna a galeria de imagens de um produto
     */
    public function getGaleria($produtoId) {
        $stmt = $this->pdo->prepare("SELECT * FROM galeria_produtos WHERE produto_id = ?");
        $stmt->execute([$produtoId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByUsuarioId($usuarioId) {
    $stmt = $this->pdo->prepare("SELECT * FROM configuracoes_loja WHERE usuario_id = ? LIMIT 1");
    $stmt->execute([$usuarioId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

}
