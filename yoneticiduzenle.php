<?php
include('layout/_head.php');
include('layout/_header.php');
include('config.php');

$id = $_GET['admin_edit_id'];
//if($_GET['admin_edit_id']) {	
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
		$query1 = "SELECT * FROM admins WHERE id='$id'";
		$admin_bilgi = $db->query($query1);


		foreach($admin_bilgi as $row) {
			$ad = $row['first_name'];
			$soyad = $row['last_name'];
			$email = $row['email'];
			$telno = $row['phone_number'];

		}
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
//}
if ($_GET['admin_update']) {
	$id = $_GET['admin_update'];
	try {
			$db = new PDO($dsn, $dbuser, $dbpassword);

			$g_a = $_POST['ad'];
			$g_s = $_POST['soyad'];
			$g_email = $_POST['email'];
			$g_tel = $_POST['telno'];

			$a_guncelle = $db->prepare("UPDATE admins SET  first_name='$g_a', last_name='$g_s', email='$g_email', phone_number='$g_tel'  WHERE id='$id'");
			$a_guncelle->execute();
			
			$hata = "Başarılı Güncelleme yaptınız.";
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}
?>
<div class="span6 offset3">
<form class="form-horizontal" action="yoneticiduzenle.php?admin_update=<?=$id?>" method="post">
<fieldset>
<legend>Yönetici Düzenle</legend>

<?php
if ($hata) {
	echo "<center class='alert alert-success'>$hata</center>";
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
  <label class="control-label" for="email">Email (*)</label>
  <div class="controls">
    <input id="email" name="email" placeholder="" class="input-large" type="text" value="<?=$email?>">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="telno">Telefon Numarası</label>
  <div class="controls">
    <input id="telno" name="telno" placeholder="" class="input-large" type="text" value="<?=$telno?>">
    
  </div>
</div>
<center><input type="submit" class="btn btn-primary" value="Güncelle" /></center>
</fieldset>
</form>
<div class="span2"><a href="admin.php?admin_listele=1" class="btn btn-primary"><i class="icon-arrow-left"></i> Geri </a></div>
<?php
include('layout/_footer.php');
?>
