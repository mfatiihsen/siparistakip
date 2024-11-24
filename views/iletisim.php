<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>İletişim</title>

    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/nav.css">
    <link rel="stylesheet" href="../../assets/css/footer.css">
    <link rel="stylesheet" href="../../assets/css/iletisim.css">


    <!-- FONTAWESOME Bağlantısı -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Bootstrap Linki -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-color: #f1f1f1;">

    <?php require_once '../includes/_navbar.php' ?>

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

    <?php require_once '../includes/_footer.php' ?>

</body>

</html>