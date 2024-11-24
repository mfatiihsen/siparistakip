<?php require_once "islem/baglanti.php" ?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Yönetici Listele</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        /* Tablonun kenarlarını yuvarlat */
        .table-container {
            overflow-x: auto; /* Yatay kaydırma için */
            border-radius: 10px;
        }

        .table {
            margin-bottom: 0;
        }

        .btn-sil {
            background-color: red;
            color: white;
            width: 100px;
            border: none;
            height: 30px;
            border-radius: 15px;
            font-size: 14px;
        }

        .btn-sil:hover {
            background-color: white;
            color: red;
            border: 1px solid red;
        }

        .btn-silinmez {
            background-color: #1775f1;
            color: white;
            width: 100px;
            border: none;
            height: 30px;
            border-radius: 15px;
            font-size: 14px;
        }

        .btn-sil:active {
            border: 1px solid red;
        }

        /* Mobilde düğme ve metinler optimize */
        @media (max-width: 768px) {
            .btn-sil, .btn-silinmez {
                width: 80px;
                height: 25px;
                font-size: 12px;
            }

            th, td {
                font-size: 12px;
            }

            .table-container {
                padding: 0 10px;
            }
        }
    </style>

</head>

<body>


    <?php require_once 'sidebar.php' ?>

    <section id="content">


        <?php require_once 'navbar.php' ?>

        <main>
            <table class="table table-light table-hover rounded">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>İSİM</th>
                        <th>SOYİSİM</th>
                        <th>TELEFON</th>
                        <th>E-POSTA</th>
                        <th>ADMIN SİL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $admin = $baglanti->prepare("SELECT * FROM  admin order by admin_id ASC");
                    $admin->execute();
                    while ($admincek = $admin->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr class="item">
                            <td><?php echo $admincek['admin_id'] ?></td>
                            <td><?php echo $admincek['admin_adi'] ?></td>
                            <td><?php echo $admincek['admin_soyad'] ?></td>
                            <td><?php echo $admincek['admin_tel'] ?></td>
                            <td><?php echo $admincek['admin_mail'] ?></td>
                            <td><?php if ($admincek['admin_yetki'] == 2) { ?>

                                    <a href="islem/islem.php?adminsil&id=<?php echo $admincek['admin_id'] ?>"><button
                                            class="btn-sil" type="button">Sil</button></a>
                                <?php } else { ?>
                                    <a href=""><button
                                            class="btn-silinmez" type="submit">Yönetici</button></a>
                                <?php } ?>
                            </td>
                        </tr>

                    <?php } ?>

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
</body>

</html>