<?php require_once "../../islem/baglanti.php" ?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Admin Paneli-Tamamlanan Siparişler</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        .btn-duzenle {
            width: 100%;
            background-color: green;
            color: white;
            border-radius: 20px;
            border: 1px solid green;
            font-size: 14px;
        }

        .btn-duzenle:hover {
            background-color: white;
            color: green;
        }

        .durum {
            font-weight: 500;
        }
    </style>


</head>

<body>


    <?php require_once '../../includes/_sidebar.php' ?>

    <section id="content">


        <?php require_once '../../includes/_navbar.php' ?>

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


    </section>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="../../assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

<script>


    var durumElements = document.querySelectorAll('.durum');

    // Her bir öğeyi kontrol et
    durumElements.forEach(function (durumElement) {
        var durumYazi = durumElement.textContent.trim() === "TESLİM ALINDI";
        if (durumYazi) {
            durumElement.style.color = "red";  // Eğer "TESLİM ALINDI" ise, kırmızı yap
        }
    });


    durumElements.forEach(function (durumElement) {
        var durumYazi = durumElement.textContent.trim() === "YOLDA";
        if (durumYazi) {
            durumElement.style.color = "blue";  // Eğer "TESLİM ALINDI" ise, kırmızı yap
        }
    });


    durumElements.forEach(function (durumElement) {
        var durumYazi = durumElement.textContent.trim() === "TESLİM EDİLDİ";
        if (durumYazi) {
            durumElement.style.color = "green";  // Eğer "TESLİM ALINDI" ise, kırmızı yap
        }
    });



</script>

</html>