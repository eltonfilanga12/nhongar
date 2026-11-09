<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Nhongar - Cadastro</title>

    <link rel="icon" href="../../public/img/minilogo.png" type="image/x-icon" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../public/assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="../../public/assets/css/font-awesome.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="../../public/assets/css/style.css">
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">

                    <div class="login-left">
                        <img class="img-fluid" src="../../public/img/logo2.png" alt="Nhongar" class="navbar-brand" height="50">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <?php if (isset($_GET['erro']) || isset($_GET['sucesso'])): ?>
                                <div class="alert <?= isset($_GET['sucesso']) ? 'alert-success' : 'alert-danger' ?>">
                                    <?php
                                    if (isset($_GET['sucesso'])) {
                                        echo "Cadastro realizado com sucesso! Você já pode fazer login.";
                                    } else {
                                        switch ($_GET['erro']) {
                                            case 'vazio':
                                                echo "Preencha todos os campos.";
                                                break;
                                            case 'senhas':
                                                echo "As senhas não coincidem.";
                                                break;
                                            case 'duplicado':
                                                echo "Este email já está cadastrado.";
                                                break;
                                            case 'banco':
                                                echo "Erro ao salvar. Tente novamente.";
                                                break;
                                            default:
                                                echo "Ocorreu um erro.";
                                        }
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>
                            <h1>Criar Conta</h1>
                            <!-- Formulário -->
                            <form action="../controllers/UsuarioController.php" method="POST">
                                <div class="form-group">
                                    <input type="hidden" name="tipo_id" value="1"> <!-- 1 = cliente, por exemplo -->
                                    <input class="form-control" type="text" name="nome" placeholder="Nome">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="senha" placeholder="Senha">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="confirmar" placeholder="Confirmar Senha">
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit">Cadastrar</button>
                                </div>
                            </form>
                            <!-- /Formulário -->

                            <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">ou</span>
                            </div>

                            <!-- Login Social -->
                            <div class="social-login">
                                <span>Cadastre-se com</span>
                                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="google"><i class="fa fa-google"></i></a>
                            </div>
                            <!-- /Login Social -->

                            <div class="text-center dont-have">Já tem uma conta? <a href="login.php">Entrar</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../../public/assets/js/jquery-3.6.0.min.js"></script>
    <script src="../../public/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../public/assets/js/script.js"></script>

</body>

</html>