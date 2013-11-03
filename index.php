<?php
include("layout/_head.php");
include("layout/_header.php");
?>
<!--
<br><a href="acilkantalebi.php">Acil Kan Talebi</a>
<br><a href="donorbulma.php">Donor Bulma</a>
<br><a href="donorlogin.php">Donor Login</a>
<br><a href="donorol.php">Donor Ol</a>
<br><a href="kanvermedurumu.php">Kan Verme Durumu</a>
<br><a href="kanvermekayitislemi.php">Kan Verme Kayıt İşlemi</a>
<br><a href="kullanicibilgiguncelle.php">Kullanıcı Bilgi Güncelle</a>
<br><a href="kurumbilgisiguncelle.php">Kurum Bilgisi Güncelle</a>
<br><a href="parolabilgiekrani.php">Parola Bilgi Ekranı</a>
<br><a href="yoneticiduzenle.php">Yönetici Düzenle</a>
<br><a href="yoneticiekle.php">Yönetici Ekle</a>
-->
	<br>
	<br>
	<div id="main">
	<ul class="thumbnails">
		<div class="span3 offset0.5 thumbnail" >
		<img src="bootstrap/img/survey.png" alt="">
		<h3>Bla Bla Bla</h3>
		<p>Olaylar Olaylar</p>
		<center><a href="donorol.php" class="btn btn-primary">Donör Olmak İstiyorum</a></center>
		</div>


		<div class="span3 offset1 thumbnail" >
		<img src="bootstrap/img/survey.png" alt="">
		<h3>Bla Bla Bla</h3>
		<p>Olaylar Olaylar</p>
		<center><a href="kurum_paneli/donorbulma.php" class="btn btn-primary">Donör Sorgula</a></center>
		</div>	
	
		
		<div class="span3 offset1 thumbnail" >
		<img src="bootstrap/img/survey.png" alt="">
		<h3>Bla Bla Bla</h3>
		<p>Olaylar Olaylar</p>
		<center><a href="kayitlikuruluslar.php" class="btn btn-primary">Kayıtlı Kuruluşlar</a></center>
		</div>
	</ul>
	</div>
	<br>
	<br>
	<center><h6>Kayıtlı Kuruluş:3,Donör Sayısı:</h6></center>
	<?php echo $_SESSION['email']."<br>"; ?>
	<a href="logout.php">Çıkış yap</a>
<?php
include("layout/_footer.php");
?>
