<?php
class Produto
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create($dados)
    {
        $sql = "INSERT INTO produtos 
        (vendedor_id, nome, categoria_id, status_id, preco, preco_promocional, validade_promocional, quantidade, disponibilidade, gerenciar_estoque, descricao, imagem_principal)
        VALUES 
        (:vendedor_id, :nome, :categoria_id, :status_id, :preco, :preco_promocional, :validade_promocional, :quantidade, :disponibilidade, :gerenciar_estoque, :descricao, :imagem_principal)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':vendedor_id' => $dados['vendedor_id'],
            ':nome' => $dados['nome'],
            ':categoria_id' => $dados['categoria_id'],
            ':status_id' => $dados['status_id'],
            ':preco' => $dados['preco'],
            ':preco_promocional' => $dados['preco_promocional'],
            ':validade_promocional' => $dados['validade_promocional'],
            ':quantidade' => $dados['quantidade'],
            ':disponibilidade' => $dados['disponibilidade'],
            ':gerenciar_estoque' => $dados['gerenciar_estoque'],
            ':descricao' => $dados['descricao'],
            ':imagem_principal' => $dados['imagem_principal']
        ]);

        $produtoId = $this->pdo->lastInsertId();

        // Salvar tags (tipo WordPress)
        if (!empty($dados['tags'])) {
            $tagsJson = json_decode($dados['tags'], true); // true = array associativo

            $tags = [];
            if (is_array($tagsJson)) {
                foreach ($tagsJson as $tagObj) {
                    if (!empty($tagObj['value'])) {
                        $tags[] = trim($tagObj['value']);
                    }
                }
            }

            foreach ($tags as $tag) {
                if (!empty($tag)) {
                    $this->inserirTag($produtoId, $tag);
                }
            }
        }

        return $produtoId;
    }

    public function inserirImagemGaleria($produtoId, $caminhoImagem)
    {
        $sql = "INSERT INTO galeria_produtos (produto_id, imagem) VALUES (:produto_id, :imagem)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':produto_id' => $produtoId,
            ':imagem' => $caminhoImagem
        ]);
    }

    public function inserirTag($produtoId, $nomeTag)
    {
        // 1. Verifica se já existe a tag
        $stmt = $this->pdo->prepare("SELECT id FROM tags WHERE nome = :nome");
        $stmt->execute([':nome' => $nomeTag]);
        $tag = $stmt->fetch();

        if ($tag) {
            $tagId = $tag['id'];
        } else {
            // 2. Se não existir, insere nova
            $stmt = $this->pdo->prepare("INSERT INTO tags (nome) VALUES (:nome)");
            $stmt->execute([':nome' => $nomeTag]);
            $tagId = $this->pdo->lastInsertId();
        }

        // 3. Insere na tabela de relacionamento
        $stmt = $this->pdo->prepare("INSERT INTO produto_tags (produto_id, tag_id) VALUES (:produto_id, :tag_id)");
        $stmt->execute([
            ':produto_id' => $produtoId,
            ':tag_id' => $tagId
        ]);
    }

    public function listar()
    {
        $sql = "SELECT p.*, c.nome AS categoria_nome, s.nome AS status_nome
            FROM produtos p
            LEFT JOIN categorias c ON p.categoria_id = c.id
            LEFT JOIN status s ON p.status_id = s.id
            ORDER BY p.id DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($produtos as &$produto) {
            // Tags
            $stmtTags = $this->pdo->prepare("
            SELECT t.nome 
            FROM tags t
            INNER JOIN produto_tags pt ON t.id = pt.tag_id
            WHERE pt.produto_id = :produto_id
        ");
            $stmtTags->execute([':produto_id' => $produto['id']]);
            $produto['tags'] = $stmtTags->fetchAll(PDO::FETCH_COLUMN);

            // Galeria
            $stmtImagens = $this->pdo->prepare("
            SELECT imagem 
            FROM galeria_produtos 
            WHERE produto_id = :produto_id
        ");
            $stmtImagens->execute([':produto_id' => $produto['id']]);
            $produto['galeria'] = $stmtImagens->fetchAll(PDO::FETCH_COLUMN);
        }

        return $produtos;
    }
}
