<?php
include('layout/_head.php');
include('layout/_header.php');
include('config.php');
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
    <select onChange="ilceListele(this.value)" id="il" name="il" class="input-large">
      <option value="0">İl Seçiniz</option>
      <?php
		try {
			$db = new PDO($dsn, $user, $password);
			$city = $db->query("SELECT ID, ADI FROM il ORDER BY ID ASC");
			foreach($city as $row){
	  ?>
				<option value="<?= $row['ID'];?>"><?= $row['ADI']; ?></option>

      <?php }
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
      ?>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="ilce">İlçe</label>
  <div class="controls">
    <select id="ilce" name="ilce" class="input-large">
      <option>İlçe Seçiniz</option>
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

<script>
	function ilceListele(str){
		var xmlhttp;
		if (str == "") {
			document.getElementById("ilce").innerHTML = "";
			return;
		}
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} else {// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("ilce").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET", "ilce_listele.php?il=" + str, true);
		xmlhttp.send();
	}
</script>

<?php
include('layout/_footer.php');
?>
