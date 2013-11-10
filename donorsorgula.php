<?php
include('layout/_head.php');
include('layout/_header.php');
include_once('config.php');
?>
<div class="offset1">
<form class="form-horizontal">
<fieldset>


<!-- Form Name -->
<legend class="span10">Donör Bulma</legend>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="kangrubu">Kan Grubu</label>
  <div class="controls">
    <select id="kangrubu" name="kangrubu" class="input-large">
      <option>Kan Grubu</option>
      <?php
		try {
			$db = new PDO($dsn, $user, $password);
			$kangruplari = $db->query("SELECT * FROM blood_groups ORDER BY id ASC");
			foreach($kangruplari as $row){
		?>
			 <option value="<?= $row['id']?>"><?= $row['name'] ?></option>
	<?php	}
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	
	?>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="il">İl</label>
  <div class="controls">
    <select onChange="ilceListele(this.value)" id="il" name="il" class="input-large">
      <option value="0">İl Seçiniz</option>
      <?php
		$city = $db->query("SELECT ID, il_adi FROM il ORDER BY ID ASC");
		foreach($city as $row){
	  ?>
				<option value="<?= $row['ID'];?>"><?= $row['il_adi']; ?></option>

      <?php } ?>
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

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="donorara"></label>
  <div class="controls">
    <button id="donorara" name="donorara" class="btn btn-danger">Donör Ara</button>
  </div>
</div>
</form>
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
include_once("layout/_footer.php");
?>
