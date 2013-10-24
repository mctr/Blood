<?php
include("layout/_head.php");
include("layout/_header.php");
?>
	<br>
	<br>
	<div class="span6 offset3">
	<form class="form-horizontal">
<fieldset>


<!-- Form Name -->
<legend>Donör Bulma </legend>

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

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="donorara"></label>
  <div class="controls">
    <button id="donorara" name="donorara" class="btn btn-danger">Donör Ara</button>
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
