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


# admin eklemek

if (isset($_POST['adminekle'])) {

    $ad = htmlspecialchars($_POST['name']);
    $soyad = htmlspecialchars($_POST['surname']);
    $kadi = htmlspecialchars($_POST['username']);
    $mail = htmlspecialchars($_POST['email']);
    $parola = htmlspecialchars($_POST['pass']);
    $telefon = htmlspecialchars($_POST['phone']);

    $adminsor = $baglanti->prepare('SELECT * from admin where admin_ka=:admin_ka');
    $adminsor->execute(array(
        'admin_ka' => $kadi
    ));

    $var = $adminsor->rowCount();
    if ($var >0) {
        header('Location:../admin_ekle.php?ekleme=basarisiz');
    }else{


        $adminekle = $baglanti ->prepare("INSERT into admin SET
            admin_adi=:admin_adi,
            admin_soyad=:admin_soyad,
            admin_ka=:admin_ka,
            admin_parola=:admin_parola,
            admin_tel=:admin_tel,
            admin_mail=:admin_mail
        ");

        $insert = $adminekle->execute(
            array(
                'admin_adi' => $ad,
                'admin_soyad' => $soyad,
                'admin_ka' => $kadi,
                'admin_parola' => $parola,
                'admin_tel' => $telefon,
                'admin_mail' => $mail
            )
        );
        if ($insert) {
            header('Location:../index.php');
        }else{
            header('Location:../admin_ekle.php');
        }

    }


}