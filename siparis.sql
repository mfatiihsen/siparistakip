-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 Kas 2024, 23:43:33
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `siparis`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_yetki` int(11) NOT NULL,
  `admin_ka` varchar(256) NOT NULL,
  `admin_adi` varchar(256) NOT NULL,
  `admin_soyad` varchar(256) NOT NULL,
  `admin_tel` varchar(256) NOT NULL,
  `admin_mail` varchar(256) NOT NULL,
  `admin_parola` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_yetki`, `admin_ka`, `admin_adi`, `admin_soyad`, `admin_tel`, `admin_mail`, `admin_parola`) VALUES
(1, 1, 'fatiihsen', 'Fatih', 'ŞEN', '05523378537', 'ademfatih37@gmail.com', '12'),
(3, 2, 'ademsen', 'Adem', 'ŞEN', '05375688800', 'ademsen37@gmail.com', '123456'),
(4, 2, 'admin', 'admin', 'admin', '000000000', 'admin@gmail.com', 'admin'),
(5, 2, '', 'Kürşat ', 'Abaylı', '05523378537', 'kursat@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `yazi` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `yazi`) VALUES
(1, '\"Basit ve kolay kullanılabilir panelimizle işlemlerinizi zahmetsizce yönetin.\" (Kolay kullanılabilirlik, müşteri memnuniyetini artırır.)'),
(2, '\"Sorularınız ve ihtiyaçlarınız için her zaman yanınızdayız.\" (Müşterilere güven veren bir destek sistemi olduğunu belirtmek önemlidir.)'),
(3, 'Takip:Siparişlerinizi anlık olarak takip edin ve güvenle teslim almanın keyfini çıkarın.\" (Hızlı ve şeffaf bir sistem sunduğunuzu vurgulayabilirsiniz.)');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

CREATE TABLE `siparis` (
  `siparis_id` int(11) NOT NULL,
  `siparis_takip_no` bigint(11) NOT NULL,
  `siparis_saat` varchar(256) NOT NULL,
  `siparis_tarih` varchar(256) NOT NULL,
  `siparis_adres` varchar(256) NOT NULL,
  `siparis_durum` varchar(256) NOT NULL,
  `alici_adi_soyadi` varchar(256) NOT NULL,
  `alici_tel` varchar(20) NOT NULL,
  `alici_mail` varchar(256) NOT NULL,
  `yolda_tarih` datetime DEFAULT NULL,
  `dagitim_tarih` datetime DEFAULT NULL,
  `teslim_tarih` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siparis`
--

INSERT INTO `siparis` (`siparis_id`, `siparis_takip_no`, `siparis_saat`, `siparis_tarih`, `siparis_adres`, `siparis_durum`, `alici_adi_soyadi`, `alici_tel`, `alici_mail`, `yolda_tarih`, `dagitim_tarih`, `teslim_tarih`) VALUES
(1, 25733331236, '16:59:43', '2024-11-23', 'Kocaeli Gebze', 'TESLİM EDİLDİ', 'Adem ŞEN', '05523378537', 'ademsen37@gmail.com', NULL, NULL, NULL),
(2, 17022029585, '21:51:58', '2024-11-23', 'Emek Mahalesi 62/6 sokak no:3 Daire:1 Kocaeli/Çayırova', 'TESLİM EDİLDİ', 'Fatih ŞEN', '05523378537', 'fatiihsen37@gmail.com', NULL, NULL, NULL),
(3, 92700345330, '21:52:57', '2024-11-23', 'Kocaeli/izmit', 'DAĞITIMDA', 'Mustafa ŞEN', '05523378537', 'mustafasenn.2009@gmail.com', NULL, NULL, NULL),
(5, 86638257192, '21:54:29', '2024-11-23', 'Kocaeli/Körfez', 'DAĞITIMDA', 'Emre ŞEN', '05523378537', 'esen04666@gmail.com', NULL, NULL, NULL),
(6, 89088346763, '23:01:47', '2024-11-24', 'deneme adres', 'TESLİM EDİLDİ', 'Deneme', 'güncellendi', 'deneme@gmail.com', NULL, NULL, NULL),
(7, 33833948363, '23:02:34', '2024-11-24', 'deneme2', 'TESLİM EDİLDİ', 'deneme2', '05523378537', 'deneme@gmail.com', NULL, NULL, NULL),
(8, 19854798906, '23:04:08', '2024-11-24', 'deneme4', 'TESLİM EDİLDİ', 'deneeme4', 'güncellendi', 'deneme', NULL, NULL, NULL),
(9, 36456193733, '23:04:47', '2024-11-24', 'Gebze Yenikent', 'TESLİM EDİLDİ', 'Rahmi ŞEN', '02626644', 'fatiihsen37@gmail.com', NULL, NULL, '2024-11-25 00:00:00'),
(10, 85143420248, '15:24:14', '2024-11-25', 'Kocaeli/Kandıra mahmutpaşa mahallesi', 'TESLİM EDİLDİ', 'Ahmet Göçek', '05523378537', 'ademfatih37@gmail.com', NULL, NULL, '2024-11-25 14:03:57'),
(11, 73070052600, '15:24:53', '2024-11-25', 'Ankara/Sincan', 'TESLİM EDİLDİ', 'Doğukan Bozkurt', '05523378537', 'fatiihsen37@gmail.com', NULL, '2024-11-25 14:03:30', '2024-11-25 14:04:23'),
(12, 12108030085, '16:09:02', '2024-11-25', 'Esen Mahallesi Pala Caddesi n:1 d:4 İzmir/torbalı', 'TESLİM ALINDI', 'Zeynep Tutar', '05523378537', 'ademfatih27@gmail.com', NULL, NULL, NULL),
(13, 47260396489, '16:10:11', '2024-11-25', 'emek mahallesi Kocaeli/Çayırova', 'YOLDA', 'Hulusi ŞEN', '05523378537', 'ademfatih37@gmail.com', '2024-11-25 14:11:52', NULL, NULL),
(14, 97613078270, '16:13:56', '2024-11-25', 'Hacı Halil Mahallesi 62/6 Sokak No:41', 'TESLİM ALINDI', 'Adem  ŞEN', '05523378537', 'ademfatih37@gmail.com', NULL, NULL, NULL),
(15, 87732008748, '16:14:40', '2024-11-25', 'iğdir mahallesi ıspanak sokak no:37 Kastamonu/araç', 'TESLİM ALINDI', 'Mustafa Minaz', '05523378537', 'ademfatih37@gmail.com', NULL, NULL, NULL),
(16, 15230638662, '16:48:25', '2024-11-25', 'uzunlar caddesi 62/6 sokak no:3 daire:24 Tekirdağ/Çorlu', 'TESLİM ALINDI', 'Tekin Çakar', '05523378537', 'tekincakar@gmail.com', NULL, NULL, NULL),
(17, 10855492030, '16:49:45', '2024-11-25', 'Bahçelievler, İnönü Cd. No:23/B, 27220 Şahinbey/Gaziantep', 'TESLİM ALINDI', 'Samet ELMACI', '0552 338 9832', 'sametelmaci@gmail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `uye_id` int(11) NOT NULL,
  `uye_adi_soyadi` varchar(256) NOT NULL,
  `uye_mail` varchar(256) NOT NULL,
  `uye_password` varchar(256) NOT NULL,
  `uye_tel` varchar(20) NOT NULL,
  `account_status` varchar(50) NOT NULL,
  `uye_baslangict` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`uye_id`, `uye_adi_soyadi`, `uye_mail`, `uye_password`, `uye_tel`, `account_status`, `uye_baslangict`) VALUES
(1, 'Fatih ŞEN', 'ademfatih37@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '05523378537', 'active', '2024-11-29 00:12:32'),
(2, 'Fatih ŞEN', 'fatiihsen37@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '05523378537', 'active', '2024-11-29 00:12:32'),
(3, 'Adem ŞEN', 'ademsen37@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '05523378537', 'active', '2024-11-29 00:12:32'),
(4, 'Yasemin ŞEN', 'yaseminsen@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '05523378537', 'active', '2024-11-29 00:12:32'),
(5, 'Emre ŞEN', 'emresen@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '05523378537', 'active', '2024-11-29 00:12:32'),
(6, 'mustafa şen', 'mustafacakir@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '05523378537', 'active', '2024-11-29 00:12:32'),
(7, 'Rahmi ŞEN', 'rahmisen@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '05523378537', 'active', '2024-11-29 00:12:32'),
(8, 'Muhammed ŞEN', 'fatiih37@gmail.com', '202cb962ac59075b964b07152d234b70', '', '', '2024-11-29 00:51:05');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`siparis_id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`uye_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `siparis`
--
ALTER TABLE `siparis`
  MODIFY `siparis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `uye_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
