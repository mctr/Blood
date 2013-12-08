<?php
include('layout/_head.php');
include('layout/_header.php');
include_once('config.php');
?>
	<div id="main">
		<center class="ust_yazi"><h3 style="color:red;">Kan Acil Degil Sürekli İhtiyaçtır.</h3></center>
	<ul class="thumbnails">
		<div class="span3 thumbnail" >
		<img src="bootstrap/img/donorol2.jpg" alt=""><br>
		<h4><center>Haydi Kan Bagışına</center></h4>
		<p><center><i>Kan üretilemeyen bir dokudur ve halen tek kaynağı sağlıklı bağışçılardır.
		Bu yüzden sizin de ihtiyacınız olabilir.
		Donör olmak için hemen kayıt olun.</i></center></p>
		<center><a href="donorol.php" class="btn btn-primary">Donör Olmak İstiyorum</a></center>
		</div>


		<div class="span3 offset1 thumbnail" >
		<img src="bootstrap/img/kanara.jpg" alt=""><br>
		<h4><center>Donör Sorgula</center></h4>
		<p><center><i>Kana ihtiyacınız oldugunda buradan arama yapıp sistem yöneticileri sayesinde
		 kan bagışcılarına rahatlıkla ulaşabilirsiniz.
		 Sorgulayın..</i></center></p>
		<center><a href="donorsorgula.php" class="btn btn-primary">Donör Sorgula</a></center>
		</div>	
	
		
		<div class="span3 offset1 thumbnail" >
		<img src="bootstrap/img/kurum.jpg" alt=""><br>
		<h4><center>Kayıtlı Kuruluşlar</center></h4>
		<p><center><i>Sisteme kayıtlı olan kuruluşları görebilirsiniz ve onlardan yardım alabilirsiniz.
		Sizde bu kurumlardan biri olabilirsiniz.</i></center></p>
		<center><a href="kayitlikuruluslar.php" class="btn btn-primary">Kayıtlı Kuruluşlar</a></center>
		</div>
	</ul>
	</div>

<?php
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword);
		$query1 = "SELECT * from institutes WHERE status=1";
		$query2 = "SELECT * FROM donors WHERE status=1";

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
	<div id="sql">
		<center><h6>Kayıtlı Kuruluş: <?= $kurum_sayisi;?> , Donör Sayısı: <?= $donor_sayisi;?></h6></center>
	</div>
<?php
include("layout/_footer.php");
?>
