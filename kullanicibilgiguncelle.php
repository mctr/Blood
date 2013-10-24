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

<!-- Form Name -->
<legend>Bİlgilerinizi  Güncelleyin</legend>

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
  <label class="control-label" for="cinsiyet">Cinsiyet (*)</label>
  <div class="controls">
    <input id="cinsiyet" name="cinsiyet" placeholder="" class="input-large" type="text">
    
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="kangrubu">Kan Grubu</label>
  <div class="controls">
    <select id="kangrubu" name="kangrubu" class="input-large">
      <option>A Rh(+)</option>
      <option>A Rh(-)</option>
      <option>B Rh(+)</option>
      <option>B Rh(-)</option>
      <option>AB Rh(+)</option>
      <option>AB Rh(-)</option>
      <option>0 Rh(+)</option>
      <option>0 Rh(-)</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="tcno">Tc Kimlik Numarası (*)</label>
  <div class="controls">
    <input id="tcno" name="tcno" placeholder="" class="input-large" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="dogumtarihi">Doğum Tarihi (*)</label>
  <div class="controls">
    <input id="dogumtarihi" name="dogumtarihi" placeholder="" class="input-large" type="text">
    <p class="help-block">Örneğin : 08.03.1992</p>
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="guncelle"></label>
  <div class="controls">
    <button id="guncelle" name="guncelle" class="btn btn-primary">Güncelle</button>
  </div>
</div>

</fieldset>
</form>



</fieldset>
</form>

</form>
</div>

<?php
include('layout/_footer.php');
?>
