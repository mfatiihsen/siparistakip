
<?php

require_once '../admin/islem/baglanti.php';

$takip_numarasi  = $_GET['takip_numarasi'];
    $stmt = $baglanti->prepare("SELECT * FROM  siparis where siparis_takip_no = ?");
    $stmt->execute([$takip_numarasi]);
    $siparis = $stmt->fetch(PDO::FETCH_ASSOC);