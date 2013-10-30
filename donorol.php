<?php
include("layout/_head.php");
include("layout/_header.php");
?>

<div class="span9">
<form class="form-horizontal">
<!-- Form Name -->
<legend>Kan Bağışı İçin  Kayıt Olun</legend>
</div>
<!-- Select Basic -->
<div class="span6 offset4">
<div class="control-group">
  <label class="control-label" for="selectbasic">Kan Grubu (*) :</label>
  <div class="controls">
    <select id="selectbasic" name="selectbasic" class="input-large">
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
  <label class="control-label" for="tcno">Tc Kimlik Numarası (*) :</label>
  <div class="controls">
    <input id="tcno" name="tcno" placeholder="" class="input-large" type="text">
    
  </div>
</div>

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

<!-- Multiple Checkboxes (inline) -->
<div class="control-group">
  <label class="control-label" for="cinsiyet">Cinsiyet (*)</label>
  <div class="controls">
    <label class="checkbox inline" for="cinsiyet-0">
      <input name="cinsiyet" id="cinsiyet-0" value="Kadın" type="checkbox">
      Kadın
    </label>
    <label class="checkbox inline" for="cinsiyet-1">
      <input name="cinsiyet" id="cinsiyet-1" value="Erkek" type="checkbox">
      Erkek
    </label>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="doğumtarihi">Doğum Tarihi (*)</label>
  <div class="controls">
    <input id="doğumtarihi" name="doğumtarihi" placeholder="" class="input-large" type="text">
    <p class="help-block">Örneğin : 08.03.1992</p>
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
    <input id="email" name="email" placeholder="" class="input-large" type="text">
    
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="telno">Telefon Numarası </label>
  <div class="controls">
    <input id="telno" name="telno" placeholder="" class="input-large" type="text">
    <p class="help-block">Örnegin: 0505-689-4556</p>
  </div>
</div>


<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="il">il (*)</label>
  <div class="controls">
    <select id="il" name="il" class="input-large">
      <option>Option one</option>
      <option>Option two</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="ilce (*)">İlçe</label>
  <div class="controls">
    <select id="ilce (*)" name="ilce (*)" class="input-large">
      <option>Option one</option>
      <option>Option two</option>
    </select>
  </div>
</div>
<!-- Textarea -->
<div class="control-group">
  <label class="control-label" for="adres ">Adres</label>
  <div class="controls">                     
    <textarea id="adres " name="adres "></textarea>
  </div>
</div>
<input type="submit" class="btn btn-primary" value="Kayıt Ol">

</form>
<br>
<br>
</div>
</div>
</div>


<?php
include('layout/_footer.php');
?>
