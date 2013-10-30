<?php
include("layout/_head.php");
include("layout/_header.php");
include("config.php");
?>

<?php
	if($_GET[yoneticiekle] == 1)
	{
		if(!isset($_POST[email]) || empty($_POST[email])){
				$hata = "Tüm alanları doldurmanız gerekiyor";
		}
		if(!isset($_POST[parola]) || empty($_POST[parola])){
				$hata = "Tüm alanları doldurmanız gerekiyor";
		}
		if(!isset($_POST[parolatekrar]) || empty($_POST[parolatekrar])){
				$hata = "Tüm alanları doldurmanız gerekiyor";
		}
		if (!$hata){
			if($_POST['parola'] == $_POST['parolatekrar']){
				
				$db->exec("INSERT INTO admins (first_name, last_name, email, password_digest, phone_number, status) VALUES ('$_POST[ad]', '$_POST[soyad]', '$_POST[email]', '$_POST[parola]', '$_POST[telno]', 0)");
				
				$mesaj = "Kayıt başarıyla gerçekleşti.";
				//~ $id = $db->lastInsertId();
				//~ echo 'Yeni eklenen üyenin IDsi: ' . $id;
			}
		}
		
	}

?>

	<br>
	<br>
	<div class="span6 offset3">
<form class="form-horizontal" action="yoneticiekle.php?yoneticiekle=1" method="post">
<fieldset>

<!-- Form Name -->
<legend> Yönetici Ekle</legend>

<?php
	if($hata){
		echo "<p><center class='alert alert-error'>{$hata}</center></p>";		
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
  <label class="control-label" for="email">E-mail</label>
  <div class="controls">
    <input id="email" name="email" placeholder="" class="input-large" type="text">
    
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

<?php
include('layout/_footer.php');
?>
