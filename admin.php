<?php
include('layout/_head.php');
include('layout/_header.php');
include_once('config.php');
?>

<!-- Silme - Onaylama İşlemleri -->
<?php
// donor silme - onaylama işlemleri
if ($_GET['donor_sil_id']) {
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword);
		$id = $_GET['donor_sil_id'];
		$query = "DELETE FROM donors WHERE id ='$id'";
		$statement = $db -> prepare($query);
		
		$statement->execute();
		
		header("Location:admin.php");
		
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}

if ($_GET['donor_onayla_id']) {
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword);
		$id = $_GET['donor_onayla_id'];
		$query = "UPDATE donors SET status=1 WHERE id ='$id'";
		$statement = $db -> prepare($query);
		
		$statement->execute();
		
		header("Location:admin.php");
		
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}

// Kurum sil - onaylama işlemleri

if ($_GET['kurum_sil_id']) {
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword);
		$id = $_GET['kurum_sil_id'];
		$query = "DELETE FROM institutes WHERE id ='$id'";
		$statement = $db -> prepare($query);
		
		$statement->execute();
		
		header("Location:admin.php");
		
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}

if ($_GET['kurum_onayla_id']) {
	try {
		$db = new PDO($dsn, $dbuser, $dbpassword);
		$id = $_GET['kurum_onayla_id'];
		$query = "UPDATE institutes SET status=1 WHERE id ='$id'";
		$statement = $db -> prepare($query);
		
		$statement->execute();
		
		header("Location:admin.php");
		
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}
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
			echo "<td>".'<a id="yes" onClick="testClick()" href="admin.php?donor_onayla_id='.$row['id'].'"><i class="icon-ok"></i></a>'."</td>";
			echo "<td>".'<a href="index.php?donor_sil_id='.$row['id'].'"><i class="icon-remove"></i></a>'."</td>";
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
<div class="span9 offset1 alt">
	<center><h1>Kurumlar</h1></center><br>
<table class="table table-bordered">
				<thead>
					<tr>
					<th>id</th>
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
		$query1 = "SELECT institutes.id, institutes.name, il.il_adi, ilce.ilce_adi, roles.institute_name FROM institutes INNER JOIN il ON institutes.city_id=il.ID INNER JOIN ilce ON institutes.district_id=ilce.ID INNER JOIN roles ON institutes.role_id=roles.id";

		$kurumlar = $db->query($query1);


		foreach($kurumlar as $row) {
			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['il_adi']."</td>";
			echo "<td>".$row['ilce_adi']."</td>";
			echo "<td>".$row['institute_name']."</td>";
			echo "<td>".'<a href="admin.php?kurum_onayla_id='.$row['id'].'"><i class="icon-ok"></i></a>'."</td>";
			echo "<td>".'<a href="admin.php?kurum_sil_id='.$row['id'].'"><i class="icon-remove"></i></a>'."</td>";
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
