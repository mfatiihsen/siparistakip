<?php
require_once "../../islem/baglanti.php";

// Arama işlemi yapılmışsa
$searchQuery = '';
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchQuery = $_GET['search'];
}

?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Tüm Siparişler</title>
    <style>
        /* CSS kodları buraya */

        .btn-duzenle {
            width: 100%;
            background-color: green;
            color: white;
            border-radius: 20px;
            border: 1px solid green;
            font-size: 14px;
            padding: 5px;
        }

        .btn-duzenle:hover {
            background-color: white;
            color: green;
        }

        .durum {
            font-weight: 500;
        }

        .search {
            width: 100%;
            margin-bottom: 30px;
            background-color: white;
            border: 1px solid white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s ease, box-shadow 0.3s ease, height 0.6s ease;
        }

        .search:focus {
            border: 1px solid #1775f1;
            outline: none;
            box-shadow: 0 4px 6px rgba(23, 117, 241, 0.1);
        }

        .search::placeholder {
            color: grey;
            font-style: normal;
        }

        .input-container {
            position: relative;
            width: 100%;
            display: flex;
            align-items: center;
        }

        .input-container i {
            position: absolute;
            right: 30px;
            top: 25px;
            color: grey;
            font-size: 20px;
        }
    </style>
</head>

<body>

    <?php require_once '../../includes/_sidebar.php' ?>

    <section id="content">

        <?php require_once '../../includes/_navbar.php' ?>
        
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
                            <td><a href="order_update.php?id=<?php echo $sipariscek['siparis_id'] ?>"><button class="btn-duzenle">Düzenle</button></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
    </section>

    <!-- Script Dosyaları -->
    <script src="../../assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>

        // Durum metnini renklendirme
        var durumElements = document.querySelectorAll('.durum');
        durumElements.forEach(function (durumElement) {
            var durumYazi = durumElement.textContent.trim();
            if (durumYazi === "TESLİM ALINDI") {
                durumElement.style.color = "red";
            } else if (durumYazi === "YOLDA") {
                durumElement.style.color = "blue";
            } else if (durumYazi === "DAĞITIMDA") {
                durumElement.style.color = "orange";
            } else if (durumYazi === "TESLİM EDİLDİ") {
                durumElement.style.color = "green";
            }
        });

        

        // Arama işlemi
        $('#search').on('keyup', function () {
            var searchQuery = $(this).val();

            $.ajax({
                url: '',  // Aynı sayfada işlem yapıyoruz
                method: 'GET',
                data: { search: searchQuery },
                success: function (response) {
                    // Tablodaki veriyi güncelle
                    var responseHtml = $(response).find('#orderTableBody').html();
                    $('#orderTableBody').html(responseHtml);
                }
            });
        });
    </script>
</body>

</html>