<style type="text/css">
	.cikis{ width: 960px;
	height: 350px; margin:0 auto; 
margin-top: 175px;}
</style>
<?php 
ob_start();
include 'Ust.php';
?>

<div class="cikis">
	<center><strong><h3>Çıkış Yaptınız. Ana Sayfaya Yönlendiriliyorsunuz...</h3></strong></center>
</div>

<?php
session_start();
session_destroy();
header("Refresh: 2; url=index.php"); 
include 'Alt.php'; ?>
