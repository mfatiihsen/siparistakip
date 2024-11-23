



<?php

require_once 'Admin/islem/baglanti.php';


if (isset($_GET['takip_numarasi'])) {
    $takip_numarasi = $_GET['takip_numarasi'];
    
    // Sipariş detaylarını veritabanından veya bir array'den çekebilirsiniz
    // Burada sadece örnek bir veriyi alıyoruz
    $stmt = $baglanti->prepare("SELECT * FROM  siparis where siparis_takip_no = ?");
    $stmt-> execute([$takip_numarasi]);
    $siparis = $stmt-> fetch(PDO::FETCH_ASSOC);

    if ($siparis) {
        header('Location: detay.php');
    }else{
        header('Location: index.php');
    }

} else {
    echo "<p>Sipariş numarası girilmedi.</p>";
}
?>
