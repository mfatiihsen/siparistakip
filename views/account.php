<?php
require_once '../config/database.php';
session_start();
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header("Location: ../views/login.php");
    exit;
}
?>
<?php
// Oturumdaki kullanıcı adını al
$username = $_SESSION['username'];

// Veritabanından kullanıcı bilgilerini çek
$query = "SELECT * FROM uyeler WHERE uye_mail = :uye_mail";
$stmt = $baglanti->prepare($query);
$stmt->bindParam(':uye_mail', $username, PDO::PARAM_STR);
$stmt->execute();

// Kullanıcıyı al
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Eğer kullanıcı bulunamazsa, hata mesajı göster
if (!$user) {
    echo "Kullanıcı bilgileri bulunamadı.";
    exit;
}

?>
<?php
$title = "Hesabım";
ob_start();
?>

<style>
    .account-container {
        max-width: 1000px;
        margin: 50px auto;
        padding: 20px;
        background-color: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .account-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .account-header h1 {
        font-size: 2.5rem;
        color: #333;
    }


    /* Kişisel Bilgiler Kartı */
    .account-info {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .info-card {
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 2px 12px rgba(0, 0, 0, 0.1);
        /* Dört tarafta gölgeleme */
        border-radius: 8px;
        transition: box-shadow 0.3s ease;
        /* Hover efekti için geçiş */
    }

    .info-card h2 {
        font-size: 1.5rem;
        color: #333;
        margin-bottom: 15px;
    }

    .info-card ul {
        list-style: none;
        padding: 0;
    }

    .info-card li {
        font-size: 1rem;
        color: #555;
        margin-bottom: 10px;
    }

    .info-card strong {
        color: #333;
    }

    /* İşlem Butonları */
    .actions {
        margin-top: 30px;
        text-align: center;
        justify-content: start;
        display: flex;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        margin: 10px;
        font-size: 1rem;
        border-radius: 5px;
        text-decoration: none;
        color: white;
        text-align: center;
        border-radius: 20px;
        transition: all 0.4s ease-in-out;
    }

    .edit-btn {
        background-color: #1775f1;
    }

    /* Hover Efektleri */
    .btn:hover {
        color: #1775f1;
        border:1px solid #1775f1;
        background-color: white;
    }

    .infoH{
        color: black;
        font-size: 18px;
    }

    /* Responsive Tasarım */
    @media (max-width: 768px) {
        .account-info {
            grid-template-columns: 1fr;
        }
    }
</style>


<div class="account-container">
    <div class="account-header">
        <p class="infoH">Hesabınıza ait bilgilere buradan ulaşabilirsiniz.</p>
    </div>

    <div class="account-info">
        <div class="info-card">
            <h2>Kişisel Bilgiler</h2>
            <ul>
                <li><strong>Ad-Soyad:</strong> <?php echo htmlspecialchars($user['uye_adi_soyadi']); ?></li>
                <li><strong>Email:</strong> <?php echo htmlspecialchars($user['uye_mail']); ?></li>
                <li><strong>Telefon:</strong> <?php echo htmlspecialchars($user['uye_tel']); ?></li>
            </ul>
        </div>

        <div class="info-card">
            <h2>Hesap Durumu</h2>
            <p><strong>Durum:</strong> <?php echo $user['account_status'] == 'active' ? 'Aktif' : 'Pasif'; ?></p>
            <p><strong>Kayıt Tarihi:</strong> <?php echo $user['uye_baslangict']; ?></p>
        </div>

        <div class="actions">
            <a href="../views/resetPass.php" class="btn edit-btn">Şifre Yenile</a>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include('../includes/_layout.php');
?>