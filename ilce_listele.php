<?php
include_once("config.php");
?>

<?php 
	try {
		$db = new PDO($dsn, $user, $password);
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
?>

<select name="ilce">
					
<?php
		$il_id = $_GET['il'];

		$ilce = $db->query("SELECT ID, ADI FROM ilce WHERE IL_ID='$il_id' ORDER BY ID ASC");
		foreach($ilce as $row){
	  ?>	
				<option value="<?= $row['ID'];?>"><?= $row['ADI']; ?></option>
      <?php } ?>
</select>

<?php
include_once("layout/_footer.php");
?>