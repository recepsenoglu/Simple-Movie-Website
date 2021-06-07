<?php include 'ust.php'; ?>
<!-- END | Header -->

<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Yönetim Paneli</h1>
					<ul class="breadcumb">
						<li class="active"><a href="index.php">Anasayfa</a></li>
						<li> <span class="ion-ios-arrow-right"></span>Yönetim paneli</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="user-information">
					<div class="user-img">
						<a href="#"><img src="images/uploads/user-img.png" alt=""><br></a>
						<a href="#" class="redbtn">Avatar Değiştir</a>
					</div>
					<div class="user-fav">
						<p>Film</p>
						<ul>
							<li> <a href="yonet.php">Film Ekle</a></li>
							<li><a href="userfavoritelist.html">Film Sil</a></li>
						</ul>
					</div>
					<div class="user-fav">
						<p>Diğer</p>
						<ul>
							<li><a href="cikis.php">Çıkış</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="form-style-1 user-pro" action="#">
					<form action="film_ekle.php" class="user" method="post">
						<h4>Film Ekle</h4>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Film Adı</label>
								<input type="text" name="film_adi">
							</div>
							<div class="col-md-6 form-it">
								<label>Film Linki</label>
								<input type="text" name="film_link">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Filmin Türü</label>
								<input type="text" name="film_tur">
							</div>
							<div class="col-md-6 form-it">
								<label>Filmin Kapak Fotoğrafının Yolu <span>Örnek:images/uploads/mv1.jpg</span> </label>
								

								<input type="text" name="film_kapak">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Çıkış Tarihi</label>
								<input type="text" name="film_cikis">
								
							</div>

							<div class="col-md-6 form-it">
								<label>Filmin Yönetmeni</label>
								<input type="text" name="film_yonetmen">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Film Süresi</label>
								<input type="text" name="film_sure">
								
							</div>
							
							<div class="col-md-6 form-it">
								<label>Filmi Tavsiye Eder misin?</label>
								<select name="film_tavsiye">
								  <option value="1">Evet</option>
								  <option value="0">Hayır</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Filmin Konusu</label>
								<textarea name="film_konu" style="height: 150px;"></textarea>
								
							</div>
							<div class="col-md-6 form-it">
								<label>Filmin Puanı</label>
								<input type="text" name="film_puan">
								
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-2">
								<input class="submit" type="submit" value="ekle">
							</div>
						</div>	
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- footer section-->
<?php include 'alt.php'; ?>