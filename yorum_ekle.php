<?php if (!empty($_POST)) {
include 'baglan.php';
session_start();
$kullanici_id = $_SESSION['id']; //kullanıcı id
$film_id = $_GET['id'];// film id
$baslik = $_POST['yorum_baslik'];
$yorum = $_POST['yorum'];
$puan = $_POST['puan'];
$sorgu = "INSERT INTO `yorumlar` (`film_id`, `kullanici_id`, `yorum_baslik`, `yorum`, `yorum_puan`, `yorum_tarih`) VALUES 
('$film_id', '$kullanici_id', '$baslik', '$yorum', '$puan', CURRENT_TIMESTAMP)";
$db->exec($sorgu);
header("Location:film_detay.php?id=$film_id");
} ?>