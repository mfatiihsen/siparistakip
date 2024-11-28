<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../admin/PHPMailer/src/Exception.php';
require '../admin/PHPMailer/src/PHPMailer.php';
require '../admin/PHPMailer/src/SMTP.php';


require_once '../config/database.php';

// Giriş Yapmak için yazılan kod bloğu
session_start();
if (isset($_POST['girisButton'])) {

    $mail = htmlspecialchars($_POST['mail']);
    $password = htmlspecialchars($_POST['pass']);
    $strongpass = md5($password);

    $admin_id;


    $kullanicisor = $baglanti->prepare("SELECT * FROM  uyeler  where uye_mail=:uye_mail and uye_password=:uye_password");
    $kullanicisor->execute(
        array(
            'uye_mail' => $mail,
            'uye_password' => $strongpass
        )
    );

    $var = $kullanicisor->rowCount();
    if ($var > 0) {
        $_SESSION['user_logged_in'] = true;
        $_SESSION['username'] = $mail;
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
                    text: 'Kayıt Olma işlemi Başarılı.',
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
                    text: 'Kayıt Oluşturulurken bir hata oluştu.',
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




// Üye Parola değiştirme işlemi
if (isset($_POST['resetPass'])) {
    if (isset($_SESSION['user_email'])) {
        echo "Lütfen giriş yapın!";
        exit;
    }

    $oldpass = trim($_POST['oldpass']);  // Eski şifreyi temizle
    $newpass = trim($_POST['newpass']);  // Yeni şifreyi temizle
    $confirmpass = trim($_POST['confirmpass']);  // Onay şifresini temizle
    $mail = trim($_POST['email']);  // Onay şifresini temizle

    // Eski şifreyi kontrol et (veritabanında kaydedilen şifre ile)
    $query = $baglanti->prepare("SELECT uye_password FROM uyeler WHERE uye_mail = :uye_mail");
    $query->execute(['uye_mail' => $mail]);
    $result = $query->fetch();


    // Eski şifreyi doğrula
    if (md5($oldpass) !== $result['uye_password']) {
        echo "Eski şifre yanlış!";
        exit;
    }


    // Yeni şifreyi ve onay şifresini kontrol et
    if ($newpass !== $confirmpass) {
        echo "Yeni şifreler uyuşmuyor!";
        exit;
    }

    $newpass_hash = md5($newpass); // Yeni şifreyi MD5 ile şifrele

    $updateQuery = $baglanti->prepare("UPDATE uyeler SET uye_password = :newpass WHERE uye_mail = :uye_mail");
    $updateQuery->execute([
        'newpass' => $newpass_hash,  // :newpass parametresine karşılık gelir
        'uye_mail' => $mail      // :email parametresine karşılık gelir
    ]);

    if ($updateQuery) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                swal({
                    title: 'Başarılı!',
                    text: 'Şifre Değiştirme İşlemi Başarılı!',
                    icon: 'success',
                    button: 'Tamam'
                }).then(function() {
                    window.location = 'account.php';
                });
            });
            </script>";
    } else {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            swal({
                title: 'Hata!',
                text: 'Şifre değiştirilirken  bir hata oluştu!',
                icon: 'error',
                button: 'Tamam'
            }).then(function() {
                window.location = 'resetPass.php';
            });
        });
        </script>";
    }
}









/*

// iletişim sayfasından mail gönderme işlemi

if (isset($_POST['mailGonder'])) {

    $nameI = $_POST['name'];
    $mailI = $_POST['email'];
    $messageI = $_POST['message'];


    sendEmail($mailI, $nameI, $messageI);
}



// Sipariş eklendiğinde mail gönderme işlemi
function sendEmail($email, $adsoyad, $message)
{
    // Parametrelerin doğruluğunu kontrol et
    if (!$email) {
        return "Lütfen email adresini kontrol edin";
    } elseif (!$message) {
        return "Lütfen numara içeriği yazınız";
    } elseif (!$adsoyad) {
        return "Lütfen ad soyad içeriği yazınız";
    }

    $mail = new PHPMailer(true);

    try {
        // SMTP ayarları
        $mail->SMTPDebug = 1; // Verbose debug output
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ademfatih37@gmail.com';
        $mail->Password = 'domr knrq vxch avsz'; // Burada uygulama şifresi kullanmalısınız
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        //$mail->charSet = 'UTF-8';
        $mail->setLanguage('tr');

        // Gönderen adresi ve yanıt adresi
        $mail->setFrom('ademfatih37@gmail.com', 'Siparis Takip Sistemi');
        $mail->addAddress($email);
        $mail->addReplyTo("ademfatih37@gmail.com", 'Fatih ŞEN');

        // Mail içeriği
        $mail->isHTML(true);
        $mail->Subject = 'Sipariş Takip Sistemi';
        $mail->Body = "Bilgileri : <br>" . $adsoyad."<br>". $email."<br>"."Mesajı".$message;

        // E-posta gönderme
        $mail->send();
        return "Mail Başarıyla gönderildi";
    } catch (Exception $e) {
        return "Mail gönderilemedi. Hata: {$mail->ErrorInfo}";
    }
}

*/