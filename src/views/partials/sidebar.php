<?php require_once __DIR__ . '/../../config/app.php'; ?>
<div class="wrapper">
  <!-- Sidebar -->
  <div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <div class="logo-header" data-background-color="dark">
        <a href="dashboard.php" class="logo">
          <img src="../../public/img/logo2.png" alt="Nhongar" class="navbar-brand" height="50" />
        </a>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
    </div>

    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">
          <li class="nav-item active">
            <a href="<?= BASE_URL ?>dashboard.php">
              <i class="fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= BASE_URL ?>produtos.php">
              <i class="fas fa-box-open"></i>
              <p>Meus Produtos</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= BASE_URL ?>pedidos.php">
              <i class="fas fa-shopping-cart"></i>
              <p>Pedidos</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= BASE_URL ?>banca.php">
              <i class="fas fa-store"></i>
              <p>Minha Loja</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= BASE_URL ?>relatorios.php">
              <i class="fas fa-chart-line"></i>
              <p>Relatórios</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= BASE_URL ?>configuracoes.php">
              <i class="fas fa-cogs"></i>
              <p>Configurações</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= BASE_URL ?>logout.php">
              <i class="fas fa-sign-out-alt"></i>
              <p>Sair</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- End Sidebar -->
