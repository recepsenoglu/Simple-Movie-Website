-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 10 Tem 2020, 16:54:27
-- Sunucu sürümü: 5.7.11
-- PHP Sürümü: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `disenchantment`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `filmler`
--

CREATE TABLE `filmler` (
  `film_id` int(11) NOT NULL,
  `film_link` text COLLATE utf16_turkish_ci NOT NULL,
  `film_ad` varchar(50) COLLATE utf16_turkish_ci NOT NULL,
  `film_tur` varchar(30) COLLATE utf16_turkish_ci NOT NULL,
  `film_konu` text COLLATE utf16_turkish_ci NOT NULL,
  `film_kapak` text COLLATE utf16_turkish_ci NOT NULL,
  `film_puan` int(11) NOT NULL,
  `film_yonetmen` varchar(70) COLLATE utf16_turkish_ci NOT NULL,
  `film_sure` varchar(40) COLLATE utf16_turkish_ci NOT NULL,
  `film_cikis` text COLLATE utf16_turkish_ci NOT NULL,
  `film_tavsiye` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_turkish_ci;

--
-- Tablo döküm verisi `filmler`
--

INSERT INTO `filmler` (`film_id`, `film_link`, `film_ad`, `film_tur`, `film_konu`, `film_kapak`, `film_puan`, `film_yonetmen`, `film_sure`, `film_cikis`, `film_tavsiye`) VALUES
(13, 'https://www.youtube.com/watch?v=xKciOQYqEdo', 'Av Mevsimi', 'Gizem', 'Yavuz Turgul Bilmem ne', 'images/uploads/indir.jpg', 8, 'Yavuz Turgul', '2 Saat 12 Dakika', ' 3 Aralık 2010', 1),
(14, 'https://www.youtube.com/watch?v=U_KrB31T84g', 'Yahşi Batı', 'Komedi', 'Yahşi Batı, Ömer Faruk Sorakın yönetmenliğini, Cem Yılmazın ise senaristliğini ve başrolünü üstlendiği 2009 yılı yapımı bir Türk komedi western filmidir. Filmde Cem Yılmaz 1881 yılında ABD başkanına Padişahın hediyesini vermek üzere gönderilen Teşkilatı Mahsusa üyesi ajan Aziz Vefayı canlandırmıştır.', 'images/uploads/yahsi.jpg', 7, 'Ömer Faruk Sorak', '1 Saat 52 Dakika', '1 Ocak 2010', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_adi` varchar(30) COLLATE utf16_turkish_ci NOT NULL,
  `kullanici_kadi` varchar(30) COLLATE utf16_turkish_ci NOT NULL,
  `kullanici_sifre` varchar(40) COLLATE utf16_turkish_ci NOT NULL,
  `kullanici_mail` varchar(40) COLLATE utf16_turkish_ci NOT NULL,
  `kullanici_yetki` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_adi`, `kullanici_kadi`, `kullanici_sifre`, `kullanici_mail`, `kullanici_yetki`) VALUES
(1, 'kaan karaca', 'kaan', '12345', 'kaan@gmail.com', 1),
(2, 'recep', 'rec', '12345', 'rec@gmail.com', NULL),
(3, 'Ömer Osman', 'tossun', '12345', 'ömer@gmail.com', NULL),
(4, 'Recep Oğuzhan Şenoğlu', 'disenchantment', '12345', 'userlitte1@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `liste`
--

CREATE TABLE `liste` (
  `liste_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `yorum_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `yorum_baslik` varchar(40) COLLATE utf16_turkish_ci NOT NULL,
  `yorum` text COLLATE utf16_turkish_ci NOT NULL,
  `yorum_puan` int(11) NOT NULL,
  `yorum_tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `filmler`
--
ALTER TABLE `filmler`
  ADD PRIMARY KEY (`film_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `liste`
--
ALTER TABLE `liste`
  ADD PRIMARY KEY (`liste_id`),
  ADD KEY `kullanici_id` (`kullanici_id`),
  ADD KEY `film_id` (`film_id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`yorum_id`),
  ADD KEY `film_id` (`film_id`),
  ADD KEY `kullanici_id` (`kullanici_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `filmler`
--
ALTER TABLE `filmler`
  MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `liste`
--
ALTER TABLE `liste`
  MODIFY `liste_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `liste`
--
ALTER TABLE `liste`
  ADD CONSTRAINT `liste_ibfk_1` FOREIGN KEY (`kullanici_id`) REFERENCES `kullanici` (`kullanici_id`),
  ADD CONSTRAINT `liste_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `filmler` (`film_id`);

--
-- Tablo kısıtlamaları `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD CONSTRAINT `yorumlar_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `filmler` (`film_id`),
  ADD CONSTRAINT `yorumlar_ibfk_2` FOREIGN KEY (`kullanici_id`) REFERENCES `kullanici` (`kullanici_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
