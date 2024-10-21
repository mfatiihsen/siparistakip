<?php



session_start();
require_once 'baglanti.php';



# admin giriş işlemi
if (isset($_POST['admingiris'])) {
  
    $kadi = htmlspecialchars($_POST['kadi']);
    $pass = htmlspecialchars($_POST['password']);
    $strongpassword = md5($pass);


    $kullanicisor = $baglanti->prepare("SELECT * from admin where admin_ka=:admin_ka and admin_parola=:admin_parola");
    $kullanicisor->execute(array(
        'admin_ka' => $kadi,
        'admin_parola' => $pass
    ));

    $var = $kullanicisor->rowCount();
    if ($var > 0) {
        # code...
        $_SESSION['girisbelgesi'] = $kadi;
        header('Location:../index.php?giris=basarili');
    } else {
        header('Location:../loginpage/login.php?giris=basarisiz');
    }
}



 /*

   
*/