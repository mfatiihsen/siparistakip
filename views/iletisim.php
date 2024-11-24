<?php
$title = "İletişim";
ob_start();
?>

<header class="header">
    <h1>Sipariş Takip Sistemi</h1>
</header>
<main class="container-main">
    <section class="contact-form">
        <h2>Bizimle İletişime Geçin</h2>
        <form action="#" method="POST">
            <label for="name"></label>
            <input type="text" id="name" name="name" placeholder="Adınızı ve soyadınızı girin" required>

            <label for="email"></label>
            <input type="email" id="email" name="email" placeholder="E-posta adresinizi girin" required>

            <label for="message"></label>
            <textarea id="message" name="message" placeholder="Mesajınızı buraya yazın" required></textarea>

            <button type="submit" class="gonder-btn">Gönder</button>
        </form>
    </section>
    <section class="contact-info">
        <h2>Bize Ulaşın</h2>
        <p><strong>E-posta:</strong> ademfatih37@gmail.com</p>
        <p><strong>Telefon:</strong> +90 552 337 8537</p>
    </section>
</main>

<?php
$content = ob_get_clean();
include('../includes/_layout.php');
?>