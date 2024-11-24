<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Yönetici Ekle</title>
    <link rel="stylesheet" href="style.css">
    <!-- inputlara radius eklemek için -->
    <style>
        @font-face {
            font-family: Poppins-Bold;
            src: url("fonts/poppins/Poppins-Bold.ttf");
        }

        .form-control {
            border-radius: 25px;
            /* Köşe yuvarlama */
            padding: 25px;
            transition: box-shadow 0.4s ease;
        }

        .form-control:focus {
            background-color: white;
            border: 1px solid #1775f1;
            outline: none;
            box-shadow: 0 0 5px #1775f1;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.75);
        }

        .container {
            background-color: white;
            width: 50%;
            height: 800px;
            padding: 50px;
            border-radius: 25px;
            text-align: center;
        }

        .btn {
            width: 50%;
            height: 50px;
            border-radius: 50px;
            margin-top: 50px;
            transition: background-color 0.4s ease, color 0.4s ease;
        }

        .btn:hover {
            background: white;
            border: 1px solid #1775f1;
            color: #1775f1;
        }

        h2 {
            font-family: Poppins-Bold;
            font-size: 24px;
        }

        .info {
            color: #adaaaa;
            font-size: 14px;
        }
    </style>
</head>

<body>


    <?php require_once 'sidebar.php' ?>

    <section id="content">


        <?php require_once 'navbar.php' ?>

        <main>
            <div class="container mt-5">
                <h2 class="text-center mb-4">Admin Ekle</h2>
                <p class="info">Lütfen eklemek istediğiniz kişinin bilgilerini doğru giriniz</p>
                <form action="islem/islem.php" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label"></label>
                        <input required type="text" class="form-control" name="name" placeholder="İsim ">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label"></label>
                        <input required type="text" class="form-control" name="surname" placeholder="Soyad">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label"></label>
                        <input required type="email" class="form-control" name="email" placeholder="E-posta">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label"></label>
                        <input required type="password" class="form-control" name="pass" placeholder="Parola ">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label"></label>
                        <input required type="tel" class="form-control" name="phone" placeholder="Telefon">
                    </div>
                    <button required type="submit" class="btn btn-primary" name="adminekle">EKLE</button>
                </form>
            </div>

        </main>


    </section>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>