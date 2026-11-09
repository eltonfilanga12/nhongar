<?php
session_start();
require_once __DIR__ . '/../models/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

    $usuarioModel = new Usuario();
    $usuario = $usuarioModel->login($email, $senha);

    if ($usuario) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        $_SESSION['usuario_tipo'] = $usuario['tipo_id'];
        $_SESSION['usuario_email'] = $usuario['email'];
        $_SESSION['usuario_foto'] = $usuario['foto'];

        // Redireciona para o dashboard ou painel
        header("Location: ../views/dashboard.php");
        exit;
    } else {
        header("Location: ../views/login.php?erro=login");
        exit;
    }
}
