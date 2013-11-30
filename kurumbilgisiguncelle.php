<?php
session_start();
include('layout/_head.php');
include('layout/_header.php');
include_once('config.php');
?>
<?php
$mmail = $_SESSION['kurum'];

	try {
			$db = new PDO($dsn, $dbuser, $dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
			$query18 = "SELECT * FROM institutes WHERE email='$mmail'";
			$hop = $db->query($query18);
			foreach($hop as $row) {
				$ad = $row['name'];
				$rol = $row['role_id'];
				$email = $row['email'];
				$telno = $row['phone_number'];
				$il = $row['city_id'];
				$ilce = $row['district_id'];
				$address = $row['address'];
			}
			
		
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
		
		if ($_GET['update'] == 1) {
			$guncelle = $db->prepare("UPDATE institutes SET  name=?, phone_number=?, address=?  WHERE email='$mmail'");
			
			
			$guncelle->bindParam(1, $_POST['kurumadi']);
			//$guncelle->bindParam(2, $_POST['kurumtipi']);
			//$guncelle->bindParam(3, $_POST['il']);
			//$guncelle->bindParam(4, $_POST['ilce']);
			$guncelle->bindparam(2, $_POST['telno']);
			$guncelle->bindparam(3, $_POST['adres']);
			$guncelle->execute();
			
			$hata = "Başarılı Güncelleme yaptınız.";
		}
?>


<div class="offset1">
<form class="form-horizontal" method="post" action="kurumbilgisiguncelle.php?update=1">
<fieldset>

<!-- Form Name -->
<legend class="span10">Kurum Bilgileri Güncelleme Ekranı</legend>

<?php
	if ($hata) {
		echo "<center class='alert alert-success'>$hata</center>";
	}
?>
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="kurumadi">Kurum Adı (*)</label>
  <div class="controls">
    <input id="kurumadi" name="kurumadi" placeholder="Ondokuz Mayıs Üniversitesi" class="input-large" type="text" value="<?=$ad?> ">
    
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="kurumtipi">Kurum Tipi (*)</label>
  <div class="controls">
    <select id="kurumtipi" name="kurumtipi" class="input-large">
      <option value="0" >Kurumunuzun Tipi</option>
      <?php
		try {
			$db = new PDO($dsn, $dbuser, $dbpassword);
			$kurumtipi = $db->query("SELECT * FROM roles ORDER BY id ASC");
			foreach($kurumtipi as $row){
		?>
			 <option value="<?= $rol?>"><?= $row['institute_name'] ?></option>
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
  <label class="control-label" for="email">Email (*)</label>
  <div class="controls">
    <input id="email" name="email" placeholder="info@omu.edu.tr" class="input-large" type="text" value="<?=$email?>">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="telno">Telefon Numarası (*)</label>
  <div class="controls">
    <input id="telno" name="telno" placeholder="" class="input-large" type="text" value="<?=$telno?>">
    <p class="help-block">Örnegin: 0505-689-4556</p>
  </div>
</div>
<div class="control-group">
  <label class="control-label" for="il">İl(*)</label>
  <div class="controls">
    <select onChange="ilceListele(this.value)" id="il" name="il" class="input-large" value="<?=$il?>">
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
    <select id="ilce" name="ilce" class="input-large" value="<?$ilce?>">
      <option value="0">Önce İl Seçiniz</option>
      
    </select>
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="adres">Adres</label>
  <div class="controls">                     
    <textarea id="adres" name="adres"><?=$address?></textarea>
  </div>
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
</div>
<a href="kurum_index.php" class="btn btn-inverse"><-- Geri</a>

<?php
//~ if ($_SESSION['ad']){
	//~ echo $_SESSION['ad'];
	//~ echo $_SESSION['soyad'];
//~ }
include_once('layout/_footer.php');
?>


