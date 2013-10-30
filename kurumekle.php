<?php
include("layout/_head.php");
include("layout/_header.php");
?>

	<div class="span9">
	<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Kurum Kayıt Ekranı</legend>
</div>
<!-- Text input-->
<div class="span6 offset4">
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
</div>


<div class="span9">
<!-- Form Name -->
<legend>İletişim Bilgileri</legend>
</div>
<div class="span6 offset4">
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
    <p class="help-block">Örnegin: 0505-689-4556</p>
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

</form>
<input type="submit" class="btn btn-primary" value="Kayıt Ekle">
<br>
<br>
<br>
</div>

<?php
include('layout/_footer.php');
?>
