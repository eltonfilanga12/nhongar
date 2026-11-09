<?php
require_once __DIR__ . '/models/Vendedor.php';

class VendedorController
{
    private $vendedor;

    public function __construct()
    {
        $this->vendedor = null;

        if (!isset($_SESSION)) session_start();
    }

    public function carregarVendedor($vendedor_id = null)
    {
        // Se tiver GET['vendedor'] (cliente visitando a banca)
        if ($vendedor_id) {
            $this->vendedor = Vendedor::buscarPorId($vendedor_id);
        }
        // Se estiver logado como vendedor
        elseif (isset($_SESSION['vendedor_id'])) {
            $this->vendedor = Vendedor::buscarPorId($_SESSION['vendedor_id']);
        }

        return $this->vendedor;
    }

    public function getLogotipo()
    {
        if (!empty($this->vendedor['logotipo'])) {
            return "/uploads/logotipos/" . $this->vendedor['logotipo'];
        }
        // Logo padrão
        return "/images/icons/logo-01.png";
    }
}
