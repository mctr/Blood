<?php
session_start();
include('layout/_head.php');
include('layout/_header.php');
include_once('config.php');
try {
		$db = new PDO($dsn, $dbuser, $dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
		$donor_id = $_GET['donor_id'];
		$query = "SELECT * FROM donors WHERE id='$donor_id'";
		$listele = $db->query($query);
		foreach($listele as $row) {
			$tc = $row['tc'];
			$ad = $row['first_name'];
			$soyad = $row['last_name'];
			$email = $row['email'];
			$telno = $row['phone_number'];
			$cinsiyet = $row['gender'];
			$d_tarihi = $row['birthday'];
			$kangrubu = $row['blood_group_id'];
			$il = $row['city_id'];
			$ilce = $row['district_id'];
			$blood_making = $row['blood_making_date'];
		}
		$query1 = "SELECT * FROM blood_groups WHERE id='$kangrubu'";
		$listele1 = $db->query($query1);
		foreach($listele1 as $row) {
			$y_kangrubu = $row['name'];
		}
		$query2 = "SELECT * FROM il WHERE ID='$il'";
		$listele2 = $db->query($query2);
		foreach($listele2 as $row) {
			$y_il = $row['il_adi'];
		}
		$query3 = "SELECT * FROM ilce WHERE ID='$ilce'";
		$listele3 = $db->query($query3);
		foreach($listele3 as $row) {
			$y_ilce = $row['ilce_adi'];
		}
		
		//~ $mmail = $_SESSION['kurum'];
			//~ //$db = new PDO($dsn, $dbuser, $dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));	
			//~ $sql = "SELECT * FROM institutes WHERE email='$mmail'";
			//~ $yap5 = $db->query($sql);
						//~ 
			//~ foreach($yap5 as $row) {
				//~ $kurumadi = $row['name'];
				//~ $kurum_id = $row['id']
			//~ }
			
		//~ if ($_POST['update'] == 1){
			//~ 
			//~ $making = "INSERT INTO blood_makings (donor_id, institute_id, blood_making_date, comment) VALUES (?, ?, ?, ?)";
			//~ $veri = array($donor_id, $kurum_id, $_POST['tarih'], $_POST['comment']);
			//~ $yap = $db->prepare($making);
			//~ $yap->execute($veri);
						//~ 
			//~ $mesaj = "Başarılı bir şekilde eklediniz";
		//~ 
		//~ }
		
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
?>


<table class="table table-bordered">
  <thead>
    <tr>
      <th></th>
      <th>Kan Bagışcısı Bilgileri</th>
    </tr>
  </thead>
  <tbody>
	<tr>
      <td>Kan Grubu</td>
      <td><?=$y_kangrubu?></td>
    </tr>
	<tr>
      <td>Tc Kimlik Numarası</td>
      <td><?=$tc?></td>
    </tr>
	<tr>
      <td>Ad</td>
      <td><?=$ad?></td>
    </tr>
	<tr>
      <td>Soyad</td>
      <td><?=$soyad?></td>
    </tr>
	<tr>
      <td>E-mail</td>
      <td><?=$email?></td>
    </tr>
	<tr>
      <td>Telefon Numarası</td>
      <td><?=$telno?></td>
    </tr>
	<tr>
      <td>Cinsiyet</td>
      <td><?=$cinsiyet?></td>
    </tr>
	<tr>
      <td>En Son Kan Verme Tarihi</td>
      <td><?=$blood_making?></td>
    </tr>
	<tr>
      <td>Dogum Tarihi</td>
      <td><?=$d_tarihi?></td>
    </tr>
	<tr>
      <td>İl</td>
      <td><?=$y_il?></td>
    </tr>
	<tr>
      <td>İlçe</td>
      <td><?=$y_ilce?></td>
    </tr>
    </tbody>
</table>
<div class="span2"><a href="donorbulma.php" class="btn btn-primary"><i class="icon-arrow-left"></i> Geri </a></div>

<div class="span6 offset1 main">
<form class="form-horizontal" action="donor_bilgi.php?donor_id=<?=$donor_id?>" method="post">
<fieldset>
<legend>Kan Verme Kayıt İşlemi</legend>
<!-- Text input-->
<?php
if($mesaj) {
	echo "<p><center class='alert alert-success'>{$mesaj}</center></p>";
}
?>
<div class="control-group">
  <label class="control-label" for="kurumrol">Kurum(*) :</label>
  <div class="controls">
    <input id="kurum" name="kurum" type="text" value="<?=$kurumadi?>" class="input-large">
  </div>
</div>
<div class="control-group">
  <label class="control-label" for="kurumrol">Donör(*) :</label>
  <div class="controls">
    <input id="ad" name="donor" type="text" value="<?=$ad." ".$soyad?>" class="input-large">
  </div>
</div>
<div class="control-group">
  <label class="control-label" for="kurumrol">Kan Verme Tarihi(*) :</label>
  <div class="controls">
    <input id="tarih" name="tarih" type="date" placeholder="" class="input-large">
  </div>
</div>
<div class="control-group">
  <label class="control-label" for="comment">Açıklama Ekleyebilirsiniz </label>
  <div class="controls">                     
    <textarea rows="4" id="comment" name="comment"></textarea>
  </div>
</div>
<input type="hidden" name="update" value="1" />
<!-- Button -->
<div class="control-group">
  <label class="control-label" for="rolekle"></label>
  <div class="controls">
    <button id="rolekle" name="rolekle" class="btn btn-primary">Kaydet</button>
  </div>
</div>

</fieldset>
</form>
</div>

<?php
	include_once("layout/_footer.php");
?>
