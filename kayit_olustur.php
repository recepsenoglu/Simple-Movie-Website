<?php
include 'baglan.php';
$kadi = $_POST['kullanici_kadi'];
$ad = $_POST['kullanici_adi'];
$mail = $_POST['kullanici_mail'];
$sifre = $_POST['kullanici_sifre'];

$sorgu = "INSERT INTO `kullanici` (`kullanici_id`, `kullanici_adi`, `kullanici_kadi`, `kullanici_sifre`, `kullanici_mail`, `kullanici_yetki`) VALUES (NULL, '$ad', '$kadi', '$sifre', '$mail', NULL);";
$db->exec($sorgu);
header("Location:index.php");


 ?>