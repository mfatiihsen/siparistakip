<?php
$title = "Yönetici Ekle";
ob_start();
?>




    <main>
        <div class="container-ekle mt-5">
            <h2 class="text-center mb-4">Admin Ekle</h2>
            <p class="info">Lütfen eklemek istediğiniz kişinin bilgilerini doğru giriniz</p>
            <form action="../../islem/islem.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label"></label>
                    <input required type="text" class="form-control" name="name" placeholder="İsim ">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label"></label>
                    <input required type="text" class="form-control" name="surname" placeholder="Soyad">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label"></label>
                    <input required type="email" class="form-control" name="email" placeholder="E-posta">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label"></label>
                    <input required type="password" class="form-control" name="pass" placeholder="Parola ">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label"></label>
                    <input required type="tel" class="form-control" name="phone" placeholder="Telefon">
                </div>
                <button required type="submit" class="ekle-btn" name="adminekle">EKLE</button>
            </form>
        </div>

    </main>




<?php
$content = ob_get_clean();
include('../../includes/_layout.php');
?>