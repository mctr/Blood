<?php
session_start();
if ($_SESSION['kurum']) {
include('layout/_head.php');
include('layout/_header.php');
include_once('config.php');
$kurum_mail = $_SESSION['kurum'];
$donor_id = $_GET['donor_id'];
try {
		$db = new PDO($dsn, $dbuser, $dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
		
		$query = "SELECT * FROM donors WHERE id='$donor_id'";
		$listele = $db->query($query);
		foreach($listele as $row) {
			$ad = $row['first_name'];
			$soyad = $row['last_name'];
		}
		$query4 = "SELECT * FROM institutes WHERE email='$kurum_mail'";
		$kurum = $db->query($query4);
		foreach ($kurum as $row) {
			$kurum_id = $row['id'];
			$kurumadi = $row['name'];
		}
		
		if ($_POST['update'] == 1){
			
			$making = "INSERT INTO blood_makings (donor_id, institute_id, blood_making_date, comment) VALUES (?, ?, ?, ?)";
			$veri = array($donor_id, $kurum_id, $_POST['tarih'], $_POST['comment']);
			$yap = $db->prepare($making);
			$yap->execute($veri);

			$mesaj = "Başarılı bir şekilde eklediniz";
		}
		
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
?>
<div class="span6 offset1">
<form class="form-horizontal" action="kanvermekayit.php?donor_id=<?=$donor_id?>" method="post">
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
    <button id="rolekle" name="rolekle" class="btn btn-inverse">Kaydet</button>
  </div>
</div>

</fieldset>
</form>
<div class="span2"><a href="donorbulma.php" class="btn btn-primary"><i class="icon-arrow-left"></i> Geri </a></div>
</div>
<?php
} else {
	header("Location:kurum_login.php");
}
	include_once("layout/_footer.php");
?>
