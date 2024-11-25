<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php

session_start();
require_once 'baglanti.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';



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
        $_SESSION['girisbelgesi'] = $kadi;
        header('Location:../pages/home/index.php');
    } else {
        header('Location:pages/loginpage/login.php?giris=basarisiz');
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
        header("Location:../pages/orders/siparis_ekle.php");
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
                //sendEmail($mail, $adsoyad, $takipno);
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    swal({
                        title: 'Başarılı!',
                        text: 'Sipariş başarıyla eklendi.',
                        icon: 'success',
                        button: 'Tamam'
                    }).then(function() {
                        window.location = '../pages/orders/siparis_ekle.php';
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
                        window.location = '../pages/orders/siparis_ekle.php';
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
                    window.location = '../pages/orders/siparis_ekle.php';
                });
            });
            </script>";
        }
    }
}

// Sipariş eklendiğinde mail gönderme işlemi
function sendEmail($email, $adsoyad, $siparisno)
{
    // Parametrelerin doğruluğunu kontrol et
    if (!$email) {
        return "Lütfen email adresini kontrol edin";
    } elseif (!$siparisno) {
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
        $mail->Password = 'domr knrq vxch avsz';  // Burada uygulama şifresi kullanmalısınız
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        //$mail->charSet = 'UTF-8';
        $mail->setLanguage('tr');

        // Gönderen adresi ve yanıt adresi
        $mail->setFrom('ademfatih37@gmail.com', 'Siparis Takip Sistemi');
        $mail->addAddress($email);
        $mail->addReplyTo('ademfatih37@gmail.com', 'Fatih ŞEN');

        // Mail içeriği
        $mail->isHTML(true);
        $mail->Subject = 'Sipariş Takip Sistemi';
        $mail->Body = 'Merhaba ' . $adsoyad . '! Siparişiniz şubemiz tarafından teslim alınmıştır.<br> Aşağıdaki takip numarası ile internet sitemizden siparişinizi takip edebilirsiniz. İyi Günler dileriz. <br>' . 'Takip Numaranız:' . $siparisno;

        // E-posta gönderme
        $mail->send();
        return "Mail Başarıyla gönderildi";
    } catch (Exception $e) {
        return "Mail gönderilemedi. Hata: {$mail->ErrorInfo}";
    }
}


// sipariş güncelleme işlemi için yazılmıştır

if (isset($_POST['sipariguncelle'])) {
    $siparisid = $_POST['id'];
    $yeniDurum = $_POST['yeni_durum'];
    $now = date('Y-m-d H:i:s');

    $durumAlanlari = [
        'YOLDA' => 'yolda_tarih',
        'DAĞITIMDA' => 'dagitim_tarih',
        'TESLİM EDİLDİ' => 'teslim_tarih',
    ];

    $alan = isset($durumAlanlari[$yeniDurum]) ? $durumAlanlari[$yeniDurum] : null;

    if ($alan) {
        $duzenle = $baglanti->prepare("UPDATE siparis SET 
            siparis_adres=:siparis_adres,
            siparis_durum=:siparis_durum,
            alici_adi_soyadi=:alici_adi_soyadi,
            alici_tel=:alici_tel,
            alici_mail=:alici_mail,
            $alan=:durum_tarih
            WHERE siparis_id=:siparis_id");

        $update = $duzenle->execute([
            'siparis_adres' => $_POST['adres'],
            'siparis_durum' => $yeniDurum,
            'alici_adi_soyadi' => $_POST['adisoyadi'],
            'alici_tel' => $_POST['telefon'],
            'alici_mail' => $_POST['mail'],
            'durum_tarih' => $now,
            'siparis_id' => $siparisid,
        ]);
    } else {
        // Eğer durum geçerli değilse sadece diğer bilgileri güncelle
        $duzenle = $baglanti->prepare("UPDATE siparis SET 
            siparis_adres=:siparis_adres,
            siparis_durum=:siparis_durum,
            alici_adi_soyadi=:alici_adi_soyadi,
            alici_tel=:alici_tel,
            alici_mail=:alici_mail
            WHERE siparis_id=:siparis_id");

        $update = $duzenle->execute([
            'siparis_adres' => $_POST['adres'],
            'siparis_durum' => $yeniDurum,
            'alici_adi_soyadi' => $_POST['adisoyadi'],
            'alici_tel' => $_POST['telefon'],
            'alici_mail' => $_POST['mail'],
            'siparis_id' => $siparisid,
        ]);
    }

    if ($update) {
        header("Location:../pages/orders/devam_eden_siparis.php");
    } else {
        header("Location:../pages/orders/order_update.php");
    }
}



// Sipariş Arama İçin yazılmıştır

if (isset($_POST['search'])) {
    $aramaTermi = $_GET['arama'];  // Kullanıcıdan gelen arama terimi

    // Arama işlemi
    // Burada basit bir dizide arama yapalım.
    $sql = "SELECT * FROM siparisler WHERE siparis_takip_no LIKE ?";
    $stmt = $conn->prepare($sql);
    $siparisTakipNoLike = "%" . $siparisTakipNo . "%";  // LIKE operatörü kullanarak arama yapılır
    $stmt->bind_param("s", $siparisTakipNoLike);
    $stmt->execute();
    $result = $stmt->get_result();

    // Sonuçları tablo halinde gösterme
    if ($result->num_rows > 0) {
        echo "<h3>Arama Sonuçları:</h3>";
        echo "<table>";
        echo "<tr><th>Sipariş Takip No</th><th>Müşteri Adı</th><th>Ürün</th><th>Tarih</th><th>Durum</th></tr>";

        // Her bir sonucu tabloya yazma
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['siparis_takip_no']) . "</td>";
            echo "<td>" . htmlspecialchars($row['musteri_adi']) . "</td>";
            echo "<td>" . htmlspecialchars($row['siparis_tarihi']) . "</td>";
            echo "<td>" . htmlspecialchars($row['siparis_durumu']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Aradığınız sipariş bulunamadı.</p>";
    }

    $stmt->close();
}
