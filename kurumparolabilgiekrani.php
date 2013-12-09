<?php
session_start();
if ($_SESSION['kurum']) {
include('layout/_head.php');
include('layout/_header.php');
include_once('config.php');

if ($_GET['change'] == 1) {
	$mmail = $_SESSION['kurum'];

	try {
			$db = new PDO($dsn, $dbuser, $dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
			$query18 = "SELECT * FROM institutes WHERE email='$mmail'";
			$hop = $db->query($query18);
			foreach($hop as $row) {
				$pass = $row['password_digest'];
			}
			
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
		
		if ($_POST['simdikiparolaniz'] == $pass) {
			if ($_POST['yeniparolaniz'] == $_POST['yeniparolatekrari']){
				$guncelle = $db->prepare("UPDATE institutes SET password_digest=? WHERE email='$mmail'");
			
				$guncelle->bindParam(1, $_POST['yeniparolaniz']);
				
				$guncelle->execute();
				
				$success = "Başarılı bir şekilde Şifre degiştirdiniz.";
			} else {
				$hata = "Yeni girdiginiz şifreler aynı olmalı.";
			}
		} else {
			$hata = "Eski parolanızı yanlış girdiniz.";
		}
}
?>

<div class="offset1">
<legend class="span8">Parola Bilgi Ekranı</legend>

<form class="form-horizontal" id="registerHere1" name="registerHere2" method="post" action="kurumparolabilgiekrani.php?change=1">
  <fieldset>
	  <?php
	if ($hata) {
		echo "<center class='alert alert-error'>$hata</center>";
	}
	if ($success) {
		echo "<center class='alert alert-success'>$success</center>";
	}
?>
      <div class="control-group">
        <label class="control-label" for="simdikiparolaniz">Şimdiki Parolanız</label>
        <div class="controls">
          <input id="simdikiparolaniz" name="simdikiparolaniz" placeholder="Şuanki Parolanız" class="input-large" type="password">       
        </div>
      </div>

      <!-- Text input-->
      <div class="control-group">
        <label class="control-label" for="yeniparolaniz">Yeni Parolanız</label>
        <div class="controls">
          <input id="yeniparolaniz" name="yeniparolaniz" placeholder="Yeni Parola" class="input-large" type="password"> 
        </div>
      </div>

      <!-- Text input-->
      <div class="control-group">
        <label class="control-label" for="yeniparolatekrari">Yeni Parolanızı Tekrar Girin</label>
        <div class="controls">
          <input id="yeniparolatekrari" name="yeniparolatekrari" placeholder="Yeni Parola Tekrar" class="input-large" type="password">
        </div>
      </div>

      <!-- Button (Double) -->
      <div class="control-group">
        <label class="control-label" for="Parolamidegistir"></label>
        <div class="controls">
          <button id="Parolamidegistir" name="Parolamidegistir" class="btn btn-primary">Parolamı Değiştir</button>
          <a class="btn btn-danger" href="parolabilgiekrani.php">İptal</a>
        </div>
      </div>
  </fieldset>
</form>
</div>
<a href="kurum_index.php" class="btn btn-inverse"><-- Geri</a>

<?php
include('layout/_footer.php');
} else {
	header("Location:kurum_login.php");
}
?>
