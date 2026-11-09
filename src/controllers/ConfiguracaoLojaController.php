<?php
// controllers/ConfiguracaoLojaController.php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../models/ConfiguracaoLoja.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../views/login.php");
    exit;
}

$usuarioId = $_SESSION['usuario_id'];
$configModel = new ConfiguracaoLoja();
$config = $configModel->getByUsuarioId($usuarioId);
