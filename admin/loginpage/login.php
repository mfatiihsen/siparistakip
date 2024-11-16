<!DOCTYPE html>
<html lang="en">

<head>
  <title>Yönetici Girişi</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css" />
  <link rel="stylesheet" type="text/css" href="login.css" />
  <!--===============================================================================================-->
</head>

<body>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <form class="login100-form validate-form" action="../islem/islem.php" method="POST">
          <span class="login100-form-title"> YÖNETİCİ GİRİŞİ </span>
          <div style="text-align: center;margin-bottom: 30px;">
            <?php
            if (@$_GET['giris'] == "basarisiz") { ?>
              <p class="login-box-msg" style="color:red;text-align: center;"> Kullanıcı adı veya parola hatalı!
              <?php } else { ?>
              <p class="login-box-msg" style="color:gray"> Lütfen giriş bilgilerini giriniz
              <?php }
            ?>
            </p>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Kullanıcı Adını Giriniz">
            <input class="input100" type="text" name="kadi" placeholder="Kullanıcı Adı" />
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-user" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Lütfen Parolanızı Giriniz">
            <input class="input100" type="password" name="password" placeholder="Parola" />
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit" name="admingiris">GİRİŞ</button>
          </div>

          <div class="text-center p-t-12">
            <span class="txt1"> </span>
            <a class="txt2" href="#"> </a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/tilt/tilt.jquery.min.js"></script>
  <script>
    $(".js-tilt").tilt({
      scale: 1.1,
    });
  </script>
  <!--===============================================================================================-->
  <script src="login.js"></script>
</body>

</html>