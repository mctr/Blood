<?php
session_start();
include ('config.php');

if ($_GET['change'] == 1) {
	//~ $mmail = $_SESSION['donor'];
//~ 
	//~ try {
			//~ $db = new PDO($dsn, $dbuser, $dbpassword);
			//~ $query18 = "SELECT * FROM donors WHERE email='$mmail'";
			//~ $hop = $db->query($query18);
			//~ foreach($hop as $row) {
				//~ $pass = $row['password_digest']
			//~ }
			//~ 
			//~ echo $pass;
		//~ 
		//~ } catch (PDOException $e) {
			//~ echo "Connection failed: " . $e->getMessage();
		//~ }
		//~ //header("Location:donorpaneli.php");
}
?>

<div class="offset1">

<legend class="span8">Parola Bilgi Ekranı</legend>

<form class="form-horizontal" id="registerHere1" name="registerHere2" method="post" action="parolabilgiekrani.php?change=1">
  <fieldset>
      <div class="control-group">
        <label class="control-label" for="simdikiparolaniz">Şimdiki Parolanız</label>
        <div class="controls">
          <input id="simdikiparolaniz" name="simdikiparolaniz" placeholder="" class="input-large" type="text">       
        </div>
      </div>

      <!-- Text input-->
      <div class="control-group">
        <label class="control-label" for="yeniparolaniz">Yeni Parolanız</label>
        <div class="controls">
          <input id="yeniparolaniz" name="yeniparolaniz" placeholder="" class="input-large" type="text"> 
        </div>
      </div>

      <!-- Text input-->
      <div class="control-group">
        <label class="control-label" for="yeniparolatekrari">Yeni Parolanızı Tekrar Girin</label>
        <div class="controls">
          <input id="yeniparolatekrari" name="yeniparolatekrari" placeholder="" class="input-large" type="text">
        </div>
      </div>

      <!-- Button (Double) -->
      <div class="control-group">
        <label class="control-label" for="Parolamidegistir"></label>
        <div class="controls">
          <button id="Parolamidegistir" name="Parolamidegistir" class="btn btn-primary">Parolamı Değiştir</button>
          <button id="Degistirmeiptali" name="Degistirmeiptali" class="btn btn-danger">İptal</button>
        </div>
      </div>
  </fieldset>
</form>
</div>
