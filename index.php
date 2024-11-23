<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipariş Takip</title>
    <!-- Bootstrap Linki -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- CSS Dosyası Bağlantısı -->
    <link rel="stylesheet" href="css/style.css">

    <!-- FONTAWESOME Bağlantısı -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <!--  NAVBAR  -->
    <header>
        <?php require_once 'shared/navbar.php' ?>
    </header>



    <!--  MAIN  -->
    <main>
        <div class="main-content">

            <div class="search">
                <form action=""></form>
                <section class="search-container">
                    <div class="infodiv">
                        <p class="info">Siparişinizi takip etmek için takip numarası ile arama yapınız.</p>
                        <p class="info2">Lütfen sipariş numaranızı doğru giriniz!</p>
                    </div>
                    <form action="detail/detail.php" method="GET">
                        <input maxlength="11" type="number" class="search-input" name="takip_numarasi" placeholder="Sipariş Takip numarası..." required>
                        <button class="search-button" name="gonder" type="submit">Ara</button>
                    </form>
                </section>
            </div>


            <div class="whyus">
                <div class="whyusyazi">NEDEN BİZ?</div>
                <div class="container">
                    <div class="box">
                        <div class="baslik">Hızlı ve Güvenilir</div>
                        <div class="yazi">Takip:Siparişlerinizi anlık olarak takip edin ve güvenle teslim almanın keyfini çıkarın."
                            (Hızlı ve şeffaf bir sistem sunduğunuzu vurgulayabilirsiniz.)</div>
                    </div>
                    <div class="box">
                        <div class="baslik">Kullanıcı Dostu Arayüz</div>
                        <div class="yazi">"Basit ve kolay kullanılabilir panelimizle işlemlerinizi zahmetsizce yönetin."
                            (Kolay kullanılabilirlik, müşteri memnuniyetini artırır.)</div>
                    </div>
                    <div class="box">
                        <div class="baslik">Destek ve Memnuniyet</div>
                        <div class="yazi">"Sorularınız ve ihtiyaçlarınız için her zaman yanınızdayız."
                            (Müşterilere güven veren bir destek sistemi olduğunu belirtmek önemlidir.)</div>
                    </div>
                </div>
            </div>

        </div>
    </main>




    <!--  FOOTER  -->
    <?php require_once 'shared/footer.php' ?>





</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</html>