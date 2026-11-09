<?php
require_once '/models/Categoria.php';

class CategoriaController {
    private $categoriaModel;

    public function __construct($pdo) {
        $this->categoriaModel = new Categoria($pdo);
    }

    public function listarJSON() {
        header('Content-Type: application/json');
        $categorias = $this->categoriaModel->getAll();
        echo json_encode($categorias);
    }
}
