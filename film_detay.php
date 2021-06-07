<?php include 'ust.php'; 
$sorgu = "SELECT * FROM filmler WHERE film_id=".$_GET['id'];
$getir = $db->prepare($sorgu);
$getir->execute();
$listele = $getir->fetch();//film id sine ait filmi getirir
?>

<div class="hero mv-single-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- <h1> movie listing - list</h1>
				<ul class="breadcumb">
					<li class="active"><a href="#">Home</a></li>
					<li> <span class="ion-ios-arrow-right"></span> movie listing</li>
				</ul> -->
			</div>
		</div>
	</div>
</div>
<div class="page-single movie-single movie_single">
	<div class="container">
		<div class="row ipad-width2">
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="movie-img sticky-sb">
					<img src="<?php echo $listele['film_kapak']; ?>" alt="">
					<div class="movie-btn">	
						<div class="btn-transform transform-vertical red">
							<div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> Filmi İzle</a></div>
							<div><a href="<?php echo $listele['film_link'] ?>" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="movie-single-ct main-content">
					<h1 class="bd-hd"><?php echo $listele['film_ad']; ?></h1>
					<div class="social-btn">
						<a href="favori_ekle.php?id=<?php echo $listele['film_id']; ?>" class="parent-btn"><i class="ion-heart"></i> Favorilere Ekle</a>		
					</div>
					<div class="movie-rate">
						<div class="rate">
							<i class="ion-android-star"></i>
							<p><span><?php echo $listele['film_puan']; ?></span> /10<br>
							</p>
						</div>
						<div class="rate-star">
							<p>Filmin Puanı:  </p>
							<?php for ($i=0; $i < $listele['film_puan']; $i++) { ?>
								<i class="ion-ios-star"></i>

							<?php } ?>
							<?php for ($i=0; $i <10-$listele['film_puan']; $i++) { // filmin puana göre yıldızını dinamik olarak getirme?> 
							<i class="ion-ios-star-outline"></i>
								
						<?php } ?>
						</div>
					</div>
					<div class="movie-tabs">
						<div class="tabs">
							<ul class="tab-links tabs-mv">
								<li class="active"><a href="#overview">Öngörüm</a></li>
								<li><a href="#reviews"> Yorumlar</a></li>
							</ul>
							<div class="tab-content">
								<div id="overview" class="tab active">
									<div class="row">
										<div class="col-md-8 col-sm-12 col-xs-12">
											<p><?php echo $listele['film_konu']; ?></p>
											<!-- movie cast -->
											<div class="title-hd-sm">
												<h4>Yorumlar</h4>
											</div>
											<!-- movie user review -->
											<?php $sorgu2 = "SELECT * FROM yorumlar JOIN kullanici ON yorumlar.kullanici_id = kullanici.kullanici_id WHERE film_id =".$_GET['id'];
											$getir2 = $db->prepare($sorgu2);
											$getir2->execute();
											while ($listele2 = $getir2->fetch()) {?>
												<div class="mv-user-review-item">
													<h3><?php echo $listele2['yorum_baslik']; ?></h3>
													<div class="no-star">
														<?php for ($i=0; $i < $listele2['yorum_puan'] ; $i++) { ?>
															<i class="ion-android-star"></i>
													<?php } ?>
														<?php for ($i=0; $i < 10 - $listele2['yorum_puan']; $i++) { ?>
															<i class="ion-android-star last"></i>
													<?php } ?>
														
													</div>
													<p class="time">
														<?php echo $listele2['yorum_tarih']; ?> <a href="#"><?php echo $listele2['kullanici_kadi']; ?></a>
													</p>
													<p><?php echo $listele2['yorum']; ?></p>
												</div><br>
											<?php } // yorum getirme?>
											
											<form action="yorum_ekle.php?id=<?php echo $_GET['id']; ?>" method="post">
												<label>Yorum Başlığı:</label><br>
												<input type="text" name="yorum_baslik" maxlength="30" style="width: 250px;"><br>
												<label>Yorumunuz:</label><br>
												<textarea name="yorum" style="height: 150px;"></textarea><br>
												<label>Puan:</label><br>
												<select name="puan">													<?php for ($i=0; $i <=10 ; $i++) { ?>
													<option value=" <?php echo $i; ?> "><?php echo $i; ?></option>
												<?php  } // yorum ekleme?>

											</select><br>

											<input type="submit" value="Gönder">
										</form>
									</div>
									<div class="col-md-4 col-xs-12 col-sm-12">
										<div class="sb-it">
											<h6>Yönetmen </h6>
											<p><a href="#"><?php echo $listele['film_yonetmen']; ?></a></p>
										</div>
										<div class="sb-it">
											<h6>Tür</h6>
											<p><a href="#"><?php echo $listele['film_tur']; ?>, </a></p>
										</div>
										<div class="sb-it">
											<h6>Çıkış Tarihi</h6>
											<p><?php echo $listele['film_cikis']; ?></p>
										</div>
										<div class="sb-it">
											<h6>Film Süresi</h6>
											<p><?php echo $listele['film_sure']; ?></p>
										</div>
										<div class="ads">
											<img src="images/uploads/ads1.png" alt="">
										</div>
									</div>
								</div>
							</div>
							<div id="reviews" class="tab review">
								<div class="row">
									<div class="rv-hd">
										<div class="div">
											<h3>Related Movies To</h3>
											<h2>Skyfall: Quantum of Spectre</h2>
										</div>
									</div>
									<div class="topbar-filter">
										<p>Found <span>56 reviews</span> in total</p>
										<label>Filter by:</label>
										<select>
											<option value="popularity">Popularity Descending</option>
											<option value="popularity">Popularity Ascending</option>
											<option value="rating">Rating Descending</option>
											<option value="rating">Rating Ascending</option>
											<option value="date">Release date Descending</option>
											<option value="date">Release date Ascending</option>
										</select>
									</div>
									<?php $sorgu2 = "SELECT * FROM yorumlar JOIN kullanici ON yorumlar.kullanici_id = kullanici.kullanici_id WHERE film_id =".$_GET['id']; // YORUMLARI GÖRÜNTÜLEME
											$getir2 = $db->prepare($sorgu2);
											$getir2->execute();
											while ($listele2 = $getir2->fetch()) {?>
									<div class="mv-user-review-item">
										<div class="user-infor">
											<img src="images/uploads/userava1.jpg" alt="">
											<div>
												<h3><?php echo $listele2['yorum_baslik']; ?></h3>
												<div class="no-star">
														<?php for ($i=0; $i < $listele2['yorum_puan'] ; $i++) { ?>
															<i class="ion-android-star"></i>
													<?php } ?>
														<?php for ($i=0; $i < 10 - $listele2['yorum_puan']; $i++) { ?>
															<i class="ion-android-star last"></i>
													<?php } // dinamik olarak yorumun yıldızını gösterir?>
														
													</div>
												<p class="time">
													<?php echo $listele2['yorum_tarih']; ?> <a href="#"> <?php echo $listele2['kullanici_kadi']; ?></a>
												</p>
											</div>
										</div>
										<p><?php echo $listele2['yorum']; ?></p>
									<div class="topbar-filter">
										<label>Reviews per page:</label>
										<select>
											<option value="range">5 Reviews</option>
											<option value="saab">10 Reviews</option>
										</select>
										<div class="pagination2">
											<span>Page 1 of 6:</span>
											<a class="active" href="#">1</a>
											<a href="#">2</a>
											<a href="#">3</a>
											<a href="#">4</a>
											<a href="#">5</a>
											<a href="#">6</a>
											<a href="#"><i class="ion-arrow-right-b"></i></a>
										</div>
									</div>
								</div>
							<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php include 'alt.php'; ?>