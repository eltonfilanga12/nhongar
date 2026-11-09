<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Nhongar - Login</title>

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
                            <?php if (isset($_GET['erro']) && $_GET['erro'] == 'login'): ?>
                                <div class="alert alert-danger">
                                    Email ou senha incorretos.
                                </div>
                            <?php endif; ?>
                            <h1>Entrar</h1>

                            <!-- Form -->
                            <form action="../controllers/LoginController.php" method="POST">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="senha" placeholder="Senha" required>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Entrar</button>
                                </div>
                            </form>
                            <!-- /Form -->

                            <div class="text-center forgotpass">
                                <a href="forgot-password.html">Esqueceu a senha?</a>
                            </div>

                            <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">ou</span>
                            </div>

                            <!-- Social Login -->
                            <div class="social-login">
                                <span>Entrar com</span>
                                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="google"><i class="fa fa-google"></i></a>
                            </div>
                            <!-- /Social Login -->

                            <div class="text-center dont-have">
                                Ainda não tem conta? <a href="registrar.php">Registre-se</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="../../public/assets/js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="../../public/assets/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="../../public/assets/js/script.js"></script>

</body>

</html>