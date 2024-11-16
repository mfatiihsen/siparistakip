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
        .form-control {
            border-radius: 0.5rem;
            /* Köşe yuvarlama */
        }
    </style>
</head>

<body>




    <main>
        <div class="container mt-5">
            <h2 class="text-center mb-4">Admin Ekleme Formu</h2>
            <form action="islem/islem.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">İsim</label>
                    <input type="text" class="form-control" name="name" placeholder="İsim girin">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Soyad</label>
                    <input type="text" class="form-control" name="surname" placeholder="Soyad girin">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Kullanıcı Adı</label>
                    <input type="text" class="form-control" name="username" placeholder="Kullanıcı Adı girin">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-posta</label>
                    <input type="email" class="form-control" name="email" placeholder="E-posta girin">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Şifre</label>
                    <input type="password" class="form-control" name="pass" placeholder="Şifre girin">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Telefon</label>
                    <input type="tel" class="form-control" name="phone" placeholder="Telefon numarasını girin">
                </div>
                <button type="submit" class="btn btn-primary" name="adminekle">Ekle</button>
            </form>
        </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>