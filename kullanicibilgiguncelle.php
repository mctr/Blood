<?php
session_start();
include('layout/_head.php');
include('layout/_header.php');
include_once('config.php');
?>
<?php
$mmail = $_SESSION['donor'];

	try {
			$db = new PDO($dsn, $dbuser, $dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
			$query18 = "SELECT * FROM donors WHERE email='$mmail'";
			$hop = $db->query($query18);
			foreach($hop as $row) {
				$ad = $row['first_name'];
				$soyad = $row['last_name'];
				$gender = $row['gender'];
				$kangrubu = $row['kangrubu'];
				$tcno = $row['tc'];
				$dtarihi = $row['birtday'];
			}
			
			
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
		
		if ($_GET['update'] == 1) {
			$guncelle = $db->prepare("UPDATE donors SET tc=?, first_name=?, last_name=?, gender=? WHERE email='$mmail'");
			
			$guncelle->bindParam(1, $_POST['tcno']);
			$guncelle->bindParam(2, $_POST['ad']);
			$guncelle->bindParam(3, $_POST['soyad']);
			$guncelle->bindParam(4, $_POST['cinsiyet']);
			
			
			$guncelle->execute();
			
			$hata = "Başarılı Güncelleme yaptınız.";
		}
?>



<div class="offset1">
<legend class="span8">Kullanıcı Bİlgileri Güncelleme Ekranı</legend>
<p>
	

<form class="form-horizontal" id="registerHere1" name="registerHere2" method="post" action="kullanicibilgiguncelle.php?update=1">
    <fieldset>
		<?php
	if ($hata) {
		echo "<center class='alert alert-error'>$hata</center>";
	}
?>
		<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="ad">Ad (*)</label>
				<div class="controls">
					<input id="ad" name="ad" placeholder="" class="input-large" type="text" value="<?=$ad?>">
				</div>
			</div>

		<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="soyad">Soyad (*)</label>
				<div class="controls">
					<input id="soyad" name="soyad" placeholder="" class="input-large" type="text" value="<?=$soyad?>">
				</div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="cinsiyet">Cinsiyet (*)</label>
				<div class="controls">
					<input id="cinsiyet" name="cinsiyet" placeholder="" class="input-large" type="text" value="<?=$gender?>">
				</div>
			</div>

			<!-- Select Basic -->
			<div class="control-group">
			 <label class="control-label" for="kangrubu">Kan Grubu</label>
				<div class="controls">
					<select id="kangrubu" name="kangrubu" class="input-large" value="<?=$kangrubu?>">
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
						<input id="tcno" name="tcno" placeholder="" class="input-large" type="text" value="<?=$tcno?>">
					</div>
			</div>

			<!-- Text input-->
			<div class="control-group">
			  <label class="control-label" for="dogumtarihi">Doğum Tarihi (*)</label>
				<div class="controls">
					<input id="dogumtarihi" name="dogumtarihi" class="input-large" type="date" value="<?=$dtarihi?>">
					<p class="help-block">Örneğin : 08.03.1992</p>
				</div>
			</div>
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

<a href="donor_index.php" class="btn btn-inverse"><-- Geri</a>

<?php
//~ if ($_SESSION['ad']){
	//~ echo $_SESSION['ad'];
	//~ echo $_SESSION['soyad'];
//~ }
include_once('layout/_footer.php');
?>
