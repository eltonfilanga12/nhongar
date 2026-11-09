<?php
require_once __DIR__ . '/../models/Produto.php';
require_once __DIR__ . '/../models/Categoria.php';
require_once __DIR__ . '/../models/Status.php';
class ProdutoController
{
    private $produtoModel;
    private $categoriaModel;
    private $statusModel;

    public function __construct($pdo)
    {
        $this->produtoModel = new Produto($pdo);
        $this->categoriaModel = new Categoria($pdo);
        $this->statusModel = new Status($pdo);
    }

    public function formulario()
    {
        // Busca categorias e status do banco
        $categorias = $this->categoriaModel->getAll();
        $status = $this->statusModel->getAll();

        // Chama a view passando os dados
        require_once __DIR__ . '/../views/formProduto.php';
    }

    public function salvar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // 1. Upload da imagem principal
            $imagemPrincipal = null;
            if (isset($_FILES['imagem_principal']) && $_FILES['imagem_principal']['error'] === UPLOAD_ERR_OK) {
                $ext = pathinfo($_FILES['imagem_principal']['name'], PATHINFO_EXTENSION);
                $nomeImagem = uniqid('produto_') . '.' . $ext;
                $destino = __DIR__ . '/../uploads/produtos/' . $nomeImagem;

                if (move_uploaded_file($_FILES['imagem_principal']['tmp_name'], $destino)) {
                    $imagemPrincipal = 'uploads/produtos/' . $nomeImagem;
                }
            }

            // 2. Coleta os dados do formulário
            $dados = [
                'vendedor_id' => 2, // fixo conforme pedido
                'nome' => $_POST['nome'] ?? '',
                'categoria_id' => $_POST['categoria_id'] ?? null,
                'status_id' => $_POST['status_id'] ?? null,
                'preco' => $_POST['preco'] ?? 0,
                'preco_promocional' => $_POST['preco_promocional'] ?? null,
                'validade_promocional' => $_POST['validade_promocional'] ?? null,
                'quantidade' => $_POST['quantidade'] ?? 0,
                'disponibilidade' => $_POST['disponibilidade'] === 'em_estoque' ? 1 : 0,
                'gerenciar_estoque' => $_POST['gerenciar_estoque'] === 'sim' ? 1 : 0,
                'descricao' => $_POST['descricao'] ?? '',
                'imagem_principal' => $imagemPrincipal,
                'tags' => $_POST['tags'] ?? ''
            ];

            // 3. Cria o produto
            $produtoId = $this->produtoModel->create($dados);

            // 4. Galeria de imagens
            if ($produtoId && isset($_FILES['galeria'])) {
                $galeriaFiles = $_FILES['galeria'];
                for ($i = 0; $i < count($galeriaFiles['name']); $i++) {
                    if ($galeriaFiles['error'][$i] === UPLOAD_ERR_OK) {
                        $ext = pathinfo($galeriaFiles['name'][$i], PATHINFO_EXTENSION);
                        $nomeGaleria = uniqid('galeria_') . '.' . $ext;
                        $destinoGaleria = __DIR__ . '/../uploads/produtos/' . $nomeGaleria;

                        if (move_uploaded_file($galeriaFiles['tmp_name'][$i], $destinoGaleria)) {
                            $this->produtoModel->inserirImagemGaleria($produtoId, 'uploads/produtos/' . $nomeGaleria);
                        }
                    }
                }
            }

            header("Location: produtos.php?msg=sucesso");
            exit;
        }
    }

    public function listar()
    {
        $produtos = $this->produtoModel->listar();
        require_once __DIR__ . '/../views/listaProdutos.php';
    }
}
