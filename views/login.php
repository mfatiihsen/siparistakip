<?php
$title = "Giriş Yap";
ob_start();
?>

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

<?php
$content = ob_get_clean();
include('../includes/_layout.php');
?>