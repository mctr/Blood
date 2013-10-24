<?php
include("layout/_head.php");
include("layout/_header.php");
?>


	<div class="span6 offset3">
	<form class="form-horizontal">
<fieldset>

<form class="form-horizontal">
<fieldset>

<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Parola Bilgi Ekranı</legend>

<!-- Text input-->
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
  <label class="control-label" for="yeniparolatekrari">Yeni Parolanızı  TekrarGirin</label>
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



</fieldset>
</form>

</form>

<?php
include('layout/_footer.php');
?>
