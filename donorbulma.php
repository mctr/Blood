<?php
include('layout/_head.php');
include('layout/_header.php');
include_once('config.php');
?>

<div class="offset1">
<form class="form-horizontal" action="donorbulma.php" method="post">
<fieldset>

<!-- Form Name -->
<legend class="span10">Donör Bulma</legend>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="kangrubu">Kan Grubu</label>
  <div class="controls">
    <select id="kangrubu" name="kangrubu" class="input-large">
      <option>Kan Grubu</option>
      <?php
		try {
			$db = new PDO($dsn, $dbuser, $dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
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

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="il">İl</label>
  <div class="controls">
    <select onChange="ilceListele(this.value)" id="il" name="il" class="input-large">
      <option value="0">İl Seçiniz</option>
      <?php
		$city = $db->query("SELECT ID, il_adi FROM il ORDER BY ID ASC");
		foreach($city as $row){
	  ?>
				<option value="<?= $row['ID'];?>"><?= $row['il_adi']; ?></option>

      <?php } ?>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="ilce">İlçe</label>
  <div class="controls">
    <select id="ilce" name="ilce" class="input-large">
      <option>Önce İl Seçiniz</option>
    </select>
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="donorara"></label>
  <div class="controls">
    <button id="donorara" name="donorara" class="btn btn-danger">Donör Ara</button>
  </div>
</div>
</form>
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
<a href="kurum_index.php" class="btn btn-inverse"><-- Geri</a>



<?php
$kan_id = $_POST['kangrubu'];
if ($kan_id != 0) {
	?>
	<div id="main">
	<table class="table table-condensed">
				<thead>
					<tr>
					<th>#</th>
					<th>Adı</th>
					<th>Soyadı</th>
					<th>Telefon</th>
					<th>Cinsiyet</th>
					<th>Kan Grubu</th>
					<th>İl</th>
					<th>İlçe</th>
					<th>Son Kar Verme Tarihi</th>
					</tr>
				</thead>
				<tbody>


<?php
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
		$il_id = $_POST['il'];
		$ilce_id = $_POST['ilce'];
		$query = "SELECT donors.id, donors.first_name, donors.last_name, donors.phone_number, donors.gender,donors.blood_making_date ,il.il_adi,
			ilce.ilce_adi, blood_groups.name FROM donors INNER JOIN il ON donors.city_id=il.ID
			INNER JOIN ilce ON donors.district_id=ilce.ID INNER JOIN
			blood_groups ON donors.blood_group_id=blood_groups.id WHERE donors.status=1 and blood_groups.id='$kan_id' ";

		if ($il_id != 0) {
			$query .= " and il.ID='$il_id'";
		}

		if ($ilce_id != 0) {
			$query .= " and ilce.ID='$ilce_id'";
		}

		$ara = $db->query($query);


		foreach($ara as $row) {
			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['first_name']."</td>";
			echo "<td>".$row['last_name']."</td>";
			echo "<td>".$row['phone_number']."</td>";
			echo "<td>".$row['gender']."</td>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['il_adi']."</td>";
			echo "<td>".$row['ilce_adi']."</td>";
			echo "<td>".$row['blood_making_date']."</td>";
			echo "<td>".'<a href="donor_bilgi.php?donor_id='.$row['id'].'"><i class="icon-search"></i></a>'."</td>";
			echo "<td>".'<a href="kanvermekayit.php?donor_id='.$row['id'].'"><i class="icon-trash"></i></a>'."</td>";
			echo "</tr>";
		}
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
?>

		</tbody>
	</table>
	</div>

<?php } ?>


<?php
	include_once("layout/_footer.php");
?>
