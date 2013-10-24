<?php
include("layout/_head.php");
include("layout/_header.php");
?>

	<br>
	<br>
	<div class="span6 offset3">
	<form class="form-horizontal">
<fieldset>


<form class="form-horizontal">
<fieldset>

<form class="form-horizontal">
<fieldset>



<!-- Form Name -->
<legend> Yönetici Ekle</legend>

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
    <input id="parola" name="parola" placeholder="" class="input-large" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="parolatekrar">Parola Tekrar (*)</label>
  <div class="controls">
    <input id="parolatekrar" name="parolatekrar" placeholder="" class="input-large" type="text">
    
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="yoneticiekle"></label>
  <div class="controls">
    <button id="yoneticiekle" name="yoneticiekle" class="btn btn-primary">Yönetici Ekle</button>
  </div>
</div>

</fieldset>
</form>
</form>

<?php
include('layout/_footer.php');
?>
