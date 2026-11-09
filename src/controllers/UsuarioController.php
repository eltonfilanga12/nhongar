<?php
require_once __DIR__ . '/../models/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];
    $confirmar = $_POST['confirmar'];
    $tipo_id = 3; // você pode alterar dependendo do tipo de usuário

    if (empty($nome) || empty($email) || empty($senha)) {
        header("Location: ../views/registrar.php?erro=vazio");
        exit;
    }

    if ($senha !== $confirmar) {
        header("Location: ../views/registrar.php?erro=senhas");
        exit;
    }

    $usuario = new Usuario();

    if ($usuario->emailExiste($email)) {
        header("Location: ../views/registrar.php?erro=duplicado");
        exit;
    }

    if ($usuario->cadastrar($nome, $email, $senha, $tipo_id)) {
        header("Location: ../views/registrar.php?sucesso=1");
        exit;
    } else {
        header("Location: ../views/registrar.php?erro=banco");
        exit;
    }
}
