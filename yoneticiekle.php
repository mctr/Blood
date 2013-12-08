<?php
include('layout/_head.php');
include('layout/_header.php');
include('config.php');
?>

<?php
if($_GET['kayit'] == 1) {
	try {
			$db = new PDO($dsn, $dbuser, $dbpassword);	
			if ($_POST['email'] && $_POST['parola'] && $_POST['ad']) {
				if ($_POST['parola'] == $_POST['parolatekrar']){	
					
					$sql = "INSERT INTO admins (first_name, last_name, email, password_digest, phone_number, status) VALUES (?,?,?,?,?,?)";
					$veri = array($_POST['ad'], $_POST['soyad'], $_POST['email'], $_POST['parola'], $_POST['telno'], '0');
					$yap = $db->prepare($sql);
					$yap->execute($veri);
					
					$mesaj = "Başarılı bir şekilde yönetici kaydı yaptınız.";
				} else {
					$error = "İki parola birbirine eşit olmalıdır.";
				} 
			} else {
				$error = "Lütfen yıldızlı(*) alanları boş bırakmayınız.";
			}
	} catch (PDOException $e) {
				echo "Connection failed: " . $e->getMessage();
	}
}
?>

	<br>
	<br>
	<div class="span6 offset3">
<form class="form-horizontal" action="yoneticiekle.php?kayit=1" method="post">
<fieldset>

<!-- Form Name -->
<legend> Yönetici Ekle</legend>

<?php
	if($error){
		echo "<p><center class='alert alert-error'>{$error}</center></p>";		
	}
	if($mesaj){
		echo "<p><center class='alert alert-success'>{$mesaj}</center></p>";
	}
?>
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="ad">Ad (*)</label>
  <div class="controls">
    <input id="ad" name="ad" placeholder="" class="input-large" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="soyad">Soyad (*)</label>
  <div class="controls">
    <input id="soyad" name="soyad" placeholder="" class="input-large" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="email">E-mail(*)</label>
  <div class="controls">
    <input id="email" name="email" placeholder="" class="input-large" type="email">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="telno">Telefon Numarası </label>
  <div class="controls">
    <input id="telno" name="telno" placeholder="" class="input-large" type="text">
    <p class="help-block">0505-689-4556</p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="parola">Parola (*)</label>
  <div class="controls">
    <input id="parola" name="parola" placeholder="" class="input-large" type="password">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="parolatekrar">Parola Tekrar (*)</label>
  <div class="controls">
    <input id="parolatekrar" name="parolatekrar" placeholder="" class="input-large" type="password">
    
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="yoneticiekle"></label>
  <div class="controls">
    <input type="submit" id="yoneticiekle" name="yoneticiekle" class="btn btn-primary" value="Yönetici Ekle">
  </div>
</div>

</fieldset>
</form>
<div class="span2"><a href="adminemin.php" class="btn btn-primary"><i class="icon-arrow-left"></i> Geri </a></div>
<?php
include('layout/_footer.php');
?>
