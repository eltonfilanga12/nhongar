<?php
require_once __DIR__ . '/../models/Banca.php';

function carregarBancaPorUsuario($usuarioId) {
    $bancaModel = new Banca();

    $banca = $bancaModel->getByUsuarioId($usuarioId);

    if (!$banca) return null;

    $logotipo = $banca['logotipo'] ? 'uploads/logotipos/' . $banca['logotipo'] : 'assets/default-logo.png';

    $banners = [];
    for ($i = 1; $i <= 3; $i++) {
        if (!empty($banca["banner$i"])) {
            $banners[] = 'uploads/banners/' . $banca["banner$i"];
        }
    }

    $produtos = $bancaModel->getProdutos($banca['vendedor_id']);

    return [
        'banca' => $banca,
        'logo' => $logotipo,
        'banners' => $banners,
        'produtos' => $produtos
    ];
}

