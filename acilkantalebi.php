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
<legend>Acil Kan Talebi</legend>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="kangrubu">Kan Grubu (*)</label>
  <div class="controls">
    <select id="kangrubu" name="kangrubu" class="input-large">
      <option>A Rh (+)</option>
      <option>A Rh (-)</option>
      <option>B Rh +)</option>
      <option>B Rh  (-)</option>
      <option>AB Rh (+)</option>
      <option>AB Rh (-)</option>
      <option>0 Rh (+)</option>
      <option>0 Rh (-)</option>
    </select>
  </div>
</div>

<!-- Button (Double) -->
<div class="control-group">
  <label class="control-label" for="talepgonder"></label>
  <div class="controls">
    <button id="talepgonder" name="talepgonder" class="btn btn-primary">Talep Gönder</button>
    <button id="Degistirmeiptali" name="Degistirmeiptali" class="btn btn-danger">İptal</button>
  </div>
</div>

<!-- Textarea -->
<div class="control-group">
  <label class="control-label" for="bagistalebi">Bağış Talebinin Gerekçelerini açıkça  belirtiniz</label>
  <div class="controls">                     
    <textarea id="bagistalebi" name="bagistalebi"></textarea>
  </div>
</div>

</fieldset>
</form>

</fieldset>
</form>




</fieldset>
</form>

</form>

<?php
include('layout/_footer.php');
?>
