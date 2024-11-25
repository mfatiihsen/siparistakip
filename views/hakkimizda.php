<?php
$title = "Hakkımızda";
ob_start();
?>

<div class="container-renk2"></div>
<main class="container-main">
    <section class="about">
        <h2>Hakkımızda</h2>
        <p class="hakyazi">
            Sipariş Takip Sistemi, müşterilerimizin sipariş süreçlerini hızlı ve sorunsuz bir şekilde yönetmelerine yardımcı olmak için tasarlanmış bir web uygulamasıdır.
        </p>
    </section>
    <section class="mission">
        <h2>Misyonumuz</h2>
        <p class="hakyazi">
            Kullanıcıların sipariş yönetiminde şeffaflık ve hız sağlamayı amaçlıyoruz.
        </p>
        <h2>Vizyonumuz</h2>
        <p class="hakyazi">
            Teknolojik yeniliklerle müşteri memnuniyetini artırmayı hedefliyoruz.
        </p>
    </section>
    <section class="features">
        <h2>Sistem Özellikleri</h2>
        <ul>
            <li>Kullanıcı dostu arayüz</li>
            <li>Hızlı sipariş yönetimi</li>
            <li>Detaylı takip ve raporlama</li>
            <li>Güvenli ödeme seçenekleri</li>
        </ul>
    </section>
    <section class="contact">
        <h2>Bize Ulaşın</h2>
        <p>
            <strong>E-posta:</strong> ademfatih37@gmail.com<br>
            <strong>Telefon:</strong> +90 552 337 8537
        </p>
    </section>
</main>

<?php
$content = ob_get_clean();
include('../includes/_layout.php');
?>