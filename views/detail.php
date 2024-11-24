<?php

require_once '../admin/islem/baglanti.php';

if (isset($_GET['takip_numarasi'])) {

    require_once 'connect.php';


    if ($siparis) {
    } else {
        $siparis = null;
    }
} else {
    $siparis = null;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipariş Detayı</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="detay.css">
</head>

<body>

    <main class="container mt-5">
        <?php if ($siparis): ?>
            <!-- Sipariş Detay Sayfası -->
            <div class="order-details-container">
                <div class="container-info">
                    <h1>Sipariş Detayları</h1>
                    <p id="info-baslik" class="info-baslik">Siparişinizin detaylarını görebilirsiniz.</p>
                </div>
                <div class="order-status">
                    <div class="status-item">
                        <img id="teslimalindi" src="../images/icons/teslimalindi.png" alt="Teslim Alındı">
                        <p id="teslimalindiyazi">Teslim Alındı</p>
                    </div>
                    <div id="cizgi1" class="cizgi1"></div>
                    <div class="status-item">
                        <img id="yolda" src="../images/icons/yolda.png" alt="Yolda">
                        <p id="yoldayazi">Yolda</p>
                    </div>
                    <div id="cizgi2" class="cizgi2"></div>
                    <div class="status-item">
                        <img id="dagitimda" src="../images/icons/dagitimda.png" alt="Dağıtımda">
                        <p id="dagitimdayazi">Dağıtımda</p>
                    </div>
                    <div id="cizgi3" class="cizgi3"></div>
                    <div class="status-item">
                        <img id="teslimedildi" src="../images/icons/teslimedildi.png" alt="Teslim Edildi">
                        <p id="teslimedildiyazi">Teslim Edildi</p>
                    </div>
                </div>

                <div class="order">
                    <div class="order-info">
                        <h3>Sipariş Bilgileri:</h3>
                        <p><strong>Sipariş Numarası: </strong><?php echo $siparis['siparis_takip_no'] ?> </p>
                        <p><strong>Sipariş Oluşturma Saati: </strong> <?php echo $siparis['siparis_saat'] ?></p>
                        <p><strong>Sipariş Oluşturma Tarihi: </strong> <?php echo $siparis['siparis_tarih'] ?></p>
                        <p><strong>Teslimat Adresi: </strong> <?php echo $siparis['siparis_adres'] ?></p>
                    </div>

                    <div class="order-info">
                        <h3>Alıcı Bilgileri:</h3>
                        <p><strong>Alıcı Adı Soyadı: </strong><?php echo $siparis['alici_adi_soyadi'] ?> </p>
                        <p><strong>Alıcı Telefon: </strong> <?php echo $siparis['alici_tel'] ?></p>
                        <p><strong>Alıcı e-Mail: </strong> <?php echo $siparis['alici_mail'] ?></p>
                        <p><strong>Teslimat Adresi: </strong> <?php echo $siparis['siparis_adres'] ?></p>
                    </div>
                </div>


                <div class="order-detail">
                    <div class="container2">
                        <div class="toggle-row" onclick="toggleTable(this)">
                            <div class="icon">▶</div>
                            <div>Sipariş Hareketleri</div>
                        </div>
                        <div class="hidden-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Durum</th>
                                        <th>Saat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Teslim Alma</td>
                                        <td><?php echo $siparis['siparis_saat'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Transfer</td>
                                        <td><?php echo $siparis['siparis_saat'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Dağıtım</td>
                                        <td><?php echo $siparis['siparis_saat'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Teslim Edilme</td>
                                        <td><?php echo $siparis['siparis_saat'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <a style="text-decoration: none;" href="../index.php">
                    <p class="backAna">Ana Sayfaya Dön</p>
                </a>

            <?php else: ?>
                <p class="alert alert-danger">Geçersiz takip numarası veya hiç bir sipariş bulunamadı.</p>
            <?php endif; ?>
    </main>


</body>



<script>
    function toggleTable(row) {
        const icon = row.querySelector(".icon");
        const table = row.nextElementSibling;

        if (table.style.display === "block") {
            table.style.display = "none";
            icon.classList.remove("rotate");
        } else {
            table.style.display = "block";
            icon.classList.add("rotate");
        }
    }

    var value = "<?php echo $siparis['siparis_durum'] ?>";

    if (value == "TESLİM EDİLDİ") {
        document.getElementById("info-baslik").innerHTML =
            "Siparişiniz kuryemiz tarafından teslim edilmiştir.";
        document.getElementById("cizgi3").style.backgroundColor = "#00FF18";
        document.getElementById("cizgi2").style.backgroundColor = "#FCC419";
        document.getElementById("cizgi1").style.backgroundColor = "#339AF0";
        document.getElementById("teslimedildi").src =
            "../images/icons/teslimedildigreen.png";
        document.getElementById("dagitimda").src =
            "../images/icons/dagitimdaorange.png";
        document.getElementById("teslimalindi").src =
            "../images/icons/teslimalindired.png";
        document.getElementById("yolda").src = "../images/icons/yoldablue.png";
    }

    if (value == "TESLİM ALINDI") {
        document.getElementById("info-baslik").innerHTML =
            "Siparişiniz şubemiz tarafından teslim alınmıştır.";
        document.getElementById("teslimalindi").src =
            "../images/icons/teslimalindired.png";
        document.getElementById("dagitimda").src = "../images/icons/dagitimda.png";
        document.getElementById("teslimedildi").src =
            "../images/icons/teslimedildi.png";
        document.getElementById("yolda").src = "../images/icons/yolda.png";
    }

    if (value == "DAĞITIMDA") {
        document.getElementById("info-baslik").innerHTML =
            "Siparişiniz kuryemiz tarafından dağıtıma çıkarılmıştır.";
        document.getElementById("cizgi2").style.backgroundColor = "#FCC419";
        document.getElementById("cizgi1").style.backgroundColor = "#339AF0";
        document.getElementById("dagitimda").src =
            "../images/icons/dagitimdaorange.png";
        document.getElementById("teslimalindi").src =
            "../images/icons/teslimalindired.png";
        document.getElementById("teslimedildi").src =
            "../images/icons/teslimedildi.png";
        document.getElementById("yolda").src = "../images/icons/yoldablue.png";
    }

    if (value == "YOLDA") {
        document.getElementById("info-baslik").innerHTML =
            "Siparişiniz transfer aşamasındadır.";
        document.getElementById("cizgi1").style.backgroundColor = "#339AF0";
        document.getElementById("yolda").src = "../images/icons/yoldablue.png";
        document.getElementById("dagitimda").src = "../images/icons/dagitimda.png";
        document.getElementById("teslimedildi").src =
            "../images/icons/teslimedildi.png";
        document.getElementById("teslimalindi").src =
            "../images/icons/teslimalindired.png";
    }
</script>

</html>