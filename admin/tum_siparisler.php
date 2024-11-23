<?php
// Veritabanı bağlantısını dahil et
require_once "islem/baglanti.php";

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

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Admin Paneli-Tüm Siparişler</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

    <!-- Sidebar ve navbar -->
    <?php require_once 'sidebar.php' ?>
    <section id="content">
        <?php require_once 'navbar.php' ?>

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
                        <th>DÜZENLE</th>
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
                                <td><button class="btn-duzenle">></button></td>
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
    </section>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        // Durum renklerini değiştirme
        var durumElements = document.querySelectorAll('.durum');

        durumElements.forEach(function (durumElement) {
            var durumYazi = durumElement.textContent.trim();
            if (durumYazi === "TESLİM ALINDI") {
                durumElement.style.color = "red";  // Kırmızı
            } else if (durumYazi === "YOLDA") {
                durumElement.style.color = "blue";  // Mavi
                
            } else if (durumYazi === "TESLİM EDİLDİ") {
                durumElement.style.color = "green";  // Yeşil
            }else if (durumYazi === "DAĞITIMDA") {
                durumElement.style.color = "orange";  // Yeşil
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