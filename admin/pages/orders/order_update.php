<?php
require_once '../../islem/baglanti.php';

$siparis = $baglanti->prepare("SELECT * FROM siparis where siparis_id=:siparis_id");
$siparis->execute(
    array(
        'siparis_id' => $_GET['id']
    )
);
$sipariscek = $siparis->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Sipariş Düzenle</title>
    <link rel="stylesheet" href="../../assets/css/style.css">


    <style>
        .container {
            padding: 50px;
            background-color: white;
            border-radius: 20px;
        }


        .form-control {
            padding: 30px;
            border-radius: 15px;
        }

        .btn {
            background-color: #1775f1;
            border-radius: 25px;
            width: 100px;
        }

        .btn:hover {
            background-color: white;
            color: #1775f1;
            border: 1px solid #1775f1
        }
    </style>
</head>

<body>


    <?php require_once '../../includes/_sidebar.php' ?>

    <section id="content">


        <?php require_once '../../includes/_navbar.php' ?>

        <main>
            <div class="container">
                <form action="../../islem/islem.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"></label>
                        <input readonly name="no" type="number" class="form-control" id="takipno">
                        <div id="emailHelp" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"></label>
                        <input value="<?php echo $sipariscek['siparis_adres'] ?>" name="adres" placeholder="Sipariş Adresi:" type="text" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"></label>
                        <input readonly name="saat" placeholder="Sipariş Saati:" type="text" class="form-control"
                            id="saat" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"></label>
                        <input readonly name="tarih" placeholder="Sipariş Tarihi:" type="text" class="form-control"
                            id="tarih" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text"></div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $sipariscek['siparis_id'] ?>">


                    <div class="form-floating pb-4">
                        <select required name="yeni_durum" class="form-select" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected style="font-weight: 400;">Yeni Sipariş Durumu:</option>
                            <option value="YOLDA" <?php if ($sipariscek['siparis_durum'] == '  YOLDA') echo 'selected'; ?>>Yolda</option>
                            <option value="DAĞITIMDA" <?php if ($sipariscek['siparis_durum'] == 'DAĞITIMDA') echo 'selected'; ?>>Dağıtımda</option>
                            <option value="TESLİM EDİLDİ" <?php if ($sipariscek['siparis_durum'] == 'TESLİM EDİLDİ') echo 'selected'; ?>>Teslim Edildi</option>
                        </select>
                        <label for="floatingSelect"></label>
                    </div>



                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"></label>
                        <input value="<?php echo $sipariscek['alici_adi_soyadi'] ?>" required name="adisoyadi" placeholder="Alıcı Adı ve Soyadı:" type="text"
                            class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"></label>
                        <input value="<?php echo $sipariscek['alici_tel'] ?>" required name="telefon" placeholder="Alıcı Telefon Numarası:" type="text"
                            class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"></label>
                        <input value="<?php echo $sipariscek['alici_mail'] ?>" required name="mail" placeholder="Alıcı Mail:" type="text" class="form-control"
                            id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">BİLGİLERİN DOĞRU OLDUĞUNA EMİNİM</label>
                    </div>

                    <button type="submit" class="btn btn-primary" name="siparisguncelle" id="submitBtn">Güncelle</button>
                </form>
            </div>

        </main>

    </section>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


<script>
    let currentDate = new Date();

    // saati bilgilerini alıyoruz
    let hours = currentDate.getHours();
    let minutes = currentDate.getMinutes();
    let seconds = currentDate.getSeconds();
    hours = hours < 10 ? '0' + hours : hours;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;
    let timeString = `${hours}:${minutes}:${seconds}`;
    document.getElementById('saat').value = timeString;

    // Tarih bilgilerini al
    let year = currentDate.getFullYear();
    let month = currentDate.getMonth() + 1;
    let day = currentDate.getDate();
    let dateString = `${year}-${month < 10 ? '0' + month : month}-${day < 10 ? '0' + day : day}`;
    document.getElementById('tarih').value = dateString;

    // rastgele takip numarası oluşturuyoruz.
    document.addEventListener('DOMContentLoaded', function() {
        let randomNumber = Math.floor(10000000000 + Math.random() * 90000000000);
        console.log("Rastgele takip numarası: " + randomNumber);
        document.getElementById('takipno').value = randomNumber;

        // Formun submit olayına müdahale et
        document.querySelector('form').addEventListener('submit', function(event) {
            let takipNo = document.getElementById('takipno').value;
            console.log("Formdaki takip numarası: " + takipNo);
            if (!takipNo) {
                document.getElementById('takipno').value = randomNumber;
                console.log("Takip numarası ekleniyor: " + randomNumber);
            }
        });
    });


    /*
    // check box kontrolü
    document.getElementById("submitBtn").addEventListener("click", function(event) {
        let checkbox = document.getElementById("exampleCheck1");

        if (!checkbox.checked) {
            event.preventDefault();
            swal({
                title: 'Hata!',
                text: 'Lütfen bilgilerin doğru olduğundan emin olun!',
                icon: 'error',
                button: 'Tamam'
            }).then(function() {
                window.location = 'siparis_ekle.php';
            });
        }
    });
    */
</script>

</html>