
<header>
    <div class="container-menu-desktop">
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    Free shipping for standard order over $100
                </div>

                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m trans-04 p-lr-25">Help & FAQs</a>
                    <a href="#" class="flex-c-m trans-04 p-lr-25">My Account</a>
                    <a href="#" class="flex-c-m trans-04 p-lr-25">EN</a>
                    <a href="#" class="flex-c-m trans-04 p-lr-25">USD</a>
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <a href="#" class="logo">
                    <img src="<?= htmlspecialchars($LOGO) ?>" alt="<?= htmlspecialchars($BANCA) ?>">
                </a>

                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu">
                            <a href="index.php">Home</a>
                            <ul class="sub-menu">
                                <a href="index.php">Homepage 1</a>
                                <a href="home-02.php">Homepage 2</a>
                                <a href="home-03.php">Homepage 3</a>
                            </ul>
                        </li>

                        <li><a href="product.php">Shop</a></li>
                        <li class="label1" data-label1="hot"><a href="shoping-cart.php">Features</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>

                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>

                    <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti">
                        <i class="zmdi zmdi-favorite-outline"></i>
                    </a>
                </div>

            </nav>
        </div>
    </div>

    <?php require_once __DIR__ . '/header-mobile.php';?>
    <?php require_once __DIR__ . '/menu-mobile.php'; ?>
    <?php require_once __DIR__ . '/modal-search.php'; ?>
</header>
