<?php

require_once __DIR__ . '/../controllers/ConfiguracaoLojaController.php';
require_once __DIR__ . '/partials/head.php';
require_once __DIR__ . '/partials/sidebar.php';
require_once __DIR__ . '/partials/navbar.php';
?>
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Configurações da Loja</h3>
                <h6 class="op-7 mb-2">Atualize as informações públicas e privadas da sua loja</h6>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Informações da Loja</h4>
                    </div>
                    <div class="card-body">
                        <form action="../controllers/ConfiguracaoLojaController.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <!-- Nome da loja -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome da Loja *</label>
                                        <input type="text" name="nome_loja" class="form-control"
                                            value="<?= htmlspecialchars($config['nome_loja'] ?? '') ?>" required>
                                    </div>
                                </div>

                                <!-- Email comercial -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email Comercial</label>
                                        <input type="email" name="email" class="form-control"
                                            value="<?= htmlspecialchars($config['email_loja'] ?? '') ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Telefone 1 -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Telefone 1 *</label>
                                        <input type="text" name="telefone" class="form-control"
                                            value="<?= htmlspecialchars($config['telefone1'] ?? '') ?>" required>
                                    </div>
                                </div>

                                <!-- Telefone 2 -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Telefone 2</label>
                                        <input type="text" name="telefone2" class="form-control"
                                            value="<?= htmlspecialchars($config['telefone2'] ?? '') ?>">
                                    </div>
                                </div>

                                <!-- WhatsApp -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>WhatsApp</label>
                                        <input type="text" name="whatsapp" class="form-control"
                                            value="<?= htmlspecialchars($config['whatsapp'] ?? '') ?>">
                                    </div>
                                </div>
                            </div>

                            <!-- Redes Sociais -->
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Facebook</label>
                                    <input type="url" name="facebook" class="form-control"
                                        value="<?= htmlspecialchars($config['facebook'] ?? '') ?>">
                                </div>
                                <div class="col-md-6">
                                    <label>Instagram</label>
                                    <input type="url" name="instagram" class="form-control"
                                        value="<?= htmlspecialchars($config['instagram'] ?? '') ?>">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label>Twitter (X)</label>
                                    <input type="url" name="twitter" class="form-control"
                                        value="<?= htmlspecialchars($config['twitter'] ?? '') ?>">
                                </div>
                                <div class="col-md-6">
                                    <label>Website</label>
                                    <input type="url" name="website" class="form-control"
                                        value="<?= htmlspecialchars($config['website'] ?? '') ?>">
                                </div>
                            </div>

                            <!-- Endereço e localização -->
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label>Endereço Completo</label>
                                    <input type="text" name="endereco" class="form-control"
                                        value="<?= htmlspecialchars($config['endereco'] ?? '') ?>">
                                </div>
                            </div>

                            <!-- Sobre Nós -->
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label>Sobre a Loja</label>
                                    <textarea name="sobre" class="form-control" rows="5"><?= htmlspecialchars($config['sobre'] ?? '') ?></textarea>
                                </div>
                            </div>

                            <!-- Mensagem para clientes -->
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label>Mensagem Padrão para Clientes</label>
                                    <textarea name="mensagem_cliente" class="form-control" rows="3"><?= htmlspecialchars($config['mensagem_cliente'] ?? '') ?></textarea>
                                </div>
                            </div>

                            <!-- Logo da Loja -->
                            <style>
                                .upload-area {
                                    border: 2px dashed #ccc;
                                    border-radius: 8px;
                                    padding: 10px;
                                    text-align: center;
                                    cursor: pointer;
                                    position: relative;
                                    height: 150px;
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

                            <!-- Logotipo -->
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label>Logotipo</label>
                                    <div class="upload-area" onclick="document.getElementById('input-logotipo').click()">
                                        <?php if (!empty($config['logotipo'])): ?>
                                            <img id="preview-logotipo" src="../<?= htmlspecialchars($config['logotipo']) ?>" alt="Logotipo">
                                        <?php else: ?>
                                            <span id="placeholder-logotipo">Clique para adicionar logotipo</span>
                                            <img id="preview-logotipo" src="#" alt="Logotipo" style="display:none;">
                                        <?php endif; ?>
                                    </div>
                                    <input type="file" id="input-logotipo" name="logotipo" accept="image/*" onchange="previewLogotipo(this)">
                                </div>

                                <!-- Banners -->
                                <div class="col-md-8">
                                    <label>Banners (até 3)</label>
                                    <div class="upload-multiple" id="preview-banners" onclick="document.getElementById('input-banners').click()">
                                        <?php for ($i = 1; $i <= 3; $i++): ?>
                                            <?php $bannerKey = 'banner' . $i; ?>
                                            <?php if (!empty($config[$bannerKey])): ?>
                                                <div class="thumb">
                                                    <img src="../<?= htmlspecialchars($config[$bannerKey]) ?>" alt="Banner <?= $i ?>">
                                                </div>
                                            <?php else: ?>
                                                <div class="thumb" id="banner-placeholder-<?= $i ?>"><span>+</span></div>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </div>
                                    <input type="file" id="input-banners" name="banners[]" multiple accept="image/*" onchange="previewBanners(this)">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Actualizar Configurações</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/partials/footer.php'; ?>