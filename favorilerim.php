<?php include 'ust.php'; 
$sorgu = "SELECT * FROM `liste` JOIN kullanici ON liste.kullanici_id = kullanici.kullanici_id JOIN filmler ON liste.film_id = filmler.film_id WHERE kullanici.kullanici_id =".$_SESSION['id'];
$getir = $db->prepare($sorgu);
$getir->execute();
$sorgu2 = "SELECT * FROM `kullanici` WHERE kullanici_id =".$_SESSION['id'];;
$getir2 = $db->prepare($sorgu2);
$getir2->execute();
$listele2 = $getir2->fetch();
?>

<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1><?php echo $listele2['kullanici_adi']." profili"; ?></h1>
					<ul class="breadcumb">
						<li class="active"><a href="index.php">Anasayfa</a></li>
						<li> <span class="ion-ios-arrow-right"></span>Favorilerim</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single userfav_list">
	<div class="container">
		<div class="row ipad-width2">
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="user-information">
					<div class="user-img">
						<a href="#"><img src="images/uploads/user-img.png" alt=""><br></a>
						<a href="#" class="redbtn">Avatar Değiştir</a>
					</div>
					<div class="user-fav">
						<p>Hesap Detayları</p>
						<ul>
							<li><a href="userprofile.html">Profil</a></li>
							<li class="active"><a href="Favorilerim.php">Favorilerim</a></li>
						</ul>
					</div>
					<div class="user-fav">
						<p>Diğer</p>
						<ul>
							<li><a href="#">Şifre Değiştir</a></li>
							<li><a href="#">Çıkış</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="topbar-filter user">
					<p>Found <span>1,608 movies</span> in total</p>
					<label>Sort by:</label>
					<select>
						<option value="range">-- Choose option --</option>
						<option value="saab">-- Choose option 2--</option>
					</select>
					<a href="userfavoritelist.html" class="list"><i class="ion-ios-list-outline active"></i></a>
					<a  href="userfavoritegrid.html" class="grid"><i class="ion-grid "></i></a>
				</div>
				<div class="flex-wrap-movielist user-fav-list">
						<?php while ($listele = $getir->fetch()) {?>
					<div class="movie-item-style-2">
							<img src="<?php echo $listele['film_kapak']; ?>" alt="">
						<div class="mv-item-infor">
							<h6><a href="#"><?php echo $listele['film_ad']; ?> <span>(2012)</span></a></h6>
							<p class="rate"><i class="ion-android-star"></i><span><?php echo $listele['film_puan']; ?></span> /10</p>
							<p class="describe"><?php echo $listele['film_konu']; ?></p>
							<p class="run-time"> <?php echo $listele['film_sure']; ?>’    .     <span><?php echo $listele['film_tur']; ?> </span>    .     <span><?php echo $listele['film_cikis']; ?></span></p>
							<p>Yönetmen: <a href="#"><?php echo $listele['film_yonetmen']; ?></a></p>
						</div>
					</div>

						<?php } ?>
						
				<div class="topbar-filter">
					<label>Movies per page:</label>
					<select>
						<option value="range">5 Movies</option>
						<option value="saab">10 Movies</option>
					</select>
					
					<div class="pagination2">
						<span>Page 1 of 2:</span>
						<a class="active" href="#">1</a>
						<a href="#">2</a>
						<a href="#">3</a>
						<a href="#">...</a>
						<a href="#">78</a>
						<a href="#">79</a>
						<a href="#"><i class="ion-arrow-right-b"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'alt.php'; ?>