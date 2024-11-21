<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
    $mail = htmlspecialchars($_POST['email']);
    $parola = htmlspecialchars($_POST['pass']);
    $telefon = htmlspecialchars($_POST['phone']);

    $adminsor = $baglanti->prepare('SELECT * from admin where admin_mail=:admin_mail');
    $adminsor->execute(array(
        'admin_mail' => $mail
    ));

    $var = $adminsor->rowCount();
    if ($var > 0) {
        header('Location:../admin_ekle.php?ekleme=basarisiz');
    } else {


        $adminekle = $baglanti->prepare("INSERT into admin SET
            admin_adi=:admin_adi,
            admin_soyad=:admin_soyad,
            admin_parola=:admin_parola,
            admin_tel=:admin_tel,
            admin_mail=:admin_mail,
            admin_yetki=:admin_yetki
        ");

        $insert = $adminekle->execute(
            array(
                'admin_adi' => $ad,
                'admin_soyad' => $soyad,
                'admin_parola' => $parola,
                'admin_tel' => $telefon,
                'admin_mail' => $mail,
                'admin_yetki' => 2
            )
        );
        if ($insert) {
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                swal({
                    title: 'Başarılı!',
                    text: 'Admin başarıyla eklendi.',
                    icon: 'success',
                    button: 'Tamam'
                }).then(function() {
                    window.location = '../admin_listele.php';
                });
            });
            </script>";
        } else {
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                swal({
                    title: 'Hata!',
                    text: 'Admin Eklenirken bir hata oluştu.',
                    icon: 'error',
                    button: 'Tamam'
                }).then(function() {
                    window.location = '../admin_listele.php';
                });
            });
            </script>";
        }

    }


}


// admin silmek:

if (isset($_GET['adminsil'])) {

    $adminsil = $baglanti->prepare("DELETE from admin where admin_id=:admin_id");
    $adminsil->execute(
        array(
            "admin_id" => $_GET['id']
        )
    );
    if ($adminsil) {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            swal({
                title: 'Başarılı!',
                text: 'Silme işlemi başarılı.',
                icon: 'success',
                button: 'Tamam'
            }).then(function() {
                window.location = '../admin_listele.php';
            });
        });
        </script>";
    } else {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                swal({
                    title: 'Hata!',
                    text: 'Silme işleminde bir hata oluştu.',
                    icon: 'error',
                    button: 'Tamam'
                }).then(function() {
                    window.location = '../admin_listele.php';
                });
            });
            </script>";
    }
}






//  SİPARİŞ İŞLEMLERİ -----------------------------------------

// siparis ekleme işlemi

if (isset($_POST['siparisekle'])) {
    $takipno = htmlspecialchars($_POST['no']);
    $adres = htmlspecialchars($_POST['adres']);
    $saat = htmlspecialchars($_POST['saat']);
    $tarih = htmlspecialchars($_POST['tarih']);
    $durum = htmlspecialchars($_POST['durum']);
    $adsoyad = htmlspecialchars($_POST['adisoyadi']);
    $telefon = htmlspecialchars($_POST['telefon']);
    $mail = htmlspecialchars($_POST['mail']);

    echo "Veritabanına gönderilen takip numarası: " . $takipno;

    $siparissor = $baglanti->prepare('SELECT *  from siparis where siparis_takip_no=:siparis_takip_no');
    $siparissor->execute(array(
        'siparis_takip_no' => $takipno
    ));

    $var = $siparissor->rowCount();
    if ($var > 0) {
        header("Location:../siparis_ekle.php");
        exit();
    } else {
        $siparisekle = $baglanti->prepare(
            "INSERT into siparis SET
                siparis_takip_no=:siparis_takip_no,
                siparis_adres=:siparis_adres,
                siparis_saat=:siparis_saat,
                siparis_durum=:siparis_durum,
                siparis_tarih=:siparis_tarih,
                alici_adi_soyadi=:alici_adi_soyadi,
                alici_tel=:alici_tel,
                alici_mail=:alici_mail
            "
        );


        try {
            $insert = $siparisekle->execute(array(
                'siparis_takip_no' => $takipno,
                'siparis_adres' => $adres,
                'siparis_saat' => $saat,
                'siparis_durum' => $durum,
                'siparis_tarih' => $tarih,
                'alici_adi_soyadi' => $adsoyad,
                'alici_tel' => $telefon,
                'alici_mail' => $mail
            ));

            if ($insert) {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    swal({
                        title: 'Başarılı!',
                        text: 'Sipariş başarıyla eklendi.',
                        icon: 'success',
                        button: 'Tamam'
                    }).then(function() {
                        window.location = '../siparis_ekle.php';
                    });
                });
                </script>";
            } else {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    swal({
                        title: 'Hata!',
                        text: 'Sipariş Eklenirken bir hata oluştu.',
                        icon: 'error',
                        button: 'Tamam'
                    }).then(function() {
                        window.location = '../siparis_ekle.php';
                    });
                });
                </script>";
            }
        } catch (PDOException $e) {
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                swal({
                    title: 'Veritabanı Hatası!',
                    text: '" . $e->getMessage() . "',
                    icon: 'error',
                    button: 'Tamam'
                }).then(function() {
                    window.location = '../siparis_ekle.php';
                });
            });
            </script>";
        }

    }

}