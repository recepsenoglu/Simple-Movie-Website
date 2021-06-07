<?php if (!empty($_POST)) {
include 'baglan.php';
$film_adi = $_POST['film_adi'];
$film_link = $_POST['film_link'];
$film_tur = $_POST['film_tur'];
$film_kapak = $_POST['film_kapak'];
$film_cikis = $_POST['film_cikis'];
$film_yonetmen = $_POST['film_yonetmen'];
$film_sure = $_POST['film_sure'];
$film_tavsiye = $_POST['film_tavsiye'];
$film_konu = $_POST['film_konu'];
$film_puan = $_POST['film_puan'];
$sorgu = "INSERT INTO `filmler` (`film_link`, `film_ad`, `film_tur`, `film_konu`, `film_kapak`, `film_puan`, `film_yonetmen`, `film_sure`, `film_cikis`, `film_tavsiye`) VALUES ('$film_link', '$film_adi', '$film_tur', '$film_konu', '$film_kapak', '$film_puan', '$film_yonetmen', '$film_sure', '$film_cikis', '$film_tavsiye')";
$db->exec($sorgu);
}
header("Location:filmler.php");
 ?>