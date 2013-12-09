<?php
session_start();
if ($_SESSION['donor']) {
include('layout/_head.php');
include('layout/_header.php');
include_once('config.php');

$mmail = $_SESSION['donor'];
if ($_GET['talep'] == 1) {
	try {
			$db = new PDO($dsn, $dbuser, $dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
			//donorün gerekli bilgilerine erişiyoruz
			$donorler = "SELECT * FROM donors WHERE email='$mmail'";
			$hop = $db->query($donorler);
			foreach($hop as $row) {
				$id = $row['id'];
				$statu = $row['status'];
			}
			
			//istek kayıt		
			$kantalep = $db->prepare("INSERT INTO donor_requests (donor_id, blood_group_id, status, content) VALUES (?,?,?,?)");			
					
			$kantalep->bindParam(1, $id);
			$kantalep->bindParam(2, $_POST['kangrubu']);
			$kantalep->bindParam(3, $statu);
			$kantalep->bindParam(4, $_POST['content']);
			
					
			$kantalep->execute();
					
			$mesaj = "İsteginiz başarılı bir şekilde gönderilmiştir.";
	} catch (PDOException $e) {
				echo "Connection failed: " . $e->getMessage();
	}
}

?>
<div class="offset1">
<form class="form-horizontal" method="post" action="acilkantalebi.php?talep=1">
<fieldset>
<?php
	if ($mesaj) {
		echo "<center class='alert alert-success'>$mesaj</center>";
	}
?>
<legend class="span10">Acil Kan Talebi</legend><br>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="kangrubu">Kan Grubu (*)</label>
  <div class="controls">
    <select id="kangrubu" name="kangrubu" class="input-large">
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

<!-- Textarea -->
<div class="control-group">
  <label class="control-label" for="bagistalebi">Bağış Talebinin Gerekçelerini açıkça  belirtiniz</label>
  <div class="controls">                     
    <textarea id="bagistalebi" name="content" rows="5"></textarea>
  </div>
</div>

<!-- Button (Double) -->
<div class="control-group">
  <label class="control-label" for="talepgonder"></label>
  <div class="controls">
    <button id="talepgonder" name="talepgonder" class="btn btn-primary">Talep Gönder</button>
    <a class="btn btn-danger" href="acilkantalebi.php">İptal</a>
  </div>
</div>


</fieldset>
</form>
</div>

<a href="donor_index.php" class="btn btn-inverse"><-- Geri</a>

<?php
include('layout/_footer.php');
} else {
	header("Location:donor_login.php");
}
?>
