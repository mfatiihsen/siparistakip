<?php
// Veritabanı bağlantısını dahil et
require_once "../../islem/baglanti.php";

// Arama sorgusu, eğer parametre varsa kullanılır
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

// SQL sorgusunu hazırlıyoruz
if ($searchQuery) {
    $siparis = $baglanti->prepare("SELECT * FROM siparis WHERE siparis_takip_no LIKE :search ORDER BY siparis_id ASC");
    $siparis->bindValue(':search', '%' . $searchQuery . '%');
} else {
    // Eğer arama yapılmazsa, tüm siparişler listelenir
    $siparis = $baglanti->prepare("SELECT * FROM siparis ORDER BY siparis_id ASC");
}

$siparis->execute();
$siparisler = $siparis->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
$title = "Tüm Siparişler";
ob_start();
?>


<main>
    <!-- Arama inputu -->
    <form action="#" method="get">
        <div class="input-container">
            <input class="search" name="search" id="search" type="text" placeholder="Takip Numarası Giriniz:"
                value="<?php echo htmlspecialchars($searchQuery); ?>">
            <i class="fa fa-search"></i>
        </div>
    </form>

    <!-- Siparişler tablosu -->
    <table class="table table-light table-hover rounded" id="orderTable">
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
            </tr>
        </thead>
        <tbody>
            <?php
            if ($siparisler) {
                foreach ($siparisler as $sipariscek) {
            ?>
                    <tr class="item">
                        <td><?php echo htmlspecialchars($sipariscek['siparis_takip_no']); ?></td>
                        <td title="<?php echo htmlspecialchars($sipariscek['siparis_adres']); ?>">
                            <?php echo htmlspecialchars($sipariscek['siparis_adres']); ?>
                        </td>
                        <td class="durum"><?php echo htmlspecialchars($sipariscek['siparis_durum']); ?></td>
                        <td><?php echo htmlspecialchars($sipariscek['siparis_tarih']); ?></td>
                        <td><?php echo htmlspecialchars($sipariscek['siparis_saat']); ?></td>
                        <td><?php echo htmlspecialchars($sipariscek['alici_adi_soyadi']); ?></td>
                        <td><?php echo htmlspecialchars($sipariscek['alici_tel']); ?></td>
                        <td><?php echo htmlspecialchars($sipariscek['alici_mail']); ?></td>
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='9'>Aramanıza uygun sonuç bulunamadı.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</main>
<?php
$content = ob_get_clean();
include('../../includes/_layout.php');
?>