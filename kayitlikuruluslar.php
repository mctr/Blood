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
	
	$kurum = $db->query("SELECT * FROM institutes", PDO::FETCH_NUM);
	foreach($kurum as $row) {
					echo "<tr>";
					echo "<td>".$row[1]."</td>";
					echo "<td>".$row[2]."</td>";
					echo "<td>".$row[3]."</td>";
					echo "<td>".$row[5]."</td>";
					echo "</tr>";
				}
?>
	</tbody>
</table>






<?php
include('layout/_footer.php');
?>

