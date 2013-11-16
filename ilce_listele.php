<?php
include_once("config.php");
?>

<?php 
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword);
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
?>

<select name="ilce">
					
<?php
		$il_id = $_GET['il'];

		$ilce = $db->query("SELECT ID, ilce_adi FROM ilce WHERE IL_ID='$il_id' ORDER BY ID ASC");
		foreach($ilce as $row){
	  ?>	
				<option value="<?= $row['ID'];?>"><?= $row['ilce_adi']; ?></option>
      <?php } ?>
</select>

<?php
include_once("layout/_footer.php");
?>
