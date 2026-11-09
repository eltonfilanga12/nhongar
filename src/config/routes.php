<?php
require_once 'database.php';

// Simples roteamento (exemplo, ajuste conforme sua estrutura)
$uri = $_SERVER['REQUEST_URI'];

if (strpos($uri, '/api/categorias') !== false) {
    require_once 'controllers/CategoriaController.php';
    $catCtrl = new CategoriaController($pdo);
    $catCtrl->listarJSON();
    exit;
}

if (strpos($uri, '/api/status') !== false) {
    require_once 'controllers/StatusController.php';
    $stCtrl = new StatusController($pdo);
    $stCtrl->listarJSON();
    exit;
}

if (strpos($uri, '/produtos/salvar') !== false) {
    require_once 'controllers/ProdutoController.php';
    $prodCtrl = new ProdutoController($pdo);
    $prodCtrl->salvar();
    exit;
}
