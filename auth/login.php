<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- FONTAWESOME Bağlantısı -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Bootstrap Linki -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

    <?php require_once 'navbar.php' ?>

    <main>
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>GİRİŞ YAP</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <p>Lütfen giriş bilgilerinizi doğru giriniz</p>
                            <div class="form-group">
                                <label for="loginEmail"></label>
                                <div class="input-group">
                                    <input type="email" class="form-control" id="loginEmail" placeholder="Mail Giriniz">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="loginPassword"></label>
                                <div class="input-group">

                                    <input type="password" class="form-control" id="loginPassword"
                                        placeholder="Parola Giriniz">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block" id="girisButton">Giriş</button>
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

    <?php require_once 'footer.php' ?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>