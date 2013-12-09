<?php
session_start();
if ($_SESSION['donor']) {
include('layout/_head.php');
include('layout/_header.php');
include_once('config.php');

$mmail = $_SESSION['donor'];
if ($_GET['id'] == 1) {
	try {
			$db = new PDO($dsn, $dbuser, $dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
			
			$guncelle = $db->prepare("UPDATE donors SET blood_making_date=? WHERE email='$mmail'");
			
			$guncelle->bindParam(1, $_POST['sonkanvermetarihi']);
			
			
			$guncelle->execute();
			
			$mesaj = "Başarılı Güncelleme yaptınız.";
			
			
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
}
?>


	<div class="offset1">
	<form class="form-horizontal" method="post" action="kanvermedurumu.php?id=1">
<?php
	if ($mesaj) {
		echo "<center class='alert alert-success'>$mesaj</center>";
	}
?>
<legend class="span10">Kan Verme Durumunuz</legend>


<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="Sonkanvermetarihi">Son Kan Verme Tarihi(*)</label>
  <div class="controls">
    <input id="Sonkanvermetarihi" name="sonkanvermetarihi" class="input-large" type="date">
    <p class="help-block">Örneğin : 08.03.1992</p>
  </div>
</div>

<!-- Button (Double) -->
<div class="control-group">
  <label class="control-label" for="Bilgiyikaydet"></label>
  <div class="controls">
    <button id="Bilgiyikaydet" name="bilgiyikaydet" class="btn btn-primary">Bİlgiyi  Kaydet</button>
    <a class="btn btn-danger" href="kanvermedurumu.php">İptal</a>
  </div>
</div>
</form>
</div>

<a href="donor_index.php" class="btn btn-inverse"><-- Geri</a>
<?php
include('layout/_footer.php');
} else {
	header("Location:donor_login.php");
}
?>
