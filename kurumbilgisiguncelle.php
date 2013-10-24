<?php
include("layout/_head.php");
include("layout/_header.php");
?>

	<div class="span6 offset3">
	<form class="form-horizontal">
<fieldset>

<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Kurum Bilgileri Güncelleme Ekranı</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="kurumadi">Kurum Adı (*)</label>
  <div class="controls">
    <input id="kurumadi" name="kurumadi" placeholder="Ondokuz Mayıs Üniversitesi" class="input-large" type="text">
    
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="kurumtipi">Kurum Tipi (*)</label>
  <div class="controls">
    <select id="kurumtipi" name="kurumtipi" class="input-large">
      <option>Hastane</option>
      <option>Klinik</option>
      <option>Kan Bankası</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="email">Email (*)</label>
  <div class="controls">
    <input id="email" name="email" placeholder="info@omu.edu.tr" class="input-large" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="telno">Telefon Numarası (*)</label>
  <div class="controls">
    <input id="telno" name="telno" placeholder="" class="input-large" type="text">
    <p class="help-block">0505-689-4556</p>
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="il">İl</label>
  <div class="controls">
    <select id="il" name="il" class="input-large">
      <option>Option one</option>
      <option>Option two</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="ilce">İlçe</label>
  <div class="controls">
    <select id="ilce" name="ilce" class="input-large">
      <option>Option one</option>
      <option>Option two</option>
    </select>
  </div>
</div>

<!-- Textarea -->
<div class="control-group">
  <label class="control-label" for="adres">Adres</label>
  <div class="controls">                     
    <textarea id="adres" name="adres"></textarea>
  </div>
</div>

<!-- Button (Double) -->
<div class="control-group">
  <label class="control-label" for="guncelle"></label>
  <div class="controls">
    <button id="guncelle" name="guncelle" class="btn btn-success">Bilgilerimi Güncelle</button>
    <button id="iptal" name="iptal" class="btn btn-danger">iptal</button>
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
