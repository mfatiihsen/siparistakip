<?php
require_once "../../islem/baglanti.php";

// Arama işlemi yapılmışsa
$searchQuery = '';
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchQuery = $_GET['search'];
}

?>
<?php
$title = "Devam Eden Siparişler";
ob_start();
?>



<main>
    <!-- Arama Formu -->
    <form action="" method="GET">
        <div class="input-container">
            <input class="search" name="search" id="search" type="text" placeholder="Takip Numarası Giriniz:"
                value="<?php echo htmlspecialchars($searchQuery); ?>">
            <i class="fa fa-search"></i>
        </div>
    </form>

    <!-- Sipariş Tablosu -->
    <table class="table table-light table-hover rounded">
        <thead class="table-light">
            <tr>
                <th>TAKİP NO</th>
                <th>ADRES</th>
                <th>DURUM</th>
                <th>TARİH</th>
                <th>SAAT</th>
                <th>AD-SOYAD</th>
                <th>TELEFON</th>
                <th>MAIL</th>
                <th>DÜZENLE</th>
            </tr>
        </thead>
        <tbody id="orderTableBody">
            <?php
            // Arama yapılmadıysa tüm veriler listelensin
            if (empty($searchQuery)) {
                $siparisQuery = "SELECT * FROM siparis WHERE siparis_durum IN ('YOLDA', 'TESLİM ALINDI','DAĞITIMDA')";
            } else {
                // Arama yapılmışsa sadece o takip numarasını getir
                $siparisQuery = "SELECT * FROM siparis WHERE siparis_durum IN ('YOLDA', 'TESLİM ALINDI','DAĞITIMDA') AND siparis_takip_no LIKE :searchQuery";
            }

            $siparis = $baglanti->prepare($siparisQuery);
            if (!empty($searchQuery)) {
                $siparis->bindValue(':searchQuery', '%' . $searchQuery . '%', PDO::PARAM_STR);
            }
            $siparis->execute();

            // Siparişleri listele
            while ($sipariscek = $siparis->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr class="item">
                    <td><?php echo $sipariscek['siparis_takip_no'] ?></td>
                    <td title="<?php echo $sipariscek['siparis_adres'] ?>">
                        <?php echo $sipariscek['siparis_adres'] ?></td>
                    <td class="durum"><?php echo htmlspecialchars($sipariscek['siparis_durum']) ?></td>
                    <td><?php echo $sipariscek['siparis_tarih'] ?></td>
                    <td><?php echo $sipariscek['siparis_saat'] ?></td>
                    <td><?php echo $sipariscek['alici_adi_soyadi'] ?></td>
                    <td><?php echo $sipariscek['alici_tel'] ?></td>
                    <td><?php echo $sipariscek['alici_mail'] ?></td>
                    <td><a href="order_update.php?id=<?php echo $sipariscek['siparis_id'] ?>"><button class="btn-duzenle">Detaylar</button></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>
</section>

<?php
$content = ob_get_clean();
include('../../includes/_layout.php');
?>