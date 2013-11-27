<?php
include('layout/_head.php');
include('layout/_header.php');
include_once('config.php');
?>
<!-- Donörler (Start)-->
<div class="span6 offset3 alt">
	<center><h1>Donörler</h1></center><br>
<table class="table table-bordered">
				<thead>
					<tr>
					<th>id</th>
					<th>Adı</th>
					<th>Soyadı</th>
					<th>E-mail</th>
					<th>Onayla</th>
					<th>Sil</th>
				</tr>
				</thead>
				<tbody>
<?php
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword);
		$query = "SELECT id,first_name, last_name, email FROM donors WHERE status = 2";

		$listele = $db->query($query);


		foreach($listele as $row) {
			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['first_name']."</td>";
			echo "<td>".$row['last_name']."</td>";
			echo "<td>".$row['email']."</td>";
			echo "<td>".'<a href="login.php"><i class="icon-ok"></i></a>'."</td>";
			echo "<td>".'<a href="index.php"><i class="icon-remove"></i></a>'."</td>";
			echo "</tr>";
		}
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
	
?>
			</tbody>
	</table>
</div>
<!-- Donörler (Finish)-->

<!-- Kurumlar (Start)-->
<div class="span8 offset2 alt">
	<center><h1>Kurumlar</h1></center><br>
<table class="table table-bordered">
				<thead>
					<tr>
					<th>Adı</th>
					<th>İl</th>
					<th>İlçe</th>
					<th>Kurum Tipi</th>
					<th>Onayla</th>
					<th>Sil</th>
				</tr>
				</thead>
				<tbody>
<?php
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword);
		$query1 = "SELECT institutes.name, il.il_adi, ilce.ilce_adi, roles.institute_name FROM institutes INNER JOIN il ON institutes.city_id=il.ID INNER JOIN ilce ON institutes.district_id=ilce.ID INNER JOIN roles ON institutes.role_id=roles.id";

		$kurumlar = $db->query($query1);


		foreach($kurumlar as $row) {
			echo "<tr>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['il_adi']."</td>";
			echo "<td>".$row['ilce_adi']."</td>";
			echo "<td>".$row['institute_name']."</td>";
			echo "<td>".'<a href="login.php"><i class="icon-ok"></i></a>'."</td>";
			echo "<td>".'<a href="index.php"><i class="icon-remove"></i></a>'."</td>";
			echo "</tr>";
		}
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
?>
			</tbody>
	</table>
</div>
<!-- Kurumlar (Finish)-->
<?php
include("layout/_footer.php");
?>
