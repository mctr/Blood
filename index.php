<?php
include('layout/_head.php');
include('layout/_header.php');
include_once('config.php');
?>

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
		<center><a href="donorsorgula.php" class="btn btn-primary">Donör Sorgula</a></center>
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
<?php
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword);
		$query1 = "SELECT * from institutes";
		$query2 = "SELECT * FROM donors";

		$k_sayisi = $db->prepare($query1);
		$d_sayisi = $db->prepare($query2);

		$k_sayisi->execute();
		$d_sayisi->execute();
		
		$kurum_sayisi = $k_sayisi->rowCount();
		$donor_sayisi = $d_sayisi->rowCount();
		//~ echo $k_sayisi->rowCount(); 
		//~ echo $d_sayisi->rowCount(); 
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
?>

	<center><h6>Kayıtlı Kuruluş:<?= $kurum_sayisi;?>,Donör Sayısı:<?= $donor_sayisi;?></h6></center>
	<?php echo $_SESSION['email']."<br>"; ?>
	<a href="logout.php">Çıkış yap</a>
<?php
include("layout/_footer.php");
?>
