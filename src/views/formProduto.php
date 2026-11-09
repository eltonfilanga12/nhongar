<?php
require_once __DIR__ . '/partials/head.php';
require_once __DIR__ . '/partials/sidebar.php';
require_once __DIR__ . '/partials/navbar.php';

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
                            <h4 class="card-title">Dados do Produto</h4>
                            <a href="produtos.php?action=listar" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-list"></i>
                                Lista de Produtos
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="produtos.php" method="POST" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome do Produto *</label>
                                        <input type="text" name="nome" class="form-control" required><br>
                                        <label>Categoria</label>
                                        <select name="categoria_id" class="form-control" required>
                                            <option value="">Selecionar categoria</option>
                                            <?php foreach ($categorias as $categoria): ?>
                                                <option value="<?= htmlspecialchars($categoria['id']) ?>">
                                                    <?= htmlspecialchars($categoria['nome']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Descrição Longa</label>
                                        <textarea name="descricao" id="editor" class="form-control" rows="6"></textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tags</label>
                                        <input type="text" name="tags" id="tags-input" class="form-control" placeholder="Ex: roupa, esporte, verão" required>
                                        <small class="form-text text-muted">Separe por vírgulas ou pressione enter.</small>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status_id" class="form-control" required>
                                            <option value="">Selecionar status</option>
                                            <?php foreach ($status as $s): ?>
                                                <option value="<?= htmlspecialchars($s['id']) ?>">
                                                    <?= htmlspecialchars($s['nome']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Preço Normal (MZN) *</label>
                                        <input type="number" name="preco" class="form-control" step="0.01" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Preço Promocional (MZN)</label>
                                        <input type="number" name="preco_promocional" class="form-control" step="0.01">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Promoção válida até</label>
                                        <input type="date" name="validade_promocional" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Quantidade</label>
                                        <input type="number" name="quantidade" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Disponibilidade</label>
                                        <select name="disponibilidade" class="form-control">
                                            <option value="em_estoque">Em estoque</option>
                                            <option value="esgotado">Esgotado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Gerenciar Estoque?</label>
                                        <select name="gerenciar_estoque" class="form-control">
                                            <option value="sim">Sim</option>
                                            <option value="nao">Não</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <style>
                                .upload-area {
                                    border: 2px dashed #ccc;
                                    border-radius: 8px;
                                    padding: 10px;
                                    text-align: center;
                                    cursor: pointer;
                                    position: relative;
                                    height: 200px;
                                    overflow: hidden;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                }

                                .upload-area img {
                                    max-height: 100%;
                                    max-width: 100%;
                                    object-fit: contain;
                                }

                                .upload-area:hover {
                                    background-color: #f9f9f9;
                                }

                                .upload-multiple {
                                    display: flex;
                                    flex-wrap: wrap;
                                    gap: 10px;
                                    margin-top: 10px;
                                }

                                .upload-multiple .thumb {
                                    width: 100px;
                                    height: 100px;
                                    border: 2px dashed #ccc;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    overflow: hidden;
                                    border-radius: 4px;
                                    cursor: pointer;
                                    position: relative;
                                }

                                .upload-multiple img {
                                    max-width: 100%;
                                    max-height: 100%;
                                    object-fit: cover;
                                }

                                input[type="file"] {
                                    display: none;
                                }
                            </style>

                            <div class="row">
                                <!-- Imagem Principal -->
                                <div class="col-md-6">
                                    <label>Imagem Principal <b>(*)</b></label>
                                    <div class="upload-area" onclick="document.getElementById('input-imagem-principal').click()">
                                        <span id="placeholder-principal">Clique para adicionar imagem</span>
                                        <img id="preview-principal" src="#" alt="Imagem Principal" style="display: none;">
                                    </div>
                                    <input type="file" id="input-imagem-principal" name="imagem_principal" accept="image/*" onchange="previewImagemPrincipal(this)" required>
                                </div>

                                <!-- Galeria de Imagens -->
                                <div class="col-md-6">
                                    <label>Galeria de Imagens</label>
                                    <div class="upload-multiple" id="preview-galeria" onclick="document.getElementById('input-galeria').click()">
                                        <div class="thumb" id="galeria-placeholder">
                                            <span>+</span>
                                        </div>
                                    </div>
                                    <input type="file" id="input-galeria" name="galeria[]" multiple accept="image/*" onchange="previewGaleria(this)">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success mt-4">Salvar Produto</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php

require_once __DIR__ . '/partials/footer.php';
?>