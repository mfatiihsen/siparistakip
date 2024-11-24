<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- BOOXİCON Bağlantısı -->

    <!-- FONTAWESOME Bağlantısı -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Bootstrap Linki -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/nav.css">
    <link rel="stylesheet" href="../assets/css/footer.css">

</head>

<body>

    <?php require_once '../includes/_navbar.php' ?>

    <main>
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>GİRİŞ YAP</h4>
                    </div>
                    <div class="card-body">
                        <form action="loginislem.php" method="POST">
                            <p>Lütfen giriş bilgilerinizi doğru giriniz</p>
                            <div class="form-group">
                                <label for="loginEmail"></label>
                                <div class="input-group">
                                    <input name="mail" type="email" class="form-control" id="loginEmail" placeholder="Mail Giriniz">
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="loginPassword"></label>
                                <div class="input-group">
                                    <input name="pass" type="password" class="form-control" id="loginPassword"
                                        placeholder="Parola Giriniz">
                                </div>

                            </div>
                            <button type="submit" class="btn btn-block" id="girisButton" name="girisButton">Giriş</button>
                            <div class="yazilar">
                                <span class="hesapac">Henüz hesabın yok mu? <a class="hesaplink"
                                        href="register.php">Buradan Aç</a></span>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>

    </main>

    <?php require_once '../includes/_footer.php' ?>


</body>

</html>