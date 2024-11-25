<?php
$title = "Sipariş Takip Sistemi";
ob_start();
?>

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
                <form action="views/detail.php" method="GET">
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


<?php
$content = ob_get_clean();
include('includes/_layout.php');
?>