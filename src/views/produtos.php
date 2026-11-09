<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../controllers/ProdutoController.php';

$db = Database::getInstance();
$pdo = $db->getConnection();

$controller = new ProdutoController($pdo);

// Verifica se veio um POST (para salvar)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->salvar();
    exit;
}

// Verifica se tem ação específica na URL (ex: ?action=listar)
$action = $_GET['action'] ?? 'listar';

if ($action === 'formulario') {
    $controller->formulario();  // Mostra o formulário
} else {
    // Por padrão, mostra a lista
    $controller->listar();
}
