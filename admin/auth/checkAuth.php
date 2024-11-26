
<?php
session_start();
if (!isset($_SESSION['girisbelgesi']) || $_SESSION['girisbelgesi'] !== true) {
    header("Location: ../loginpage/login.php");
    exit;
}

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");