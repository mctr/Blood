<?php
include("layout/_head.php");
include("layout/_header.php");
include("config.php");
?>

<?php
	if(isset($_POST['email']) && isset($_POST['parola']))
	{
		//~ if(!isset($_POST[email]) || empty($_POST[email])){
				//~ $hata = "Tüm alanları doldurmanız gerekiyor";
		//~ }
		//~ if(!isset($_POST[parola]) || empty($_POST[parola])){
				//~ $hata = "Tüm alanları doldurmanız gerekiyor";
		//~ }
		//~ if(!isset($_POST[parolatekrar]) || empty($_POST[parolatekrar])){
				//~ $hata = "Tüm alanları doldurmanız gerekiyor";
		//~ }
		//~ if (!$hata){
			
			if($_POST['parola'] === $_POST['parolatekrar']){
				
				
				//~ $sql = "INSERT INTO admins (first_name, last_name, email, password_digest, phone_number, status) VALUES (?,?,?,?,?,?)";
				//~ $veri = array($_POST['ad'], $_POST['soyad'], $_POST['email'], $_POST['parola'], $_POST['telno'], '0');
				//~ $yap = $db->prepare($sql);
				//~ $yap->execute($veri);
				
				$sonuc = $db->exec("INSERT INTO admins (first_name, last_name, email, password_digest, phone_number, status) VALUES ('$_POST[ad]', '$_POST[soyad]', '$_POST[email]', '$_POST[parola]', '$_POST[telno]', 0)");
				//~ $db->exec("INSERT INTO admins (first_name, last_name, email, password_digest, phone_number, status) VALUES (:ad, :soyad, :email, :parola, :telno, :statu)");
				//~ $db->bindParam(':ad', $_POST['ad']);
                //~ $db->bindParam(':soyad', $_POST['soyad']);
                //~ $db->bindParam(':email', $_POST['email']);
                //~ $db->bindParam(':parola', $_POST['parola']);
                //~ $db->bindParam(':telno', $_POST['telno']);
                //~ $db->bindParam(':statu', 0);
				if ($sonuc) {
					$mesaj = "Kayıt başarıyla gerçekleşti.";
				} else {
					$mesaj = "Kayıt başarıyla gerçekleşemedi.";
				}
				//~ $id = $db->lastInsertId();
				//~ echo 'Yeni eklenen üyenin IDsi: ' . $id;
			}
		}
		
?>

	<br>
	<br>
	<div class="span6 offset3">
<form class="form-horizontal" action="" method="post">
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

<?php
include('layout/_footer.php');
?>
