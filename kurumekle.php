<?php
include('layout/_head.php');
include('layout/_header.php');
include('config.php');
?>

<?php
if($_GET['kayit'] == 1) {
	try {
			$db = new PDO($dsn, $user, $password);	
			if ($_POST['kurumadi'] && $_POST['kurumtipi'] && $_POST['email'] && $_POST['il'] && $_POST['ilce'] && $_POST['parola']) {
				if ($_POST['parola'] == $_POST['parolatekrar']){	
					
					$kurumekle = $db->prepare("INSERT INTO institutes(name, email, password_digest, phone_number, status, role_id, city_id, district_id, address) VALUES (?,?,?,?,?,?,?,?,?)");
					
					$kurumekle->bindParam(1, $_POST['kurumadi']);
					$kurumekle->bindParam(2, $_POST['email']);
					$kurumekle->bindParam(3, $_POST['parola']);
					$kurumekle->bindParam(4, $_POST['telno']);
					$kurumekle->bindParam(5, $_POST['status']);
					$kurumekle->bindParam(6, $_POST['kurumtipi']);
					$kurumekle->bindParam(7, $_POST['il']);
					$kurumekle->bindParam(8, $_POST['ilce']);
					$kurumekle->bindParam(9, $_POST['adres']);
					
					$kurumekle->execute();
					
					$mesaj = "Başarılı bir şekilde kurum kaydı yaptınız.";
				} else {
					$error = "İki parola birbirine eşit olmalıdır.";
				} 
			} else {
				$error = "Lütfen yıldızlı(*) alanları boş bırakmayınız.";
			}
	} catch (PDOException $e) {
				echo "Connection failed: " . $e->getMessage();
	}
}
?>



	<div class="span9">
	<form class="form-horizontal" action="kurumekle.php?kayit=1" method="post">
<fieldset>

<!-- Form Name -->
<legend>Kurum Kayıt Ekranı</legend>
</div>

<!-- Text input-->
<div class="span6 offset4">
<?php
if($error){
	echo "<center><div class='alert alert-error'>$error</div></center>";
}
if($mesaj){
	echo "<center><div class='alert alert-error'>$mesaj</div></center>";
}
?>
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
      <option value="0" >Kurumunuzun Tipi</option>
      <?php
		try {
			$db = new PDO($dsn, $user, $password);
			$kurumtipi = $db->query("SELECT * FROM roles ORDER BY id ASC");
			foreach($kurumtipi as $row){
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
    <input id="email" name="email" placeholder="info@omu.edu.tr" class="input-large" type="email">
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
  <label class="control-label" for="il">İl(*)</label>
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
  <label class="control-label" for="ilce">İlçe(*)</label>
  <div class="controls">
    <select id="ilce" name="ilce" class="input-large">
      <option value="0">İlçe Seçiniz</option>
    </select>
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="parola">Parola (*)</label>
  <div class="controls">
    <input id="parola" name="parola" placeholder="" class="input-large" type="password">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="parolatekrar">Parola Tekrar (*)</label>
  <div class="controls">
    <input id="parolatekrar" name="parolatekrar" placeholder="" class="input-large" type="password">
    
  </div>
</div>
<!-- Textarea -->
<div class="control-group">
  <label class="control-label" for="adres">Adres</label>
  <div class="controls">                     
    <textarea id="adres" name="adres"></textarea>
  </div>
</div>
<input type="hidden" name="status" value="2">
<input type="submit" class="btn btn-primary" value="Kayıt Ekle">
</form>

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
