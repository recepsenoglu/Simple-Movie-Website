<?php 
include 'baglan.php';
session_start();
$film_id = $_GET['id'];
$kullanici_id = $_SESSION['id'];
$sorgu = "INSERT INTO `liste` (`kullanici_id`, `film_id`) VALUES ('$kullanici_id', '$film_id')";
$db->exec($sorgu);
header("Location:favorilerim.php");

 ?>