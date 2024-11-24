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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="icon" href="../../assets/img/logo.png" type="image/png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>AdminSite</title>


    <style>
        .btn-duzenle {
            width: 100px;
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

    <?php require_once '../../includes/_sidebar.php' ?>



    <section id="content">
        <?php require_once '../../includes/_navbar.php' ?>

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
                        <th>DÜZENLE</th>
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
                                <td><button class="btn-duzenle">Düzenle</button></td>
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




    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../../assets/js/script.js"></script>
</body>

</html>