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
	//Veritabanı Baglantısı
	//~ 
	//~ $dsn = "mysql:host=localhost;dbname=Blood";
	//~ $user = "root";
	//~ $password = "";
 
	try {
		$db = new PDO($dsn, $user, $password);
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
	$kurum = $db->query("SELECT institutes.name, il.ADI, ilce.ID, roles.id FROM institutes INNER JOIN il ON institutes.city_id=il.ID INNER JOIN ilce ON institutes.district_id=ilce.ID INNER JOIN roles ON institutes.role_id=roles.id");
	foreach($kurum as $row) {
					echo "<tr>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['ADI']."</td>";
					echo "<td>".$row['']."</td>";
					echo "<td>".$row['roles.id']."</td>";
					echo "</tr>";
				}
?>
	</tbody>
</table>






<?php
include('layout/_footer.php');
?>

