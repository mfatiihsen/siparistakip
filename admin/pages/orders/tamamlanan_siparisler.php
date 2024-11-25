<?php require_once "../../islem/baglanti.php" ?>
<?php
$title = "Tamamlanan Siparişler";
ob_start();
?>

<main>
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
            </tr>
        </thead>
        <tbody>
            <?php
            $siparis = $baglanti->prepare("SELECT * FROM siparis WHERE siparis_durum IN ('TESLİM EDİLDİ') ORDER BY siparis_durum");
            $siparis->execute();
            while ($sipariscek = $siparis->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr class="item">
                    <td><?php echo $sipariscek['siparis_takip_no'] ?></td>
                    <td title="<?php echo $sipariscek['siparis_adres'] ?>">
                        <?php echo $sipariscek['siparis_adres'] ?>
                    </td>
                    <td class="durum"><?php echo htmlspecialchars($sipariscek['siparis_durum']) ?></td>
                    <td><?php echo $sipariscek['siparis_tarih'] ?></td>
                    <td><?php echo $sipariscek['siparis_saat'] ?></td>
                    <td><?php echo $sipariscek['alici_adi_soyadi'] ?></td>
                    <td><?php echo $sipariscek['alici_tel'] ?></td>
                    <td><?php echo $sipariscek['alici_mail'] ?></td>
                </tr>

            <?php } ?>

        </tbody>
    </table>

</main>


<?php
$content = ob_get_clean();
include('../../includes/_layout.php');
?>