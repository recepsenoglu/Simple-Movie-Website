<?php 
include 'baglan.php';
session_start();
ob_start();
$kullanici_kadi=$_POST['kullanici_kadi'];
$kullanici_sifre = $_POST['kullanici_sifre'];

if (!$kullanici_kadi || !$kullanici_sifre) {
	$Durum ="bosalan";
}
else{
$cek = $db->query("SELECT * from kullanici where kullanici_kadi = '$kullanici_kadi' && kullanici_sifre = '$kullanici_sifre'" ,PDO::FETCH_ASSOC);



if($cek->rowCount()){
$sorgu = "SELECT * FROM kullanici WHERE kullanici_kadi='$kullanici_kadi'&& kullanici_sifre='$kullanici_sifre' "; //böyle bir kullanıcı var mı diye
$getir=$db->prepare($sorgu);
$getir->execute();
$lislete=$getir->fetch();
$id=$lislete['kullanici_id'];
$_SESSION["id"]=$id;//oturum başlatıldı
header("Location:index.php?id=$id");

	}
		else
		{
			$Durum="yanlis";
		header("Location:giris.php?durum=$Durum");
			
		}
}



 ?>