<?php
session_start();
if ($_SESSION['admin']) {
include('layout/_head.php');
include('layout/_header.php');
include('config.php');
if ($_GET['rol_ekleme'] == 1) {
	
	if ($_POST['rol_ekle'] == 1) {
		try {
			$db = new PDO($dsn, $dbuser, $dbpassword);	
			$sql = "INSERT INTO roles (institute_name) VALUES (?)";
			$veri = array($_POST['kurumrol']);
			$yap = $db->prepare($sql);
			$yap->execute($veri);
						
			$mesaj = "Başarılı bir şekilde Kurum rolü eklediniz";
		} catch (PDOException $e) {
					echo "Connection failed: " . $e->getMessage();
		}
	}
?>
<form class="form-horizontal" action="kurum_rol.php?rol_ekleme=1" method="post">
<fieldset>
<legend>Kurum Rolü Ekle</legend>

<?php
if ($mesaj){
	echo "<p><center class='alert alert-success'>{$mesaj}</center></p>";
}
?>
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="kurumrol">Kurum Rolü</label>
  <div class="controls">
    <input id="kurumrol" name="kurumrol" type="text" placeholder="Kurumun Rolü" class="input-large">
    
  </div>
</div>
<input type="hidden" name="rol_ekle" value="1" />
<!-- Button -->
<div class="control-group">
  <label class="control-label" for="rolekle"></label>
  <div class="controls">
    <button id="rolekle" name="rolekle" class="btn btn-primary">Ekle</button>
  </div>
</div>

</fieldset>
</form>
<div class="span2"><a href="admin.php" class="btn btn-primary"><i class="icon-arrow-left"></i> Geri </a></div>

<?php
} 
if($_GET['kurum_rol_edit']) {
	$edit_id = $_GET['kurum_rol_edit'];
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
		$query = "SELECT * FROM roles WHERE id='$edit_id'";

		$listele = $db->query($query);


		foreach($listele as $row) {
			$kurum_rol = $row['institute_name'];
		}
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
	if ($_POST['rol_edit'] == 1) {
		$yeni_rol = $_POST['kurumrol'];
		$query_edit = "UPDATE roles SET institute_name='$yeni_rol' WHERE id='$edit_id'";
		$statement = $db -> prepare($query_edit);
		
		$statement->execute();
		
		$mesaj = "Başarılı bir şekilde Güncelleme yaptınız";
	}
?>
<form class="form-horizontal" action="kurum_rol.php?kurum_rol_edit=<?=$edit_id?>" method="post">
<fieldset>
<legend>Kurum Rolü Düzenle</legend>

<?php
if ($mesaj){
	echo "<p><center class='alert alert-success'>{$mesaj}</center></p>";
}
?>
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="kurumrol">Kurum Rolü</label>
  <div class="controls">
    <input id="kurumrol" name="kurumrol" type="text" class="input-large" value="<?=$kurum_rol?>">
    
  </div>
</div>
<input type="hidden" name="rol_edit" value="1" />
<!-- Button -->
<div class="control-group">
  <label class="control-label" for="rolekle"></label>
  <div class="controls">
    <button id="rolekle" name="roledit" class="btn btn-success">Güncelle</button>
  </div>
</div>

</fieldset>
</form>
<div class="span2"><a href="admin_process.php?kurum_rol_listele=1" class="btn btn-primary"><i class="icon-arrow-left"></i> Geri </a></div>
	
<? } ?>
<?php
} else {
	header("Location:login.php");
}
include('layout/_footer.php');
?>
