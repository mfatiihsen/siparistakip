<?php
$title = "İletişim";
ob_start();
?>

<header class="header">
    <h1>Sipariş Takip Sistemi</h1>
</header>
<main class="container-main">
    <section class="contact-info">
        <h2>Bize Ulaşın</h2>
        <p>
            Sipariş takibi, ürünlerle ilgili sorularınız ya da diğer konular hakkında bizimle iletişime geçmekten çekinmeyin. 
            Aşağıdaki iletişim bilgilerini kullanarak doğrudan bizimle iletişime geçebilirsiniz.
        </p>
        <p><strong>E-posta:</strong> ademfatih37@gmail.com</p>
        <p><strong>Telefon:</strong> +90 552 337 8537</p>
        <p><strong>Adres:</strong> Kocaeli Üniversitesi, Kocaeli, Türkiye</p>
        <p>Hafta içi çalışma saatleri: 09:00 - 18:00</p>
    </section>
</main>

<?php
$content = ob_get_clean();
include('../includes/_layout.php');
?>
