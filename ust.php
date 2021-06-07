<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="tr" class="no-js">
<?php session_start();
include 'baglan.php';
if (!empty($_SESSION['id'])) {
	$sorgu = "SELECT * FROM kullanici WHERE kullanici_id=".$_SESSION['id'];
$getir = $db->prepare($sorgu);
$getir->execute();
$listele = $getir->fetch(); 
}
?>

<head>
	<!-- Basic need -->
	<title>Disenchantment</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="profile" href="#">

	<!--Google Font-->
	<link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">

	<!-- CSS files -->
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<!--preloading-->
	<div id="preloader">
		<img class="logo" src="images/logo1.png" alt="" width="119" height="58">
		<div id="status">
			<span></span>
			<span></span>
		</div>
	</div>
	<!--end of preloading-->
	<!--login form popup-->
	<div class="login-wrapper" id="login-content">
		<div class="login-content">
			<a href="#" class="close">x</a>
			<h3>Giriş yap</h3>
			<form method="post" action="giris_yap.php">
				<div class="row">
					<label for="username">
						Kullanıcı adı:
						<input type="text" name="kullanici_kadi" id="username" placeholder="Hugh Jackman" required="required" />
					</label>
				</div>

				<div class="row">
					<label for="password">
						Şifre:
						<input type="password" name="kullanici_sifre" id="password" placeholder="******" required="required" />
					</label>
				</div>
				<div class="row">
					<div class="remember">
						<div>
							<input type="checkbox" name="remember" value="Remember me"><span>Beni hatırla</span>
						</div>
						<a href="#">Şifremi unuttum</a>
					</div>
				</div>
				<div class="row">
					<button type="submit">Giriş yap</button>
				</div>
			</form>
			<div class="row">
				<p>Or via social</p>
				<div class="social-btn-2">
					<a class="fb" href="#"><i class="ion-social-facebook"></i>Facebook</a>
					<a class="tw" href="#"><i class="ion-social-twitter"></i>twitter</a>
				</div>
			</div>
		</div>
	</div>
	<!--end of login form popup-->
	<!--signup form popup-->
	<div class="login-wrapper"  id="signup-content">
		<div class="login-content">
			<a href="#" class="close">x</a>
			<h3>Kayıt ol</h3>
			<form method="post" action="kayit_olustur.php">
				<div class="row">
					<label for="username-2">
						Adınız :
						<input type="text" name="kullanici_adi" id="username-2" placeholder="Hugh Jackman" required="required" />
					</label>
				</div>
				<div class="row">
					<label for="email-2">
						Kullanıcı Adı :
						<input type="text" name="kullanici_kadi" id="username-2" placeholder="EsrarlıGözler"  required="required" />
					</label>
				</div>
				<div class="row">
					<label for="email-2">
						email adresi:
						<input type="text" name="kullanici_mail" id="email-2" placeholder="ornek@gmail.com"  required="required" />
					</label>
				</div>
				<div class="row">
					<label for="password-2">
						Şifre:
						<input type="password" name="kullanici_sifre" id="password-2" placeholder="" required="required" />
					</label>
				</div>
				<div class="row">
					<button type="submit">Kayıt ol</button>
				</div>
			</form>
		</div>
	</div>
	<!--end of signup form popup-->

	<!-- BEGIN | Header -->
	<header class="ht-header">
		<div class="container">
			<nav class="navbar navbar-default navbar-custom">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header logo">
					<div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<div id="nav-icon1">
							<span></span>
							<span></span>
							<span></span>
						</div>
					</div>
					<a href="index.php"><img class="logo" src="images/logo1.png" alt="" width="119" height="58"></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav flex-child-menu menu-left">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						<li class="dropdown first">
							<a href="index.php" class="btn btn-default dropdown-toggle lv1">
								Anasayfa
							</a>
						</li>
						<li class="dropdown first">
							<a href="filmler.php" class="btn btn-default dropdown-toggle lv1">
								Filmler
							</a>
						</li>
					</ul>
					<?php if (!empty($_SESSION["id"])) { ?>
						
						<ul class="nav navbar-nav flex-child-menu menu-right">
							<?php if ($listele['kullanici_yetki'] == 1) {?>
							<li ><a href="yonet.php">Yönetim Paneli</a></li>
								
							<?php } ?>
							<li ><a href="listem.php">Listem</a></li>
							<li ><a href="cikis.php">Çıkış Yap</a></li>
						</ul>

					<?php }
					else  { ?>
						<ul class="nav navbar-nav flex-child-menu menu-right">
							<li class="loginLink"><a href="#">Giriş Yap</a></li>
							<li class="btn signupLink"><a href="#">Kayıt Ol</a></li>
						</ul>
					<?php } ?>
				</div>
				<!-- /.navbar-collapse -->
			</nav>

			<!-- top search form -->
				<form action="filmler.php" method="get">

			<div class="top-search">
				<select>
					<option value="united">TV show</option>
					<option value="saab">Others</option>
				</select>
				<input type="text" name="ara" placeholder="Film Ara">
				<input type="submit" style="height: 0px; width: 0px; border: none; padding: 0px;" hidefocus="true" />
			</div>
				</form>

		</div>

	</header>