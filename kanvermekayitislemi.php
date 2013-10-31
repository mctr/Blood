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
<legend>Kan Verme Kayıt İşlemi</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="kurum">Kurum (*)</label>
  <div class="controls">
    <input id="kurum" name="kurum" placeholder="" class="input-large" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="donor">Donör (*)</label>
  <div class="controls">
    <input id="donor" name="donor" placeholder="" class="input-large" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="kanvermetarihi">Kan Verme Tarihi (*)</label>
  <div class="controls">
    <input id="kanvermetarihi" name="kanvermetarihi" placeholder="" class="input-large" type="date">
    
  </div>
</div>

<!-- Textarea -->
<div class="control-group">
  <label class="control-label" for="aciklama">Açıklama</label>
  <div class="controls">                     
    <textarea id="aciklama" name="aciklama"></textarea>
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="kaydet"></label>
  <div class="controls">
    <button id="kaydet" name="kaydet" class="btn btn-primary">Kaydet</button>
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
