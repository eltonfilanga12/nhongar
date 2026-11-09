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
                <h3 class="fw-bold mb-3">Meus Dados</h3>
                <h6 class="op-7 mb-2">Resumo da sua banca e desempenho de vendas</h6>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Perfil</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        
                    
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php

require_once __DIR__ . '/partials/footer.php';
?>