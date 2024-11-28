<?php
// Veritabanı bağlantısını dahil et
require_once "../../islem/baglanti.php";

// Arama sorgusu, eğer parametre varsa kullanılır
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

// SQL sorgusunu hazırlıyoruz
if ($searchQuery) {
    $uye = $baglanti->prepare("SELECT * FROM uyeler WHERE uye_adi_soyadi LIKE :search ORDER BY uye_id ASC");
    $uye->bindValue(':search', '%' . $searchQuery . '%');
} else {
    // Eğer arama yapılmazsa, tüm siparişler listelenir
    $uye = $baglanti->prepare("SELECT * FROM uyeler ORDER BY uye_id ASC");
}

$uye->execute();
$uyeler = $uye->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
$title = "Müşteriler";
ob_start();
?>





<main>
    <!-- Arama inputu -->
    <form action="#" method="get">
        <div class="input-container">
            <input class="search" name="search" id="search" type="text" placeholder="Arama İstediğiniz Kişi:"
                value="<?php echo htmlspecialchars($searchQuery); ?>">
            <i class="fa fa-search"></i>
        </div>
    </form>

    <!-- Siparişler tablosu -->
    <table class="table table-light table-hover rounded" id="orderTable">
        <thead class="table-light">
            <tr>
                <th>Adı-Soyadı</th>
                <th>Mail</th>
                <th>Telefon</th>
                <th>Durum</th>
                <th>Kayıt Tarihi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($uyeler) {
                foreach ($uyeler as $uyecek) {
            ?>
                    <tr class="item">
                        <td><?php echo htmlspecialchars($uyecek['uye_adi_soyadi']); ?></td>
                        <td><?php echo htmlspecialchars($uyecek['uye_mail']); ?></td>
                        <td><?php echo htmlspecialchars($uyecek['uye_tel']); ?></td>
                        <td><?php echo htmlspecialchars($uyecek['account_status']); ?></td>
                            <td><?php echo htmlspecialchars($uyecek['uye_baslangict']); ?></td>
                        
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