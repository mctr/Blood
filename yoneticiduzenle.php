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

<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Yönetici Düzenle</legend>

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
  <label class="control-label" for="email">Email (*)</label>
  <div class="controls">
    <input id="email" name="email" placeholder="" class="input-large" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="telno">Telefon Numarası</label>
  <div class="controls">
    <input id="telno" name="telno" placeholder="" class="input-large" type="text">
    
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="duzenle"></label>
  <div class="controls">
    <button id="duzenle" name="duzenle" class="btn btn-primary">Düzenle</button>
  </div>
</div>

</fieldset>
</form>
</form>

<?php
include('layout/_footer.php');
?>
