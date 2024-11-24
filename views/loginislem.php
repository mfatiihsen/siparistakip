<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<?php

require_once '../admin/islem/baglanti.php';

// Giriş Yapmak için yazılan kod bloğu
if (isset($_POST['girisButton'])) {
    $mail = htmlspecialchars($_POST['mail']);
    $password = htmlspecialchars($_POST['pass']);

    $strongpass = md5($password);


    $kullanicisor = $baglanti->prepare("SELECT * FROM  uyeler  where uye_mail=:uye_mail and uye_password=:uye_password");
    $kullanicisor->execute(
        array(
            'uye_mail' => $mail,
            'uye_password' => $strongpass
        )
    );

    $var = $kullanicisor->rowCount();
    if ($var > 0) {
        $_SESSION['girisbelgesi'] = $mail;
        header("Location:../index.php?giris=basarili");
    } else {
        header("Location:login.php?giris=basarisiz");
    }
}


// Kayıt Olmak İçin yazılan kod bloğu
if (isset($_POST['kayitButton'])) {
    $mail = htmlspecialchars($_POST['mail']);
    $password = htmlspecialchars($_POST['pass']);
    $adsoyad = htmlspecialchars($_POST['adsoyad']);
    $strongpass = md5($password);


    $kullanicisor = $baglanti->prepare("SELECT * FROM uyeler where uye_mail=:uye_mail");
    $kullanicisor->execute(array(
        'uye_mail' => $mail
    ));

    $var = $kullanicisor->rowCount();

    if ($var > 0) {
        header("Location:register.php?kayit=var");
    } else {

        $kullaniciekle = $baglanti->prepare("INSERT into uyeler SET 
            uye_mail=:uye_mail,
            uye_password=:uye_password,
            uye_adi_soyadi=:uye_adi_soyadi
        ");

        $insert = $kullaniciekle->execute(
            array(
                'uye_mail' => $mail,
                'uye_password' => $strongpass,
                'uye_adi_soyadi' => $adsoyad
            )
        );

        if ($insert) {
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                swal({
                    title: 'Başarılı!',
                    text: 'Kullanıcı başarıyla eklendi.',
                    icon: 'success',
                    button: 'Tamam'
                }).then(function() {
                    window.location = 'login.php';
                });
            });
            </script>";
        } else {
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                swal({
                    title: 'Hata!',
                    text: 'Kullanıcı Eklenirken bir hata oluştu.',
                    icon: 'error',
                    button: 'Tamam'
                }).then(function() {
                    window.location = 'register.php';
                });
            });
            </script>";
        }
    }
}
