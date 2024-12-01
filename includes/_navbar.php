<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="container-top">
    <p class="num">Destek Hattı: +90 552 337 8537</p>
    <p class="mail">e-Mail: ademfatih37@gmail.com</p>
</div>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <div>
            <img src="../assets/images/logo.png" height="70px" width="70px">
            <a class="navbar-brand me-auto" href="../index.php" style="color: #1775f1; font-weight: 600;">SiparisTakip</a>
        </div>
        <!-- Mobile Menü Butonu -->
        <button class="navbar-toggler" style="border: none;outline:none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 style="color:#1775f1" class="offcanvas-title" id="offcanvasNavbarLabel"><img src="../assets/images/logo.png" height="50px" width="50px">SiparişTakip</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" aria-current="page" href="../index.php">ANA SAYFA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="../views/hakkimizda.php">HAKKIMIZDA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="../views/iletisim.php">İLETİŞİM</a>
                    </li>

                    <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true): ?>
                        <!-- Kullanıcı giriş yaptıysa -->
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="../views/account.php">HESABIM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="../views/logout.php">ÇIKIŞ</a>
                        </li>
                    <?php else: ?>
                        <!-- Kullanıcı giriş yapmadıysa -->
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="../views/login.php">GİRİŞ</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="container-renk"></div>