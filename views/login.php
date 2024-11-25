<?php
$title = "Giriş Yap";
ob_start();
?>

<main>

    <div class="container">
        <div class="container-column">
            <div class="title-text">
                <h3>GİRİŞ YAP</h3>
            </div>
            <form action="islem.php" method="POST">
                <input name="mail" type="email" placeholder="Mail adresi giriniz" class="input-giris">
                <input name="pass" type="password" placeholder="Şifre giriniz" class="input-giris">
                <button type="submit" name="girisButton" class="btn-giris">Giriş</button>
                <div class="hesapAc">
                    <p>Henüz hesabın yok mu?<a href="register.php" style="text-decoration: none;"> Hesap Aç</a></p>
                    
                </div>
            </form>
        </div>
    </div>

</main>

<?php
$content = ob_get_clean();
include('../includes/_layout.php');
?>