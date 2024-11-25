<?php
$title = "Kayıt Ol";
ob_start();
?>

<main>

    <div class="container">
        <div class="container-column">
            <div class="title-text">
                <h3>KAYIT OL</h3>
            </div>
            <form action="islem.php" method="POST">
                <input name="mail" type="email" placeholder="Mail adresi giriniz" class="input-giris">
                <input name="adsoyad" type="text" placeholder="Ad ve Soyad giriniz" class="input-giris">
                <input name="pass" type="password" placeholder="Şifre giriniz" class="input-giris">
                <button type="submit" name="kayitButton" class="btn-giris">Kayıt Ol</button>
                <div class="hesapAc">
                    <p>Hesabın var mı?<a href="login.php" style="text-decoration: none;"> Giriş Yap</a></p>
                </div>
            </form>
        </div>
    </div>
</main>

<?php
$content = ob_get_clean();
include('../includes/_layout.php');
?>