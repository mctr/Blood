<?php
include('layout/_head.php');
include('layout/_header.php');
include('config.php');
?>
<?php
if ($_GET['donor'] == 1){ 
	if (!$_POST["selectbasic"] || !$_POST["tc"] || !$_POST["ad"] || !$_POST["soyad"] || !$_POST["cinsiyet"] || !$_POST["dtarihi"] || !$_POST["email"] || !$_POST["telno"] || !$_POST["il"] || !$_POST["ilce"]) {
		$hata = "Lütfen * lı Alanları boş bırakmayınız";
	} else {
		try {
			$db = new PDO($dsn, $dbuser, $dbpassword);
			
			$donorekle = $db->prepare("INSERT INTO donors (tc, blood_group_id, first_name, last_name, email, password_digest, phone_number, gender, birthday, status, city_id, district_id, address) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
			
			$donorekle->bindParam(1, $_POST["tc"]);
			$donorekle->bindParam(2, $_POST["selectbasic"]);
			$donorekle->bindParam(3, $_POST["ad"]);
			$donorekle->bindParam(4, $_POST["soyad"]);
			$donorekle->bindParam(5, $_POST["email"]);
			$donorekle->bindParam(6, $_POST["tc"]);
			$donorekle->bindParam(7, $_POST["telno"]);
			$donorekle->bindParam(8, $_POST["cinsiyet"]);
			$donorekle->bindParam(9, $_POST["dtarihi"]);
			$donorekle->bindParam(10, $_POST["status"]);
			$donorekle->bindParam(11, $_POST["il"]);
			$donorekle->bindParam(12, $_POST["ilce"]);
			$donorekle->bindParam(13, $_POST["adres"]);
			
			$donorekle->execute();
			
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
		$hata = "Başarılı bir şekilde kayıtlandınız";
	}
}
	
?>




<div class="span9">
<form class="form-horizontal" action="donorol.php?donor=1" method="post">
<!-- Form Name -->
<legend>Kan Bağışı İçin  Kayıt Olun</legend>
</div>

<!-- Select Basic -->
<div class="span6 offset4">
<?php
	if ($hata) {
		echo "<center class='alert alert-error'>$hata</center>";
	}
?>
<div class="control-group">
  <label class="control-label" for="selectbasic">Kan Grubu (*) :</label>
  <div class="controls">
    <select id="selectbasic" name="selectbasic" class="input-large">
      <option>Kan Grubu</option>
      <?php
		try {
			$db = new PDO($dsn, $dbuser, $dbpassword);
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

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="tcno">Tc Kimlik Numarası (*) :</label>
  <div class="controls">
    <input id="tcno" name="tc" placeholder="" class="input-large" type="text">
    
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
      <input type="radio" name="cinsiyet" value="Erkek">Erkek
      <input type="radio" name="cinsiyet" value="Kadin">Kadın 
    </label>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="dtarihi">Doğum Tarihi (*)</label>
  <div class="controls">
    <input id="dtarihi" name="dtarihi" placeholder="" class="input-large" type="date">
    <p class="help-block">Örneğin : 08.03.1992</p>
  </div>
</div>

</div>
<div class="span9">
<!-- Form Name -->
<legend>İletişim Bilgileri</legend>
</div>
<div class="span6 offset4 alt">
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="email">Email (*)</label>
  <div class="controls">
    <input id="email" name="email" placeholder="" class="input-large" type="email">
    
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="telno">Telefon Numarası(*) </label>
  <div class="controls">
    <input id="telno" name="telno" placeholder="" class="input-large" type="text">
    <p class="help-block">Örnegin: 0505-689-4556</p>
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="il">İl(*)</label>
  <div class="controls">
    <select onChange="ilceListele(this.value)" id="il" name="il" class="input-large">
      <option value="0">İl Seçiniz</option>
      <?php
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword);
		$city = $db->query("SELECT ID, il_adi FROM il ORDER BY ID ASC");
		foreach($city as $row){
	  ?>
				<option value="<?= $row['ID'];?>"><?= $row['il_adi']; ?></option>

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
  <label class="control-label" for="ilce">İlçe(*)</label>
  <div class="controls">
    <select id="ilce" name="ilce" class="input-large">
      <option value="0">Önce İl Seçiniz</option>
      
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
<input type="hidden" name="status" value="2">
<input type="submit" class="btn btn-primary" value="Kayıt Ol">

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
include_once('layout/_footer.php');
?>
	
