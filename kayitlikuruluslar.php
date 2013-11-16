<?php
include("layout/_head.php");
include("layout/_header.php");
include("config.php");
?>

<legend>Kayıtlı Kurum Ve Kuruluşlar
			<div class="pull-right"><a href="kurumekle.php" class="btn btn-primary">Yeni Kurum Kaydı</a></div>
			</legend>
			<br>
			<table class="table table-condensed">
				<thead>
					<tr>
					<th>Adı</th>
					<th>İl</th>
					<th>İlçe</th>
					<th>Kurum Tipi</th>
					</tr>
				</thead>
				<tbody>

<?php
	
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword);
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
	$kurum = $db->query("SELECT institutes.name, il.il_adi, ilce.ilce_adi, roles.institute_name FROM institutes INNER JOIN il ON institutes.city_id=il.ID INNER JOIN ilce ON institutes.district_id=ilce.ID INNER JOIN roles ON institutes.role_id=roles.id");
	foreach($kurum as $row) {
					echo "<tr>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['il_adi']."</td>";
					echo "<td>".$row['ilce_adi']."</td>";
					echo "<td>".$row['institute_name']."</td>";
					echo "</tr>";
				}
?>
	</tbody>
</table>






<?php
include('layout/_footer.php');
?>

