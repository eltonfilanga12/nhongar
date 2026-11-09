<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Produto.php';
require_once __DIR__ . '/partials/head.php';
require_once __DIR__ . '/partials/sidebar.php';
require_once __DIR__ . '/partials/navbar.php';


$db = Database::getInstance();
$pdo = $db->getConnection();

$produtoModel = new Produto($pdo);
$produtos = $produtoModel->listar();
?>
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Produtos</h3>
                <h6 class="op-7 mb-2">Resumo da sua banca e desempenho de vendas</h6>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Lista de Produtos</h4>
                            <a href="produtos.php?action=formulario" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-plus"></i>
                                Novo Produto
                            </a>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Produto</th>
                                        <th>Categoria</th>
                                        <th>Preço</th>
                                        <th>Preço Promocinal</th>
                                        <th>Status</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($produtos as $index => $produto): ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>

                                            <td>
                                                <div style="display: flex; align-items: center;">
                                                    <?php if (!empty($produto['imagem_principal'])): ?>
                                                        <img src="../<?= $produto['imagem_principal'] ?>" width="40" height="40" style="object-fit: cover; border-radius: 4px; margin-right: 8px;">
                                                    <?php endif; ?>
                                                    <?= htmlspecialchars($produto['nome']) ?>
                                                </div>
                                            </td>

                                            <td><?= htmlspecialchars($produto['categoria_nome']) ?></td>
                                            <td><?= number_format($produto['preco'], 2, ',', '.') ?></td>
                                            <td><?= number_format($produto['preco_promocional'], 2, ',', '.') ?></td>
                                            <td><span class="badge badge-<?= $produto['status_nome'] == 'Ativo' ? 'success' : 'danger' ?>">
                                                    <?= $produto['status_nome'] ?>
                                                </span></td>

                                            <td class="text-center">
                                                <a href="#"><i class="fa fa-edit"></i></a>
                                                <a href="#"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php

require_once __DIR__ . '/partials/footer.php';
?>