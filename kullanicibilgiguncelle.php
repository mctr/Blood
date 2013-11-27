<?php
session_start();
include_once('config.php') 
?>




<div class="offset1">
<legend class="span8">Kullanıcı Bİlgileri Güncelleme Ekranı</legend>
<p>
	

<form class="form-horizontal" id="registerHere1" name="registerHere2" method="post" action="yaz.php">
    <fieldset>
		<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="ad">Ad (*)</label>
				<div class="controls">
					<input id="ad" name="ad" placeholder="" class="input-large" type="text" value="<?=$_SESSION['ad']?>">
				</div>
			</div>

		<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="soyad">Soyad (*)</label>
				<div class="controls">
					<input id="soyad" name="soyad" placeholder="" class="input-large" type="text" value="<?=$_SESSION['soyad']?>">
				</div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="cinsiyet">Cinsiyet (*)</label>
				<div class="controls">
					<input id="cinsiyet" name="cinsiyet" placeholder="" class="input-large" type="text" value="<?=$_SESSION['cinsiyet']?>">
				</div>
			</div>

			<!-- Select Basic -->
			<div class="control-group">
			 <label class="control-label" for="kangrubu">Kan Grubu</label>
				<div class="controls">
					<select id="kangrubu" name="kangrubu" class="input-large" value="<?=$_SESSION['kangrubu']?>">
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
						<input id="tcno" name="tcno" placeholder="" class="input-large" type="text" value="<?=$_SESSION['tcno']?>">
					</div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="dogumtarihi">Doğum Tarihi (*)</label>
				<div class="controls">
					<input id="dogumtarihi" name="dogumtarihi" placeholder="" class="input-large" type="date">
					<p class="help-block">Örneğin : 08.03.1992</p>
				</div>
			</div>
			<input type="hidden" name="update" value="1">
			<!-- Button -->
			<div class="control-group">
			  <label class="control-label" for="guncelle"></label>
			    <div class="controls">
					<button id="guncelle" name="guncelle" class="btn btn-primary">Güncelle</button>
				</div>
			</div>
	</fieldset>
</form>
</div>



<?php
//~ if ($_SESSION['ad']){
	//~ echo $_SESSION['ad'];
	//~ echo $_SESSION['soyad'];
//~ }
include_once('layout/_footer.php');
?>
