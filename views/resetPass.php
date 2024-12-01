<?php
$title = "Şifre Değiştir";
ob_start();
?>



<style>
    .container-reset {
        background-color: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
        /* Form genişliği belirli bir boyuta sabitlendi */
        margin: 0 auto;
        /* Yatayda ortalamak için */
        box-sizing: border-box;
    }

    .container-reset h3 {
        text-align: center;
        margin-bottom: 40px;
        color: #333;
    }

    /* Form elemanları */
    label {
        display: block;
        font-size: 14px;
        margin: 10px 0 5px;
        color: #333;
    }

    input {
        width: 100%;
        padding: 15px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 20px;
        font-size: 16px;
        outline: none;
        transition: border-color 0.3s;
        box-sizing: border-box;
    }

    input:focus {
        border-color: #1775f1;
    }

    /* Buton */
    .resetBtn {
        margin-top: 20px;
        width: 100%;
        padding: 12px;
        background-color: #1775f1;
        color: white;
        border: none;
        border-radius: 20px;
        font-size: 16px;
        cursor: pointer;
        transition: color 0.3s ease-in;
    }

    .resetBtn:hover {
        background-color: white;
        color: #1775f1;
        border: 2px solid #1775f1;
    }

    .resetBtn:active {
        background-color: #388e3c;
    }

    /* Responsive Design: Tablet ve altı ekranlar için */
    @media (max-width: 768px) {
        .container-reset {
            padding: 20px;
            /* Padding değerini biraz küçültüyoruz */
        }

        .container-reset h3 {
            font-size: 22px;
            /* Başlık boyutunu küçültüyoruz */
            margin-bottom: 30px;
        }

        input,
        .resetBtn {
            padding: 12px;
            /* Input ve butonları daha uyumlu hale getiriyoruz */
            font-size: 14px;
        }
    }

    /* Responsive Design: Mobil ekranlar için */
    @media (max-width: 480px) {
        .container-reset {
            padding: 15px;
            /* Mobil ekranlar için padding daha da küçültülür */
        }

        .container-reset h3 {
            font-size: 20px;
            /* Başlık boyutunu küçültüyoruz */
            margin-bottom: 20px;
        }

        input,
        .resetBtn {
            padding: 10px;
            /* Daha küçük ekranlar için input ve buton boyutları küçültülür */
            font-size: 12px;
        }
    }

</style>

<main>
    <div class="container-reset">
        <h3>Şifre Değiştir</h3>
        <form action="islem.php" method="POST">
            <label for="oldpass"></label>
            <input type="mail" id="oldpass" name="email" required minlength="1" placeholder="Mail Adresinizi girin">
            <label for="oldpass"></label>
            <input type="password" id="oldpass" name="oldpass" required minlength="1" placeholder="Eski şifrenizi girin">
            <label for="newpass"></label>
            <input type="password" id="newpass" name="newpass" required minlength="1" placeholder="Yeni şifrenizi girin">

            <label for="confirmpass"></label>
            <input type="password" id="confirmpass" name="confirmpass" required minlength="1" placeholder="Yeni şifrenizi tekrar girin">

            <button class="resetBtn" type="submit" name="resetPass">Değiştir</button>
        </form>
    </div>
</main>







<?php
$content = ob_get_clean();
include('../includes/_layout.php');
?>